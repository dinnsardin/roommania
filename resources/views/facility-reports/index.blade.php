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
                                from-[#ea580c]
                                to-[#fb923c]
                                border-[3px]
                                border-[#d6b16d]
                                shadow-lg
                                flex
                                items-center
                                justify-center">

                        <span class="text-white text-2xl">
                            🔧
                        </span>

                    </div>

                    {{-- TEXT --}}
                    <div>

                        <p class="text-[#d8b67a]
                                  text-[11px]
                                  font-bold
                                  tracking-wide">

                            ADMINISTRATION PANEL

                        </p>

                        <h1 class="text-white
                                   text-2xl
                                   font-black
                                   mt-1">

                            Facility Reports

                        </h1>

                        <p class="text-[#e8d7b8]
                                  text-xs
                                  mt-1
                                  font-semibold">

                            Monitor and manage maintenance reports efficiently.

                        </p>

                    </div>

                </div>

                {{-- SIDE ICON --}}
                <div class="hidden lg:flex
                            w-20
                            h-20
                            rounded-[18px]
                            bg-gradient-to-br
                            from-[#ea580c]
                            to-[#c2410c]
                            border-[4px]
                            border-[#d6b16d]
                            shadow-xl
                            items-center
                            justify-center">

                    <span class="text-4xl">
                        🛠️
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

    {{-- REPORT PANEL --}}
    <div class="bg-[#ecdab7]
                border-[4px]
                border-[#c89b5d]
                rounded-[18px]
                shadow-xl
                overflow-hidden">

        {{-- HEADER --}}
        <div class="bg-gradient-to-r
                    from-[#ea580c]
                    to-[#fb923c]
                    px-4
                    py-2.5">

            <div class="flex
                        justify-between
                        items-center">

                <h2 class="text-white
                           text-lg
                           font-black">

                    Maintenance Reports

                </h2>

                <span class="bg-white/20
                             text-white
                             px-3
                             py-1.5
                             rounded-full
                             text-xs
                             font-black">

                    {{ $reports->count() }} Reports

                </span>

            </div>

        </div>

        {{-- BODY --}}
        <div class="p-3">

            @if($reports->count() > 0)

                <div class="space-y-2">

                    @foreach($reports as $report)

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
                                                    from-[#ea580c]
                                                    to-[#fb923c]
                                                    border-[3px]
                                                    border-[#d6b16d]
                                                    shadow-md
                                                    flex
                                                    items-center
                                                    justify-center">

                                            <span class="text-white text-xl">
                                                🛠️
                                            </span>

                                        </div>

                                        {{-- ROOM INFO --}}
                                        <div>

                                            <h2 class="text-[#4b2e2e]
                                                       text-base
                                                       font-black">

                                                {{ $report->room->room_name }}

                                            </h2>

                                            <p class="text-[#7a6a58]
                                                      text-[11px]
                                                      font-semibold
                                                      mt-1">

                                                {{ $report->room->room_type }}

                                            </p>

                                        </div>

                                    </div>

                                </div>
{{-- PHOTO --}}
<div class="col-span-2">

    @if($report->issue_image)

        <img
            src="{{ asset(
                'storage/'.$report->issue_image
            ) }}"

            class="w-full
                   h-20
                   object-cover
                   rounded-[14px]
                   border-[3px]
                   border-[#d6b16d]
                   shadow-md">

    @else

        <div class="w-full
                    h-20
                    rounded-[14px]
                    bg-[#ecdab7]
                    flex
                    items-center
                    justify-center">

            📷

        </div>

    @endif

</div>
                                {{-- REPORTER --}}
                                <div class="col-span-2">

                                    <p class="text-[#7a6a58]
                                              text-[10px]
                                              font-bold
                                              tracking-wide">

                                        REPORTED BY

                                    </p>

                                    <h2 class="text-[#4b2e2e]
                                               text-sm
                                               font-black
                                               mt-1">

                                        {{ $report->user->name }}

                                    </h2>

                                </div>

                                {{-- ISSUE --}}
                                <div class="col-span-3">

                                    <p class="text-[#7a6a58]
                                              text-[10px]
                                              font-bold
                                              tracking-wide">

                                        ISSUE

                                    </p>

                                    <h2 class="text-[#4b2e2e]
                                               font-black
                                               text-sm
                                               mt-1
                                               leading-tight">

                                        {{ $report->issue_title }}

                                    </h2>

                                </div>

                                {{-- STATUS --}}
                                <div class="col-span-2">

                                    @if($report->status == 'Pending')

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

@elseif($report->status == 'Resolved')

    <div class="bg-green-500
                text-white
                text-center
                py-1.5
                rounded-full
                text-[10px]
                font-black
                shadow-md">

        Resolved

    </div>

@elseif($report->status == 'Unavailable')

    <div class="bg-red-700
                text-white
                text-center
                py-1.5
                rounded-full
                text-[10px]
                font-black
                shadow-md">

        Maintenance

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

                                </div>

                                {{-- ACTION --}}
                                <div class="col-span-2">

                                    <form method="POST"
                                          action="{{ route('facility.report.update.status', $report->id) }}">

                                        @csrf
                                        @method('PATCH')

                                        <select name="status"

                                                onchange="this.form.submit()"

                                                class="w-full
                                                       bg-[#fff8eb]
                                                       border-[3px]
                                                       border-[#d6b16d]
                                                       rounded-[12px]
                                                       px-3
                                                       py-2
                                                       text-xs
                                                       font-black
                                                       text-[#4b2e2e]
                                                       focus:ring-0
                                                       focus:border-[#ea580c]">

                                            <option value="Pending"
                                                {{ $report->status == 'Pending' ? 'selected' : '' }}>

                                                Pending

                                            </option>

                                            <option value="Resolved"
                                                {{ $report->status == 'Resolved' ? 'selected' : '' }}>

                                                Resolved

                                            </option>

                                            <option value="Rejected"
                                                {{ $report->status == 'Rejected' ? 'selected' : '' }}>

                                                Rejected

                                            </option>

                                            <option value="Unavailable"
    {{ $report->status == 'Unavailable'
        ? 'selected'
        : '' }}>

    Unavailable

</option>

                                        </select>

                                    </form>

                                </div>

                            </div>

                        </div>

                    @endforeach

                </div>

            @else

                {{-- EMPTY --}}
                <div class="py-16 text-center">

                    <div class="text-6xl">
                        🔧
                    </div>

                    <h2 class="text-[#4b2e2e]
                               text-2xl
                               font-black
                               mt-4">

                        No Facility Reports

                    </h2>

                    <p class="text-[#7a6a58]
                              mt-2
                              text-sm
                              font-semibold">

                        Submitted maintenance reports will appear here.

                    </p>

                </div>

            @endif

        </div>

    </div>

</div>

</x-app-layout>