<section>

    <header>

        <h2 class="text-lg
                   font-black
                   text-[#4b2e2e]">

            {{ __('Profile Information') }}

        </h2>

        <p class="mt-1
                  text-sm
                  text-[#7a6a58]
                  font-semibold">

            {{ __("Update your account's profile information and email address.") }}

        </p>

    </header>

    {{-- EMAIL VERIFICATION --}}
    <form id="send-verification"
          method="post"
          action="{{ route('verification.send') }}">

        @csrf

    </form>

    {{-- UPDATE PROFILE --}}
    <form method="post"
          action="{{ route('profile.update') }}"
          enctype="multipart/form-data"
          class="mt-6 space-y-6">

        @csrf
        @method('patch')

        {{-- NAME --}}
        <div>

            <x-input-label for="name"
                           :value="__('Name')" />

            <x-text-input id="name"
                          name="name"
                          type="text"

                          class="mt-2
                                 block
                                 w-full
                                 rounded-[14px]
                                 border-[3px]
                                 border-[#d6b16d]
                                 bg-[#fff8eb]
                                 text-[#4b2e2e]
                                 font-semibold"

                          :value="old('name', $user->name)"

                          required
                          autofocus
                          autocomplete="name" />

            <x-input-error class="mt-2"
                           :messages="$errors->get('name')" />

        </div>

        {{-- EMAIL --}}
        <div>

            <x-input-label for="email"
                           :value="__('Email')" />

            <x-text-input id="email"
                          name="email"
                          type="email"

                          class="mt-2
                                 block
                                 w-full
                                 rounded-[14px]
                                 border-[3px]
                                 border-[#d6b16d]
                                 bg-[#fff8eb]
                                 text-[#4b2e2e]
                                 font-semibold"

                          :value="old('email', $user->email)"

                          required
                          autocomplete="username" />

            <x-input-error class="mt-2"
                           :messages="$errors->get('email')" />

            {{-- EMAIL VERIFY --}}
            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())

                <div>

                    <p class="text-sm
                              mt-2
                              text-[#7a6a58]
                              font-semibold">

                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification"

                                class="underline
                                       text-sm
                                       text-[#7c3aed]
                                       font-black
                                       hover:text-[#6d28d9]">

                            {{ __('Click here to re-send the verification email.') }}

                        </button>

                    </p>

                    @if (session('status') === 'verification-link-sent')

                        <p class="mt-2
                                  font-black
                                  text-sm
                                  text-green-600">

                            {{ __('A new verification link has been sent to your email address.') }}

                        </p>

                    @endif

                </div>

            @endif

        </div>

        {{-- PROFILE PHOTO --}}
        <div>

            <x-input-label for="profile_photo"
                           :value="__('Profile Photo')" />

            <div class="mt-3
                        bg-[#fff8eb]
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

                    Upload Profile Picture

                </p>

                <p class="text-[#7a6a58]
                          text-xs
                          font-semibold
                          mt-1
                          mb-4">

                    JPG, JPEG or PNG only

                </p>

                <input type="file"
                       id="profile_photo"
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

            <x-input-error class="mt-2"
                           :messages="$errors->get('profile_photo')" />

        </div>

        {{-- SAVE --}}
        <div class="flex items-center gap-4">

            <button type="submit"

                    class="bg-gradient-to-r
                           from-[#7c3aed]
                           to-[#8b5cf6]
                           hover:scale-[1.01]
                           transition-all
                           duration-200
                           text-white
                           font-black
                           px-6
                           py-3
                           rounded-[14px]
                           border-[3px]
                           border-[#d6b16d]
                           shadow-lg">

                Save Profile

            </button>

            @if (session('status') === 'profile-updated')

                <p x-data="{ show: true }"
                   x-show="show"
                   x-transition
                   x-init="setTimeout(() => show = false, 2000)"

                   class="text-sm
                          font-black
                          text-green-600">

                    {{ __('Profile Updated Successfully.') }}

                </p>

            @endif

        </div>

    </form>

</section>