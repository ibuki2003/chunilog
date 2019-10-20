<?php

namespace App\Http\Controllers;
use App\Models\Music;
use Illuminate\Http\Request;

class MusicController extends Controller {
    public function show(Music $music) {
        return view('music.show', ['music' => $music]);
    }
}
