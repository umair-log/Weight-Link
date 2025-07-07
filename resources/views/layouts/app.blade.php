<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Dashboard')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- Include your CSS links --}}
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    @stack('styles')
</head>
<body>

    {{-- Header --}}
    @include('layouts.header')

    {{-- Sidebar --}}
    @include('layouts.sidebar')

    {{-- Topbar --}}
    @include('layouts.topbar')

    <div class="page-wrapper">
        <div class="page-content">
            {{-- Main Content --}}
            @yield('content')
        </div>
    </div>

    {{-- Footer --}}
    @include('layouts.footer')

    {{-- Include JS files --}}
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    @stack('scripts')
</body>
</html>
