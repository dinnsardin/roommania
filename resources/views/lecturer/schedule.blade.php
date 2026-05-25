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
                                from-[#2563eb]
                                to-[#3b82f6]
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

                            ROOM MONITORING

                        </p>

                        <h1 class="text-white
                                   text-2xl
                                   font-black
                                   mt-1">

                            Room Schedule

                        </h1>

                        <p class="text-[#e8d7b8]
                                  text-xs
                                  mt-1
                                  font-semibold">

                            Live facility timetable and booking schedule.

                        </p>

                    </div>

                </div>

                {{-- SIDE ICON --}}
                <div class="hidden lg:flex
                            w-20
                            h-20
                            rounded-[18px]
                            bg-gradient-to-br
                            from-[#2563eb]
                            to-[#1d4ed8]
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
    
    {{-- FILTER PANEL --}}
    <div class="bg-[#ecdab7]
                border-[4px]
                border-[#c89b5d]
                rounded-[18px]
                shadow-xl
                overflow-hidden">

        {{-- HEADER --}}
        <div class="bg-gradient-to-r
                    from-[#2563eb]
                    to-[#3b82f6]
                    px-4
                    py-2.5">

            <h2 class="text-white
                    text-lg
                    font-black">

                Schedule Filters

            </h2>

        </div>

        {{-- BODY --}}
        <div class="p-3">

            <form method="GET"
                action="{{ route('room.schedule') }}">

                <div class="grid grid-cols-12 gap-3">

                    {{-- SEARCH --}}
                    <div class="col-span-4">

                        <input type="text"
                            name="search"
                            value="{{ request('search') }}"
                            placeholder="Search room..."

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
                                    focus:border-[#2563eb]">

                    </div>

                    {{-- ROOM TYPE --}}
                    <div class="col-span-3">

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
                                    focus:border-[#2563eb]">

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

                    {{-- DATE --}}
                    <div class="col-span-3">

                        <input type="date"
                            name="selected_date"
                            value="{{ $selectedDate }}"

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
                                    focus:border-[#2563eb]">

                    </div>

                    {{-- BUTTON --}}
                    <div class="col-span-2">

                        <button type="submit"

                                class="w-full
                                    bg-gradient-to-r
                                    from-[#2563eb]
                                    to-[#3b82f6]
                                    hover:scale-[1.01]
                                    transition-all
                                    duration-200
                                    text-white
                                    font-black
                                    py-3
                                    rounded-[14px]
                                    border-[3px]
                                    border-[#d6b16d]
                                    shadow-lg
                                    text-sm">

                            Filter

                        </button>

                    </div>

                </div>

            </form>

        </div>

    </div>

    {{-- SCHEDULE PANEL --}}
    <div class="bg-[#ecdab7]
                border-[4px]
                border-[#c89b5d]
                rounded-[18px]
                shadow-xl
                overflow-hidden">

        {{-- HEADER --}}
        <div class="bg-gradient-to-r
                    from-[#2563eb]
                    to-[#3b82f6]
                    px-4
                    py-2.5">

            <div class="flex
                        justify-between
                        items-center">

                <h2 class="text-white
                           text-lg
                           font-black">

                    Daily Timetable

                </h2>

                <span class="bg-white/20
                             text-white
                             px-3
                             py-1.5
                             rounded-full
                             text-xs
                             font-black">

                    {{ $rooms->count() }} Rooms

                </span>

            </div>

        </div>

        {{-- TABLE --}}
        <div class="overflow-x-auto">

            <table class="w-full border-collapse">

                {{-- HEADER --}}
                <thead>

                    <tr>

                        {{-- TIME --}}
                        <th class="sticky
                                   left-0
                                   z-30
                                   bg-[#f7ebd2]
                                   border-r-[3px]
                                   border-b-[3px]
                                   border-[#d6b16d]
                                   px-3
                                   py-3
                                   w-[70px]
                                   min-w-[70px]
                                   text-left
                                   text-[#4b2e2e]
                                   text-sm
                                   font-black">

                            Time

                        </th>

                        {{-- ROOMS --}}
                        @foreach($rooms as $room)

                            <th class="bg-[#f7ebd2]
                                       border-r-[3px]
                                       border-b-[3px]
                                       border-[#d6b16d]
                                       min-w-[150px]
                                       px-2
                                       py-2">

                                <div class="space-y-1">

                                    {{-- ROOM NAME --}}
                                    <h2 class="text-[#4b2e2e]
                                               text-base
                                               font-black">

                                        {{ $room->room_name }}

                                    </h2>

                                    {{-- TYPE --}}
                                    <p class="text-[#7a6a58]
                                              text-[10px]
                                              font-semibold">

                                        {{ $room->room_type }}

                                    </p>

                                    {{-- ID --}}
                                    <div class="inline-block
                                                px-2.5
                                                py-1
                                                rounded-full
                                                text-white
                                                text-[10px]
                                                font-black

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

                            </th>

                        @endforeach

                    </tr>

                </thead>

                {{-- BODY --}}
                <tbody>

@php

    $hourSlots = [];

    $hour = strtotime('08:00');

    while($hour <= strtotime('23:00')){

        $hourSlots[] = date('H:i', $hour);

        $hour = strtotime('+1 hour', $hour);
    }

@endphp

@foreach($hourSlots as $hour)

<tr>

    {{-- TIME --}}
    <td class="sticky
               left-0
               z-20
               bg-[#fff8eb]
               border-r-[3px]
               border-b-[3px]
               border-[#d6b16d]
               px-2
               py-0
               h-[90px]
               align-top">

        <div class="pt-2">

            <span class="text-[#4b2e2e]
                         text-xs
                         font-black">

                {{ date('gA', strtotime($hour)) }}

            </span>

        </div>

    </td>

    {{-- ROOMS --}}
    @foreach($rooms as $room)

        <td class="bg-[#f9edd3]
                   border-r-[3px]
                   border-b-[3px]
                   border-[#d6b16d]
                   p-0
                   relative
                   h-[90px]
                   align-top">

            {{-- TIMELINE --}}
<div class="relative h-[90px]">

    {{-- HALF LINE --}}
    <div class="absolute
                top-1/2
                left-0
                w-full
                border-t-2
                border-dashed
                border-[#d6b16d]/60">
    </div>

    @php

        $bookingFound = false;

        foreach($bookings as $b){

            if($b->room_id != $room->id) continue;

            $slots = array_map(
                'trim',
                explode(',', $b->booking_time)
            );

            if(empty($slots)) continue;

            $hourStart = strtotime($hour);
$hourEnd = strtotime('+1 hour', $hourStart);

foreach($slots as $slot){

    $slotTime = strtotime($slot);

    if(
        $slotTime >= $hourStart &&
        $slotTime < $hourEnd
    ){

        $bookingFound = true;

        $minutes =
            (date('i', $slotTime) == '30')
            ? 44
            : 0;

        $top = $minutes;

        $height = 42;

        $colors = [

            'from-[#8b5cf6] to-[#7c3aed]',
            'from-[#2563eb] to-[#3b82f6]',
            'from-[#16a34a] to-[#22c55e]',
            'from-[#ea580c] to-[#fb923c]',
            'from-[#ec4899] to-[#db2777]',

        ];

        $color =
            $colors[$b->id % count($colors)];

                $colors = [

                    'from-[#8b5cf6] to-[#7c3aed]',
                    'from-[#2563eb] to-[#3b82f6]',
                    'from-[#16a34a] to-[#22c55e]',
                    'from-[#ea580c] to-[#fb923c]',
                    'from-[#ec4899] to-[#db2777]',

                ];

                $color =
                    $colors[$b->id % count($colors)];

    @endphp

    <button

@click="
window.dispatchEvent(
new CustomEvent(
'open-booking',
{
detail:{

lecturer:'{{ $b->user->name }}',

purpose:'{{ $b->purpose }}',

room:'{{ $room->room_name }}',

date:'{{ \Carbon\Carbon::parse($selectedDate)->format('d M Y') }}',

time:'{{ $slot }} - {{ date('H:i', strtotime($slot)+1800) }}'

}
}
))
"

class="absolute
       left-[2px]
       right-[2px]
       border-[2px]
       border-white/25
       rounded-[4px]
       shadow-sm
       text-left
       bg-gradient-to-br
       {{ $color }}
       hover:brightness-105
       transition-all
       cursor-pointer
       overflow-hidden"

        style="
            top:{{ $top }}px;
            height:{{ $height }}px;
        "

        <div class="h-full
            px-2
            flex
            items-start
            pt-1">

    <div class="w-full
                overflow-hidden">

        <div class="flex
                    items-center
                    gap-1">

            <div class="w-2
                        h-2
                        rounded-full
                        bg-white
                        shrink-0">
            </div>

            <h2 class="text-white
                       text-[10px]
                       font-semibold
                       truncate">

                {{ $b->purpose }}

            </h2>

        </div>

    </div>

</div>

    </button>

    @php

            }
        }
    }

    @endphp

    @if(!$bookingFound)

    @if($room->is_under_maintenance)

        <div class="absolute
                    inset-2
                    rounded-[18px]
                    bg-gradient-to-br
                    from-[#dc2626]
                    to-[#ef4444]
                    border-[3px]
                    border-white/30
                    shadow-xl
                    p-3
                    flex
                    flex-col
                    justify-between">

            <div>

                <div class="flex
                            items-center
                            gap-2">

                    <span class="text-xl">
                        ⚠
                    </span>

                    <h2 class="text-white
                               text-xs
                               font-black">

                        Under Maintenance

                    </h2>

                </div>

                <p class="text-white/90
                          text-[10px]
                          mt-2
                          leading-relaxed
                          font-semibold">

                    {{ $room->maintenance_note
                        ?? 'Maintenance in progress' }}

                </p>

            </div>

            @if($room->maintenance_until)

                <span class="text-white/80
                             text-[9px]
                             font-black">

                    Until:
                    {{ \Carbon\Carbon::parse(
                        $room->maintenance_until
                    )->format('d M Y') }}

                </span>

            @endif

        </div>

    @else

        {{-- AVAILABLE --}}
        <div class="absolute
                    inset-0
                    flex
                    items-center
                    justify-center">

            <span class="text-[#b49a78]
                         text-[11px]
                         font-black
                         opacity-40">

                Available

            </span>

        </div>

    @endif

@endif
</div>

        </td>

    @endforeach

</tr>

@endforeach

</tbody>

            </table>

        </div>

    </div>

</div>

{{-- MINIMAL CALENDAR MODAL --}}
<div
x-data="{

    open:false,

    lecturer:'',

    purpose:'',

    status:'',

    room:'',

    time:''

}"

@open-booking.window="

    open=true;

    lecturer=$event.detail.lecturer;

    purpose=$event.detail.purpose;

    status=$event.detail.status;

    room=$event.detail.room;

    time=$event.detail.time;
"

x-show="open"
x-transition
class="fixed
       inset-0
       z-[999]
       bg-black/20
       backdrop-blur-sm
       flex
       items-center
       justify-center"
style="display:none;">

    <div class="bg-white
                rounded-[26px]
                shadow-2xl
                w-[380px]
                overflow-hidden">

        {{-- TOP --}}
        <div class="px-5
                    pt-5
                    flex
                    justify-between
                    items-start">

            <div>

                <h2 class="text-[#222]
                           text-2xl
                           font-black"
                    x-text="purpose">
                </h2>

                <p class="text-gray-400
                          text-sm
                          mt-1"
                    x-text="room">
                </p>

            </div>

            <button
                @click="open=false"
                class="text-gray-400
                       hover:text-black
                       text-xl">

                ✕

            </button>

        </div>

        {{-- CONTENT --}}
        <div class="mt-4
                    border-t
                    border-gray-200">

            <div class="px-5 py-4
                        flex
                        justify-between">

                <span class="text-gray-500
                             text-sm">

                    Lecturer

                </span>

                <span class="font-semibold"
                      x-text="lecturer">
                </span>

            </div>

            <div class="px-5 py-4
                        border-t
                        border-gray-100
                        flex
                        justify-between">

                <span class="text-gray-500
                             text-sm">

                    Time

                </span>

                <span class="font-semibold"
                      x-text="time">
                </span>

            </div>

            <div class="px-5 py-4
                        border-t
                        border-gray-100
                        flex
                        justify-between">

                <span class="text-gray-500
                             text-sm">

                    Status

                </span>

                <span class="px-3
                             py-1
                             rounded-full
                             text-xs
                             font-bold
                             bg-[#e9f8ef]
                             text-[#16a34a]"
                      x-text="status">
                </span>

            </div>

        </div>

    </div>

</div>
{{-- BOOKING INFO POPUP --}}
<div

x-data="{

open:false,

lecturer:'',

purpose:'',

room:'',

date:'',

time:''

}"

x-on:open-booking.window="

open=true;

lecturer=$event.detail.lecturer;

purpose=$event.detail.purpose;

room=$event.detail.room;

date=$event.detail.date;

time=$event.detail.time;
"

x-show="open"

x-transition

class="fixed
       inset-0
       z-[999]
       bg-black/30
       backdrop-blur-sm
       flex
       items-center
       justify-center
       p-4"

style="display:none;">

    {{-- MODAL --}}
    <div class="bg-white
                w-full
                max-w-[420px]
                rounded-[22px]
                shadow-2xl
                overflow-hidden">

        {{-- TOP --}}
        <div class="px-5
                    py-4
                    border-b
                    border-gray-200
                    flex
                    justify-between
                    items-start">

            <div>

                <h2 class="text-[22px]
                           font-black
                           text-[#222]"
                    x-text="purpose">
                </h2>

                <p class="text-gray-400
                          text-sm
                          mt-1"
                    x-text="room">
                </p>

            </div>

            <button
                @click="open=false"
                class="text-gray-400
                       hover:text-black
                       text-xl">

                ✕

            </button>

        </div>

        {{-- CONTENT --}}
        <div class="p-5
                    space-y-4">

            <div>

                <p class="text-gray-400
                          text-xs
                          uppercase
                          font-bold">

                    Lecturer

                </p>

                <h2 class="font-semibold
                           text-[#222]"
                    x-text="lecturer">
                </h2>

            </div>

            <div>

                <p class="text-gray-400
                          text-xs
                          uppercase
                          font-bold">

                    Date

                </p>

                <h2 class="font-semibold
                           text-[#222]"
                    x-text="date">
                </h2>

            </div>

            <div>

                <p class="text-gray-400
                          text-xs
                          uppercase
                          font-bold">

                    Time

                </p>

                <h2 class="font-semibold
                           text-[#222]"
                    x-text="time">
                </h2>

            </div>

        </div>

    </div>

</div>
</x-app-layout>