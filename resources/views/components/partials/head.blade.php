<base href="/">
<meta charset="utf-8" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<meta name="csrf-token" id="csrf-token" content="{{ csrf_token() }}">
<link rel="icon" href="{{ asset('favicon.ico') }}">

<!-- Font -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
@vite(['resources/css/app.css'])

@if (is_arabic())
    <link href="{{ asset('assets/plugins/global/plugins.bundle.rtl.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/style.bundle.rtl.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ asset('assets/css/app.rtl.css') }}">

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Almarai:wght@300;400;700;800&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: Almarai, Helvetica, "sans-serif" !important;
        }

        .tooltip-inner {
            font-family: Almarai, Helvetica, "sans-serif" !important;
        }
    </style>
@else
    <link href="{{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800;900&display=swap"
          rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif !important;
        }

        .tooltip-inner {
            font-family: 'Poppins', sans-serif !important;
        }
    </style>
@endif

@livewireStyles
<link href="{{ asset('assets/css/main.css') }}" rel="stylesheet" type="text/css" />
@stack('styles')
