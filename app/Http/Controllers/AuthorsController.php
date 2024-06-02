<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAuthorsRequest;
use App\Http\Requests\UpdateAuthorsRequest;
use App\Models\Authors;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuthorsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $authors = Authors::orderByDesc('id')->paginate(10);
        return view('admin.authors.index', compact('authors')); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //Mengambil data uer        
        return view('admin.authors.create'); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAuthorsRequest $request)
    {
        //
        DB::transaction(function() use ($request){
            $validated = $request->validated();

            if ($request->hasFile('avatar')){
                $avatarPath = $request->file('avatar')->store('avatar', 'public');
                $validated['avatar'] = $avatarPath;
            }

            $newAuthorRecord = Authors::create($validated);
        });

        return redirect()->route('admin.authors.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Authors $authors)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Authors $author)
    {
        //
        return view ('admin.authors.edit', compact('author'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAuthorsRequest $request, Authors $author)
    {
        //
        DB::transaction(function() use ($request, $author){
            $validated = $request->validated();

            if ($request->hasFile('avatar')){
                $avatarPath = $request->file('avatar')->store('avatar', 'public');
                $validated['avatar'] = $avatarPath;
            }

            $author->update($validated);
        });

        return redirect()->route('admin.authors.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Authors $author)
    {
        //
        DB::transaction(function() use ($author){
            $author->delete();
        });

        return redirect()->route('admin.authors.index');
    }
}
