@extends('layouts.app')
@section('title', __('新規登録'))

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{route('home')}}">{{__('name.home')}}</a></li>
<li class="breadcrumb-item active" aria-current="page">{{__('name.register')}}</li>
@endsection

@section('content')
<form method="POST" action="{{route('register')}}">
    @csrf

    <div class="form-group row">
        <label for="id" class="col-sm-4 col-form-label text-md-right">ID</label>

        <div class="col-md-6">
            <input id="id" type="text" class="form-control{{ $errors->has('id') ? ' is-invalid' : '' }}" name="id" value="{{ old('id') }}" aria-describedby="idHelp" required autofocus>
            <small id="idHelp" class="form-text text-muted">{{__('ui.idHelp')}}</small>
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
        <label for="email" class="col-md-4 col-form-label text-md-right">{{__('ui.email')}}</label>

        <div class="col-md-6">
            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" aria-describedby="emailHelp" required>
            <small id="emailHelp" class="form-text text-muted">{{__('ui.emailHelp')}}</small>
            @if ($errors->has('email'))
                <div class="invalid-feedback">
                    <ul>
                        @foreach($errors->get('email') as $error)
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
            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" aria-describedby="passwordHelp" required>
            <small id="passwordHelp" class="form-text text-muted">{{__('ui.passwordHelp')}}</small>
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
                <input class="form-check-input" type="checkbox" name="agreement" id="agreement" {{ old('agreement') ? 'checked' : '' }}>

                <label class="form-check-label" for="agreement">
                    {{__('ui.agreement')}}
                </label>
                @if ($errors->has('agreement'))
                    <div class="invalid-feedback">
                        <ul>
                            @foreach($errors->get('agreement') as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <p class="form-text text-muted">
                    <a class="mx-1" href="{{route('agreement')}}">{{__('name.agreement')}}</a>
                    <a class="mx-1" href="{{route('privacy_policy')}}">{{__('name.privacy_policy')}}</a>
                </p>
            </div>
        </div>
    </div>

    <div class="form-group row mb-0">
        <div class="col-md-8 offset-md-4">
            <button type="submit" class="btn btn-primary">
                {{__('ui.register')}}
            </button>
        </div>
    </div>
</form>
@endsection
