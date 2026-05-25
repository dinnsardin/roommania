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
                            🛠️
                        </span>

                    </div>

                    {{-- TEXT --}}
                    <div>

                        <p class="text-[#d8b67a]
                                  text-[11px]
                                  font-bold
                                  tracking-wide">

                            FACILITY MAINTENANCE

                        </p>

                        <h1 class="text-white
                                   text-2xl
                                   font-black
                                   mt-1">

                            Submit Facility Report

                        </h1>

                        <p class="text-[#e8d7b8]
                                  text-xs
                                  mt-1
                                  font-semibold">

                            Report damaged facilities and maintenance issues.

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
                        🔧
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

        {{-- FORM PANEL --}}
        <div class="col-span-12
                    bg-[#ecdab7]
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

                <h2 class="text-white
                           text-lg
                           font-black">

                    Maintenance Report Form

                </h2>

            </div>

            {{-- BODY --}}
            <div class="p-3">

            {{-- SUCCESS MESSAGE --}}
@if(session('success'))

    <div class="mb-4
                bg-green-500
                text-white
                border-[3px]
                border-green-600
                rounded-[16px]
                px-4
                py-3
                shadow-lg">

        <div class="flex
                    items-center
                    gap-3">

            <span class="text-2xl">
                ✅
            </span>

            <div>

                <h2 class="font-black
                           text-sm">

                    Report Submitted Successfully

                </h2>

                <p class="text-xs
                          font-semibold
                          mt-1">

                    Admin will review the facility issue.

                </p>

            </div>

        </div>

    </div>

@endif
                <form method="POST"
      action="{{ route('facility.report.store') }}"
      enctype="multipart/form-data">

    @csrf

    {{-- ROOM --}}
    <div class="mb-4">

        <label class="block
                     text-[#4b2e2e]
                     font-black
                     text-sm
                     mb-2">

            Select Room

        </label>

        <select name="room_id"

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
                       focus:border-[#ea580c]"

                required>

            <option value="">
                Choose Room
            </option>

            @foreach($rooms as $room)

                <option value="{{ $room->id }}">

                    {{ $room->room_name }}
                    ({{ $room->room_type }})

                </option>

            @endforeach

        </select>

    </div>

    {{-- ISSUE TITLE --}}
    <div class="mb-4">

        <label class="block
                     text-[#4b2e2e]
                     font-black
                     text-sm
                     mb-2">

            Issue Title

        </label>

        <input type="text"
               name="issue_title"

               placeholder="Example: Projector Not Working"

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
                      focus:border-[#ea580c]"

               required>

    </div>

    {{-- ISSUE DESCRIPTION --}}
    <div class="mb-4">

        <label class="block
                     text-[#4b2e2e]
                     font-black
                     text-sm
                     mb-2">

            Issue Description

        </label>

        <textarea name="issue_description"
                  rows="6"

                  placeholder="Describe the facility issue in detail..."

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
                         focus:border-[#ea580c]
                         resize-none"

                  required></textarea>

    </div>

    {{-- IMAGE UPLOAD --}}
    <div class="mb-5">

        <label class="block
                     text-[#4b2e2e]
                     font-black
                     text-sm
                     mb-2">

            Upload Evidence Photo

        </label>

        <div class="bg-[#fff8eb]
                    border-[3px]
                    border-dashed
                    border-[#d6b16d]
                    rounded-[16px]
                    p-5
                    text-center">

            <div class="text-5xl">
                📸
            </div>

            <p class="text-[#4b2e2e]
                      font-black
                      text-sm
                      mt-3">

                Upload Facility Evidence

            </p>

            <p class="text-[#7a6a58]
                      text-xs
                      font-semibold
                      mt-1
                      mb-4">

                JPG, JPEG or PNG only

            </p>

            <input type="file"
                   name="issue_image"
                   accept="image/*"

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
                          file:from-[#ea580c]
                          file:to-[#fb923c]
                          file:text-white
                          file:font-black
                          cursor-pointer">

        </div>

    </div>

    {{-- BUTTON --}}
    <div>

        <button type="submit"

                class="w-full
                       bg-gradient-to-r
                       from-[#ea580c]
                       to-[#fb923c]
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

            Submit Facility Report

        </button>

    </div>

</form>
{{-- MY REPORTS --}}
<div class="mt-6">

    {{-- HEADER --}}
    <div class="bg-gradient-to-r
                from-[#c2410c]
                to-[#ea580c]
                px-4
                py-2.5
                rounded-t-[18px]">

        <h2 class="text-white
                   text-lg
                   font-black">

            My Submitted Reports

        </h2>

    </div>

    {{-- BODY --}}
    <div class="bg-[#fff8eb]
                border-[3px]
                border-[#d6b16d]
                border-t-0
                rounded-b-[18px]
                p-3
                space-y-3">

        @forelse(
            \App\Models\FacilityReport::where(
                'user_id',
                auth()->id()
            )->latest()->get()
            as $report
        )

            <div class="bg-white
                        border-[3px]
                        border-[#d6b16d]
                        rounded-[16px]
                        p-3
                        shadow-md">

                <div class="grid grid-cols-12 gap-3">

                    {{-- IMAGE --}}
                    <div class="col-span-2">

                        @if($report->issue_image)

                            <img
                                src="{{ asset(
                                    'storage/'.$report->issue_image
                                ) }}"

                                class="w-full
                                       h-20
                                       object-cover
                                       rounded-[12px]
                                       border-[3px]
                                       border-[#d6b16d]">

                        @else

                            <div class="w-full
                                        h-20
                                        rounded-[12px]
                                        bg-[#ecdab7]
                                        flex
                                        items-center
                                        justify-center">

                                📷

                            </div>

                        @endif

                    </div>

                    {{-- DETAILS --}}
                    <div class="col-span-7">

                        <h2 class="text-[#4b2e2e]
                                   font-black
                                   text-sm">

                            {{ $report->issue_title }}

                        </h2>

                        <p class="text-[#7a6a58]
                                  text-xs
                                  mt-1
                                  font-semibold">

                            {{ $report->room->room_name }}

                        </p>

                        <p class="text-[#7a6a58]
                                  text-xs
                                  mt-2">

                            {{ $report->issue_description }}

                        </p>

                    </div>

                    {{-- STATUS --}}
                    <div class="col-span-3">

                        @if($report->status=='Pending')

                            <div class="bg-orange-500
                                        text-white
                                        text-center
                                        py-2
                                        rounded-full
                                        text-[10px]
                                        font-black">

                                Pending

                            </div>

                        @elseif($report->status=='Resolved')

                            <div class="bg-green-500
                                        text-white
                                        text-center
                                        py-2
                                        rounded-full
                                        text-[10px]
                                        font-black">

                                Resolved

                            </div>

                        @else

                            <div class="bg-red-500
                                        text-white
                                        text-center
                                        py-2
                                        rounded-full
                                        text-[10px]
                                        font-black">

                                Rejected

                            </div>

                        @endif
{{-- DELETE --}}
<div class="col-span-12
            mt-3">

    <form
        method="POST"
        action="{{ route(
            'facility.report.destroy',
            $report
        ) }}"

        onsubmit="return confirm(
        'Delete this report?'
        )">

        @csrf
        @method('DELETE')

        <button
            class="bg-red-500
                   hover:bg-red-600
                   text-white
                   px-4
                   py-2
                   rounded-[12px]
                   text-xs
                   font-black
                   shadow-md">

            Delete Report

        </button>

    </form>

</div>
                    </div>

                </div>

            </div>

        @empty

            <div class="text-center
                        py-8">

                <div class="text-5xl">
                    🛠️
                </div>

                <p class="text-[#7a6a58]
                          font-semibold
                          mt-3">

                    No submitted reports yet.

                </p>

            </div>

        @endforelse

    </div>

</div>
            </div>

        </div>

    </div>

</div>

</x-app-layout>