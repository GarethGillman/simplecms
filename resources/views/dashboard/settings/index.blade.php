@extends('layouts.app')

@section('dashboard')
                
<section class="wrapper form" id="settings-form">
    <div class="container">

        <h1>{{ ('Website Settings') }}</h1>

        @if( $errors->any() )
            <div class="alert error">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('success'))
            <div class="alert success">
                {{ session('success') }}
            </div>
        @endif
                    
        <form action="{{ route('settings.update') }}" method="POST">
            @csrf

            <div id="columns">
                <div id="left-col">
                    <div class="input-wrapper">
                        <label for="website_name">Website Name</label>
                        <input name="website_name" type="text" value="{{ $settings->website_name }}" />
                    </div>

                    <div class="input-wrapper">
                        <label for="registrations">Enable User Registrations</label>
                        <input name="registrations" type="checkbox" value="on" @if( $settings->registrations === 'true') checked @endif />
                    </div>

                    <div class="input-wrapper buttons">
                        <button type="submit">Update</button>
                    </div>
                </div>
            </form>
            
        </div>
    </section>
@endsection