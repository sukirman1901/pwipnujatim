<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Manage Events') }}
            </h2>
            <a href="{{route('admin.events.create')}}" class="font-bold py-4 px-6 bg-indigo-700 text-white rounded-full">
                Add New
            </a>
        </div>
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-10 flex flex-col gap-y-5">
                @forelse($events as $event)
                <div class="item-card flex flex-row justify-between items-center">
                    <div class="flex flex-row items-center gap-x-5">
                        <img src="{{Storage::url($event->thumbnail)}}" alt="" class="rounded-2xl object-cover w-[90px] h-[90px]">
                        <div class="flex flex-col">
                            <p class="text-slate-500 text-sm">Event Name</p>
                            <h3 class="text-indigo-950 text-xl font-bold">{{ \Illuminate\Support\Str::limit($event->name, $limit = 20, $end = '...') }}</h3>
                        </div>
                    </div>

                    <div  class="hidden md:flex flex-col">
                        <p class="text-slate-500 text-sm">Organizer</p>
                        <h3 class="text-indigo-950 text-xl font-bold">{{$event->client ? $event->client->name : 'Null'}}</h3>
                    </div>

                    <div  class="hidden md:flex flex-col">
                        <p class="text-slate-500 text-sm">Event Date</p>
                        <h3 class="text-indigo-950 text-xl font-bold">{{$event->event_date}}</h3>
                    </div>

                    <div class="hidden md:flex flex-row items-center gap-x-3">
                        <a href="{{route('admin.events.edit', $event)}}" class="font-bold py-4 px-6 bg-indigo-700 text-white rounded-full">
                            Edit
                        </a>
                        <form action="{{route('admin.events.destroy', $event)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="font-bold py-4 px-6 bg-red-700 text-white rounded-full">
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
                @empty
                <p>Belum tersedia data terbaru</p>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>
