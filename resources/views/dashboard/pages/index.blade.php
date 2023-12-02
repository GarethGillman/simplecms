<x-app-layout>
    <x-slot name="page-form">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                
                <div id="page-table">

                    <div id="page-header">

                        <h1>{{ ('Current Pages') }}</h1>
                        <a class="button" href="{{ url('dashboard/pages/new') }}">Create Page</a>
                    </div>

                    @if( $pages )
                        <table class="admin-table">
                            <thead>
                                <th>Title</th>
                                <th>Slug</th>
                                <th>Seo Title</th>
                                <th>Seo Description</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </thead>
                            <tbody>
                                @foreach( $pages as $page )
                                    <tr>
                                        <td>{{ $page->title }}</td>
                                        <td>{{ $page->slug }}</td>
                                        <td>{{ $page->seotitle }}</td>
                                        <td>{{ $page->seodesc }}</td>
                                        <td>{{ $page->status }}</td>
                                        <td id="actions-row">
                                            <a href="{{ url('dashboard/pages/edit', $page->id) }}">Edit</a>
                                            <a href="{{ url('dashboard/pages/delete', $page->id) }}">Delete</a>
                                            <a href="{{ url('page', $page->slug) }}" target="_blank">View</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif

                </div>

            </div>
        </div>
    </div>
</x-app-layout>
