<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title','')</title>
        <script src="https://cdn.ckeditor.com/ckeditor5/11.0.1/classic/ckeditor.js"></script>
        <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/fonts/fontawesome-all.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/fonts/ionicons.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/Article-Clean.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/Projects-Clean.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/sidebar-1.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/SIdebar-Responsive-2-1.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/SIdebar-Responsive-2.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/sidebar.css') }}">
    </head>
    <body class="antialiased">
        @include('fnh.header')

            <div class="content">
                @yield('content')
            </div>

        
        <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>
    </body>
</html>
