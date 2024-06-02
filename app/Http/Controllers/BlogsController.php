<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBlogsRequest;
use App\Http\Requests\UpdateBlogsRequest;
use App\Models\Authors;
use App\Models\Blogs;
use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BlogsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    
    public function index()
    {
        //
        $blogs = Blogs::orderByDesc('id')->paginate(10);
        return view('admin.blogs.index', compact('blogs')); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //Mengambil data category
        $categories = Categories::orderByDesc('id')->get();

        //Mengambil data author
        $authors = Authors::orderByDesc('id')->get();

        //
        return view('admin.blogs.create', compact('categories', 'authors')); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBlogsRequest $request)
    {
        //
        DB::transaction(function() use ($request){
            $validated = $request->validated();

            if ($request->hasFile('thumbnail')){
                $thumbnailPath = $request->file('thumbnail')->store('thumbnail', 'public');
                $validated['thumbnail'] = $thumbnailPath;
            }

            $validated['slug'] = Str::slug($validated['title']);

            $newBlogRecord = Blogs::create($validated);
        });

        return redirect()->route('admin.blogs.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Blogs $blogs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blogs $blog)
    {
        //Mengambil data category
        $categories = Categories::orderByDesc('id')->get();

        //Mengambil data author
        $authors = Authors::orderByDesc('id')->get();
        
        //
        return view ('admin.blogs.edit', compact('blog', 'categories', 'authors'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBlogsRequest $request, Blogs $blog)
    {
        //
        DB::transaction(function() use ($request, $blog){
            $validated = $request->validated();

            if ($request->hasFile('thumbnail')){
                $thumbnailPath = $request->file('thumbnail')->store('thumbnail', 'public');
                $validated['thumbnail'] = $thumbnailPath;
            }

            $validated['slug'] = Str::slug($validated['title']);

            $blog->update($validated);
        });

        return redirect()->route('admin.blogs.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blogs $blog)
    {
        //
        DB::transaction(function() use ($blog){
            $blog->delete();
        });

        return redirect()->route('admin.blogs.index');
    }
}
