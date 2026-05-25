<x-app-layout>

<div class="space-y-2">

    {{-- TOP BAR --}}
    <div class="grid grid-cols-12 gap-3">

        {{-- TITLE --}}
        <div class="col-span-8
                    bg-gradient-to-br
                    from-[#4b2615]
                    to-[#2f170d]
                    border-[4px]
                    border-[#c89b5d]
                    rounded-[18px]
                    shadow-[0_8px_25px_rgba(0,0,0,0.35)]
                    p-3">

            <div class="flex items-center justify-between">

                <div class="flex items-center gap-3">

                    {{-- ICON --}}
                    <div class="w-14
                                h-14
                                rounded-[16px]
                                bg-gradient-to-b
                                from-[#16a34a]
                                to-[#22c55e]
                                border-[3px]
                                border-[#d6b16d]
                                shadow-lg
                                flex
                                items-center
                                justify-center">

                        <span class="text-white text-2xl">
                            📋
                        </span>

                    </div>

                    {{-- TEXT --}}
                    <div>

                        <p class="text-[#d8b67a]
                                  text-[11px]
                                  font-bold
                                  tracking-wide">

                            LECTURER ACTIVITY

                        </p>

                        <h1 class="text-white
                                   text-2xl
                                   font-black
                                   mt-1">

                            Booking History

                        </h1>

                        <p class="text-[#e8d7b8]
                                  text-xs
                                  mt-1
                                  font-semibold">

                            Review your previous room reservations.

                        </p>

                    </div>

                </div>

                {{-- SIDE ICON --}}
                <div class="hidden lg:flex
                            w-20
                            h-20
                            rounded-[18px]
                            bg-gradient-to-br
                            from-[#22c55e]
                            to-[#15803d]
                            border-[4px]
                            border-[#d6b16d]
                            shadow-xl
                            items-center
                            justify-center">

                    <span class="text-4xl">
                        📚
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
                          text-xs
                          mt-1
                          font-semibold">

                    {{ now()->format('l') }}

                </p>

            </div>

        </div>

    </div>

    {{-- HISTORY PANEL --}}
    <div class="bg-[#ecdab7]
                border-[4px]
                border-[#c89b5d]
                rounded-[18px]
                shadow-xl
                overflow-hidden">

        {{-- HEADER --}}
        <div class="bg-gradient-to-r
                    from-[#16a34a]
                    to-[#22c55e]
                    px-4
                    py-2.5">

            <div class="flex
                        justify-between
                        items-center">

                <h2 class="text-white
                           text-lg
                           font-black">

                    Reservation Records

                </h2>

                <span class="bg-white/20
                             text-white
                             px-3
                             py-1.5
                             rounded-full
                             text-xs
                             font-black">

                    {{ $bookings->count() }} Records

                </span>

            </div>

        </div>

        {{-- BODY --}}
        <div class="p-3">

            @if($bookings->count() > 0)

                <div class="space-y-2">

                    @foreach($bookings as $booking)

                        <div class="bg-[#fff8eb]
                                    border-[3px]
                                    border-[#d6b16d]
                                    rounded-[16px]
                                    shadow-lg
                                    p-3">

                            <div class="grid grid-cols-12 gap-3 items-center">

                                {{-- ROOM --}}
                                <div class="col-span-3">

                                    <div class="flex items-center gap-3">

                                        {{-- ICON --}}
                                        <div class="w-12
                                                    h-12
                                                    rounded-[14px]
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

                                            <span class="text-white text-xl">
                                                🚪
                                            </span>

                                        </div>

                                        {{-- ROOM INFO --}}
                                        <div>

                                            <h2 class="text-[#4b2e2e]
                                                       text-base
                                                       font-black">

                                                {{ $booking->room->room_name }}

                                            </h2>

                                            <p class="text-[#7a6a58]
                                                      text-[11px]
                                                      font-semibold
                                                      mt-1">

                                                {{ $booking->room->room_type }}

                                            </p>

                                        </div>

                                    </div>

                                </div>

                                {{-- PURPOSE --}}
                                <div class="col-span-3">

                                    <p class="text-[#7a6a58]
                                              text-[10px]
                                              font-bold
                                              tracking-wide">

                                        PURPOSE

                                    </p>

                                    <h2 class="text-[#4b2e2e]
                                               font-black
                                               text-sm
                                               mt-1">

                                        {{ $booking->purpose }}

                                    </h2>

                                </div>

                                {{-- DATE --}}
                                <div class="col-span-2">

                                    <p class="text-[#7a6a58]
                                              text-[10px]
                                              font-bold
                                              tracking-wide">

                                        DATE

                                    </p>

                                    <h2 class="text-[#4b2e2e]
                                               font-black
                                               text-sm
                                               mt-1">

                                        {{ $booking->booking_date }}

                                    </h2>

                                </div>

                                {{-- TIME --}}
                                <div class="col-span-2">

                                    <p class="text-[#7a6a58]
                                              text-[10px]
                                              font-bold
                                              tracking-wide">

                                        TIME

                                    </p>

                                    <h2 class="text-[#4b2e2e]
                                               font-black
                                               text-xs
                                               mt-1">

                                        {{ $booking->booking_time }}

                                    </h2>

                                </div>

                                {{-- STATUS --}}
                                <div class="col-span-2">

                                    @if($booking->status == 'Approved')

                                        <div class="bg-green-500
                                                    text-white
                                                    text-center
                                                    py-1.5
                                                    rounded-full
                                                    text-[10px]
                                                    font-black
                                                    shadow-md">

                                            Approved

                                        </div>

                                    @elseif($booking->status == 'Pending')

                                        <div class="bg-orange-500
                                                    text-white
                                                    text-center
                                                    py-1.5
                                                    rounded-full
                                                    text-[10px]
                                                    font-black
                                                    shadow-md">

                                            Pending

                                        </div>

                                    @else

                                        <div class="bg-red-500
                                                    text-white
                                                    text-center
                                                    py-1.5
                                                    rounded-full
                                                    text-[10px]
                                                    font-black
                                                    shadow-md">

                                            Rejected

                                        </div>

                                    @endif
{{-- DELETE BUTTON --}}
<div class="mt-2">

    <form
        method="POST"
        action="{{ route('booking.destroy',$booking) }}"
        onsubmit="return confirm(
        'Delete this reservation?'
        )">

        @csrf
        @method('DELETE')

        <button
            class="w-full
                   bg-red-500
                   hover:bg-red-600
                   text-white
                   py-1.5
                   rounded-full
                   text-[10px]
                   font-black
                   shadow-md">

            Delete

        </button>

    </form>

</div>
                                </div>

                            </div>

                        </div>

                    @endforeach

                </div>

            @else

                {{-- EMPTY --}}
                <div class="py-16 text-center">

                    <div class="text-6xl">
                        📋
                    </div>

                    <h2 class="text-[#4b2e2e]
                               text-2xl
                               font-black
                               mt-4">

                        No Booking Records

                    </h2>

                    <p class="text-[#7a6a58]
                              mt-2
                              text-sm
                              font-semibold">

                        Your reservation history will appear here.

                    </p>

                </div>

            @endif

        </div>

    </div>

</div>

</x-app-layout>