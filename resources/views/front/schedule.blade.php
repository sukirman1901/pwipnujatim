@extends('front.layouts.app')
@section('content')
  <div id="header" class="bg-[#F6F7FA] relative h-[700px] -mb-[488px] px-4">
    <div class="container max-w-[1130px] mx-auto relative pt-10">
        <x-nav-menu />
    </div>
  </div>
  
  <div id="Contact" class="container max-w-[1130px] mx-auto flex flex-wrap xl:flex-nowrap justify-between gap-[50px] relative z-10 px-4">
    <div class="flex flex-col md:mt-20 gap-[50px]">
      <div class="breadcrumb flex items-center gap-[30px]">
        <p class="text-cp-light-grey last-of-type:text-cp-black last-of-type:font-semibold">Home</p>
        <span class="text-cp-light-grey">/</span>
        <p class="text-cp-light-grey last-of-type:text-cp-black last-of-type:font-semibold">Event</p>
        <span class="text-cp-light-grey">/</span>
        <p class="text-cp-light-grey last-of-type:text-cp-black last-of-type:font-semibold">Schedule</p>
      </div>
      <h1 class="font-extrabold text-4xl leading-[45px]">We Help You, Please Contact Us</h1>
      <div class="flex flex-col gap-5">
        <div class="flex items-center gap-[10px]">
          <div class="w-6 h-6 flex shrink-0">
            <img src="assets/icons/global.svg" alt="icon">
          </div>
          <p class="text-cp-dark-blue font-semibold">Jl. Masjid Al-AkbarTimur No.9, Surabaya</p>
        </div>
        <div class="flex items-center gap-[10px]">
          <div class="w-6 h-6 flex shrink-0">
            <img src="assets/icons/call.svg" alt="icon">
          </div>
          <p class="text-cp-dark-blue font-semibold">0857-3313-8299</p>
        </div>
        <div class="flex items-center gap-[10px]">
          <div class="w-6 h-6 flex shrink-0">
            <img src="assets/icons/monitor-mobbile.svg" alt="icon">
          </div>
          <p class="text-cp-dark-blue font-semibold">ipnujatim.or.id</p>
        </div>
      </div>
    </div>
    <form action="{{route('front.schedule_store')}}" method="POST" class="flex flex-col p-[30px] rounded-[20px] gap-[18px] bg-white shadow-[0_10px_30px_0_#D1D4DF40] w-full md:w-[700px] shrink-0" enctype="multipart/form-data">
        @csrf
      <div class="flex items-center gap-[18px]">
        <div class="flex flex-col gap-2 w-full">
          <p class="font-semibold">Complete Name</p>
          <div class="flex items-center gap-[10px] p-[14px_20px] border border-[#E8EAF2] focus-within:border-cp-dark-blue transition-all duration-300 rounded-xl bg-white">
            <div class="w-[18px] h-[18px] flex shrink-0">
              <img src="assets/icons/profile.svg" alt="icon">
            </div>
            <input type="text" name="name" id="name" class="appearance-none outline-none bg-white placeholder:font-normal placeholder:text-cp-black font-semibold w-full" placeholder="Write your complete name" required>
          </div>
        </div>
        <div class="flex flex-col gap-2 w-full">
          <p class="font-semibold">Email Address</p>
          <div class="flex items-center gap-[10px] p-[14px_20px] border border-[#E8EAF2] focus-within:border-cp-dark-blue transition-all duration-300 rounded-xl bg-white">
            <div class="w-[18px] h-[18px] flex shrink-0">
              <img src="assets/icons/sms.svg" alt="icon">
            </div>
            <input type="email" name="email" id="email" class="appearance-none outline-none bg-white placeholder:font-normal placeholder:text-cp-black font-semibold w-full" placeholder="Write your email address" required>
          </div>
        </div>
      </div>
      <div class="flex items-center gap-[18px]">
        <div class="flex flex-col gap-2 w-full">
            <p class="font-semibold">Phone Number</p>
            <div class="flex items-center gap-[10px] p-[14px_20px] border border-[#E8EAF2] focus-within:border-cp-dark-blue transition-all duration-300 rounded-xl bg-white">
              <div class="w-[18px] h-[18px] flex shrink-0">
                <img src="assets/icons/call-black.svg" alt="icon">
              </div>
              <input type="number" name="phone_number" id="phone_number" class="appearance-none outline-none bg-white placeholder:font-normal placeholder:text-cp-black font-semibold w-full" placeholder="Write your phone number" required>
            </div>
          </div>
          <div class="flex flex-col gap-2 w-full">
            <p class="font-semibold">Event Date</p>
            <div class="flex items-center gap-[10px] p-[14px_20px] border border-[#E8EAF2] focus-within:border-cp-dark-blue transition-all duration-300 rounded-xl bg-white relative">
              <div class="w-[18px] h-[18px] flex shrink-0">
                <img src="assets/icons/calendar.svg" alt="icon">
              </div>
              <button type="button" id="dateButton" class="p-0 bg-transparent w-full text-left border-none outline-none">Choose the date</button>
              <input type="date" name="event_date" id="dateInput" class="absolute opacity-0 -z-10">
            </div>
          </div>
      </div>
      <div class="flex items-center gap-[18px]">
        <div class="flex flex-col gap-2 w-full">
          <p class="font-semibold">Event Name</p>
          <div class="flex items-center gap-[10px] p-[14px_20px] border border-[#E8EAF2] focus-within:border-cp-dark-blue transition-all duration-300 rounded-xl bg-white">
            <div class="w-[18px] h-[18px] flex shrink-0">
              <img src="assets/icons/building-4-black.svg" alt="icon">
            </div>
            <input type="tel" name="event_name" id="event_name" class="appearance-none outline-none bg-white placeholder:font-normal placeholder:text-cp-black font-semibold w-full" placeholder="Your event name" required>
          </div>
        </div>
        </div>
        <div class="flex flex-col gap-2 w-full">
            <p class="font-semibold">Event Summary</p>
            <div class="flex gap-[10px] p-[14px_20px] border border-[#E8EAF2] focus-within:border-cp-dark-blue transition-all duration-300 rounded-xl bg-white">
            <div class="w-[18px] h-[18px] flex shrink-0 mt-[3px]">
                <img src="assets/icons/message-text.svg" alt="icon">
            </div>
            <textarea name="summary" id="summary" rows="6" class="appearance-none outline-none bg-white placeholder:font-normal placeholder:text-cp-black font-semibold w-full resize-none" placeholder="Tell us the summary event"></textarea>
            </div>
        </div>
        <div class="flex flex-col gap-2 w-full">
          <p class="font-semibold">Event Poster</p>
          <label for="thumbnail" class="flex items-center gap-[10px] p-[14px_20px] border border-[#E8EAF2] focus-within:border-cp-dark-blue transition-all duration-300 rounded-xl bg-white cursor-pointer">
              <img src="assets/icons/file.svg" alt="icon">
              <span>Browse...</span>
              <input type="file" name="thumbnail" id="thumbnail" class="hidden" required>
          </label>
        </div>      
      <button type="submit" class="bg-cp-dark-blue p-5 w-full rounded-xl hover:shadow-[0_12px_30px_0_#312ECB66] transition-all duration-300 font-bold text-white">Schedule Now</button>
    </form>
  </div>
  <x-footer />
@endsection
@push('after-scripts')
    <script src="js/contact-form.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <!-- JavaScript -->
    <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
    <script src="https://unpkg.com/flickity-fade@1/flickity-fade.js"></script>
    <script src="js/carousel.js"></script>
@endpush