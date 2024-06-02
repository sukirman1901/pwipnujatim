@extends('front.layouts.app')
@section('content')
  <!-- Our Header -->
  <div id="header" class="bg-[#F6F7FA] relative overflow-hidden px-4">
    <div class="container max-w-[1130px] mx-auto relative pt-10 z-10">
        <!-- Navigation Menu -->
        <x-nav-menu />
        <!-- Hero Section -->
        @forelse ($hero_sections as $hero_section)
        <input type="hidden" name="path_video" id="path_video" value="{{$hero_section->path_video}}">
        <div id="Hero" class="flex flex-col gap-[30px] mt-[70px] pb-10 text-center md:mt-20 md:text-start md:pb-20">
          <div class="flex items-center bg-white p-[8px_16px] gap-[10px] rounded-full w-fit mx-auto md:mx-0">
            <div class="w-5 h-5 flex shrink-0 overflow-hidden">
              <img src="{{asset('assets/icons/crown.svg')}}" class="object-contain" alt="icon">
            </div>
            <p class="font-semibold text-sm">{{$hero_section->achievement}}</p>
          </div>
          <div class="flex flex-col gap-[10px] mx-auto md:mx-0">
            <h1 class="font-extrabold text-[50px] leading-[65px] max-w-[536px]">{{$hero_section->heading}}</h1>
            <p class="text-cp-light-grey leading-[30px] max-w-[437px]">{{$hero_section->subheading}}</p>
          </div>
          <div class="flex flex-col md:flex-row items-center gap-4">
            <a href="{{route('front.blog')}}" class="bg-cp-dark-blue p-5 w-full rounded-xl hover:shadow-[0_12px_30px_0_#312ECB66] transition-all duration-300 font-bold text-white md:w-fit">Explore Now</a>
            <button class="bg-cp-black p-5 w-full rounded-xl font-bold text-white flex items-center justify-center gap-[10px] md:w-fit" onclick="{modal.show()}">
              <div class="w-6 h-6 flex shrink-0 overflow-hidden">
                  <img src="{{asset('assets/icons/play-circle.svg')}}" class="w-full h-full object-contain" alt="icon">
              </div>
              <span>Watch Video</span>
            </button> 
          </div>
        </div>
        @empty
        <p>Belum tersedia</p>
        @endforelse
    </div>
    <div class="absolute w-[43%] h-full top-0 right-0 overflow-hidden z-0 hidden lg:block">
      <img src="{{ Storage::url($hero_section->banner) }}" class="object-cover w-full h-full" alt="banner">
    </div>
  </div>

  <!-- Our Progam -->
  <div id="Program" class="container max-w-[1130px] mx-auto flex flex-col gap-[30px] mt-10 px-4 md:mt-20">
    <!-- Versi Desktop -->
    <div class="hidden md:flex flex items-center justify-between">
        <div class="flex flex-col gap-[14px] text-center items-center md:items-stretch md:text-left">
            <p class="badge w-fit bg-cp-pale-blue text-cp-light-blue p-[8px_16px] rounded-full uppercase font-bold text-sm">OUR PROGRAM</p>
            <h2 class="font-bold text-4xl leading-[45px]">We’ve Dedicated Our<br>Best Team Efforts</h2>
        </div>
        <a href="" class="bg-cp-black p-[14px_20px] w-fit rounded-xl font-bold text-white block hidden md:block">Explore More</a>
    </div>

    <!-- Versi Mobile -->
    <div class="block md:hidden flex flex-col gap-[14px] text-center items-center">
        <p class="badge w-fit bg-cp-pale-blue text-cp-light-blue p-[8px_16px] rounded-full uppercase font-bold text-sm">OUR PROGRAM</p>
        <h2 class="font-bold text-4xl leading-[45px]">We’ve Dedicated Our<br>Best Team Efforts</h2>
    </div>

    <div class="awards-card-container grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-[30px] justify-center"> 
        @forelse($programs as $program)
            <div class="card bg-white flex flex-col h-full p-[30px] gap-[30px] rounded-[20px] border border-[#E8EAF2] hover:border-cp-dark-blue transition-all duration-300">
                <div class="w-[55px] h-[55px] flex shrink-0">
                    <img src="{{Storage::url($program->icon)}}" alt="icon">
                </div>
                <hr class="border-[#E8EAF2]">
                <p class="font-bold text-xl leading-[30px]">{{$program->name}}</p>
                <hr class="border-[#E8EAF2]">
                <p class="text-cp-light-grey">{{$program->created_at->format('M d,Y')}}</p>
            </div>
        @empty
            <p>Belum tersedia data terbaru</p>
        @endforelse
    </div>
  </div>


  <!-- Our Statistic -->
  <div id="Stats" class="bg-cp-black w-full mt-10 px-4 md:mt-20">
    <div class="container max-w-[1000px] mx-auto py-10">
      <div class="flex flex-wrap items-center justify-between p-[10px] flex-col gap-10 sm:flex-row">
        @forelse($statistics as $statistic)
        <div class="card w-[200px] flex flex-col items-center gap-[10px] text-center">
          <div class="w-[55px] h-[55px] flex shrink-0 overflow-hidden">
            <img src="{{Storage::url($statistic->icon)}}" class="object-contain w-full h-full" alt="icon">
          </div>
          <p class="text-cp-pale-orange font-bold text-4xl leading-[54px]">{{$statistic->goal}}</p>
          <p class="text-cp-light-grey">{{$statistic->name}}</p>
        </div>
        @empty
        <p>Belum tersdia data terbaru</p>
        @endforelse
      </div>
    </div>
  </div>

  <!-- Our Team -->
  <div id="Teams" class="bg-[#F6F7FA] w-full py-20 px-4">
    <div class="container max-w-[1130px] mx-auto flex flex-col gap-[30px] items-center">
      <div class="flex flex-col gap-[14px] items-center">
        <p class="badge w-fit bg-cp-light-blue text-white p-[8px_16px] rounded-full uppercase font-bold text-sm">OUR POWERFUL TEAM</p>
        <h2 class="font-bold text-4xl leading-[45px] text-center">We Share Same Dreams <br> Change The World</h2>
      </div>
      <div class="teams-card-container grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-[30px] justify-center">
        @forelse($teams as $team)
        <div class="card bg-white flex flex-col h-full justify-center items-center p-[30px] px-[29px] gap-[30px] rounded-[20px] border border-white hover:shadow-[0_10px_30px_0_#D1D4DF80] hover:border-cp-dark-blue transition-all duration-300">
          <div class="w-[100px] h-[100px] flex shrink-0 items-center justify-center rounded-full bg-[linear-gradient(150.55deg,_#007AFF_8.72%,_#312ECB_87.11%)]">
            <div class="w-[90px] h-[90px] rounded-full overflow-hidden">
              <img src="{{Storage::url($team->avatar)}}" class="object-cover w-full h-full object-center" alt="photo">
            </div>
          </div>
          <div class="flex flex-col gap-1 text-center">
            <p class="font-bold text-xl leading-[30px]">{{$team->name}}</p>
            <p class="text-cp-light-grey">{{$team->occupation}}</p>
          </div>
          <div class="flex items-center justify-center gap-[10px]">
            <div class="w-6 h-6 flex shrink-0">
              <img src="{{asset('assets/icons/global.svg')}}" alt="icon">
            </div>
            <p class="text-cp-dark-blue font-semibold">{{$team->location}}</p>
          </div>
        </div>
        @empty
        <p>Belum tersedia data terbaru</p>
        @endforelse

        <a href="{{route('front.team')}}" class="view-all-card">
          <div class="card bg-white flex flex-col h-full justify-center items-center p-[30px] gap-[30px] rounded-[20px] border border-white hover:shadow-[0_10px_30px_0_#D1D4DF80] hover:border-cp-dark-blue transition-all duration-300">
            <div class="w-[60px] h-[60px] flex shrink-0">
              <img src="{{asset('assets/icons/profile-2user.svg')}}" alt="icon">
            </div>
            <div class="flex flex-col gap-1 text-center">
              <p class="font-bold text-xl leading-[30px]">View All</p>
              <p class="text-cp-light-grey">Our Great People</p>
            </div>
          </div>
        </a>
      </div>
    </div>
  </div>

  <!-- Our Article -->
  <div id="Article" class="container max-w-[1130px] mx-auto flex flex-col gap-[30px] mt-10 px-4 md:mt-20">
    <!-- Versi Desktop -->
    <div class="hidden md:flex items-center justify-between">
      <div class="flex flex-col gap-[14px] text-center items-center md:items-stretch md:text-left">
        <p class="badge w-fit bg-cp-pale-blue text-cp-light-blue p-[8px_16px] rounded-full uppercase font-bold text-sm">OUR ARTICLE</p>
        <h2 class="font-bold text-4xl leading-[45px]">We Might Best Choice <br> For You</h2>
      </div>
      <a href="{{ route('front.blog') }}" class="bg-cp-black p-[14px_20px] w-fit rounded-xl font-bold text-white hidden md:block">Explore More</a>
    </div>
    <!-- Versi Mobile -->
    <div class="block md:hidden flex flex-col gap-[14px] text-center items-center">
      <p class="badge w-fit bg-cp-pale-blue text-cp-light-blue p-[8px_16px] rounded-full uppercase font-bold text-sm">OUR ARTICLE</p>
      <h2 class="font-bold text-4xl leading-[45px]">We’ve Dedicated Our<br>Best Team Efforts</h2>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
      @forelse($blogs as $blog)
      <div class="card-post flex flex-col bg-white border border-[#E8EAF2] rounded-[20px] gap-[30px] overflow-hidden hover:border-cp-dark-blue transition-all duration-300">
        <div class="thumbnail h-[200px] flex shrink-0 overflow-hidden">
          <img src="{{ Storage::url($blog->thumbnail) }}" class="object-cover object-center w-full h-full" alt="thumbnails">
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
      <div class="mx-auto mt-5 block sm:hidden">
        <a href="{{ route('front.blog') }}" class="bg-cp-black p-[14px_20px] w-fit rounded-xl font-bold text-white">Explore More</a>
      </div>
    </div>
  </div>
  
  <!-- Our Events -->
  <div id="Event" class="w-full flex flex-col gap-[50px] items-center mt-10 px-4 md:mt-20">
    <div class="flex flex-col gap-[14px] items-center">
      <p class="badge w-fit bg-cp-pale-blue text-cp-light-blue p-[8px_16px] rounded-full uppercase font-bold text-sm">OUR EVENTS</p>
      <h2 class="font-bold text-4xl leading-[45px] text-center">Find Interesting Events<br>Are Suitable For You</h2>
    </div>
    <div class="main-carousel w-full">
        @forelse ($events as $event)
      <div class="carousel-card container max-w-[1130px] w-full flex flex-wrap justify-between items-center lg:mx-[calc((100vw-1130px)/2)]">
        <div class="testimonial-container flex flex-col gap-[112px] w-[565px] order-2 mt-10 md:mt-0 md:order-1">
          <div class="flex flex-col gap-[30px]">
            <div class="pl-[30px]">
              <p class="badge w-fit bg-cp-dark-blue text-white p-[8px_16px] rounded-full hover:shadow-[0_12px_30px_0_#312ECB66] transition-all duration-300 font-semibold text-sm">{{ $event->event_date}}</p>
            </div>
            <div class="relative pt-[27px] pl-[30px]">
              <div class="absolute top-0 left-0">
                <img src="{{asset('assets/icons/quote.svg')}}" alt="icon">
              </div>
              <p class="event-name font-semibold text-2xl leading-[46px] relative z-10">{{$event->name}}</p>
              <p class="event-summary font-sm leading-[30px] relative z-10">{{$event->summary}}</p>
            </div>
            <div class="flex items-center justify-between pl-[30px]">
              <div class="flex items-center gap-6">
                <div class="w-[60px] h-[60px] flex shrink-0 rounded-full overflow-hidden">
                  <img src="{{asset('assets/photos/photo3.png')}}" class="w-full h-full object-cover" alt="photo">
                </div>
                <div class="flex flex-col justify-center gap-1">
                  <p class="font-bold">{{$event->client ? $event->client->name : 'Null'}}</p>
                  <p class="text-sm text-cp-light-grey">{{$event->client ? $event->client->occupation : 'Null'}}</p>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-indicator flex items-center justify-center gap-2 h-4 shrink-0">
          </div>
        </div>
        <div class="testimonial-thumbnail w-[470px] h-[550px] max-h-[300px] rounded-[20px] overflow-hidden bg-[#D9D9D9] order-1 md:order-2 md:max-h-full">
          <img src="{{Storage::url($event->thumbnail)}}" class="w-full h-full object-cover object-center" alt="thumbnail">
        </div>
      </div>
      @empty
      <P>Belum tersedia event</P>
      @endforelse
    </div>
  </div>
  
  <!-- Our FAQ -->
  <div id="FAQ" class="bg-[#F6F7FA] w-full py-20 mt-10 -mb-20 px-4 md:mt-20">
    <div class="container max-w-[1000px] mx-auto">
      <div class="flex flex-col lg:flex-row gap-[50px] sm:gap-[70px] items-center">
          <div class="flex flex-col gap-[30px]">
              <div class="flex flex-col gap-[10px] text-center md:text-start">
                  <h2 class="font-bold text-4xl leading-[45px]">Frequently Asked Questions</h2>
              </div>
              <a href="{{route('front.schedule')}}" class="p-5 bg-cp-black rounded-xl text-white w-fit font-bold hidden md:block">Contact Us</a>
          </div>
          <div class="flex flex-col gap-[30px] sm:w-[603px] shrink-0">
            @foreach($faqs as $key => $faq)
            <div class="flex flex-col p-5 rounded-2xl bg-white w-full">
                <button class="accordion-button flex justify-between gap-1 items-center" data-accordion="accordion-faq-{{$key + 1}}">
                    <span class="font-bold text-lg leading-[27px] text-left">{{$faq->question}}</span>
                    <div class="arrow w-9 h-9 flex shrink-0">
                        <img src="{{asset('assets/icons/arrow-circle-down.svg')}}" class="transition-all duration-300" alt="icon">
                    </div>
                </button>
                <div id="accordion-faq-{{$key + 1}}" class="accordion-content hide">
                    <p class="leading-[30px] text-cp-light-grey pt-[14px]">{{$faq->answer}}</p>
                </div>
            </div>
            @endforeach            
          </div>
      </div>
    </div>
  </div>

  <!-- Our Footer -->
  <x-footer />

  <!-- Video Frame-->
  <div id="video-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
      <div class="relative p-4 w-full lg:w-1/2 max-h-full">
          <!-- Modal content -->
          <div class="relative bg-white rounded-[20px] overflow-hidden shadow">
              <!-- Modal header -->
              <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                  <h3 class="text-xl font-semibold text-cp-black">
                      Company Profile Video
                  </h3>
                  <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" onclick="{modal.hide()}">
                      <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                      </svg>
                      <span class="sr-only">Close modal</span>
                  </button>
              </div>
              <!-- Modal body -->
              <div class="">
                <!-- video src added from the js script (modal-video.js) to prevent video running in the backgroud -->
                <iframe id="videoFrame" class="aspect-[16/9]" width="100%" src="" title="Demo Project Laravel Portfolio" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
              </div>
          </div>
      </div>
  </div>

  @endsection
  
  @push('after-scripts')
  <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

  <!-- JavaScript -->
  <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
  <script src="https://unpkg.com/flickity-fade@1/flickity-fade.js"></script>
  <script src="{{asset('js/carousel.js')}}"></script>
  <script src="{{asset('js/accordion.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
  <script src="{{asset('js/modal-video.js')}}"></script>
  @endpush