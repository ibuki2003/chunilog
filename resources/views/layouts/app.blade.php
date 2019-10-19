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
            </div>
        </nav>
    </header>
    <main class="container my-4 py-4 bg-white shadow-sm rounded">
        <h1>@yield('title')</h1>
        @yield('content')
    </main>
    <script src="{{ mix('js/app.js') }}" ></script>
    @yield('script')
</body>
</html>
