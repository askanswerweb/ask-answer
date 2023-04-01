<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <x-partials.head />

    <title>{{ !empty($title) ? $title : config('app.name') }}</title>
    <style>
        body {
            background-image: url('{{ asset('assets/media/auth/bg10.jpeg') }}');
        }
    </style>
</head>

<body dir="{{ direction() }}" class="app-blank app-blank">

{{ $slot }}

<x-partials.scripts />
</body>
</html>
