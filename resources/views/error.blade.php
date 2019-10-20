@extends('layouts.app')
@section('title', __($statuscode.' '.$name))

@section('breadcrumb')
<li class="breadcrumb-item active" aria-current="page">{{$name}}</li>
@endsection

@section('content')
<p>{{__('httperror.'.$statuscode)}}</p>
@if (!empty($message))
    <p class="alert alert-danger">{{__($message)}}</p>
@endif
<p>
    <a href="{{route('home')}}" class="btn btn-primary">{{__('ui.go_to_home')}}</a>
    <button type="button"  onclick="window.history.back()" class="btn btn-secondary">{{__('ui.go_to_prev')}}</button>
</p>

@endsection
