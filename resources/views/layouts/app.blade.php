<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('partials._head')
</head>
<body>
    <div id="app">
        {{-- Navigation Bar --}}
        @include('partials._navbar')
        {{-- End Navigation Bar --}}
        <main class="py-4">
            @yield('content')
        </main>
    </div>
    @include('partials._script')
</body>
</html>
