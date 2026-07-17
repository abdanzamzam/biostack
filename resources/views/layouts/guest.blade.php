<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'BioStack') }}</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=inter:300,400,500,600,700,800&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @livewireStyles
    </head>
    <body class="font-sans antialiased bg-[#0b0f19] text-white">
        <div class="min-h-screen flex flex-col items-center justify-center px-4">
            <div class="w-full sm:max-w-md">
                <div class="text-center mb-8">
                    <a href="/" wire:navigate class="inline-flex items-center gap-2">
                        <span class="text-3xl font-extrabold bg-gradient-to-r from-teal-400 to-cyan-400 bg-clip-text text-transparent">BioStack</span>
                    </a>
                    <p class="text-white/50 text-sm mt-2">Your link in bio, supercharged</p>
                </div>

                <div class="bg-white/5 border border-white/10 rounded-2xl p-6 md:p-8 backdrop-blur-xl">
                    {{ $slot }}
                </div>

                <p class="text-center text-white/30 text-xs mt-6">
                    &copy; {{ date('Y') }} BioStack. All rights reserved.
                </p>
            </div>
        </div>

        @livewireScripts
    </body>
</html>
