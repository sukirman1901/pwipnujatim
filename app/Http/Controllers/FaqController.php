<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFaqRequest;
use App\Http\Requests\UpdateFaqRequest;
use App\Models\faq;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $faqs = faq::orderByDesc('id')->paginate(10);
        return view('admin.faqs.index', compact('faqs')); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.faqs.create'); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFaqRequest $request)
    {
        //
        DB::transaction(function() use ($request){
            $validated = $request->validated();

            $newFaqRecord = faq::create($validated);
        });

        return redirect()->route('admin.faqs.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(faq $faq)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(faq $faq)
    {
        //
        return view ('admin.faqs.edit', compact('faq'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFaqRequest $request, faq $faq)
    {
        //
        DB::transaction(function() use ($request, $faq){
            $validated = $request->validated();

            $faq->update($validated);
        });

        return redirect()->route('admin.faqs.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(faq $faq)
    {
        //
        DB::transaction(function() use ($faq){
            $faq->delete();
        });

        return redirect()->route('admin.faqs.index');
    }
}
