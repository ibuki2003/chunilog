@extends('layouts.app')
@section('title', __('name.user.settings'))

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{route('home')}}">{{__('name.home')}}</a></li>
<li class="breadcrumb-item"><a href="{{route('user.show', ['user'=>auth()->id()])}}">{{auth()->id()}}</a></li>
<li class="breadcrumb-item active" aria-current="page">{{__('name.user.settings')}}</li>
@endsection

@section('content')
<ul class="nav flex-column">
    <li class="nav-item">
        <a class="nav-link" href="{{route('change_password')}}">
            {{__('name.change_password')}}
        </a>
    </li><li class="nav-item">
        <a class="nav-link" href="{{route('user.script', ['user'=>auth()->id()])}}">
            {{__('name.user.script')}}
        </a>
    </li>
</ul>
@endsection
