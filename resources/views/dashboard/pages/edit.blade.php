<x-app-layout>
    <x-slot name="page-form">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Page') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                
                <div id="page-form-wrap">

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

                    </form>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
