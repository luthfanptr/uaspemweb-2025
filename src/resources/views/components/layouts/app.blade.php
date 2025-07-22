<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reviu</title>
    <link rel="stylesheet" href="{{ asset('front/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/templatemo-topic-listing.css') }}">
    @livewireStyles
</head>
<body>
    {{ $slot }}

    <script src="{{ asset('front/js/jquery.min.js') }}"></script>
    <script src="{{ asset('front/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('front/js/jquery.sticky.js') }}"></script>
    <script src="{{ asset('front/js/click-scroll.js') }}"></script>
    <script src="{{ asset('front/js/custom.js') }}"></script>
    @livewireScripts
</body>
</html>
