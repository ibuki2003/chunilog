@extends('layouts.app')
@section('title', __('name.genre.show', ['name' => $genre->name]))
@section('content')
    {{$genre->name}}
@endsection
