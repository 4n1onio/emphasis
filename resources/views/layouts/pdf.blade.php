<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="stylesheet" href="{{ asset('css/bs.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/fa.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/print.css') }}" />
</head>

<body>
    {{ $slot }}
</body>

</html>
