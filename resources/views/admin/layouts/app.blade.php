<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1"
    />
    <meta
        name="csrf-token"
        content="{{ csrf_token() }}"
    />

    <title>{{ config('app.name', 'GIRC') }}</title>

    <!-- Fonts -->
    <link
        rel="preconnect"
        href="https://fonts.bunny.net"
    />
    <link
        href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap"
        rel="stylesheet"
    />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased">
    <div class="bg-gray-100 min-h-screen flex">
{{--        @include('admin.layouts.navigation')--}}
        <x-admin.sidebar />
        <main class="bg-blue-50 w-full">
            <div class="bg-white h-auto p-3">
                <button class="btn btn-ghost btn-square btn-sm">
                    <x-heroicon-c-bars-3 class="size-5"/>
                </button>
            </div>
            {{ $slot }}
        </main>
    </div>
</body>
</html>
