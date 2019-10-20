@extends('layouts.app')
@section('title', __($statuscode.' '.$name))
@section('content')
<p>{{__('httperror.'.$statuscode)}}</p>
@if (!empty($message))
    <p class="alert alert-danger">{{__($message)}}</p>
@endif
<p>
    <a href="/" class="btn btn-primary">{{__('ui.go_to_home')}}</a>
    <button type="button"  onclick="window.history.back()" class="btn btn-secondary">{{__('ui.go_to_prev')}}</button>
</p>

@endsection
