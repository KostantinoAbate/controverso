<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="light">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

    {{-- Fonts --}}
    <x-head.font/>

    {{-- Styles / Scripts --}}
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        {{-- Fallback --}}
    @endif
</head>
<body class="w-full">
    <x-block.header/>
    <main>
        <section class="container">
            {{ $slot }}
        </section>
    </main>
    <x-block.footer/>
    <x-element.theme-controller/>
</body>
</html>
