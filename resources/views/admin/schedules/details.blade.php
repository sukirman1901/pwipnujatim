<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Details Booking') }}
            </h2>
        </div>
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-10 flex flex-col gap-y-5">
                <div class="item-card flex flex-row justify-between items-center">
                    <div class="flex flex-row items-center gap-x-3">
                        <img src="{{Storage::url($schedule->thumbnail)}}" alt="" class="rounded-2xl object-cover w-[120px] h-[90px]">
                        <div class="flex flex-col">
                            <p class="text-slate-500 text-sm">Event Name</p>
                            <h3 class="text-indigo-950 text-xl font-bold">{{$schedule->event_name}}</h3>
                        </div>
                    </div>  
                </div>

                <hr class="my-5">

                <div class="grid grid-cols-2 gap-5">
                    <div class="flex flex-col gap-y-4">
                        <div class="flex flex-col">
                            <p class="text-slate-500 text-sm">PIC Name</p>
                            <h3 class="text-indigo-950 text-xl font-bold">
                                {{$schedule->name}}
                            </h3>
                        </div>
        
                        <div class="flex flex-col">
                            <p class="text-slate-500 text-sm">Email</p>
                            <h3 class="text-indigo-950 text-xl font-bold">
                                {{$schedule->email}}
                            </h3>
                        </div>
        
                        <div class="flex flex-col">
                            <p class="text-slate-500 text-sm">Phone</p>
                            <h3 class="text-indigo-950 text-xl font-bold">
                                {{$schedule->phone_number}}
                            </h3>
                        </div>
                    </div>
                    <div class="flex flex-col gap-y-4">
                        <div class="flex flex-col">
                            <p class="text-slate-500 text-sm">Summary</p>
                            <h3 class="text-indigo-950 text-xl font-bold">
                                {{$schedule->summary}}
                            </h3>
                        </div>
        
                        <div class="flex flex-col">
                            <p class="text-slate-500 text-sm">Event Date</p>
                            <h3 class="text-indigo-950 text-xl font-bold">
                                {{$schedule->event_date->format('M d,Y')}}
                            </h3>
                        </div>

                    </div>
                </div>

                <hr class="my-5">

                <a href="https://web.whatsapp.com/send?phone=628{{$schedule->phone_number}}&text=Assalamualaikum%20{{$schedule->name}},%0AKami%20ingin%20mengonfirmasi%20bahwa%20kami%20telah%20menerima%20undangan%20Anda%20untuk%20menghadiri%20kegiatan%20{{$schedule->event_name}},%20pada%20tanggal%20{{$schedule->event_date->format('j F Y')}}.%0ATerima%20kasih.%0A%0ASalam,%0A[Your%20Organization]" class="text-center font-bold py-4 px-6 bg-indigo-700 text-white rounded-full" target="_blank">
                    Follow Up PIC
                </a>                

            </div>

        </div>
    </div>
</x-app-layout>
