<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAboutsRequest;
use App\Http\Requests\StoreSchedulesRequest;
use App\Models\Blogs;
use App\Models\Categories;
use App\Models\Events;
use App\Models\faq;
use App\Models\HeroSections;
use App\Models\OrganitationAbouts;
use App\Models\OrganitationStatistics;
use App\Models\OurPrograms;
use App\Models\OurTeams;
use App\Models\Schedules;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FrontController extends Controller
{
    //
    public function index(){
        $statistics = OrganitationStatistics::take(4)->get();
        $programs = OurPrograms::take(4)->get();
        $teams = OurTeams::take(7)->get();
        $blogs = Blogs::take(6)->get();
        $events = Events::take(4)->get();
        $hero_sections = HeroSections::orderbyDesc('id')->take(1)->get();
        $faqs = faq::orderbyDesc('id')->take(4)->get();
        return view('front.index', compact('statistics', 'programs', 'teams','blogs', 'events','hero_sections','faqs'));
    }

    //public function blog(){
        //$categories = Categories::orderbyDesc('id')->take(5)->get();
        //$blogs = Blogs::take(9)->get();
        //return view('front.blog', compact('blogs', 'categories'));
    //}

    // public function category(Categories $category){
    //     $blogs = Blogs::where('category_id', $category->id)->get();
    //     $selectedCategory = $category;
    //     $categories = Categories::where('id', '!=', $selectedCategory->id)
    //                             ->orderByDesc('id')
    //                             ->take(5)
    //                             ->get();
    
    //     // Cek apakah blogs telah terisi dengan data yang benar
    //     // Anda bisa melakukan dumping untuk memeriksanya
    //     // dd($blogs);
    
    //     return view('front.category', compact('selectedCategory', 'categories', 'blogs'));
    // }
    
       

    public function team(){
        $teams = OurTeams::take(7)->get();
        $programs = OurPrograms::take(4)->get();
        $statistics = OrganitationStatistics::take(4)->get();
        return view('front.team', compact('teams', 'programs', 'statistics'));
    }

    public function about(){
        $abouts = OrganitationAbouts::take(2)->get();
        $programs = OurPrograms::take(4)->get();
        $statistics = OrganitationStatistics::take(4)->get();
        return view('front.about', compact('abouts', 'programs', 'statistics'));
    }

    public function blog($slug = null)
    {
        if ($slug) {
            // Ambil data posting blog berdasarkan slug
            $blog = Blogs::with('category')->where('slug', $slug)->firstOrFail();
    
            // Ambil lima kategori terbaru
            $categories = Categories::orderByDesc('id')->take(5)->get();
    
            // Tampilkan halaman single-post dengan data posting blog yang telah diambil
            return view('front.single-post', compact('blog', 'categories'));
        } else {
            // Ambil semua artikel blog
            $blogs = Blogs::with('category')->latest()->paginate(10);
    
            // Ambil lima kategori terbaru
            $categories = Categories::orderByDesc('id')->take(5)->get();
    
            // Tampilkan halaman blog dengan daftar semua artikel blog
            return view('front.blog', compact('blogs', 'categories'));
        }
    }

    public function schedule(){
        return view('front.schedule');
    }

    public function schedule_store(StoreSchedulesRequest $request) {
        DB::transaction(function() use ($request){
            $validated = $request->validated();

            if ($request->hasFile('thumbnail')){
                $thumbnailPath = $request->file('thumbnail')->store('thumbnail', 'public');
                $validated['thumbnail'] = $thumbnailPath;
            }
            
            $newSchedule = Schedules::create($validated);
        });
        return redirect()->route('front.schedule');
    }





}
