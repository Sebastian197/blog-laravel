<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{env('APP_NAME')}}</title>
    <link rel="stylesheet" href="{{asset("css/app.css")}}">
</head>
<body>
    @include('web.partials.nav-header-main')
    <div class="container mb-3 mt-3" id="app">
        @yield('content')
    </div>
    @include('web.partials.footer-main')
    <script src="{{asset("js/app.js")}}"></script>
</body>
</html>
