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
                            from-[#7c3aed]
                            to-[#8b5cf6]
                            border-[3px]
                            border-[#d6b16d]
                            shadow-lg
                            flex
                            items-center
                            justify-center">

                    <span class="text-white text-3xl">
                        ➕
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

                        Add New Room

                    </h1>

                    <p class="text-[#7a6a58]
                              text-sm
                              mt-1
                              font-semibold">

                        Create and register a new facility room.

                    </p>

                </div>

            </div>

        </div>

        {{-- BACK --}}
        <div class="col-span-4">

            <a href="{{ route('rooms.index') }}"

               class="h-full
                      flex
                      items-center
                      justify-center
                      bg-gradient-to-r
                      from-[#2563eb]
                      to-[#3b82f6]
                      border-[4px]
                      border-[#d6b16d]
                      rounded-[20px]
                      shadow-xl
                      hover:scale-[1.01]
                      transition-all
                      duration-200">

                <div class="text-center text-white">

                    <div class="text-3xl">
                        ↩️
                    </div>

                    <h2 class="text-xl
                               font-black
                               mt-1">

                        Back to Rooms

                    </h2>

                </div>

            </a>

        </div>

    </div>

    {{-- FORM PANEL --}}
    <div class="bg-[#f4e3bf]
                border-[4px]
                border-[#c89b5d]
                rounded-[20px]
                shadow-xl
                overflow-hidden">

        {{-- HEADER --}}
        <div class="bg-gradient-to-r
                    from-[#7c3aed]
                    to-[#8b5cf6]
                    px-4
                    py-3">

            <h2 class="text-white
                       text-xl
                       font-black">

                Room Information Form

            </h2>

        </div>

        {{-- BODY --}}
        <div class="p-4">

            {{-- ERRORS --}}
            @if ($errors->any())

                <div class="bg-red-500
                            text-white
                            rounded-[16px]
                            p-4
                            mb-4
                            shadow-lg">

                    <ul class="space-y-1">

                        @foreach ($errors->all() as $error)

                            <li class="font-semibold">
                                • {{ $error }}
                            </li>

                        @endforeach

                    </ul>

                </div>

            @endif

            {{-- FORM --}}
            <form method="POST"
                  action="{{ route('rooms.store') }}">

                @csrf

                <div class="grid grid-cols-12 gap-4">

                    {{-- ROOM NAME --}}
                    <div class="col-span-6">

                        <label class="block
                                     text-[#4b2e2e]
                                     font-black
                                     mb-2">

                            Room Name

                        </label>

                        <input type="text"
                               name="room_name"
                               value="{{ old('room_name') }}"
                               placeholder="Enter room name..."

                               class="w-full
                                      bg-[#fff8eb]
                                      border-[3px]
                                      border-[#d6b16d]
                                      rounded-[16px]
                                      px-4
                                      py-3
                                      font-semibold
                                      text-[#4b2e2e]
                                      focus:ring-0
                                      focus:border-[#7c3aed]"

                               required>

                    </div>

                    {{-- ROOM ID --}}
                    <div class="col-span-6">

                        <label class="block
                                     text-[#4b2e2e]
                                     font-black
                                     mb-2">

                            Room ID

                        </label>

                        <input type="text"
                               name="room_id"
                               value="{{ old('room_id') }}"
                               placeholder="Example: HALL-01"

                               class="w-full
                                      bg-[#fff8eb]
                                      border-[3px]
                                      border-[#d6b16d]
                                      rounded-[16px]
                                      px-4
                                      py-3
                                      font-semibold
                                      text-[#4b2e2e]
                                      focus:ring-0
                                      focus:border-[#7c3aed]"

                               required>

                    </div>

                    {{-- ROOM TYPE --}}
                    <div class="col-span-6">

                        <label class="block
                                     text-[#4b2e2e]
                                     font-black
                                     mb-2">

                            Room Type

                        </label>

                        <select name="room_type"

                                class="w-full
                                       bg-[#fff8eb]
                                       border-[3px]
                                       border-[#d6b16d]
                                       rounded-[16px]
                                       px-4
                                       py-3
                                       font-semibold
                                       text-[#4b2e2e]
                                       focus:ring-0
                                       focus:border-[#7c3aed]"

                                required>

                            <option value="">
                                Select Room Type
                            </option>

                            <option value="Hall">
                                Hall
                            </option>

                            <option value="Meeting Room">
                                Meeting Room
                            </option>

                            <option value="Lab">
                                Lab
                            </option>

                        </select>

                    </div>

                    {{-- CAPACITY --}}
                    <div class="col-span-6">

                        <label class="block
                                     text-[#4b2e2e]
                                     font-black
                                     mb-2">

                            Capacity

                        </label>

                        <input type="number"
                               name="capacity"
                               value="{{ old('capacity') }}"
                               placeholder="Enter capacity..."

                               class="w-full
                                      bg-[#fff8eb]
                                      border-[3px]
                                      border-[#d6b16d]
                                      rounded-[16px]
                                      px-4
                                      py-3
                                      font-semibold
                                      text-[#4b2e2e]
                                      focus:ring-0
                                      focus:border-[#7c3aed]"

                               required>

                    </div>

                    {{-- STATUS --}}
                    <div class="col-span-12">

                        <label class="block
                                     text-[#4b2e2e]
                                     font-black
                                     mb-3">

                            Room Status

                        </label>

                        <div class="grid grid-cols-2 gap-4">

                            {{-- AVAILABLE --}}
                            <label>

                                <input type="radio"
                                       name="status"
                                       value="Available"
                                       class="hidden peer"
                                       checked>

                                <div class="bg-[#fff8eb]
                                            border-[3px]
                                            border-[#d6b16d]
                                            rounded-[16px]
                                            py-4
                                            text-center
                                            font-black
                                            text-[#4b2e2e]
                                            cursor-pointer
                                            transition-all

                                            peer-checked:bg-green-500
                                            peer-checked:text-white
                                            peer-checked:border-green-600">

                                    Available

                                </div>

                            </label>

                            {{-- OCCUPIED --}}
                            <label>

                                <input type="radio"
                                       name="status"
                                       value="Occupied"
                                       class="hidden peer">

                                <div class="bg-[#fff8eb]
                                            border-[3px]
                                            border-[#d6b16d]
                                            rounded-[16px]
                                            py-4
                                            text-center
                                            font-black
                                            text-[#4b2e2e]
                                            cursor-pointer
                                            transition-all

                                            peer-checked:bg-red-500
                                            peer-checked:text-white
                                            peer-checked:border-red-600">

                                    Occupied

                                </div>

                            </label>

                        </div>

                    </div>

                </div>

                {{-- BUTTON --}}
                <div class="mt-6">

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
                                   py-4
                                   rounded-[18px]
                                   border-[3px]
                                   border-[#d6b16d]
                                   shadow-xl">

                        Create Room

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

</x-app-layout>