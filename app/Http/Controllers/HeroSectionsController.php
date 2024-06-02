<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreHeroSectionsRequest;
use App\Http\Requests\UpdateHeroSectionsRequest;
use App\Models\HeroSections;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HeroSectionsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $hero_sections = HeroSections::orderByDesc('id')->paginate(10);
        return view('admin.hero_sections.index', compact('hero_sections')); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.hero_sections.create'); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreHeroSectionsRequest $request)
    {
        //
        DB::transaction(function() use ($request){
            $validated = $request->validated();

            if ($request->hasFile('banner')){
                $bannerPath = $request->file('banner')->store('banner', 'public');
                $validated['banner'] = $bannerPath;
            }

            $newHeroSection = HeroSections::create($validated);
        });

        return redirect()->route('admin.hero_sections.index');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(HeroSections $heroSections)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(HeroSections $hero_section)
    {
        //
        return view ('admin.hero_sections.edit', compact('hero_section'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateHeroSectionsRequest $request, HeroSections $hero_section)
    {
        //
        DB::transaction(function() use ($request, $hero_section){
            $validated = $request->validated();

            if ($request->hasFile('banner')){
                $bannerPath = $request->file('banner')->store('banner', 'public');
                $validated['banner'] = $bannerPath;
            }

            $hero_section->update($validated);
        });

        return redirect()->route('admin.hero_sections.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HeroSections $hero_section)
    {
        //
        DB::transaction(function() use ($hero_section){
            $hero_section->delete();
        });

        return redirect()->route('admin.hero_sections.index');
    }
}
