@extends('layouts.app')

@section('dashboard')

<section class="wrapper form" id="forgot-pw">
    <div class="container">

        <h1>{{ __('Forgot Password') }}</h1>
        <p>{{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}</p>

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- Email Address -->
            <div class="input-wrapper">
                <label for="email">{{ __('Email') }}</label>
                <input id="email" type="email" name="email" required autofocus />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div id="form-footer">
                <button type="submit">
                    {{ __('Email Password Reset Link') }}
                </button>
            </div>
        </form>
    </div>
</section>

@endsection
