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
                            from-[#2563eb]
                            to-[#3b82f6]
                            border-[3px]
                            border-[#d6b16d]
                            shadow-lg
                            flex
                            items-center
                            justify-center">

                    <span class="text-white text-3xl">
                        🏢
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

                        Manage Rooms

                    </h1>

                    <p class="text-[#7a6a58]
                              text-sm
                              mt-1
                              font-semibold">

                        Create, update and organize room facilities.

                    </p>

                </div>

            </div>

        </div>

        {{-- ACTION --}}
        <div class="col-span-4">

            <a href="{{ route('rooms.create') }}"

               class="h-full
                      flex
                      items-center
                      justify-center
                      bg-gradient-to-r
                      from-[#7c3aed]
                      to-[#8b5cf6]
                      border-[4px]
                      border-[#d6b16d]
                      rounded-[20px]
                      shadow-xl
                      hover:scale-[1.01]
                      transition-all
                      duration-200">

                <div class="text-center text-white">

                    <div class="text-3xl">
                        ➕
                    </div>

                    <h2 class="text-xl
                               font-black
                               mt-1">

                        Add New Room

                    </h2>

                </div>

            </a>

        </div>

    </div>

    {{-- ROOM PANEL --}}
    <div class="bg-[#f4e3bf]
                border-[4px]
                border-[#c89b5d]
                rounded-[20px]
                shadow-xl
                overflow-hidden">

        {{-- HEADER --}}
        <div class="bg-gradient-to-r
                    from-[#2563eb]
                    to-[#3b82f6]
                    px-4
                    py-3">

            <div class="flex
                        justify-between
                        items-center">

                <h2 class="text-white
                           text-xl
                           font-black">

                    Room Directory

                </h2>

                <span class="bg-white/20
                             text-white
                             px-4
                             py-2
                             rounded-full
                             text-sm
                             font-black">

                    {{ $rooms->count() }} Rooms

                </span>

            </div>

        </div>

        {{-- BODY --}}
        <div class="p-4">

            @if($rooms->count() > 0)

                <div class="grid grid-cols-3 gap-3">

                    @foreach($rooms as $room)

                        <div class="bg-[#fff8eb]
                                    border-[3px]
                                    border-[#d6b16d]
                                    rounded-[18px]
                                    shadow-lg
                                    overflow-hidden">

                            {{-- TOP --}}
                            <div class="p-4">

                                <div class="flex
                                            justify-between
                                            items-start">

                                    {{-- ROOM --}}
                                    <div>

                                        <h2 class="text-[#4b2e2e]
                                                   text-2xl
                                                   font-black">

                                            {{ $room->room_name }}

                                        </h2>

                                        <p class="text-[#7a6a58]
                                                  text-sm
                                                  font-semibold
                                                  mt-1">

                                            {{ $room->room_type }}

                                        </p>

                                    </div>

                                    {{-- ROOM ID --}}
                                    <div class="px-3
                                                py-2
                                                rounded-full
                                                text-white
                                                text-xs
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

                                {{-- DETAILS --}}
                                <div class="mt-4 space-y-3">

                                    {{-- CAPACITY --}}
                                    <div class="bg-[#f4e3bf]
                                                border-[3px]
                                                border-[#d6b16d]
                                                rounded-[14px]
                                                px-4
                                                py-3
                                                flex
                                                justify-between
                                                items-center">

                                        <span class="text-[#7a6a58]
                                                     font-bold">

                                            Capacity

                                        </span>

                                        <span class="text-[#4b2e2e]
                                                     font-black">

                                            {{ $room->capacity }}

                                        </span>

                                    </div>

                                    {{-- STATUS --}}
                                    <div>

                                        @if($room->status == 'Available')

                                            <div class="bg-green-500
                                                        text-white
                                                        text-center
                                                        py-2
                                                        rounded-full
                                                        text-sm
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
                                                        text-sm
                                                        font-black
                                                        shadow-md">

                                                Occupied

                                            </div>

                                        @endif

                                    </div>

                                </div>

                            </div>

                            {{-- ACTIONS --}}
                            <div class="bg-[#f4e3bf]
                                        border-t-[3px]
                                        border-[#d6b16d]
                                        p-4">

                                <div class="grid grid-cols-2 gap-3">

                                    {{-- EDIT --}}
                                    <a href="{{ route('rooms.edit', $room->id) }}"

                                       class="bg-gradient-to-r
                                              from-[#2563eb]
                                              to-[#3b82f6]
                                              hover:scale-[1.02]
                                              transition-all
                                              duration-200
                                              text-white
                                              text-center
                                              py-3
                                              rounded-[14px]
                                              font-black
                                              shadow-md">

                                        Edit

                                    </a>

                                    {{-- DELETE --}}
                                    <form method="POST"
                                          action="{{ route('rooms.destroy', $room->id) }}">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"

                                                class="w-full
                                                       bg-gradient-to-r
                                                       from-red-500
                                                       to-red-600
                                                       hover:scale-[1.02]
                                                       transition-all
                                                       duration-200
                                                       text-white
                                                       py-3
                                                       rounded-[14px]
                                                       font-black
                                                       shadow-md">

                                            Delete

                                        </button>

                                    </form>

                                </div>

                            </div>

                        </div>

                    @endforeach

                </div>

            @else

                {{-- EMPTY --}}
                <div class="py-20 text-center">

                    <div class="text-7xl">
                        🏢
                    </div>

                    <h2 class="text-[#4b2e2e]
                               text-3xl
                               font-black
                               mt-5">

                        No Rooms Available

                    </h2>

                    <p class="text-[#7a6a58]
                              mt-2
                              font-semibold">

                        Added room facilities will appear here.

                    </p>

                </div>

            @endif

        </div>

    </div>

</div>

</x-app-layout>