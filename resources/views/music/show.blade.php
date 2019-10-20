@extends('layouts.app')
@section('title', __('name.music.show', ['name' => $music->name]))
@section('content')
<h2>{{__('ui.music.name')}}</h2>
<p>{{$music->name}}</p>

<h2>{{__('ui.music.artist')}}</h2>
<p>{{$music->artist}}</p>

<h2>{{__('ui.music.difficulties')}}</h2>
<table class="table">
    <tbody>
        <tr><th>BAS</th><td>{{$music->dif_bas}}</td></tr>
        <tr><th>ADV</th><td>{{$music->dif_adv}}</td></tr>
        <tr><th>EXP</th><td>{{$music->dif_exp}}</td></tr>
        <tr><th>MAS</th><td>{{$music->dif_mas}}</td></tr>
    </tbody>
</table>
<p>
    <a class="btn btn-info" target="_blank" href="https://chunithm.gamerch.com/{{$music->name}}">
        {{__('ui.music.info_gamerch')}}
    </a>
</p>
@endsection
