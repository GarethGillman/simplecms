@extends('layouts.app')

@section('dashboard')

<section id="pages-index">
    <div class="container">
                
        <div id="page-header">
            <h1>{{ ('Current Pages') }}</h1>
            <a class="button" href="{{ url('dashboard/pages/new') }}">Create Page</a>
        </div>

        @if( $pages )
            <div id="table-wrapper">
                <table id="pages-table">
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
                                    @if( $page->status == 'published' )
                                        <a href="{{ url('page', $page->slug) }}" target="_blank">View</a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif

    </div>

</section>

@endsection