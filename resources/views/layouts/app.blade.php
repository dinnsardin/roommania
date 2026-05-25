<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1">

    <title>
        RoomMania
    </title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="bg-[#1b0f0a]
             font-sans
             antialiased
             overflow-hidden">

    {{-- MAIN WRAPPER --}}
    <div class="h-screen
                p-3">

        {{-- GAME PANEL --}}
        <div class="h-full
                    flex
                    overflow-hidden
                    rounded-[26px]
                    border-[4px]
                    border-[#5c311c]
                    bg-[#2a120d]
                    shadow-[0_20px_60px_rgba(0,0,0,0.6)]">

            {{-- SIDEBAR --}}
            @include('layouts.navigation')

            {{-- MAIN CONTENT --}}
            <main class="flex-1
                         overflow-y-auto
                         bg-gradient-to-b
                         from-[#e9d8b4]
                         to-[#d9c39a]
                         p-3">

                {{-- CONTENT CONTAINER --}}
                <div class="max-w-[1500px]
                            mx-auto
                            space-y-3">

                    {{ $slot }}

                </div>

            </main>

        </div>

    </div>

</body>

</html>