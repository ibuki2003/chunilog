@extends('layouts.app')
@section('title', __('name.record.show', ['user' => $record->user_id]))

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{route('home')}}">{{__('name.home')}}</a></li>
<li class="breadcrumb-item"><a href="{{route('user.show', ['user'=>$record->user_id])}}">{{$record->user_id}}</a></li>
<li class="breadcrumb-item"><a href="{{route('user.records', ['user'=>$record->user_id])}}">{{__('ui.record.list')}}</a></li>
<li class="breadcrumb-item active" aria-current="page">{{__('ui.record.detail')}}</li>
@endsection

@section('content')
<h2>{{__('ui.music.name')}}</h2>
<p>
    <a href="{{route('music.show', ['music'=>$record->music_id])}}">{{$record->music->name}}</a>
    <span class="badge badge-{{$record->getLevelStyleName()}}">{{$record->getLevelStr()}}</span>
</p>


<h2>{{__('ui.record.store')}}</h2>
<p>{{$record->store}}</p>

<h2>{{__('ui.record.time')}}</h2>
<p>{{$record->time}}</p>

<h2>{{__('ui.record.counts')}}</h2>
<table class="table">
    <tbody>
        <tr class="table-jcritical"><th>JCRITICAL</th><td>{{$record->jc_cnt}}</td></tr>
        <tr class="table-critical"><th>CRITICAL</th> <td>{{$record->cr_cnt}}</td></tr>
        <tr class="table-attack"><th>ATTACK</th>   <td>{{$record->at_cnt}}</td></tr>
        <tr class="table-miss"><th>MISS</th>     <td>{{$record->ms_cnt}}</td></tr>
    </tbody>
</table>

@if($record->isAllJustice())
    <p class="alert alert-success">ALL JUSTICE</p>
@elseif($record->isFullCombo())
    <p class="alert alert-info">FULL COMBO</p>
@endif
<p>SCORE:{{$record->getScore()}}</p>
<p>RANK:{{$record->getRank()}}</p>
@endsection
