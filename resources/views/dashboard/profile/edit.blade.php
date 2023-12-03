@extends('layouts.app')

@section('dashboard')
                
<section class="wrapper form" id="profile-form">
    <div class="container">

        <h1>{{ ('Edit Profile') }}</h1>

        <div id="columns">
            <div id="left-col">
                @include('dashboard.profile.partials.update-profile-information-form')
            </div>

            <div id="right-col">
                @include('dashboard.profile.partials.update-password-form')
            
                <div id="delete-user-form">
                    @include('dashboard.profile.partials.delete-user-form')
                </div>
            </div>
        </div>

    </div>
</section>

@endsection
