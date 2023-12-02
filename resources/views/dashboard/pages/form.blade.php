<x-app-layout>
    <x-slot name="page-form">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                
                <div id="page-form-wrap">

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
                    
                    <form action="{{ url('pages/create') }}" method="POST">
                        @csrf

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

                    </form>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
