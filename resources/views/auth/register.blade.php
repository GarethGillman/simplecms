@extends('layouts.app')

@section('dashboard')

<section class="register" id="pages-form-wrap">
    <div class="container">

        <h1>Register</h1>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div class="input-wrapper">
                <label for="name">{{ _('Name') }}</label>
                <input id="name" type="text" name="name" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div class="input-wrapper">
                <label for="email">{{ __('Email') }}</label>
                <input id="email" type="email" name="email" required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="input-wrapper">
                <label for="password">{{ __('Password') }}</label>
                <input id="password"  type="password" name="password" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="input-wrapper">
                <label for="password_confirmation">{{ __('Confirm Password') }}</label>
                <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>
            
            <div id="form-footer">
                <a href="{{ route('login') }}" id="text-link">
                    {{ __('Already registered?') }}
                </a>

                <button type="submit">
                    {{ __('Register') }}
                </button>
            </div>
        </form>
    </div>
</section>

@endsection

