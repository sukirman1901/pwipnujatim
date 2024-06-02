<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProgramsRequest;
use App\Http\Requests\UpdateProgramsRequest;
use App\Models\OurPrograms;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OurProgramsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $programs = OurPrograms::orderByDesc('id')->paginate(10);
        return view('admin.programs.index', compact('programs')); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.programs.create'); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProgramsRequest $request)
    {
        //
        DB::transaction(function() use ($request){
            $validated = $request->validated();

            if ($request->hasFile('icon')){
                $iconPath = $request->file('icon')->store('icon', 'public');
                $validated['icon'] = $iconPath;
            }

            $newProgramRecord = OurPrograms::create($validated);
        });

        return redirect()->route('admin.programs.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(OurPrograms $ourPrograms)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(OurPrograms $program)
    {
        //
        return view ('admin.programs.edit', compact('program'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProgramsRequest $request, OurPrograms $program)
    {
        //
        DB::transaction(function() use ($request, $program){
            $validated = $request->validated();

            if ($request->hasFile('icon')){
                $iconPath = $request->file('icon')->store('icon', 'public');
                $validated['icon'] = $iconPath;
            }

            $program->update($validated);
        });

        return redirect()->route('admin.programs.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OurPrograms $program)
    {
        //
        DB::transaction(function() use ($program){
            $program->delete();
        });

        return redirect()->route('admin.programs.index');
    }
}
