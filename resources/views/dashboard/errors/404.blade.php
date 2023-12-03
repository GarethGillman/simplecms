@extends('layouts.app')

@section('dashboard')

<section class="error-404" id="error-page">
    <div class="container">

        <h1>{{ ('Error 404') }}</h1>
        <p>This page doesn't exist, click the link below to go to the dashboard.</p>
        <a class="button" href="{{ route('dashboard') }}">Dashboard</a>
        
    </div>
</section>

@endsection