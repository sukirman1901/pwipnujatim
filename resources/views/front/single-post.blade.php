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
            <span class="text-cp-light-grey">/</span>
            <p class="text-cp-light-grey last-of-type:text-cp-black last-of-type:font-semibold">Daftar Artikel</p>
          </div>
        </div>
    </div>
  </div>

  <div id="article" class="container max-w-[1130px] mx-auto flex flex-col gap-20 mt-10 px-4 ">
    @if($blog)
        <div class="flex flex-col items-start gap-5 relative">
          <a class="category-name inline-block rounded-lg border border-cp-dark-blue px-3 py-2 text-sm font-medium text-cp-dark-blue"
          href="#">{{ $blog->category->name }}</a>
          <h1 class="title font-bold text-3xl">{{ $blog->title }}</h1>
          <div class="flex flex-row items-center gap-x-2">
            <img src="{{Storage::url($blog->author->avatar)}}" alt="" class="author-avatar w-fit max-h-[35px] rounded-full">
            <span class="author-name text-slate-500 text-sm">{{ $blog->author->name }}</span>
            <span class="date-post text-slate-500 text-sm">{{ $blog->created_at }}</span>
          </div>
          <img src="{{Storage::url($blog->thumbnail)}}" alt="" class="thumbnail-post w-full h-fit object-cover rounded-lg">
          <p class="content text-slate-500 text-sm">{!! $blog->content !!}</p>
        </div>
    @else
        <p>Tidak tersedia artikel</p>
    @endif
  </div>

<!-- Our Footer -->
<x-footer />
@endsection
