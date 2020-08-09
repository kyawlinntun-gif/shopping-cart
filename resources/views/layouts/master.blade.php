<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- fontawesome css -->
    <link rel="stylesheet" href="{{ asset('css/all.min.css') }}">

    <!-- bootstrap css -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

    <!-- custom style -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    {{-- layout style --}}
    @yield('layout-style')

    {{-- Page Title --}}
    <title>@yield('title')</title>
</head>
<body>

    {{-- Navbar --}}
    @include('partials.nav')

    {{-- content --}}
    @yield('content')

    <!-- jquery js -->
    <script src="{{ asset('js/jquery.js') }}"></script> 

    {{-- popper js --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>

    <!-- bootstrap js -->
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

    {{-- js script --}}
    @yield('script')
</body>
</html>