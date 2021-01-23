<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Music;
use App\Models\MusicGenre;

class getMusics extends Command {

    static function get_dif_float(String $str) {
        $ret = (int)$str;
        if(substr($str, -1)==='+')$ret+=0.5;
        return $ret;
    }

    const URL = 'https://chunithm.sega.jp/data/common.json';

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'musics:get';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'get music info from official';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle() {
        $catcodes = [];
        $genres = MusicGenre::all();
        foreach ($genres as $genre) {
            $catcodes[$genre->name] = $genre->id;
        }
        $body = file_get_contents(static::URL);
        if ($body === FALSE) return false;
        $content = json_decode($body);
        foreach ($content as $music) {
            echo $music->title, "\n";
            if($music->catcode == 'WORLD\'S END')continue; // not supported yet
            if (!array_key_exists($music->catcode, $catcodes)) {
                echo 'catcode ', $music->catcode, ' not found\n';
                continue;
            }

            Music::updateOrCreate([
                    'name' => $music->title,
                ],
                [
                    'genre_id' => $catcodes[$music->catcode],
                    'artist'   => $music->artist,
                    'dif_bas'  => static::get_dif_float($music->lev_bas),
                    'dif_adv'  => static::get_dif_float($music->lev_adv),
                    'dif_exp'  => static::get_dif_float($music->lev_exp),
                    'dif_mas'  => static::get_dif_float($music->lev_mas),
                ]);
        }
    }
}
