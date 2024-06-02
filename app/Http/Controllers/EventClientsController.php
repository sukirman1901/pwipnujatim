<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreClientsRequest;
use App\Http\Requests\UpdateClientsRequest;
use App\Models\EventClients;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EventClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $clients = EventClients::orderByDesc('id')->paginate(10);
        return view('admin.clients.index', compact('clients')); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.clients.create'); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreClientsRequest $request)
    {
        //
        DB::transaction(function() use ($request){
            $validated = $request->validated();

            if ($request->hasFile('avatar')){
                $avatarPath = $request->file('avatar')->store('avatar', 'public');
                $validated['avatar'] = $avatarPath;
            }

            $newClientRecord = EventClients::create($validated);
        });

        return redirect()->route('admin.clients.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(EventClients $eventClients)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(EventClients $client)
    {
        //
        return view ('admin.clients.edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateClientsRequest $request, EventClients $client)
    {
        //
        DB::transaction(function() use ($request, $client){
            $validated = $request->validated();

            if ($request->hasFile('avatar')){
                $avatarPath = $request->file('avatar')->store('avatar', 'public');
                $validated['avatar'] = $avatarPath;
            }

            $client->update($validated);
        });

        return redirect()->route('admin.clients.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EventClients $client)
    {
        //
        DB::transaction(function() use ($client){
            $client->delete();
        });

        return redirect()->route('admin.clients.index');
    }
}
