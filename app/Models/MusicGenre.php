<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MusicGenre extends Model {
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    protected $fillable = ['id', 'name'];
}
