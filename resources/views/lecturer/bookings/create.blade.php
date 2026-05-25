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
                                from-[#7c3aed]
                                to-[#8b5cf6]
                                border-[3px]
                                border-[#d6b16d]
                                shadow-lg
                                flex
                                items-center
                                justify-center">

                        <span class="text-white text-2xl">
                            📅
                        </span>

                    </div>

                    {{-- TEXT --}}
                    <div>

                        <p class="text-[#d8b67a]
                                  text-[11px]
                                  font-bold
                                  tracking-wide">

                            ROOM RESERVATION

                        </p>

                        <h1 class="text-white
                                   text-2xl
                                   font-black
                                   mt-1">

                            Book Room

                        </h1>

                        <p class="text-[#e8d7b8]
                                  text-xs
                                  mt-1
                                  font-semibold">

                            Reserve your preferred facility schedule.

                        </p>

                    </div>

                </div>

                {{-- SIDE ICON --}}
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
                          text-xs
                          mt-1
                          font-semibold">

                    {{ now()->format('l') }}

                </p>

            </div>

        </div>

    </div>

    {{-- MAIN CONTENT --}}
    <div class="grid grid-cols-12 gap-3">

        {{-- ROOM INFO --}}
        <div class="col-span-4
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

                    Room Details

                </h2>

            </div>

            {{-- BODY --}}
            <div class="p-3">

                {{-- ROOM NAME --}}
                <div class="flex
                            justify-between
                            items-start">

                    <div>

                        <h2 class="text-[#4b2e2e]
                                   text-2xl
                                   font-black">

                            {{ $room->room_name }}

                        </h2>

                        <p class="text-[#7a6a58]
                                  text-xs
                                  font-semibold
                                  mt-1">

                            {{ $room->room_type }}

                        </p>

                    </div>

                    {{-- ROOM ID --}}
                    <div class="px-3
                                py-1.5
                                rounded-full
                                text-white
                                text-[11px]
                                font-black
                                shadow-md

                        @if($room->room_type == 'Hall')

                            bg-gradient-to-r
                            from-[#2563eb]
                            to-[#3b82f6]

                        @elseif($room->room_type == 'Lab')

                            bg-gradient-to-r
                            from-[#16a34a]
                            to-[#22c55e]

                        @else

                            bg-gradient-to-r
                            from-[#ea580c]
                            to-[#fb923c]

                        @endif">

                        {{ $room->room_id }}

                    </div>

                </div>

                {{-- INFO CARDS --}}
                <div class="mt-3 space-y-2">

                    {{-- CAPACITY --}}
                    <div class="bg-[#fff8eb]
                                border-[3px]
                                border-[#d6b16d]
                                rounded-[14px]
                                p-3
                                flex
                                justify-between
                                items-center">

                        <span class="text-[#7a6a58]
                                     text-sm
                                     font-bold">

                            Capacity

                        </span>

                        <span class="text-[#4b2e2e]
                                     text-sm
                                     font-black">

                            {{ $room->capacity }} People

                        </span>

                    </div>

                    {{-- STATUS --}}
@if($room->is_under_maintenance)

    <div class="bg-red-600
                text-white
                text-center
                py-2.5
                rounded-full
                text-sm
                font-black
                shadow-md">

        Unavailable

    </div>

@else

    <div class="bg-green-500
                text-white
                text-center
                py-2.5
                rounded-full
                text-sm
                font-black
                shadow-md">

        Available

    </div>

@endif

                </div>

                {{-- DECORATION --}}
                <div class="mt-4
                            bg-gradient-to-br
                            from-[#7c3aed]
                            to-[#8b5cf6]
                            border-[3px]
                            border-[#d6b16d]
                            rounded-[16px]
                            p-4
                            text-center
                            shadow-lg">

                    <div class="text-4xl">
                        🏛️
                    </div>

                    <p class="text-white
                              text-sm
                              font-bold
                              mt-2">

                        Premium Facility Access

                    </p>

                </div>

            </div>

        </div>

        {{-- BOOKING FORM --}}
        <div class="col-span-8
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

                    Reservation Form

                </h2>

            </div>

            {{-- BODY --}}
            <div class="p-3">
            {{-- MAINTENANCE WARNING --}}
@if($room->is_under_maintenance)

    <div class="mb-4
                bg-red-500
                border-[3px]
                border-red-700
                rounded-[18px]
                p-4
                text-white
                shadow-xl">

        <div class="flex
                    items-start
                    gap-3">

            <div class="text-3xl">
                ⚠️
            </div>

            <div>

                <h2 class="font-black
                           text-sm">

                    Room Temporarily Unavailable

                </h2>

                <p class="mt-2
                          text-sm
                          font-semibold">

                    Reason:
                    {{ $room->maintenance_note
                        ?? 'Maintenance issue' }}

                </p>

                <p class="text-xs
                          mt-2
                          opacity-90">

                    Please select another room.

                </p>

            </div>

        </div>

    </div>

@endif
                <form method="POST"
                      action="{{ route('booking.store') }}">

                    @csrf

                    <input type="hidden"
                           name="room_id"
                           value="{{ $room->id }}">

                    {{-- FORM GRID --}}
                    <div class="grid grid-cols-2 gap-3">

                        {{-- DATE --}}
                        <div>

                            <label class="block
                                         text-[#4b2e2e]
                                         font-black
                                         text-sm
                                         mb-2">

                                Booking Date

                            </label>

                            <input type="date"
                                   name="booking_date"
                                   value="{{ $selectedDate }}"

                                   class="w-full
                                          bg-[#fff8eb]
                                          border-[3px]
                                          border-[#d6b16d]
                                          rounded-[14px]
                                          px-4
                                          py-3
                                          font-semibold
                                          text-[#4b2e2e]
                                          focus:ring-0
                                          focus:border-[#7c3aed]"

                                   required>

                        </div>

                        {{-- PURPOSE --}}
                        <div>

                            <label class="block
                                         text-[#4b2e2e]
                                         font-black
                                         text-sm
                                         mb-2">

                                Purpose

                            </label>

                            <input type="text"
                                   name="purpose"
                                   placeholder="Meeting / Discussion..."

                                   class="w-full
                                          bg-[#fff8eb]
                                          border-[3px]
                                          border-[#d6b16d]
                                          rounded-[14px]
                                          px-4
                                          py-3
                                          font-semibold
                                          text-[#4b2e2e]
                                          focus:ring-0
                                          focus:border-[#7c3aed]"

                                   required>

                        </div>

                    </div>
                    {{-- BOOKING GUIDE --}}
<div class="mt-4
            bg-[#fff8eb]
            border-[3px]
            border-[#d6b16d]
            rounded-[18px]
            p-4
            shadow-md">

    <div class="flex
                items-center
                gap-2
                mb-3">

        <span class="text-xl">
            💡
        </span>

        <h2 class="text-[#4b2e2e]
                   font-black
                   text-sm">

            Booking Guidelines

        </h2>

    </div>

    <div class="space-y-2
                text-[#6b4f3b]
                text-sm
                font-semibold">

        <div class="flex items-start gap-2">

            <span>🕒</span>

            <p>
                One slot = 30 minutes
            </p>

        </div>

        <div class="flex items-start gap-2">

            <span>📌</span>

            <p>
                Select multiple slots for longer bookings
            </p>

        </div>

        <div class="flex items-start gap-2">

            <span>⚠️</span>

            <p>
                Occupied slots cannot be selected
            </p>

        </div>

        <div class="flex items-start gap-2">

            <span>🏛️</span>

            <p>
                Rooms under maintenance cannot be booked
            </p>

        </div>

        <div class="flex items-start gap-2">

            <span>✅</span>

            <p>
                Click Confirm Reservation after selecting slots
            </p>

        </div>

    </div>

</div>
                    {{-- TIME SLOT --}}
                    <div class="mt-4">

                        <div class="flex
                                    justify-between
                                    items-center
                                    mb-3">

                            <label class="text-[#4b2e2e]
                                        font-black
                                        text-sm">

                                Select Time Slots

                            </label>

                            <div class="bg-[#fff8eb]
                                        border-[2px]
                                        border-[#d6b16d]
                                        rounded-full
                                        px-3
                                        py-1">

                                <span class="text-[#7a6a58]
                                            text-[10px]
                                            font-black">

                                    Multiple selection enabled

                                </span>

                            </div>

                        </div>

                        <div class="grid grid-cols-4 gap-2">

                            @foreach($timeSlots as $time)

                                @php

                                    $isOccupied = in_array($time, $occupiedSlots);

                                @endphp

                                <label>

                                    <input type="checkbox"
                                        name="time_slots[]"
                                        value="{{ $time }}"
                                        class="hidden peer"

                                        {{ $isOccupied ? 'disabled' : '' }}>

                                    <div class="rounded-[14px]
                                                py-2.5
                                                text-center
                                                font-black
                                                text-xs
                                                border-[3px]
                                                transition-all
                                                duration-200

                                        @if($isOccupied)

                                            bg-red-500
                                            border-red-600
                                            text-white
                                            cursor-not-allowed
                                            opacity-80

                                        @else

                                            bg-[#fff8eb]
                                            border-[#d6b16d]
                                            text-[#4b2e2e]
                                            cursor-pointer

                                            hover:scale-[1.03]
                                            hover:shadow-lg

                                            peer-checked:bg-gradient-to-r
                                            peer-checked:from-[#7c3aed]
                                            peer-checked:to-[#8b5cf6]
                                            peer-checked:border-[#7c3aed]
                                            peer-checked:text-white

                                        @endif">

                                        {{ $time }}

                                        @if($isOccupied)

                                            <div class="text-[9px]
                                                        mt-1
                                                        font-bold">

                                                Occupied

                                            </div>

                                        @endif

                                    </div>

                                </label>

                            @endforeach

                        </div>

                    </div>

                    {{-- BUTTON --}}
                    <div class="mt-5">

                        @if($room->is_under_maintenance)

    <button
        disabled

        class="w-full
               bg-gray-400
               text-white
               font-black
               py-3
               rounded-[16px]
               border-[3px]
               border-gray-500
               shadow-xl
               cursor-not-allowed">

        Room Unavailable

    </button>

@else

    <button type="submit"

            class="w-full
                   bg-gradient-to-r
                   from-[#7c3aed]
                   to-[#8b5cf6]
                   hover:scale-[1.01]
                   transition-all
                   duration-200
                   text-white
                   font-black
                   py-3
                   rounded-[16px]
                   border-[3px]
                   border-[#d6b16d]
                   shadow-xl">

        Confirm Reservation

    </button>

@endif

                    </div>

                </form>

            </div>

        </div>

    </div>

</div>

</x-app-layout>