@extends('layouts.app')
@section('title', __('name.genre.list'))
@section('content')
    <ul>
        @foreach($genres as $genre)
            <li>
                <a href="{{route('genre.show', ['genre'=>$genre->id])}}">
                    {{$genre->id}}{{$genre->name}}
                </a>
            </li>
        @endforeach
    </ul>
@endsection
