<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAboutsRequest;
use App\Http\Requests\UpdateAboutsRequest;
use App\Models\OrganitationAbouts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function Laravel\Prompts\form;

class OrganitationAboutsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $abouts = OrganitationAbouts::orderByDesc('id')->paginate(10);
        return view('admin.abouts.index', compact('abouts')); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.abouts.create'); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAboutsRequest $request)
    {
        //
        DB::transaction(function() use ($request){
            $validated = $request->validated();

            if ($request->hasFile('thumbnail')){
                $thumbnailPath = $request->file('thumbnail')->store('thumbnail', 'public');
                $validated['thumbnail'] = $thumbnailPath;
            }

            $newAboutRecord = OrganitationAbouts::create($validated);

            if(!empty($validated['keypoints'])){
                foreach($validated['keypoints'] as $keypoint){
                    $newAboutRecord->keypoints()->create([
                        'keypoint' => $keypoint
                    ]);
                }
            }
        });

        return redirect()->route('admin.abouts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(OrganitationAbouts $organitationAbouts)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(OrganitationAbouts $about)
    {
        //
        return view ('admin.abouts.edit', compact('about'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAboutsRequest $request, OrganitationAbouts $about)
    {
        //
        
        DB::transaction(function() use ($request, $about){
            $validated = $request->validated();

            if ($request->hasFile('thumbnail')){
                $thumbnailPath = $request->file('thumbnail')->store('thumbnail', 'public');
                $validated['thumbnail'] = $thumbnailPath;
            }

            $about->update($validated);

            if(!empty($validated['keypoints'])){
                $about->keypoints()->delete();
                foreach($validated['keypoints'] as $keypoint){
                    $about->keypoints()->create([
                        'keypoint' => $keypoint
                    ]);
                }
            }
        });

        return redirect()->route('admin.abouts.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OrganitationAbouts $about)
    {
        //
        DB::transaction(function() use ($about){
            $about->delete();
        });

        return redirect()->route('admin.abouts.index');
    }
}
