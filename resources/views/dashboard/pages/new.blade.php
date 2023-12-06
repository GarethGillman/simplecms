@extends('layouts.app')

@section('dashboard')

<section class="wrapper form" id="pages-form">
    <div class="container">
                
        <h1>{{ ('New Page') }}</h1>

        @if( $errors->any() )
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
                    
        <form action="{{ route('pages.create') }}" method="POST">
            @csrf

            <div id="columns">
                <div id="left-col">
                    <div class="input-wrapper">
                        <label for="page_title">Page Title</label>
                        <input name="page_title" placeholder="Enter your page title" type="text" />
                    </div>

                    <div class="input-wrapper">
                        <label for="page_content">Page Content</label>
                        <textarea name="page_content"></textarea>
                    </div>
                </div>
                        
                <div id="right-col">
                    <div class="input-wrapper" id="pageslug-wrapper">
                        <label for="page_urlslug">URL Slug</label>
                        <input id="page_urlslug" name="page_urlslug" type="text" />
                    </div>

                    <div class="input-wrapper">
                        <label for="page_seotitle">SEO Title</label>
                        <input name="page_seotitle" type="text" />
                    </div>

                    <div class="input-wrapper">
                        <label for="page_seodesc">SEO Description</label>
                        <textarea name="page_seodesc"></textarea>
                    </div>

                    <div class="input-wrapper">
                        <label for="page_status">Status</label>
                        <select id="page-status" name="page_status">
                            <option hidden selected>Select an option</option>
                            <option value="draft">Draft</option>
                            <option value="published">Published</option>
                        </select>
                    </div>

                    <div class="input-wrapper buttons">
                        <button id="submit-btn" type="submit">Draft</button>
                    </div>
                </div>
            </div>

        </form>
    
    </div>
</section>

@endsection