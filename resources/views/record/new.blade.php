@extends('layouts.app')
@section('title', __('name.record.new'))

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{route('home')}}">{{__('name.home')}}</a></li>
<li class="breadcrumb-item"><a href="{{route('user.show', ['user'=>Auth::User()])}}">{{auth()->id()}}</a></li>
<li class="breadcrumb-item"><a href="{{route('user.records', ['user'=>Auth::User()])}}">{{__('ui.record.list')}}</a></li>
<li class="breadcrumb-item active" aria-current="page">{{__('ui.record.new')}}</li>
@endsection

@section('content')
@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<form method="POST" action="{{ route('record.new', ['user'=>auth()->id()]) }}">
    @csrf
    <div class="form-group row">
        <label for="music_id" class="col-sm-4 col-form-label text-md-right">{{__('ui.music.name')}}</label>
        <div class="col-md-6">
            <input id="music_id" type="number" class="form-control{{ $errors->has('music_id') ? ' is-invalid' : '' }}" name="music_id" value="{{ old('music_id') }}" required autofocus>
            @if ($errors->has('music_id'))
                <div class="invalid-feedback">
                    <ul>
                        @foreach($errors->get('music_id') as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>
    <div class="form-group row">
        <label for="level" class="col-sm-4 col-form-label text-md-right">{{__('ui.music.level')}}</label>
        <div class="col-md-6">
            <input id="level" type="number" class="form-control{{ $errors->has('level') ? ' is-invalid' : '' }}" name="level" value="{{ old('level') }}" required autofocus>
            @if ($errors->has('level'))
                <div class="invalid-feedback">
                    <ul>
                        @foreach($errors->get('level') as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>
    <div class="form-group row">
        <label for="track_no" class="col-sm-4 col-form-label text-md-right">{{__('ui.record.track')}}</label>
        <div class="col-md-6">
            <input id="track_no" type="number" class="form-control{{ $errors->has('track_no') ? ' is-invalid' : '' }}" name="track_no" value="{{ old('track_no') }}" required autofocus>
            @if ($errors->has('track_no'))
                <div class="invalid-feedback">
                    <ul>
                        @foreach($errors->get('track_no') as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>
    <div class="form-group row">
        <label for="store" class="col-sm-4 col-form-label text-md-right">{{__('ui.record.store')}}</label>
        <div class="col-md-6">
            <input id="store" type="text" class="form-control{{ $errors->has('store') ? ' is-invalid' : '' }}" name="store" value="{{ old('store') }}" required autofocus>
            @if ($errors->has('store'))
                <div class="invalid-feedback">
                    <ul>
                        @foreach($errors->get('store') as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>
    <div class="form-group row">
        <label for="time" class="col-sm-4 col-form-label text-md-right">{{__('ui.record.time')}}</label>
        <div class="col-md-6">
            <input id="time" type="datetime-local" class="form-control{{ $errors->has('time') ? ' is-invalid' : '' }}" name="time" value="{{ old('time') }}" required autofocus>
            @if ($errors->has('time'))
                <div class="invalid-feedback">
                    <ul>
                        @foreach($errors->get('time') as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-4 col-form-label text-md-right">{{__('ui.record.counts')}}</label>
        <div class="col-md-6 pr-0 row">
            <div class="col-md-3 pr-0">
                <label for="jc_cnt">JCRITICAL</label>
                <input id="jc_cnt" type="number" class="form-control{{ $errors->has('jc_cnt') ? ' is-invalid' : '' }}" name="jc_cnt" value="{{ old('jc_cnt') }}" required autofocus>
            </div>
            <div class="col-md-3 pr-0">
                <label for="cr_cnt">CRITICAL</label>
                <input id="cr_cnt" type="number" class="form-control{{ $errors->has('cr_cnt') ? ' is-invalid' : '' }}" name="cr_cnt" value="{{ old('cr_cnt') }}" required autofocus>
            </div>
            <div class="col-md-3 pr-0">
                <label for="at_cnt">ATTACK</label>
                <input id="at_cnt" type="number" class="form-control{{ $errors->has('at_cnt') ? ' is-invalid' : '' }}" name="at_cnt" value="{{ old('at_cnt') }}" required autofocus>
            </div>
            <div class="col-md-3 pr-0">
                <label for="ms_cnt">MISS</label>
                <input id="ms_cnt" type="number" class="form-control{{ $errors->has('ms_cnt') ? ' is-invalid' : '' }}" name="ms_cnt" value="{{ old('ms_cnt') }}" required autofocus>
            </div>
        </div>
        @if ($errors->has('jc_cnt') || $errors->has('cr_cnt') || $errors->has('at_cnt') || $errors->has('ms_cnt'))
            <div class="invalid-feedback">
                <ul>
                    @foreach($errors->get('jc_cnt') as $error)
                        <li>{{$error}}</li>
                    @endforeach
                    @foreach($errors->get('cr_cnt') as $error)
                        <li>{{$error}}</li>
                    @endforeach
                    @foreach($errors->get('at_cnt') as $error)
                        <li>{{$error}}</li>
                    @endforeach
                    @foreach($errors->get('ms_cnt') as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
    <div class="form-group row">
        <label for="max_cmb" class="col-sm-4 col-form-label text-md-right">{{__('ui.record.combo')}}</label>
        <div class="col-md-6">
            <input id="max_cmb" type="number" class="form-control{{ $errors->has('max_cmb') ? ' is-invalid' : '' }}" name="max_cmb" value="{{ old('max_cmb') }}" required autofocus>
            @if ($errors->has('max_cmb'))
                <div class="invalid-feedback">
                    <ul>
                        @foreach($errors->get('max_cmb') as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>

    <div class="form-group row mb-0">
        <div class="col-md-8 offset-md-4">
            <button type="submit" class="btn btn-primary">{{__('ui.submit')}}</button>
        </div>
    </div>
</form>
@endsection
