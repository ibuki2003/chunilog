<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MusicGenre;

class MusicGenreController extends Controller {
    public function list() {
        return view('genre.list', ['genres' => MusicGenre::all()]);
    }

    public function show(MusicGenre $genre) {
        return view('genre.show', ['genre' => $genre]);
    }
}
