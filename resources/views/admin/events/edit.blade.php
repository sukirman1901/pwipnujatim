<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Testimonial') }}
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
                
                <form method="POST" action="{{route('admin.events.update', $event)}}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mt-4">
                        <x-input-label for="name" :value="__('Name Event')" />
                        <x-text-input name="name" value="{{$event->name}}" id="name" cols="30" rows="5" class="block mt-1 w-full"/>
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <label for="event_date" class="block font-medium text-sm text-gray-700">Event Date</label>
                        <input type="date" name="event_date" value="{{ \Carbon\Carbon::parse($event->event_date)->format('Y-m-d') }}" id="event_date" class="mt-1 border border-gray-300 rounded-lg w-full"/>
                        @error('event_date')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mt-4">
                        <x-input-label for="event_client" :value="__('Event Organizer')" />
                        
                        <select name="event_client_id" id="event_client_id" class="mt-1 py-3 rounded-lg pl-3 w-full border border-slate-300">
                            <option value="">Choose Event Organizer</option>
                            @foreach($clients as $client)
                                <option value="{{ $client->id }}" {{ $client->id ? 'selected' : '' }}>{{ $client->name }}</option>
                            @endforeach
                        </select>
                        

                        <x-input-error :messages="$errors->get('project_client')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="summary" :value="__('Summary')" />
                        <textarea name="summary" id="summary" cols="30" rows="5" class="mt-1 border border-slate-300 rounded-xl w-full">{{ old('summary', $event->summary) }}</textarea>
                        <x-input-error :messages="$errors->get('summary')" class="mt-2" />
                    </div>                    

                    <div class="mt-4">
                        <x-input-label for="thumbnail" :value="__('Thumbnail')" />
                        <img src="{{Storage::url($event->thumbnail)}}" alt="" class="rounded-2xl object-cover w-[90px] h-[90px]">
                        <x-text-input id="thumbnail" class="block mt-1 w-full" type="file" name="thumbnail" autofocus autocomplete="thumbnail" />
                        <x-input-error :messages="$errors->get('thumbnail')" class="mt-2" />
                    </div> 

                    <div class="flex items-center justify-end mt-4">
            
                        <button type="submit" class="font-bold py-4 px-6 bg-indigo-700 text-white rounded-full">
                            Update Event
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
