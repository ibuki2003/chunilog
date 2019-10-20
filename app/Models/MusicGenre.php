<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MusicGenre extends Model {
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    protected $fillable = ['id', 'name'];

    public function musics() {
        return $this->hasMany('App\Models\Music', 'genre_id');
    }
}
