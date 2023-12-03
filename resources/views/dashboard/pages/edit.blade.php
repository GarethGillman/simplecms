@extends('layouts.app')

@section('dashboard')
                
<section class="wrapper form" id="pages-form">
    <div class="container">

        <h1>{{ ('Edit Page') }}</h1>

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
                    
        <form action="{{ url('dashboard/pages/update', $page->id) }}" method="POST">
            @csrf

            <input name="page_id" type="hidden" value="{{ $page->id }}" />

            <div id="columns">
                <div id="left-col">
                    <div class="input-wrapper">
                        <label for="page_title">Page Title</label>
                            <input name="page_title" placeholder="Enter your page title" type="text" value="{{ $page->title }}" />
                        </div>

                        <div class="input-wrapper">
                            <label for="page_content">Page Content</label>
                            <textarea name="page_content">{{ $page->content }}</textarea>
                        </div>
                    </div>
                        
                    <div id="right-col">
                        <div class="input-wrapper" id="pageslug-wrapper">
                            <label for="page_urlslug">URL Slug</label>
                            <input id="page_urlslug" name="page_urlslug" type="text" value="{{ $page->slug }}"/>
                        </div>

                        <div class="input-wrapper">
                            <label for="page_seotitle">SEO Title</label>
                            <input name="page_seotitle" type="text" value="{{ $page->seotitle }}" />
                        </div>

                        <div class="input-wrapper">
                            <label for="page_seodesc">SEO Description</label>
                            <textarea name="page_seodesc">{{ $page->seodesc }}</textarea>
                        </div>

                        <div class="input-wrapper">
                            <label for="page_status">Status</label>
                            <select name="page_status">
                                <option @if( $page->status == 'draft' ) selected @endif value="draft">Draft</option>
                                <option @if( $page->status == 'published' ) selected @endif value="published">Published</option>
                            </select>
                        </div>

                        <div class="input-wrapper buttons">
                            <button type="submit">Update</button>
                        </div>
                    </div>
                </div>
            </form>
            
        </div>
    </section>
@endsection