@extends('layouts.app')
@section('title', __('name.change_password'))

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{route('home')}}">{{__('name.home')}}</a></li>
<li class="breadcrumb-item active" aria-current="page">{{__('name.change_password')}}</li>
@endsection

@section('content')
@if(session('success'))
    <p class="alert alert-success">{{session('success')}}</p>
@endif

<form method="POST" action="">
    @csrf

    <div class="form-group row">
        <label for="old-password" class="col-md-4 col-form-label text-md-right">{{__('ui.old_password')}}</label>

        <div class="col-md-6">
            <input id="old-password" type="password" class="form-control{{ $errors->has('old_password') ? ' is-invalid' : '' }}" name="old_password" value="" required autofocus>

            @if ($errors->has('old_password'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('old_password') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group row">
        <label for="new-password" class="col-md-4 col-form-label text-md-right">{{ __('ui.new_password') }}</label>

        <div class="col-md-6">
            <input id="new-password" type="password" class="form-control{{ $errors->has('new_password') ? ' is-invalid' : '' }}" name="new_password" required>

            @if ($errors->has('new_password'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('new_password') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group row mb-0">
        <div class="col-md-6 offset-md-4">
            <button type="submit" class="btn btn-primary">
                {{__('ui.submit')}}
            </button>
        </div>
    </div>
</form>
@endsection
