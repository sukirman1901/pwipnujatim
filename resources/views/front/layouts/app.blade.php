<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="{{asset('css/output.css')}}" rel="stylesheet">
  <meta name="description" content="@yield('meta_description', 'IPNU East Java Provides a nurturing environment for students to develop academically and spiritually, fostering unity and Islamic values')">
  <title>PW IPNU Jatim - The Next Level</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
  <!-- CSS for carousel/flickity-->
  <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
  <link rel="stylesheet" href="https://unpkg.com/flickity-fade@2/flickity-fade.css">
  <!-- Kode-kode lainnya -->
  <link href="{{ asset('css/loading.css') }}" rel="stylesheet">
  <!-- CSS for modal/flowbite -->
  <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css"  rel="stylesheet" /> -->
  <!-- Scripts -->
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-poppins text-cp-black">
  <div id="loading" class="loading-screen">
    <div class="lds-ring">
      <div></div>
      <div></div>
      <div></div>
      <div></div>
    </div>
  </div>

    @yield('content')

    @stack('before-scripts')

    @stack('after-scripts')
    <script src="{{ asset('js/loading.js') }}"></script>
</body>
</html>