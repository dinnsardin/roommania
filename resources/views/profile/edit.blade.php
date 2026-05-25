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
                        👤
                    </span>

                </div>

                {{-- TEXT --}}
                <div>

                    <p class="text-[#7a6a58]
                              text-xs
                              font-bold">

                        Account Settings

                    </p>

                    <h1 class="text-[#4b2e2e]
                               text-3xl
                               font-black">

                        Profile Management

                    </h1>

                    <p class="text-[#7a6a58]
                              text-sm
                              mt-1
                              font-semibold">

                        Update your account information and security settings.

                    </p>

                </div>

            </div>

        </div>

        {{-- USER CARD --}}
        <div class="col-span-4
                    bg-[#f4e3bf]
                    border-[4px]
                    border-[#c89b5d]
                    rounded-[20px]
                    shadow-xl
                    p-4">

            <div class="flex
                        items-center
                        gap-4">

                {{-- AVATAR --}}
                <div class="w-16
                            h-16
                            rounded-[18px]
                            overflow-hidden
                            border-[3px]
                            border-[#d6b16d]
                            shadow-lg">

                    @if(auth()->user()->profile_photo)

                        <img src="{{ asset('storage/' . auth()->user()->profile_photo) }}"
                            class="w-full h-full object-cover">

                    @else

                        <div class="w-full
                                    h-full
                                    bg-gradient-to-b
                                    from-[#2563eb]
                                    to-[#3b82f6]
                                    flex
                                    items-center
                                    justify-center">

                            <span class="text-white
                                        text-3xl
                                        font-black">

                                {{ strtoupper(substr(auth()->user()->name,0,1)) }}

                            </span>

                        </div>

                    @endif

                </div>

                {{-- INFO --}}
                <div>

                    <h2 class="text-[#4b2e2e]
                               text-xl
                               font-black">

                        {{ auth()->user()->name }}

                    </h2>

                    <p class="text-[#7a6a58]
                              text-sm
                              font-semibold">

                        {{ auth()->user()->email }}

                    </p>

                </div>

            </div>

        </div>

    </div>

    {{-- PROFILE INFO --}}
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

                Profile Information

            </h2>

        </div>

        {{-- BODY --}}
        <div class="p-4">

            @include('profile.partials.update-profile-information-form')
            <div class="mt-4">

                <label class="block
                            text-[#4b2e2e]
                            font-black
                            text-sm
                            mb-2">

                    Profile Photo

                </label>

                <input type="file"
                    name="profile_photo"

                    class="block
                            w-full
                            text-sm
                            font-semibold
                            text-[#4b2e2e]
                            file:mr-4
                            file:py-2
                            file:px-4
                            file:rounded-full
                            file:border-0
                            file:bg-gradient-to-r
                            file:from-[#7c3aed]
                            file:to-[#8b5cf6]
                            file:text-white
                            file:font-black
                            cursor-pointer">
            </div>
            
        </div>

    </div>

    {{-- PASSWORD --}}
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

            <h2 class="text-white
                       text-xl
                       font-black">

                Update Password

            </h2>

        </div>

        {{-- BODY --}}
        <div class="p-4">

            @include('profile.partials.update-password-form')

        </div>

    </div>

    {{-- DELETE --}}
    <div class="bg-[#f4e3bf]
                border-[4px]
                border-red-400
                rounded-[20px]
                shadow-xl
                overflow-hidden">

        {{-- HEADER --}}
        <div class="bg-gradient-to-r
                    from-red-500
                    to-red-600
                    px-4
                    py-3">

            <h2 class="text-white
                       text-xl
                       font-black">

                Danger Zone

            </h2>

        </div>

        {{-- BODY --}}
        <div class="p-4">

            @include('profile.partials.delete-user-form')

        </div>

    </div>

</div>

</x-app-layout>