<h2>{{ __('Update Password') }}</h2>

<p>{{ __('Ensure your account is using a long, random password to stay secure.') }}</p>

<form method="post" action="{{ route('password.update') }}">
    @csrf
    @method('put')

    <div class="input-wrapper">
        <label for="update_password_current_password">{{ __('Current Password') }}</label>
        <input id="update_password_current_password" name="current_password" type="password" autocomplete="current-password" />
        <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
    </div>

    <div class="input-wrapper">
        <label for="update_password_password">{{ __('New Password') }}</label>
        <input id="update_password_password" name="password" type="password" autocomplete="new-password" />
        <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
    </div>

    <div class="input-wrapper">
        <label for="update_password_password_confirmation">{{ __('Confirm Password') }}</label>
        <input id="update_password_password_confirmation" name="password_confirmation" type="password" autocomplete="new-password" />
        <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
    </div>

    <div id="form-footer">
        <button>{{ __('Save') }}</button>

        @if (session('status') === 'password-updated')
            <p
                x-data="{ show: true }"
                x-show="show"
                x-transition
                x-init="setTimeout(() => show = false, 2000)"
            >{{ __('Saved.') }}</p>
        @endif
    </div>
</form>