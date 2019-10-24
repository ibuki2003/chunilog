<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Music extends Model
{
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'name', 'artist', 'genre_id',
        'dif_bas', 'dif_adv', 'dif_exp', 'dif_mas',
    ];

    public function genre() {
        return $this->belongsTo('App\Models\MusicGenre', 'genre_id');
    }

    public function getDifficulty($level) {
        return [$this->dif_bas, $this->dif_adv, $this->dif_exp, $this->dif_mas][$level];
    }
}
