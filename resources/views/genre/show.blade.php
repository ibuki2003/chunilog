@extends('layouts.app')
@section('title', __('name.genre.show', ['name' => $genre->name]))

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{route('home')}}">{{__('name.home')}}</a></li>
<li class="breadcrumb-item"><a href="{{route('genre.list')}}">{{__('name.genre.list')}}</a></li>
<li class="breadcrumb-item active" aria-current="page">{{$genre->name}}</li>
@endsection

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
