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

            <button type="submit">{{ __('Get Started') }}</button>

        </form>
    </div>
</section>

@endsection