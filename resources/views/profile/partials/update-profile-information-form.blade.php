<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-4 px-5" id="edit-form">
        @csrf
        @method('patch')

        <div class="space-x-4 w-full flex">
            <div class="w-full">
                <label class="block text-sm font-medium text-gray-700" for="name">{{ __('First Name') }}</label>
                <input id="name" name="name" type="text" class="mt-1 w-full px-4 py-2 border rounded-lg border-primary focus:outline-secondary" value="{{ old('name', $user->name) }}" required autofocus autocomplete="name">
                <x-input-error class="mt-2" :messages="$errors->get('name')" />
            </div>
        </div>

        <div class="space-x-4 w-full flex">
            <div class="w-full">
                <label class="block text-sm font-medium text-gray-700" for="email">{{ __('Gmail Address') }}</label>
                <input id="email" name="email" type="email" class="mt-1 w-full px-4 py-2 border rounded-lg border-primary focus:outline-secondary" value="{{ old('email', $user->email) }}" required autocomplete="username">
                <x-input-error class="mt-2" :messages="$errors->get('email')" />

                @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                    <div>
                        <p class="text-sm mt-2 text-gray-800">
                            {{ __('Your email address is unverified.') }}
                            <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                {{ __('Click here to re-send the verification email.') }}
                            </button>
                        </p>

                        @if (session('status') === 'verification-link-sent')
                            <p class="mt-2 font-medium text-sm text-green-600">
                                {{ __('A new verification link has been sent to your email address.') }}
                            </p>
                        @endif
                    </div>
                @endif
            </div>
        </div>

        <div class="flex items-center gap-4">
            <button type="submit" class="bg-primary text-black px-4 py-2 rounded-full border border-primary hover:bg-transparent hover:border-secondary hover:text-secondary transition duration-300">
                {{ __('Save') }}
            </button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>