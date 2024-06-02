<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTeamsRequest;
use App\Http\Requests\UpdateTeamsRequest;
use App\Models\OurTeams;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OurTeamsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $teams = OurTeams::orderByDesc('id')->paginate(10);
        return view('admin.teams.index', compact('teams')); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.teams.create'); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTeamsRequest $request)
    {
        //
        DB::transaction(function() use ($request) {
            $validated = $request->validated();

            if ($request->hasFile('avatar')){
                $avatarPath = $request->file('avatar')->store('avatar', 'public');
                $validated['avatar'] = $avatarPath;
            }

            $newTeamRecord = OurTeams::create($validated);
        });

        return redirect()->route('admin.teams.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(OurTeams $ourTeams)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(OurTeams $team)
    {
        //
        return view ('admin.teams.edit', compact('team'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTeamsRequest $request, OurTeams $team)
    {
        //
        DB::transaction(function() use ($request, $team) {
            $validated = $request->validated();

            if ($request->hasFile('avatar')){
                $avatarPath = $request->file('avatar')->store('avatar', 'public');
                $validated['avatar'] = $avatarPath;
            }

            $team->update($validated);
        });

        return redirect()->route('admin.teams.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OurTeams $team)
    {
        //
        DB::transaction(function() use ($team){
            $team->delete();
        });

        return redirect()->route('admin.teams.index');  
    }
}
