<nav class="w-[230px]
            min-h-screen
            bg-gradient-to-b
            from-[#24110c]
            via-[#1a0c08]
            to-[#120705]
            border-r-[4px]
            border-[#5c311c]
            shadow-2xl
            flex flex-col">

    {{-- LOGO PANEL --}}
    <div class="p-3">

        <div class="bg-[#ead7b1]
                    border-[4px]
                    border-[#c89b5d]
                    rounded-[22px]
                    p-4
                    shadow-[0_6px_20px_rgba(0,0,0,0.35)]">

            {{-- LOGO --}}
            <div class="flex
                        items-center
                        justify-center">

                <div class="w-16
                            h-16
                            rounded-[18px]
                            bg-gradient-to-b
                            from-[#8b5cf6]
                            to-[#6d28d9]
                            border-[4px]
                            border-[#e7c67a]
                            shadow-xl
                            flex
                            items-center
                            justify-center">

                    <span class="text-white
                                 text-3xl
                                 font-black">

                        RM

                    </span>

                </div>

            </div>

            {{-- TITLE --}}
            <div class="text-center mt-3">

                <h1 class="text-[#4b2e2e]
                           text-2xl
                           font-black">

                    RoomMania

                </h1>

                <p class="text-[#7a6a58]
                          text-xs
                          font-semibold
                          mt-1">

                    Smart Facility Booking

                </p>

            </div>

        </div>

    </div>

    {{-- MENU --}}
    <div class="flex-1
                px-3
                space-y-2
                overflow-y-auto">

        {{-- DASHBOARD --}}
        <a href="{{ route('dashboard') }}"
           class="flex
                  items-center
                  gap-3
                  px-4
                  py-3
                  rounded-[18px]
                  border-[3px]
                  shadow-lg
                  transition-all
                  duration-200
                  font-black
                  text-white

                  {{ request()->routeIs('dashboard')
                        ? 'bg-gradient-to-r from-[#7c3aed] to-[#8b5cf6] border-[#d6b16d]'
                        : 'bg-[#3a1f16] border-[#5c311c] hover:bg-[#512d21] hover:translate-x-1'
                  }}">

            <span class="text-xl">
                🏠
            </span>

            <span class="text-base">
                Dashboard
            </span>

        </a>

        {{-- LECTURER MENU --}}
@if(auth()->user()->role == 'lecturer')

    {{-- BOOK ROOM --}}
    <a href="{{ route('availability') }}"
       class="flex items-center gap-3 px-4 py-3 rounded-[18px]
              border-[3px] shadow-lg transition-all duration-200
              font-black text-white

              {{ request()->routeIs('availability')
                    ? 'bg-gradient-to-r from-[#2563eb] to-[#3b82f6] border-[#d6b16d]'
                    : 'bg-[#3a1f16] border-[#5c311c] hover:bg-[#512d21] hover:translate-x-1'
              }}">

        <span class="text-xl">🚪</span>

        <span class="text-base">
            Book Room
        </span>

    </a>

    {{-- SCHEDULE --}}
    <a href="{{ route('room.schedule') }}"
       class="flex items-center gap-3 px-4 py-3 rounded-[18px]
              border-[3px] shadow-lg transition-all duration-200
              font-black text-white

              {{ request()->routeIs('room.schedule')
                    ? 'bg-gradient-to-r from-[#f59e0b] to-[#f97316] border-[#d6b16d]'
                    : 'bg-[#3a1f16] border-[#5c311c] hover:bg-[#512d21] hover:translate-x-1'
              }}">

        <span class="text-xl">📅</span>

        <span class="text-base">
            Schedule
        </span>

    </a>

    {{-- HISTORY --}}
    <a href="{{ route('booking.history') }}"
       class="flex items-center gap-3 px-4 py-3 rounded-[18px]
              border-[3px] shadow-lg transition-all duration-200
              font-black text-white

              {{ request()->routeIs('booking.history')
                    ? 'bg-gradient-to-r from-[#16a34a] to-[#22c55e] border-[#d6b16d]'
                    : 'bg-[#3a1f16] border-[#5c311c] hover:bg-[#512d21] hover:translate-x-1'
              }}">

        <span class="text-xl">📋</span>

        <span class="text-base">
            History
        </span>

    </a>

    {{-- REPORT ISSUE --}}
    <a href="{{ route('facility.report.create') }}"
       class="flex items-center gap-3 px-4 py-3 rounded-[18px]
              border-[3px] shadow-lg transition-all duration-200
              font-black text-white

              {{ request()->routeIs('facility.report.create')
                    ? 'bg-gradient-to-r from-[#ef4444] to-[#dc2626] border-[#d6b16d]'
                    : 'bg-[#3a1f16] border-[#5c311c] hover:bg-[#512d21] hover:translate-x-1'
              }}">

        <span class="text-xl">🛠️</span>

        <span class="text-base">
            Report Issue
        </span>

    </a>

@endif

{{-- ADMIN MENU --}}
@if(auth()->user()->role == 'admin')

    <div class="pt-2">

        <p class="text-[#c89b5d]
                  text-[10px]
                  font-black
                  uppercase
                  tracking-[3px]
                  px-2
                  mb-2">

            Administration

        </p>

    </div>

    {{-- MANAGE ROOMS --}}
    <a href="{{ route('rooms.index') }}"
       class="flex items-center gap-3 px-4 py-3 rounded-[18px]
              border-[3px] shadow-lg transition-all duration-200
              font-black text-white

              {{ request()->routeIs('rooms.*')
                    ? 'bg-gradient-to-r from-[#06b6d4] to-[#0891b2] border-[#d6b16d]'
                    : 'bg-[#3a1f16] border-[#5c311c] hover:bg-[#512d21] hover:translate-x-1'
              }}">

        <span class="text-xl">🏢</span>

        <span class="text-base">
            Rooms
        </span>

    </a>

    {{-- BOOKING REQUESTS --}}
    <a href="{{ route('admin.bookings') }}"
       class="flex items-center gap-3 px-4 py-3 rounded-[18px]
              border-[3px] shadow-lg transition-all duration-200
              font-black text-white

              {{ request()->routeIs('admin.bookings')
                    ? 'bg-gradient-to-r from-[#22c55e] to-[#16a34a] border-[#d6b16d]'
                    : 'bg-[#3a1f16] border-[#5c311c] hover:bg-[#512d21] hover:translate-x-1'
              }}">

        <span class="text-xl">✅</span>

        <span class="text-base">
            Requests
        </span>

    </a>

    {{-- FACILITY REPORTS --}}
    <a href="{{ route('facility.reports') }}"
       class="flex items-center gap-3 px-4 py-3 rounded-[18px]
              border-[3px] shadow-lg transition-all duration-200
              font-black text-white

              {{ request()->routeIs('facility.reports')
                    ? 'bg-gradient-to-r from-[#f97316] to-[#ea580c] border-[#d6b16d]'
                    : 'bg-[#3a1f16] border-[#5c311c] hover:bg-[#512d21] hover:translate-x-1'
              }}">

        <span class="text-xl">🔧</span>

        <span class="text-base">
            Reports
        </span>

    </a>

@endif

    </div>

    {{-- PROFILE PANEL --}}
    <div class="p-3">

        <div class="bg-[#ead7b1]
                    border-[4px]
                    border-[#c89b5d]
                    rounded-[22px]
                    p-3
                    shadow-[0_6px_20px_rgba(0,0,0,0.35)]">

            {{-- USER --}}
            <div class="flex items-center gap-3">

                {{-- AVATAR --}}
                <div class="w-12
                            h-12
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

                    <span class="text-white
                                 text-xl
                                 font-black">

                        {{ strtoupper(substr(auth()->user()->name,0,1)) }}

                    </span>

                </div>

                {{-- INFO --}}
                <div class="overflow-hidden">

                    <h2 class="text-[#4b2e2e]
                               font-black
                               text-sm
                               truncate">

                        {{ auth()->user()->name }}

                    </h2>

                    <p class="text-[#7a6a58]
                              text-xs
                              font-semibold">

                        {{ ucfirst(auth()->user()->role) }}

                    </p>

                </div>

            </div>

            {{-- BUTTONS --}}
            <div class="grid grid-cols-2 gap-2 mt-3">

                {{-- PROFILE --}}
                <a href="{{ route('profile.edit') }}"
                   class="bg-gradient-to-r
                          from-[#2563eb]
                          to-[#3b82f6]
                          hover:scale-[1.03]
                          transition-all
                          duration-200
                          text-white
                          text-center
                          py-2.5
                          rounded-[14px]
                          text-sm
                          font-black
                          shadow-lg">

                    Profile

                </a>

                {{-- LOGOUT --}}
                <form method="POST"
                      action="{{ route('logout') }}">

                    @csrf

                    <button type="submit"
                            class="w-full
                                   bg-gradient-to-r
                                   from-red-500
                                   to-red-600
                                   hover:scale-[1.03]
                                   transition-all
                                   duration-200
                                   text-white
                                   py-2.5
                                   rounded-[14px]
                                   text-sm
                                   font-black
                                   shadow-lg">

                        Logout

                    </button>

                </form>

            </div>

        </div>

    </div>

</nav>