@extends('layouts.app')

@section('dashboard')

<section class="wrapper" id="error-page">
    <div class="container">

        <h1>{{ ('Error 404') }}</h1>
        <p>This page doesn't exist, click the link below to go to a relevant place.</p>

        @if( str_contains( url()->current(), '/dashboard' ) )
            <a class="button" href="{{ route('dashboard') }}">Dashboard</a>
        @else
            <a class="button" href="{{ url('/') }}">Home</a>
        @endif
        
    </div>
</section>

@endsection