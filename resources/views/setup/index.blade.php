@extends('layouts.app')

@section('dashboard')
                
<section class="wrapper form narrow" id="setup-wrapper">
    <div class="container">
        <h1>{{ __('Welcome to SimpleCMS') }}</h1>
        <p>{{ __('Lets get your journey with SimpleCMS started with these quick questions') }}</p>

        <form action="{{ route('setup.save') }}" method="post">
            @csrf

            <input name="setup" type="hidden" value="false" />

            <div class="input-wrapper">
                <label for="settings_website_name">Website Name</label>
                <input name="settings_website_name" type="text" />
            </div>

            <div class="input-wrapper">
                <label for="setting_registrations">Registrations</label>
                <select name="setting_registrations">
                    <option hidden selected>Select an option</option>
                    <option value="off">Off</option>
                    <option value="on">On</option>
                </select>
            </div>

            <!-- Name -->
            <div class="input-wrapper">
                <label for="name">{{ _('Admin Username') }}</label>
                <input id="name" type="text" name="name" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div class="input-wrapper">
                <label for="email">{{ __('Admin Email') }}</label>
                <input id="email" type="email" name="email" required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="input-wrapper">
                <label for="password">{{ __('Password') }}</label>
                <input id="userpw"  type="text" name="password" required autocomplete="new-password" value="" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="input-wrapper">
                <label for="password_confirmation">{{ __('Confirm Password') }}</label>
                <input id="userpw_confirm" type="text" name="password_confirmation" required autocomplete="new-password" value="" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <button type="submit">{{ __('Get Started') }}</button>

        </form>
    </div>
</section>

@endsection