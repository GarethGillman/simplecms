<x-app-layout>
    <x-slot name="page-form">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('404 Error') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                
                <div id="error-page">

                    <h1>{{ ('Error 404') }}</h1>
                    <p>This page doesn't exist, click the link below to go to the dashboard.</p>
                    <a class="button" href="{{ route('dashboard') }}">Dashboard</a>

                </div>

            </div>
        </div>
    </div>
</x-app-layout>
