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
                            🚪
                        </span>

                    </div>

                    {{-- TEXT --}}
                    <div>

                        <p class="text-[#d8b67a]
                                  text-[11px]
                                  font-bold
                                  tracking-wide">

                            ROOM EXPLORER

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

                            Browse and reserve available rooms instantly.

                        </p>

                    </div>

                </div>

                {{-- SIDE ICON --}}
                <div class="hidden lg:flex
                            w-20
                            h-20
                            rounded-[18px]
                            bg-gradient-to-br
                            from-[#7c3aed]
                            to-[#6d28d9]
                            border-[4px]
                            border-[#d6b16d]
                            shadow-xl
                            items-center
                            justify-center">

                    <span class="text-4xl">
                        🏛️
                    </span>

                </div>

            </div>

        </div>

        {{-- DATE --}}
        <div class="col-span-4
                    bg-gradient-to-br
                    from-[#4b2615]
                    to-[#2f170d]
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

    {{-- SEARCH PANEL --}}
    <div class="bg-[#ecdab7]
                border-[4px]
                border-[#c89b5d]
                rounded-[18px]
                shadow-xl
                overflow-hidden">

        {{-- HEADER --}}
        <div class="bg-gradient-to-r
                    from-[#7c3aed]
                    to-[#8b5cf6]
                    px-4
                    py-2.5">

            <h2 class="text-white
                       text-lg
                       font-black">

                Search Rooms

            </h2>

        </div>

        {{-- BODY --}}
        <div class="p-3">

            <form method="GET"
                  action="{{ route('availability') }}">

                <div class="grid grid-cols-12 gap-3">

                    {{-- SEARCH --}}
                    <div class="col-span-5">

                        <input type="text"
                               name="search"
                               value="{{ request('search') }}"
                               placeholder="Search room name or room ID..."

                               class="w-full
                                      bg-[#fff8eb]
                                      border-[3px]
                                      border-[#d6b16d]
                                      rounded-[14px]
                                      px-4
                                      py-3
                                      text-sm
                                      font-semibold
                                      text-[#4b2e2e]
                                      focus:ring-0
                                      focus:border-[#7c3aed]">

                    </div>

                    {{-- ROOM TYPE --}}
                    <div class="col-span-4">

                        <select name="room_type"

                                class="w-full
                                       bg-[#fff8eb]
                                       border-[3px]
                                       border-[#d6b16d]
                                       rounded-[14px]
                                       px-4
                                       py-3
                                       text-sm
                                       font-semibold
                                       text-[#4b2e2e]
                                       focus:ring-0
                                       focus:border-[#7c3aed]">

                            <option value="All">

                                All Room Types

                            </option>

                            @foreach($roomTypes as $type)

                                <option value="{{ $type }}"

                                    {{ request('room_type') == $type ? 'selected' : '' }}>

                                    {{ $type }}

                                </option>

                            @endforeach

                        </select>

                    </div>

                    {{-- BUTTON --}}
                    <div class="col-span-3">

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
                                       rounded-[14px]
                                       border-[3px]
                                       border-[#d6b16d]
                                       shadow-lg">

                            Search Rooms

                        </button>

                    </div>

                </div>

            </form>

        </div>

    </div>

    {{-- ROOM GRID --}}
    <div class="grid grid-cols-3 gap-3">

        @forelse($rooms as $room)

            <div class="bg-[#ecdab7]
                        border-[4px]
                        border-[#c89b5d]
                        rounded-[18px]
                        shadow-xl
                        overflow-hidden">

                {{-- TOP --}}
                <div class="p-3">

                    <div class="flex
                                justify-between
                                items-start
                                gap-3">

                        {{-- ROOM INFO --}}
                        <div class="min-w-0">

                            <h2 class="text-[#4b2e2e]
                                       text-xl
                                       font-black
                                       truncate">

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
                        <div class="shrink-0
                                    px-2.5
                                    py-1.5
                                    rounded-full
                                    text-white
                                    text-[10px]
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

                </div>

                {{-- BODY --}}
                <div class="px-3 pb-3">

                    {{-- CAPACITY --}}
                    <div class="bg-[#fff8eb]
                                border-[3px]
                                border-[#d6b16d]
                                rounded-[14px]
                                p-3">

                        <div class="flex
                                    justify-between
                                    items-center
                                    gap-3">

                            <span class="text-[#7a6a58]
                                         text-sm
                                         font-bold">

                                Capacity

                            </span>

                            <span class="text-[#4b2e2e]
                                         text-sm
                                         font-black
                                         text-right">

                                {{ $room->capacity }} People

                            </span>

                        </div>

                    </div>

                    {{-- STATUS --}}
                    <div class="mt-3">

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

                                Occupied/Unavailable

                            </div>

                        @endif

                    </div>

                    {{-- BUTTON --}}
                    <div class="mt-3">

                        <a href="{{ route('bookings.create', $room->id) }}"

                           class="block
                                  w-full
                                  bg-gradient-to-r
                                  from-[#7c3aed]
                                  to-[#8b5cf6]
                                  hover:scale-[1.01]
                                  transition-all
                                  duration-200
                                  text-white
                                  text-center
                                  py-3
                                  rounded-[14px]
                                  border-[3px]
                                  border-[#d6b16d]
                                  shadow-lg
                                  text-sm
                                  font-black">

                            Book Room

                        </a>

                    </div>

                </div>

            </div>

        @empty

            {{-- EMPTY --}}
            <div class="col-span-3">

                <div class="bg-[#ecdab7]
                            border-[4px]
                            border-[#c89b5d]
                            rounded-[18px]
                            shadow-xl
                            py-16
                            text-center">

                    <div class="text-6xl">
                        🚪
                    </div>

                    <h2 class="text-[#4b2e2e]
                               text-2xl
                               font-black
                               mt-4">

                        No Rooms Found

                    </h2>

                    <p class="text-[#7a6a58]
                              text-sm
                              font-semibold
                              mt-2">

                        Try changing your search keyword or room type.

                    </p>

                </div>

            </div>

        @endforelse

    </div>

</div>

</x-app-layout>