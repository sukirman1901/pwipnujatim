@extends('front.layouts.app')
@section('content')
<div id="header" class="bg-[#F6F7FA] relative px-4">
    <div class="container max-w-[1130px] mx-auto relative pt-10">
        <x-nav-menu />
        <div class="flex flex-col gap-[50px] items-center py-20">
          <div class="breadcrumb flex items-center justify-center gap-[30px]">
            <p class="text-cp-light-grey last-of-type:text-cp-black last-of-type:font-semibold">Home</p>
            <span class="text-cp-light-grey">/</span>
            <p class="text-cp-light-grey last-of-type:text-cp-black last-of-type:font-semibold">Blog</p>
          </div>
          <h2 class="font-bold text-4xl leading-[45px] text-center">We Might Best Choice For You</h2>
        </div>
    </div>
  </div>

  <!-- Our Article -->
  <div id="Article" class="container max-w-[1130px] mx-auto flex flex-col gap-[30px] mt-10 px-4 md:mt-20">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
    @forelse($blogs as $blog)
      <div class="card-post flex flex-col bg-white border border-[#E8EAF2] rounded-[20px] gap-[30px] overflow-hidden hover:border-cp-dark-blue transition-all duration-300">
        <div class="thumbnail h-[200px] flex shrink-0 overflow-hidden">
          <img src="{{Storage::url($blog->thumbnail)}}" class="object-cover object-center w-full h-full" alt="thumbnails">
        </div>
        <div class="flex flex-col p-[0_30px_30px_30px] gap-5">
          <div class="flex flex-col gap-1">
            <p class="title font-bold text-xl leading-[30px]">{{ \Illuminate\Support\Str::limit($blog->title, $limit = 40, $end = '...') }}</p>
            <p class="leading-[30px] text-cp-light-grey">{{ \Illuminate\Support\Str::limit(preg_replace('/&nbsp;/', ' ', strip_tags($blog->content)), $limit = 70, $end = '...') }}</p>
          </div>
          <a href="{{ route('blog', $blog->slug) }}" class="font-semibold text-cp-dark-blue">Learn More</a>
        </div>
      </div>
    @empty
    <p>Belum tersedia artikel</p>
    @endforelse
    </div>
  </div>


  <x-footer />
  @endsection