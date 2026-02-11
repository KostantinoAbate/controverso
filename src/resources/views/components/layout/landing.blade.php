<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="controverso">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}{{ $title ? ' | ' . $title : '' }}</title>

    {{-- Fonts --}}
    <x-head.font/>

    {{-- JS dependencies --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    {{-- Styles / Scripts --}}
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/services.js'])
    @else
        {{-- Fallback --}}
    @endif
</head>
<body class="relative pattern-{{ rand(1,10) }}">
    <x-block.landing.navbar/>
    <div class="container bg-base-100 rounded-b-xl max-[1400px]:rounded-none shadow-lg min-h-screen pt-14">
        <div class="format h-auto p-4 bg-base-100">
            {{ $slot }}
        </div>
    </div>
    <x-block.footer/>
    <x-block.landing.menu/>
    <x-utility.logout/>
    @javascript('routeLayout', 'landing')
    @javascript('routeName', request()->route()->getName())
    @vite('resources/js/services.js')
</body>
</html>
