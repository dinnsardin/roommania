<x-app-layout>

<div class="space-y-2">

    {{-- TOP BAR --}}
    <div class="grid grid-cols-12 gap-3">

        {{-- WELCOME --}}
        <div class="col-span-8
                    bg-gradient-to-br
                    from-[#4b2615]
                    to-[#2f170d]
                    border-[4px]
                    border-[#c89b5d]
                    rounded-[18px]
                    shadow-[0_8px_25px_rgba(0,0,0,0.35)]
                    p-3">

            <div class="flex
                        items-center
                        justify-between">

                <div class="flex items-center gap-3">

                    {{-- AVATAR --}}
                    <div class="w-14
                                h-14
                                rounded-[16px]
                                bg-gradient-to-b
                                from-[#7c3aed]
                                to-[#8b5cf6]
                                border-[3px]
                                border-[#d6b16d]
                                shadow-lg
                                flex
                                items-center
                                justify-center">

                        <span class="text-white
                                     text-2xl
                                     font-black">

                            {{ strtoupper(substr(auth()->user()->name,0,1)) }}

                        </span>

                    </div>

                    {{-- TEXT --}}
                    <div>

                        <p class="text-[#d8b67a]
                                  font-bold
                                  text-[11px]
                                  tracking-wide">

                            LECTURER DASHBOARD

                        </p>

                        <h1 class="text-white
                                   text-2xl
                                   font-black
                                   leading-tight
                                   mt-1">

                            Welcome,
                            {{ auth()->user()->name }}

                        </h1>

                        <p class="text-[#e8d7b8]
                                  mt-1
                                  text-xs
                                  font-semibold">

                            Manage bookings and schedules efficiently.

                        </p>

                    </div>

                </div>

                {{-- ICON --}}
                <div class="hidden lg:flex
                            w-20
                            h-20
                            rounded-[18px]
                            bg-gradient-to-br
                            from-[#8b5cf6]
                            to-[#6d28d9]
                            border-[4px]
                            border-[#d6b16d]
                            shadow-xl
                            items-center
                            justify-center">

                    <span class="text-4xl">
                        🏰
                    </span>

                </div>

            </div>

        </div>

        {{-- DATE --}}
        <div class="col-span-4
                    bg-gradient-to-br
                    from-[#5a2d19]
                    to-[#3f1f13]
                    border-[4px]
                    border-[#c89b5d]
                    rounded-[18px]
                    shadow-[0_8px_25px_rgba(0,0,0,0.35)]
                    p-3
                    flex
                    items-center
                    justify-center">

            <div class="text-center">

                <p class="text-[#d8b67a]
                          text-[11px]
                          font-bold
                          tracking-wide">

                    TODAY

                </p>

                <h2 class="text-white
                           text-2xl
                           font-black
                           mt-1">

                    {{ now()->format('d M Y') }}

                </h2>

                <p class="text-[#e8d7b8]
                          font-semibold
                          text-xs
                          mt-1">

                    {{ now()->format('l') }}

                </p>

            </div>

        </div>

    </div>

    {{-- STATS --}}
    <div class="grid grid-cols-3 gap-3">

        {{-- TOTAL --}}
        <div class="bg-gradient-to-r
                    from-[#7c3aed]
                    to-[#8b5cf6]
                    rounded-[18px]
                    border-[3px]
                    border-[#d6b16d]
                    shadow-xl
                    p-3
                    text-white">

            <div class="flex
                        items-start
                        justify-between">

                <div>

                    <p class="font-bold
                              text-xs
                              opacity-90">

                        Total Bookings

                    </p>

                    <h2 class="text-3xl
                               font-black
                               mt-1">

                        {{ $myBookings }}

                    </h2>

                </div>

                <div class="text-3xl opacity-80">
                    📋
                </div>

            </div>

        </div>

        {{-- PENDING --}}
        <div class="bg-gradient-to-r
                    from-[#ea580c]
                    to-[#fb923c]
                    rounded-[18px]
                    border-[3px]
                    border-[#d6b16d]
                    shadow-xl
                    p-3
                    text-white">

            <div class="flex
                        items-start
                        justify-between">

                <div>

                    <p class="font-bold
                              text-xs
                              opacity-90">

                        Pending

                    </p>

                    <h2 class="text-3xl
                               font-black
                               mt-1">

                        {{ $pendingBookings }}

                    </h2>

                </div>

                <div class="text-3xl opacity-80">
                    ⏳
                </div>

            </div>

        </div>

        {{-- APPROVED --}}
        <div class="bg-gradient-to-r
                    from-[#16a34a]
                    to-[#22c55e]
                    rounded-[18px]
                    border-[3px]
                    border-[#d6b16d]
                    shadow-xl
                    p-3
                    text-white">

            <div class="flex
                        items-start
                        justify-between">

                <div>

                    <p class="font-bold
                              text-xs
                              opacity-90">

                        Approved

                    </p>

                    <h2 class="text-3xl
                               font-black
                               mt-1">

                        {{ $approvedBookings }}

                    </h2>

                </div>

                <div class="text-3xl opacity-80">
                    ✅
                </div>

            </div>

        </div>

    </div>

    {{-- MAIN CONTENT --}}
    <div class="grid grid-cols-12 gap-3">

        {{-- QUICK ACCESS --}}
        <div class="col-span-7
                    bg-[#ecdab7]
                    border-[4px]
                    border-[#c89b5d]
                    rounded-[18px]
                    shadow-xl
                    overflow-hidden">

            {{-- HEADER --}}
            <div class="bg-gradient-to-r
                        from-[#6d28d9]
                        to-[#8b5cf6]
                        px-4
                        py-2.5">

                <h2 class="text-white
                           text-lg
                           font-black">

                    Quick Access

                </h2>

            </div>

            {{-- BODY --}}
            <div class="p-3">

                <div class="grid grid-cols-2 gap-3">

                    {{-- BOOK ROOM --}}
                    <a href="{{ route('availability') }}"
                       class="bg-gradient-to-r
                              from-[#7c3aed]
                              to-[#8b5cf6]
                              rounded-[16px]
                              border-[3px]
                              border-[#d6b16d]
                              shadow-lg
                              p-3
                              text-white
                              hover:scale-[1.02]
                              transition-all">

                        <div class="text-2xl">
                            🚪
                        </div>

                        <h2 class="text-lg
                                   font-black
                                   mt-2">

                            Book Room

                        </h2>

                        <p class="opacity-90
                                  text-xs
                                  mt-1">

                            Browse available facilities.

                        </p>

                    </a>

                    {{-- HISTORY --}}
                    <a href="{{ route('booking.history') }}"
                       class="bg-gradient-to-r
                              from-[#16a34a]
                              to-[#22c55e]
                              rounded-[16px]
                              border-[3px]
                              border-[#d6b16d]
                              shadow-lg
                              p-3
                              text-white
                              hover:scale-[1.02]
                              transition-all">

                        <div class="text-2xl">
                            📋
                        </div>

                        <h2 class="text-lg
                                   font-black
                                   mt-2">

                            History

                        </h2>

                        <p class="opacity-90
                                  text-xs
                                  mt-1">

                            View booking records.

                        </p>

                    </a>

                    {{-- SCHEDULE --}}
                    <a href="{{ route('room.schedule') }}"
                       class="bg-gradient-to-r
                              from-[#2563eb]
                              to-[#3b82f6]
                              rounded-[16px]
                              border-[3px]
                              border-[#d6b16d]
                              shadow-lg
                              p-3
                              text-white
                              hover:scale-[1.02]
                              transition-all">

                        <div class="text-2xl">
                            📅
                        </div>

                        <h2 class="text-lg
                                   font-black
                                   mt-2">

                            Schedule

                        </h2>

                        <p class="opacity-90
                                  text-xs
                                  mt-1">

                            Monitor availability.

                        </p>

                    </a>

                    {{-- REPORT --}}
                    <a href="{{ route('facility.report.create') }}"
                       class="bg-gradient-to-r
                              from-[#ea580c]
                              to-[#fb923c]
                              rounded-[16px]
                              border-[3px]
                              border-[#d6b16d]
                              shadow-lg
                              p-3
                              text-white
                              hover:scale-[1.02]
                              transition-all">

                        <div class="text-2xl">
                            🛠️
                        </div>

                        <h2 class="text-lg
                                   font-black
                                   mt-2">

                            Report Issue

                        </h2>

                        <p class="opacity-90
                                  text-xs
                                  mt-1">

                            Submit maintenance reports.

                        </p>

                    </a>

                </div>

            </div>

        </div>

        {{-- RECENT BOOKINGS --}}
        <div class="col-span-5
                    bg-[#ecdab7]
                    border-[4px]
                    border-[#c89b5d]
                    rounded-[18px]
                    shadow-xl
                    overflow-hidden">

            {{-- HEADER --}}
            <div class="bg-gradient-to-r
                        from-[#6d28d9]
                        to-[#8b5cf6]
                        px-4
                        py-2.5">

                <div class="flex
                            justify-between
                            items-center">

                    <h2 class="text-white
                               text-lg
                               font-black">

                        Recent Bookings

                    </h2>

                    <a href="{{ route('booking.history') }}"
                       class="text-white
                              text-xs
                              font-bold">

                        View All

                    </a>

                </div>

            </div>

            {{-- LIST --}}
            <div class="p-3 space-y-2">

                @foreach(\App\Models\Booking::where('user_id', auth()->id())->latest()->take(5)->get() as $booking)

                    <div class="bg-[#fff8eb]
                                border-[3px]
                                border-[#d6b16d]
                                rounded-[16px]
                                p-2.5
                                shadow-lg">

                        <div class="flex
                                    justify-between
                                    items-start">

                            <div>

                                <h2 class="text-[#4b2e2e]
                                           text-base
                                           font-black">

                                    {{ $booking->room->room_name }}

                                </h2>

                                <p class="text-[#7a6a58]
                                          text-xs
                                          mt-1">

                                    {{ $booking->purpose }}

                                </p>

                                <p class="text-[#7a6a58]
                                          text-[11px]
                                          mt-1">

                                    {{ $booking->booking_date }}

                                </p>

                            </div>

                            {{-- STATUS --}}
                            <div>

                                @if($booking->status == 'Approved')

                                    <span class="bg-green-500
                                                 text-white
                                                 px-2.5
                                                 py-1.5
                                                 rounded-full
                                                 text-[10px]
                                                 font-black">

                                        Approved

                                    </span>

                                @elseif($booking->status == 'Pending')

                                    <span class="bg-orange-500
                                                 text-white
                                                 px-2.5
                                                 py-1.5
                                                 rounded-full
                                                 text-[10px]
                                                 font-black">

                                        Pending

                                    </span>

                                @else

                                    <span class="bg-red-500
                                                 text-white
                                                 px-2.5
                                                 py-1.5
                                                 rounded-full
                                                 text-[10px]
                                                 font-black">

                                        Rejected

                                    </span>

                                @endif

                            </div>

                        </div>

                    </div>

                @endforeach

            </div>

        </div>

    </div>

</div>

</x-app-layout>