<nav class="top-10 left-[155px] z-50 max-w-[1130px] w-full flex flex-wrap items-center justify-between bg-white p-[20px_30px] rounded-[20px] gap-y-3 shadow-md">
    <a href="{{ route('front.index') }}" class="flex items-center gap-3">
      <div class="flex shrink-0 h-[43px] overflow-hidden">
        <img src="{{ asset('assets/logo/logo.svg') }}" class="object-contain w-full h-full" alt="logo">
      </div>   
      <div class="flex flex-col">
        <p id="CompanyName" class="font-extrabold text-xl leading-[30px]">IPNU Jatim</p>
        <p id="CompanyTagline" class="text-sm text-cp-light-grey">The Next Level</p>
      </div>
    </a>
  <!-- Navigasi hanya ditampilkan pada mode desktop (lebar layar lebih besar dari lg) -->
  <ul id="desktopNav" class="hidden lg:flex flex-wrap items-center gap-[30px]">
    <li class="font-semibold hover:text-cp-dark-blue transition-all duration-300">
      <a href="{{route('front.index')}}" class="hover:text-cp-dark-blue {{ request()->routeIs('front.index') ? 'text-cp-dark-blue' : 'text-black' }}">Home</a>
    </li>
    <li class="font-semibold hover:text-cp-dark-blue transition-all duration-300">
      <a href="{{route('front.team')}}" class="hover:text-cp-dark-blue {{ request()->routeIs('front.team') ? 'text-cp-dark-blue' : 'text-black' }}">Our Team</a>
    </li>
    <li class="font-semibold hover:text-cp-dark-blue transition-all duration-300">
      <a href="{{route('front.blog')}}" class="hover:text-cp-dark-blue {{ request()->routeIs('front.blog') ? 'text-cp-dark-blue' : 'text-black' }}">Blog</a>
    </li>
    <li class="font-semibold hover:text-cp-dark-blue transition-all duration-300">
      <a href="{{route('front.about')}}" class="hover:text-cp-dark-blue {{ request()->routeIs('front.about') ? 'text-cp-dark-blue' : 'text-black' }}">About</a>
    </li>
  </ul>
  <!-- Tombol "Contact Us" -->
  <a href="{{route('front.schedule')}}" class="hidden lg:block bg-cp-dark-blue p-[14px_20px] w-fit rounded-xl hover:shadow-[0_12px_30px_0_#312ECB66] transition-all duration-300 font-bold text-white">Contact Us</a>
  <!-- Tombol dropdown mobile -->
  <button id="mobileDropdownButton" class="lg:hidden flex items-center p-[10px] rounded-[12px] text-belibang-grey border border-belibang-dark-grey" data-target="megaMenu">
    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
      <path d="M3 7H21" stroke="#A0A0A0" stroke-width="2" stroke-linecap="round" />
      <path d="M3 12H21" stroke="#A0A0A0" stroke-width="2" stroke-linecap="round" />
      <path d="M3 17H21" stroke="#A0A0A0" stroke-width="2" stroke-linecap="round" />
    </svg>
  </button>
</nav>

<!-- Dropdown menu for mobile -->
<ul id="mobileDropdownMenu" class="hidden absolute w-full bg-white rounded-2xl mt-3 lg:hidden z-50 space-y-1 p-4">
  <li>
    <a href="{{route('front.team')}}" class="block rounded-lg px-4 py-2 font-medium text-gray-700 hover:bg-gray-100 hover:text-gray-700">Our Team</a>
  </li>
  <li>
    <a href="{{route('front.blog')}}" class="block rounded-lg px-4 py-2 font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-700">Blog</a>
  </li>
  <li>
    <a href="{{route('front.about')}}" class="block rounded-lg px-4 py-2 font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-700">About</a>
  </li>
  <li>
    <a href="{{route('front.schedule')}}" class="block rounded-lg px-4 py-2 font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-700">Contact Us</a>
  </li>
</ul>


<script>
  const mobileDropdownButton = document.getElementById('mobileDropdownButton');
  const mobileDropdownMenu = document.getElementById('mobileDropdownMenu');

  mobileDropdownButton.addEventListener('click', () => {
    mobileDropdownMenu.classList.toggle('hidden');
  });
</script>
