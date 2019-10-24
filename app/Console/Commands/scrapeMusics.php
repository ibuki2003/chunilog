<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use \phpQuery;
use App\Models\Music;
use App\Models\MusicGenre;

function get_dif_float(String $str) {
    $ret = (int)$str;
    if(substr($str, -1)==='+')$ret+=0.5;
    return $ret;
}

class scrapeMusics extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'musics:scrape {url}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'scrape music list from gamerch wiki';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $url = $this->argument('url');
        $html = file_get_contents($url);
        // h1要素を取得して出力
        $doc = phpQuery::newDocument($html);

        foreach($doc->find('div') as $div){
            $d = pq($div);
            if(substr($d->attr('class'), -8)!=='midashi1') continue;
            $genre_name = trim($d->text());
            $genre_name = str_replace('　', '', $genre_name);
            if($genre_name == 'WORLD\'S END')continue; // not supported yet
            $genre = MusicGenre::where('name', $genre_name)->first();
            if($genre === NULL){
                echo 'genre ', $genre_name, " not found.\n";
                continue;
            }
            echo $genre_name, "\n";

            $table = $d->next('table');
            foreach($table->find('tbody tr') as $row) {
                $r = pq($row);
                $name = $r->find('th a')->attr('title');
                //echo $title;
                //echo $r->find('td[data-col=1]')->html(),"\n";
                $artist = $r->find('td[data-col=1]')->text();
                $artist = str_replace("\n", ' ', $artist);

                $dif_bas = get_dif_float($r->find('td[data-col=3]')->text());
                $dif_adv = get_dif_float($r->find('td[data-col=4]')->text());
                $dif_exp = get_dif_float($r->find('td[data-col=5]')->text());
                $dif_mas = get_dif_float($r->find('td[data-col=6]')->text());

                echo $name, "\n";
                Music::updateOrCreate([
                        'name' => $name,
                    ],
                    [
                        'genre_id' => $genre->id,
                        'artist' => $artist,
                        'dif_bas' => $dif_bas,
                        'dif_adv' => $dif_adv,
                        'dif_exp' => $dif_exp,
                        'dif_mas' => $dif_mas,
                    ]);
            }
        }
    }
}
