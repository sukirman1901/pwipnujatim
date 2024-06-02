<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('New Article') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden p-10 shadow-sm sm:rounded-lg"> 
                @if($errors->any())
                    @foreach($errors->all() as $error)
                    <div class="py-3 w-full rounded-3xl bg-red-500 text-white">
                        {{$error}}
                    </div>
                    @endforeach
                @endif
                
                <form method="POST" action="{{route('admin.blogs.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="mt-4">
                        <x-input-label for="title" :value="__('Title')" />
                        <x-text-input name="title" id="title" cols="30" rows="5" class="mt-1 border border-slate-300 rounded-lg w-full"/>
                        <x-input-error :messages="$errors->get('title')" class="mt-2" />
                    </div>           

                    <div class="mt-4">
                        <meta name="upload-url" content="{{ route('ckeditor.upload') }}">
                        <meta name="csrf-token" content="{{ csrf_token() }}">
                        <x-input-label for="content" :value="__('Content')" />
                        <textarea name="content" id="contentEditor" cols="30" rows="5" class="mt-1 border border-slate-300 rounded-xl w-full"></textarea>
                        <x-input-error :messages="$errors->get('content')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="category_id" :value="__('Category')" />
                        
                        <select name="category_id" id="category_id" class="mt-1 py-3 rounded-lg pl-3 w-full border border-slate-300">
                            <option value="">Choose Category</option> 
                            @foreach ($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    
                        <x-input-error :messages="$errors->get('category_id')" class="mt-2" />
                    </div>
                    
                    <div class="mt-4">
                        <x-input-label for="author_id" :value="__('Author')" />
                        
                        <select name="author_id" id="author_id" class="mt-1 py-3 rounded-lg pl-3 w-full border border-slate-300">
                            <option value="">Choose Author</option> 
                            @foreach ($authors as $author)
                            <option value="{{$author->id}}">{{$author->name}}</option>
                            @endforeach
                        </select>
                    
                        <x-input-error :messages="$errors->get('author_id')" class="mt-2" />
                    </div>
                    

                    <div class="mt-4">
                        <x-input-label for="thumbnail" :value="__('Thumbnail')" />
                        <x-text-input id="thumbnail" class="block mt-1 w-full" type="file" name="thumbnail" required autofocus autocomplete="thumbnail" />
                        <x-input-error :messages="$errors->get('thumbnail')" class="mt-2" />
                    </div> 

                    <div class="flex items-center justify-end mt-4">
                        <button type="submit" class="font-bold py-4 px-6 bg-indigo-700 text-white rounded-full">
                            Add New Article
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>
    <script src="{{ asset('js/ckeditor.js') }}"></script>
</x-app-layout>
