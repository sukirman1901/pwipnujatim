<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('New FAQ') }}
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
                
                <form method="POST" action="{{route('admin.faqs.store')}}" enctype="multipart/form-data">
                    @csrf

                    <div>
                        <x-input-label for="question" :value="__('Question')" />
                        <x-text-input id="question" class="block mt-1 w-full" type="text" name="question" :value="old('question')" required autofocus autocomplete="question" />
                        <x-input-error :messages="$errors->get('question')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="answer" :value="__('Answer')" />
                        <textarea id="answer" class="block mt-1 w-full rounded-md" type="text" name="answer" :value="old('answer')" required autofocus autocomplete="answer"></textarea>
                        <x-input-error :messages="$errors->get('answer')" class="mt-2" />
                    </div> 

                    <div class="flex items-center justify-end mt-4">
            
                        <button type="submit" class="font-bold py-4 px-6 bg-indigo-700 text-white rounded-full">
                            Add New Faq
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
