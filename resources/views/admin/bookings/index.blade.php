<x-app-layout>

<div class="space-y-3">

    {{-- TOP BAR --}}
    <div class="grid grid-cols-12 gap-3">

        {{-- TITLE --}}
        <div class="col-span-8
                    bg-[#f4e3bf]
                    border-[4px]
                    border-[#c89b5d]
                    rounded-[20px]
                    shadow-xl
                    p-4">

            <div class="flex items-center gap-4">

                {{-- ICON --}}
                <div class="w-16
                            h-16
                            rounded-[18px]
                            bg-gradient-to-b
                            from-[#16a34a]
                            to-[#22c55e]
                            border-[3px]
                            border-[#d6b16d]
                            shadow-lg
                            flex
                            items-center
                            justify-center">

                    <span class="text-white text-3xl">
                        ✅
                    </span>

                </div>

                {{-- TEXT --}}
                <div>

                    <p class="text-[#7a6a58]
                              text-xs
                              font-bold">

                        Administration Panel

                    </p>

                    <h1 class="text-[#4b2e2e]
                               text-3xl
                               font-black">

                        Booking Requests

                    </h1>

                    <p class="text-[#7a6a58]
                              text-sm
                              mt-1
                              font-semibold">

                        Review and manage lecturer room reservations.

                    </p>

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
                          text-sm
                          font-semibold
                          mt-1">

                    {{ now()->format('l') }}

                </p>

            </div>

        </div>

    </div>

    {{-- BOOKING PANEL --}}
    <div class="bg-[#f4e3bf]
                border-[4px]
                border-[#c89b5d]
                rounded-[20px]
                shadow-xl
                overflow-hidden">

        {{-- HEADER --}}
        <div class="bg-gradient-to-r
                    from-[#16a34a]
                    to-[#22c55e]
                    px-4
                    py-3">

            <div class="flex
                        justify-between
                        items-center">

                <h2 class="text-white
                           text-xl
                           font-black">

                    Pending Reservations

                </h2>

                <span class="bg-white/20
                             text-white
                             px-4
                             py-2
                             rounded-full
                             text-sm
                             font-black">

                    {{ $bookings->count() }} Requests

                </span>

            </div>

        </div>

        {{-- BODY --}}
        <div class="p-4">

            @if($bookings->count() > 0)

                <div class="space-y-3">

                    @foreach($bookings as $booking)

                        <div class="bg-[#fff8eb]
                                    border-[3px]
                                    border-[#d6b16d]
                                    rounded-[18px]
                                    shadow-lg
                                    p-4">

                            <div class="grid grid-cols-12 gap-4 items-center">

                                {{-- ROOM --}}
                                <div class="col-span-3">

                                    <div class="flex items-center gap-3">

                                        {{-- ICON --}}
                                        <div class="w-14
                                                    h-14
                                                    rounded-[16px]
                                                    bg-gradient-to-b

                                            @if($booking->room->room_type == 'Hall')

                                                from-[#2563eb]
                                                to-[#3b82f6]

                                            @elseif($booking->room->room_type == 'Lab')

                                                from-[#16a34a]
                                                to-[#22c55e]

                                            @else

                                                from-[#ea580c]
                                                to-[#fb923c]

                                            @endif

                                                    border-[3px]
                                                    border-[#d6b16d]
                                                    shadow-md
                                                    flex
                                                    items-center
                                                    justify-center">

                                            <span class="text-white text-2xl">
                                                🚪
                                            </span>

                                        </div>

                                        {{-- ROOM INFO --}}
                                        <div>

                                            <h2 class="text-[#4b2e2e]
                                                       text-lg
                                                       font-black">

                                                {{ $booking->room->room_name }}

                                            </h2>

                                            <p class="text-[#7a6a58]
                                                      text-xs
                                                      font-semibold
                                                      mt-1">

                                                {{ $booking->room->room_type }}

                                            </p>

                                        </div>

                                    </div>

                                </div>

                                {{-- LECTURER --}}
                                <div class="col-span-2">

                                    <p class="text-[#7a6a58]
                                              text-xs
                                              font-bold">

                                        LECTURER

                                    </p>

                                    <h2 class="text-[#4b2e2e]
                                               font-black
                                               mt-1">

                                        {{ $booking->user->name }}

                                    </h2>

                                </div>

                                {{-- PURPOSE --}}
                                <div class="col-span-2">

                                    <p class="text-[#7a6a58]
                                              text-xs
                                              font-bold">

                                        PURPOSE

                                    </p>

                                    <h2 class="text-[#4b2e2e]
                                               font-black
                                               mt-1
                                               text-sm">

                                        {{ $booking->purpose }}

                                    </h2>

                                </div>

                                {{-- DATE --}}
                                <div class="col-span-2">

                                    <p class="text-[#7a6a58]
                                              text-xs
                                              font-bold">

                                        DATE

                                    </p>

                                    <h2 class="text-[#4b2e2e]
                                               font-black
                                               mt-1
                                               text-sm">

                                        {{ $booking->booking_date }}

                                    </h2>

                                </div>

                                {{-- TIME --}}
                                <div class="col-span-1">

                                    <p class="text-[#7a6a58]
                                              text-xs
                                              font-bold">

                                        TIME

                                    </p>

                                    <h2 class="text-[#4b2e2e]
                                               font-black
                                               mt-1
                                               text-xs">

                                        {{ $booking->booking_time }}

                                    </h2>

                                </div>

                                {{-- ACTIONS --}}
                                <div class="col-span-2">

                                    <div class="flex gap-2">

                                        {{-- APPROVE --}}
                                        <form method="POST"
                                              action="{{ route('booking.approve', $booking->id) }}"
                                              class="flex-1">

                                            @csrf
                                            @method('PATCH')

                                            <button type="submit"

                                                    class="w-full
                                                           bg-green-500
                                                           hover:bg-green-600
                                                           transition-all
                                                           text-white
                                                           py-2
                                                           rounded-[14px]
                                                           text-xs
                                                           font-black
                                                           shadow-md">

                                                Approve

                                            </button>

                                        </form>

                                        {{-- REJECT --}}
                                        <form method="POST"
                                              action="{{ route('booking.reject', $booking->id) }}"
                                              class="flex-1">

                                            @csrf
                                            @method('PATCH')

                                            <button type="submit"

                                                    class="w-full
                                                           bg-red-500
                                                           hover:bg-red-600
                                                           transition-all
                                                           text-white
                                                           py-2
                                                           rounded-[14px]
                                                           text-xs
                                                           font-black
                                                           shadow-md">

                                                Reject

                                            </button>

                                        </form>

                                    </div>

                                </div>

                            </div>

                        </div>

                    @endforeach

                </div>

            @else

                {{-- EMPTY STATE --}}
                <div class="py-20 text-center">

                    <div class="text-7xl">
                        ✅
                    </div>

                    <h2 class="text-[#4b2e2e]
                               text-3xl
                               font-black
                               mt-5">

                        No Booking Requests

                    </h2>

                    <p class="text-[#7a6a58]
                              mt-2
                              font-semibold">

                        Pending reservation requests will appear here.

                    </p>

                </div>

            @endif

        </div>

    </div>

</div>

</x-app-layout>