@extends('layouts.app')

@section('dashboard')

<section class="wrapper narrow form" id="login-form">
    <div class="container">

        <h1>{{ __('Login') }}</h1>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div class="input-wrapper">
                <label for="email">{{ __('Email') }}</label>                <input id="email" type="email" name="email" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="input-wrapper">
                <label for="password">{{ __('Password') }}</label>
                <input id="password" type="password" name="password" required autocomplete="current-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Remember Me -->
            <div class="input-wrapper">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" name="remember">
                    <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div id="form-footer">
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" id="text-link">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <button type="submit">
                    {{ __('Log in') }}
                </button>
            </div>
        </form>
    </div>
</section>

@endsection
