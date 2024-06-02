<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEventsRequest;
use App\Http\Requests\UpdateEventsRequest;
use App\Models\EventClients;
use App\Models\Events;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $events = Events::orderByDesc('id')->paginate(10);
        return view('admin.events.index', compact('events')); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $clients = EventClients::orderByDesc('id')->get();
        return view('admin.events.create', compact('clients')); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEventsRequest $request)
    {
        //
        DB::transaction(function() use ($request){
            $validated = $request->validated();

            if ($request->hasFile('thumbnail')){
                $thumbnailPath = $request->file('thumbnail')->store('thumbnail', 'public');
                $validated['thumbnail'] = $thumbnailPath;
            }

            $newEventRecord = Events::create($validated);
        });

        return redirect()->route('admin.events.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Events $events)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Events $event)
    {
        //
        $clients = EventClients::orderByDesc('id')->get();

        return view ('admin.events.edit', compact('event', 'clients'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEventsRequest $request, Events $event)
    {
        //
        DB::transaction(function() use ($request, $event){
            $validated = $request->validated();

            if ($request->hasFile('thumbnail')){
                $thumbnailPath = $request->file('thumbnail')->store('thumbnail', 'public');
                $validated['thumbnail'] = $thumbnailPath;
            }

            $event->update($validated);
        });

        return redirect()->route('admin.events.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Events $event)
    {
        //
        DB::transaction(function() use ($event){
            $event->delete();
        });

        return redirect()->route('admin.events.index');
    }
}
