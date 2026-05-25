<x-app-layout>

<div class="space-y-3">

    {{-- TOP BAR --}}
    <div class="grid grid-cols-12 gap-3">

        {{-- WELCOME --}}
        <div class="col-span-8
                    bg-[#f4e3bf]
                    border-[4px]
                    border-[#c89b5d]
                    rounded-[20px]
                    shadow-xl
                    p-4">

            <div class="flex
                        items-center
                        justify-between">

                <div class="flex items-center gap-4">

                    {{-- AVATAR --}}
                    <div class="w-16
                                h-16
                                rounded-[18px]
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
                                     text-3xl
                                     font-black">

                            {{ strtoupper(substr(auth()->user()->name,0,1)) }}

                        </span>

                    </div>

                    {{-- TEXT --}}
                    <div>

                        <p class="text-[#7a6a58]
                                  font-bold
                                  text-xs">

                            Administrator Panel

                        </p>

                        <h1 class="text-[#4b2e2e]
                                   text-3xl
                                   font-black
                                   leading-tight">

                            {{ auth()->user()->name }}

                        </h1>

                        <p class="text-[#7a6a58]
                                  mt-1
                                  text-sm
                                  font-semibold">

                            Manage facilities and booking activities.

                        </p>

                    </div>

                </div>

            </div>

        </div>

        {{-- DATE --}}
        <div class="col-span-4
                    bg-[#f4e3bf]
                    border-[4px]
                    border-[#c89b5d]
                    rounded-[20px]
                    shadow-xl
                    p-4
                    flex
                    items-center
                    justify-center">

            <div class="text-center">

                <h2 class="text-[#4b2e2e]
                           text-2xl
                           font-black">

                    {{ now()->format('d M Y') }}

                </h2>

                <p class="text-[#7a6a58]
                          font-semibold
                          text-sm
                          mt-1">

                    {{ now()->format('l') }}

                </p>

            </div>

        </div>

    </div>

    {{-- STATS --}}
    <div class="grid grid-cols-4 gap-3">

        {{-- BOOKINGS --}}
        <div class="bg-gradient-to-r
                    from-[#7c3aed]
                    to-[#8b5cf6]
                    rounded-[20px]
                    border-[3px]
                    border-[#d6b16d]
                    shadow-xl
                    p-4
                    text-white">

            <div class="flex
                        items-start
                        justify-between">

                <div>

                    <p class="font-bold
                              text-sm
                              opacity-90">

                        Total Bookings

                    </p>

                    <h2 class="text-4xl
                               font-black
                               mt-1">

                        {{ $totalBookings }}

                    </h2>

                </div>

                <div class="text-4xl opacity-80">
                    📋
                </div>

            </div>

        </div>

        {{-- ROOMS --}}
        <div class="bg-gradient-to-r
                    from-[#2563eb]
                    to-[#3b82f6]
                    rounded-[20px]
                    border-[3px]
                    border-[#d6b16d]
                    shadow-xl
                    p-4
                    text-white">

            <div class="flex
                        items-start
                        justify-between">

                <div>

                    <p class="font-bold
                              text-sm
                              opacity-90">

                        Total Rooms

                    </p>

                    <h2 class="text-4xl
                               font-black
                               mt-1">

                        {{ $totalRooms }}

                    </h2>

                </div>

                <div class="text-4xl opacity-80">
                    🚪
                </div>

            </div>

        </div>

        {{-- AVAILABLE --}}
        <div class="bg-gradient-to-r
                    from-[#16a34a]
                    to-[#22c55e]
                    rounded-[20px]
                    border-[3px]
                    border-[#d6b16d]
                    shadow-xl
                    p-4
                    text-white">

            <div class="flex
                        items-start
                        justify-between">

                <div>

                    <p class="font-bold
                              text-sm
                              opacity-90">

                        Available

                    </p>

                    <h2 class="text-4xl
                               font-black
                               mt-1">

                        {{ \App\Models\Room::where('status','Available')->count() }}

                    </h2>

                </div>

                <div class="text-4xl opacity-80">
                    ✅
                </div>

            </div>

        </div>

        {{-- PENDING --}}
        <div class="bg-gradient-to-r
                    from-[#ea580c]
                    to-[#fb923c]
                    rounded-[20px]
                    border-[3px]
                    border-[#d6b16d]
                    shadow-xl
                    p-4
                    text-white">

            <div class="flex
                        items-start
                        justify-between">

                <div>

                    <p class="font-bold
                              text-sm
                              opacity-90">

                        Pending

                    </p>

                    <h2 class="text-4xl
                               font-black
                               mt-1">

                        {{ $pendingBookings }}

                    </h2>

                </div>

                <div class="text-4xl opacity-80">
                    ⏳
                </div>

            </div>

        </div>

    </div>

    {{-- MAIN CONTENT --}}
    <div class="grid grid-cols-12 gap-3">

        {{-- ROOM AVAILABILITY --}}
        <div class="col-span-7
                    bg-[#f4e3bf]
                    border-[4px]
                    border-[#c89b5d]
                    rounded-[20px]
                    shadow-xl
                    overflow-hidden">

            {{-- HEADER --}}
            <div class="bg-gradient-to-r
                        from-[#6d28d9]
                        to-[#8b5cf6]
                        px-4
                        py-3">

                <div class="flex
                            justify-between
                            items-center">

                    <h2 class="text-white
                               text-xl
                               font-black">

                        Room Availability

                    </h2>

                    <a href="{{ route('availability') }}"
                       class="text-white
                              text-sm
                              font-bold">

                        View All

                    </a>

                </div>

            </div>

            {{-- BODY --}}
            <div class="p-4">

                <div class="grid grid-cols-3 gap-3">

                    @foreach(\App\Models\Room::take(6)->get() as $room)

                        <div class="bg-[#fff8eb]
                                    border-[3px]
                                    border-[#d6b16d]
                                    rounded-[18px]
                                    p-3
                                    shadow-lg">

                            {{-- TOP --}}
                            <div class="flex
                                        justify-between
                                        items-start">

                                <div>

                                    <h2 class="text-[#4b2e2e]
                                               text-lg
                                               font-black">

                                        {{ $room->room_name }}

                                    </h2>

                                    <p class="text-[#7a6a58]
                                              text-xs
                                              mt-1">

                                        {{ $room->room_type }}

                                    </p>

                                </div>

                                <div class="bg-gradient-to-r

                                    @if($room->room_type == 'Hall')

                                        from-[#2563eb] to-[#3b82f6]

                                    @elseif($room->room_type == 'Lab')

                                        from-[#16a34a] to-[#22c55e]

                                    @else

                                        from-[#ea580c] to-[#fb923c]

                                    @endif

                                    text-white
                                    px-2
                                    py-1
                                    rounded-full
                                    text-xs
                                    font-black">

                                    {{ $room->room_id }}

                                </div>

                            </div>

                            {{-- STATUS --}}
                            <div class="mt-4">

                                @if($room->status == 'Available')

                                    <div class="bg-green-500
                                                text-white
                                                text-center
                                                py-2
                                                rounded-full
                                                text-xs
                                                font-black
                                                shadow-md">

                                        Available

                                    </div>

                                @else

                                    <div class="bg-red-500
                                                text-white
                                                text-center
                                                py-2
                                                rounded-full
                                                text-xs
                                                font-black
                                                shadow-md">

                                        Occupied

                                    </div>

                                @endif

                            </div>

                        </div>

                    @endforeach

                </div>

            </div>

        </div>

        {{-- TODAY SCHEDULE --}}
        <div class="col-span-5
                    bg-[#f4e3bf]
                    border-[4px]
                    border-[#c89b5d]
                    rounded-[20px]
                    shadow-xl
                    overflow-hidden">

            {{-- HEADER --}}
            <div class="bg-gradient-to-r
                        from-[#6d28d9]
                        to-[#8b5cf6]
                        px-4
                        py-3">

                <div class="flex
                            justify-between
                            items-center">

                    <h2 class="text-white
                               text-xl
                               font-black">

                        Today's Schedule

                    </h2>

                    <a href="{{ route('room.schedule') }}"
                       class="text-white
                              text-sm
                              font-bold">

                        Calendar

                    </a>

                </div>

            </div>

            {{-- BODY --}}
            <div class="p-3 space-y-3">

                @foreach(\App\Models\Booking::latest()->take(5)->get() as $booking)

                    <div class="bg-[#fff8eb]
                                border-[3px]
                                border-[#d6b16d]
                                rounded-[18px]
                                p-3
                                shadow-lg">

                        <div class="flex
                                    justify-between
                                    items-start">

                            <div>

                                <h2 class="text-[#4b2e2e]
                                           text-lg
                                           font-black">

                                    {{ $booking->purpose }}

                                </h2>

                                <p class="text-[#7a6a58]
                                          text-sm
                                          mt-1">

                                    {{ $booking->room->room_name }}

                                </p>

                                <p class="text-[#7a6a58]
                                          text-xs
                                          mt-1">

                                    {{ $booking->booking_time }}

                                </p>

                            </div>

                            {{-- STATUS --}}
                            <div>

                                @if($booking->status == 'Approved')

                                    <span class="bg-green-500
                                                 text-white
                                                 px-3
                                                 py-2
                                                 rounded-full
                                                 text-xs
                                                 font-black">

                                        Approved

                                    </span>

                                @elseif($booking->status == 'Pending')

                                    <span class="bg-orange-500
                                                 text-white
                                                 px-3
                                                 py-2
                                                 rounded-full
                                                 text-xs
                                                 font-black">

                                        Pending

                                    </span>

                                @else

                                    <span class="bg-red-500
                                                 text-white
                                                 px-3
                                                 py-2
                                                 rounded-full
                                                 text-xs
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