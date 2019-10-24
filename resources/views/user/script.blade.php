@extends('layouts.app')
@section('title', __('name.user.script'))

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{route('home')}}">{{__('name.home')}}</a></li>
<li class="breadcrumb-item"><a href="{{route('user.show', ['user'=>auth()->id()])}}">{{auth()->id()}}</a></li>
<li class="breadcrumb-item"><a href="{{route('user.settings', ['user'=>auth()->id()])}}">{{__('name.user.settings')}}</a></li>
<li class="breadcrumb-item active" aria-current="page">{{__('name.user.script')}}</li>
@endsection

@section('content')
<p>{{__('ui.user.script.descript')}}</p>
<a href="javascript:(()=>{var s=document.createElement('script');s.src='{{url('js/chuni_get.js')}}';document.body.appendChild(s);})()">{{__('ui.user.script.bookmarklet')}}</a>
<pre class="bg-light border of-scroll p-3"><code>javascript:(()=>{var s=document.createElement('script');s.src='{{url('js/chuni_get.js')}}';document.body.appendChild(s);})()</code></pre>
@endsection
