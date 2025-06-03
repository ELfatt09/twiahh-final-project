<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Update Password') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div class="space-x-4 w-full flex">
            <div class="w-1/2">
                <label for="update_password_current_password" class="block text-sm font-medium text-gray-700">{{ __('Current Password') }}</label>
                <input id="update_password_current_password" name="current_password" type="password" class="mt-1 w-full px-4 py-2 border rounded-lg border-primary focus:outline-secondary" autocomplete="current-password">
                <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
            </div>

            <div class="w-1/2">
                <label for="update_password_password" class="block text-sm font-medium text-gray-700">{{ __('New Password') }}</label>
                <input id="update_password_password" name="password" type="password" class="mt-1 w-full px-4 py-2 border rounded-lg border-primary focus:outline-secondary" autocomplete="new-password">
                <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
            </div>
        </div>

        <div class="w-full">
            <label for="update_password_password_confirmation" class="block text-sm font-medium text-gray-700">{{ __('Confirm Password') }}</label>
            <input id="update_password_password_confirmation" name="password_confirmation" type="password" class="mt-1 w-full px-4 py-2 border rounded-lg border-primary focus:outline-secondary" autocomplete="new-password">
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center gap-4">
            <button type="submit" class="bg-primary text-black px-4 py-2 rounded-full border border-primary hover:bg-transparent hover:border-secondary hover:text-secondary transition duration-300">
                {{ __('Save') }}
            </button>

            @if (session('status') === 'password-updated')
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
