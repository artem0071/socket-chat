<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Chat</title>

    <link rel="shortcut icon" href="{{ asset('favicon.png') }}" type="image/png">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">

</head>
<body style="background-color: #ffffff">

@include('index.navbar')

<div id="app" class="container">

    @yield('content')

</div>

<script src="{{ asset('js/app.js') }}" type="text/javascript"></script>

</body>
</html>