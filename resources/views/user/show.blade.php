@extends('layouts.app')
@section('title', __('name.user.show', ['user' => $user->id]))

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{route('home')}}">{{__('name.home')}}</a></li>
<li class="breadcrumb-item active" aria-current="page">{{$user->id}}</li>
@endsection

@section('content')
<h2>{{__('ui.user.play_cnt')}}</h2>
<p>{{$user->records()->count()}}</p>
<p><a href="{{route('user.records', ['user'=>$user->id])}}">{{__('ui.record.list')}}</a></p>
@endsection
