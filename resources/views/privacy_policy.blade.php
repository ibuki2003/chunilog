@extends('layouts.app')
@section('title', __('name.privacy_policy'))

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{route('home')}}">{{__('name.home')}}</a></li>
<li class="breadcrumb-item active" aria-current="page">{{__('name.privacy_policy')}}</li>
@endsection

@section('content')
@endsection
