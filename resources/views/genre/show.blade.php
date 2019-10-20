@extends('layouts.app')
@section('title', __('name.genre.show', ['name' => $genre->name]))
@section('content')
    <ul>
        @foreach($genre->musics as $music)
            <li>
                <a href="{{route('music.show', ['music' => $music->id])}}">
                    {{$music->name}}
                </a>
            </li>
        @endforeach
    </ul>
@endsection
