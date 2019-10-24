@extends('layouts.app')
@section('title', __('name.genre.show', ['name' => $genre->name]))

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{route('home')}}">{{__('name.home')}}</a></li>
<li class="breadcrumb-item"><a href="{{route('genre.list')}}">{{__('name.genre.list')}}</a></li>
<li class="breadcrumb-item active" aria-current="page">{{$genre->name}}</li>
@endsection

@section('content')
    <table class="table">
        <thead>
            <tr>
                <th>{{__('ui.music.name')}}</th>
                <th>{{__('ui.music.artist')}}</th>
                <th colspan="4">{{__('ui.music.difficulties')}}</th>
                <th class="text-nowrap">{{__('ui.music.detail')}}</th>
            </tr>
        </thead>
        <tbody>
            @foreach($genre->musics as $music)
                <tr>
                    <th>{{$music->name}}</th>
                    <th>{{$music->artist}}</th>
                    <th class="table-basic">{{$music->dif_bas}}</th>
                    <th class="table-advanced">{{$music->dif_adv}}</th>
                    <th class="table-expert">{{$music->dif_exp}}</th>
                    <th class="table-master">{{$music->dif_mas}}</th>
                    <th><a href="{{route('music.show', ['music' => $music->id])}}">{{__('ui.music.detail')}}</a></th>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
