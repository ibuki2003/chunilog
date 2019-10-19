@extends('layouts.app')
@section('title', __('name.login'))
@section('content')
<form method="POST" action="{{ route('login') }}">
    @csrf
    @foreach($errors as $error)
        <p>{{$error}}</p>
    @endforeach
    <div class="form-group row">
        <label for="id" class="col-sm-4 col-form-label text-md-right">ID</label>

        <div class="col-md-6">
            <input id="id" type="text" class="form-control{{ $errors->has('id') ? ' is-invalid' : '' }}" name="id" value="{{ old('id') }}" required autofocus>
            @if ($errors->has('id'))
                <div class="invalid-feedback">
                    <ul>
                        @foreach($errors->get('id') as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>

    <div class="form-group row">
        <label for="password" class="col-md-4 col-form-label text-md-right">{{__('ui.password')}}</label>

        <div class="col-md-6">
            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
            @if ($errors->has('password'))
                <div class="invalid-feedback">
                    <ul>
                        @foreach($errors->get('password') as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-6 offset-md-4">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                <label class="form-check-label" for="remember">{{__('ui.remember_me')}}</label>
            </div>
        </div>
    </div>

    <div class="form-group row mb-0">
        <div class="col-md-8 offset-md-4">
            <button type="submit" class="btn btn-primary">{{__('ui.login')}}</button>
        </div>
    </div>
</form>
@endsection
