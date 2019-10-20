<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Music extends Model
{
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'name', 'artist',
        'dif_bas', 'dif_adv', 'dif_exp', 'dif_mas',
    ];
    
    public function genre() {
        return $this->belongsTo('App\Models\MusicGenre', 'genre_id');
    }
}
