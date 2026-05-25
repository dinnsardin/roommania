<x-app-layout>

<div class="space-y-3">

    {{-- TOP SECTION --}}
    <div class="grid grid-cols-12 gap-3">

        {{-- WELCOME PANEL --}}
        <div class="col-span-8
                    bg-gradient-to-br
                    from-[#432818]
                    to-[#2f1b12]
                    border-[4px]
                    border-[#c89b5d]
                    rounded-[24px]
                    p-5
                    shadow-[0_10px_30px_rgba(0,0,0,0.4)]">

            <div class="flex
                        items-center
                        justify-between">

                <div>

                    <p class="text-[#d9b97e]
                              text-sm
                              font-bold
                              tracking-wide">

                        ROOMMANIA SYSTEM

                    </p>

                    <h1 class="text-white
                               text-4xl
                               font-black
                               mt-2">

                        Welcome Back,
                        {{ auth()->user()->name }}

                    </h1>

                    <p class="text-[#e7d4b1]
                              mt-3
                              text-sm
                              max-w-[600px]">

                        Manage room bookings, schedules and facility reports
                        through your centralized fantasy dashboard system.

                    </p>

                </div>

                {{-- AVATAR --}}
                <div class="w-24
                            h-24
                            rounded-[22px]
                            bg-gradient-to-br
                            from-[#7c3aed]
                            to-[#5b21b6]
                            border-[4px]
                            border-[#d9b97e]
                            flex
                            items-center
                            justify-center
                            shadow-xl">

                    <span class="text-white
                                 text-5xl
                                 font-black">

                        {{ strtoupper(substr(auth()->user()->name,0,1)) }}

                    </span>

                </div>

            </div>

        </div>

        {{-- DATE PANEL --}}
        <div class="col-span-4
                    bg-gradient-to-br
                    from-[#5a2d19]
                    to-[#3f1f13]
                    border-[4px]
                    border-[#c89b5d]
                    rounded-[24px]
                    p-5
                    shadow-[0_10px_30px_rgba(0,0,0,0.4)]
                    flex
                    flex-col
                    justify-center">

            <p class="text-[#d9b97e]
                      text-sm
                      font-bold
                      tracking-wide">

                TODAY

            </p>

            <h2 class="text-white
                       text-4xl
                       font-black
                       mt-2">

                {{ now()->format('d M') }}

            </h2>

            <p class="text-[#e7d4b1]
                      text-lg
                      font-semibold
                      mt-1">

                {{ now()->format('Y • l') }}

            </p>

        </div>

    </div>

    {{-- STATISTICS --}}
    <div class="grid grid-cols-4 gap-3">

        {{-- CARD --}}
        <div class="bg-gradient-to-br
                    from-[#7c3aed]
                    to-[#5b21b6]
                    rounded-[22px]
                    p-4
                    border-[3px]
                    border-[#d9b97e]
                    shadow-xl">

            <div class="flex
                        justify-between
                        items-start">

                <div>

                    <p class="text-white/80
                              text-sm
                              font-bold">

                        Total Rooms

                    </p>

                    <h2 class="text-white
                               text-4xl
                               font-black
                               mt-2">

                        24

                    </h2>

                </div>

                <div class="text-4xl">
                    🏢
                </div>

            </div>

        </div>

        {{-- CARD --}}
        <div class="bg-gradient-to-br
                    from-[#2563eb]
                    to-[#1d4ed8]
                    rounded-[22px]
                    p-4
                    border-[3px]
                    border-[#d9b97e]
                    shadow-xl">

            <div class="flex
                        justify-between
                        items-start">

                <div>

                    <p class="text-white/80
                              text-sm
                              font-bold">

                        Bookings

                    </p>

                    <h2 class="text-white
                               text-4xl
                               font-black
                               mt-2">

                        13

                    </h2>

                </div>

                <div class="text-4xl">
                    📅
                </div>

            </div>

        </div>

        {{-- CARD --}}
        <div class="bg-gradient-to-br
                    from-[#16a34a]
                    to-[#15803d]
                    rounded-[22px]
                    p-4
                    border-[3px]
                    border-[#d9b97e]
                    shadow-xl">

            <div class="flex
                        justify-between
                        items-start">

                <div>

                    <p class="text-white/80
                              text-sm
                              font-bold">

                        Approved

                    </p>

                    <h2 class="text-white
                               text-4xl
                               font-black
                               mt-2">

                        9

                    </h2>

                </div>

                <div class="text-4xl">
                    ✅
                </div>

            </div>

        </div>

        {{-- CARD --}}
        <div class="bg-gradient-to-br
                    from-[#ea580c]
                    to-[#c2410c]
                    rounded-[22px]
                    p-4
                    border-[3px]
                    border-[#d9b97e]
                    shadow-xl">

            <div class="flex
                        justify-between
                        items-start">

                <div>

                    <p class="text-white/80
                              text-sm
                              font-bold">

                        Reports

                    </p>

                    <h2 class="text-white
                               text-4xl
                               font-black
                               mt-2">

                        3

                    </h2>

                </div>

                <div class="text-4xl">
                    🛠️
                </div>

            </div>

        </div>

    </div>

    {{-- LOWER SECTION --}}
    <div class="grid grid-cols-12 gap-3">

        {{-- QUICK ACTIONS --}}
        <div class="col-span-4
                    bg-[#f2dfbb]
                    border-[4px]
                    border-[#c89b5d]
                    rounded-[24px]
                    overflow-hidden
                    shadow-xl">

            {{-- HEADER --}}
            <div class="bg-gradient-to-r
                        from-[#7c3aed]
                        to-[#5b21b6]
                        px-4
                        py-3">

                <h2 class="text-white
                           text-xl
                           font-black">

                    Quick Actions

                </h2>

            </div>

            {{-- BODY --}}
            <div class="p-4 space-y-3">

                <a href="#"
                   class="flex
                          items-center
                          gap-4
                          bg-white
                          border-[3px]
                          border-[#d9b97e]
                          rounded-[18px]
                          p-4
                          hover:scale-[1.02]
                          transition-all">

                    <div class="w-14
                                h-14
                                rounded-[16px]
                                bg-gradient-to-br
                                from-[#2563eb]
                                to-[#1d4ed8]
                                flex
                                items-center
                                justify-center
                                text-2xl">

                        📅

                    </div>

                    <div>

                        <h2 class="text-[#2f1b12]
                                   font-black
                                   text-lg">

                            Book Room

                        </h2>

                        <p class="text-[#7b5e45]
                                  text-sm">

                            Reserve facilities instantly

                        </p>

                    </div>

                </a>

                <a href="#"
                   class="flex
                          items-center
                          gap-4
                          bg-white
                          border-[3px]
                          border-[#d9b97e]
                          rounded-[18px]
                          p-4
                          hover:scale-[1.02]
                          transition-all">

                    <div class="w-14
                                h-14
                                rounded-[16px]
                                bg-gradient-to-br
                                from-[#16a34a]
                                to-[#15803d]
                                flex
                                items-center
                                justify-center
                                text-2xl">

                        📋

                    </div>

                    <div>

                        <h2 class="text-[#2f1b12]
                                   font-black
                                   text-lg">

                            Booking History

                        </h2>

                        <p class="text-[#7b5e45]
                                  text-sm">

                            Review previous reservations

                        </p>

                    </div>

                </a>

            </div>

        </div>

        {{-- RECENT BOOKINGS --}}
        <div class="col-span-8
                    bg-[#f2dfbb]
                    border-[4px]
                    border-[#c89b5d]
                    rounded-[24px]
                    overflow-hidden
                    shadow-xl">

            {{-- HEADER --}}
            <div class="bg-gradient-to-r
                        from-[#2563eb]
                        to-[#1d4ed8]
                        px-4
                        py-3">

                <h2 class="text-white
                           text-xl
                           font-black">

                    Recent Bookings

                </h2>

            </div>

            {{-- TABLE --}}
            <div class="p-4">

                <div class="space-y-3">

                    @for($i = 0; $i < 4; $i++)

                        <div class="bg-white
                                    border-[3px]
                                    border-[#d9b97e]
                                    rounded-[18px]
                                    p-4
                                    flex
                                    justify-between
                                    items-center">

                            <div>

                                <h2 class="text-[#2f1b12]
                                           font-black
                                           text-lg">

                                    Meeting Room A

                                </h2>

                                <p class="text-[#7b5e45]
                                          text-sm">

                                    Discussion Session

                                </p>

                            </div>

                            <div class="text-right">

                                <p class="text-[#2f1b12]
                                          font-black">

                                    10:00 AM

                                </p>

                                <span class="inline-block
                                             mt-1
                                             bg-green-500
                                             text-white
                                             px-3
                                             py-1
                                             rounded-full
                                             text-xs
                                             font-bold">

                                    Approved

                                </span>

                            </div>

                        </div>

                    @endfor

                </div>

            </div>

        </div>

    </div>

</div>

</x-app-layout>