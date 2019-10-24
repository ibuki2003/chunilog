@extends('layouts.app')
@section('title', __('name.genre.list'))
@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{route('home')}}">{{__('name.home')}}</a></li>
<li class="breadcrumb-item active" aria-current="page">{{__('name.genre.list')}}</li>
@endsection

@section('content')
    <ul>
        @foreach($genres as $genre)
            <li>
                <a href="{{route('genre.show', ['genre'=>$genre->id])}}">
                    {{$genre->name}}
                </a>
            </li>
        @endforeach
    </ul>
@endsection
