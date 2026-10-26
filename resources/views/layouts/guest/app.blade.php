<!DOCTYPE html>
<html lang="en-US" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', 'Dimsum Cece')</title>

    <link rel="apple-touch-icon" sizes="180x180"
        href="{{ asset('assets/img/favicons/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32"
        href="{{ asset('assets/img/favicons/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16"
        href="{{ asset('assets/img/favicons/favicon-16x16.png') }}">
    <link rel="shortcut icon" type="image/x-icon"
        href="{{ asset('assets/img/favicons/favicon.ico') }}">

    <link href="{{ asset('assets/css/theme.css') }}" rel="stylesheet">
</head>

<body>
    @include('layouts.guest.header')

    @yield('content')

    @include('layouts.guest.footer')
</body>

</html>
