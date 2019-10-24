<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <link href="{{mix('css/app.css')}}" rel="stylesheet">
    @yield('style')
</head>
<body class="bg-light">
    <header>
        <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item"><a href="{{route('genre.list')}}" class="nav-link">MUSICS</a></li>
                </ul>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">
                                {{__('name.login')}}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">
                                {{__('name.register')}}
                            </a>
                        </li>
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <i class="fas fa-user"></i>
                                {{ Auth::id() }}<span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('user.show', ['user'=>Auth::User()]) }}">
                                    <i class="fas fa-user"></i>
                                    {{__('name.mypage')}}
                                </a>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                    <i class="fas fa-sign-out-alt"></i>
                                    {{__('name.logout')}}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>

                                <a class="dropdown-item" href="{{ route('user.settings', ['user'=>auth()->id()]) }}">
                                    <i class="fas fa-user-cog"></i>
                                    {{__('name.user.settings')}}
                                </a>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </nav>
    </header>
    <main class="container my-4 py-4 bg-white shadow-sm rounded">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                @yield('breadcrumb')
            </ol>
        </nav>
        <h1>@yield('title')</h1>
        @yield('content')
    </main>
    <script src="{{ mix('js/app.js') }}" ></script>
    @yield('script')
</body>
</html>
