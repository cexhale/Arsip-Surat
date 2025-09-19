<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Arsip Surat - @yield('title')</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body>
    <nav>
        <a href="{{ route('archives.index') }}">Arsip Surat</a> |
        <a href="{{ route('categories.index') }}">Kategori Surat</a> |
        <a href="{{ route('about') }}">About</a>
    </nav>
    <div class="container">
        @if(session('success'))
            <div class="alert">{{ session('success') }}</div>
        @endif
        @yield('content')
    </div>
</body>
</html>
