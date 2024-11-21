<!doctype html>
<html class="scroll-smooth">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  {{-- @vite('resources/css/app.css','resources/js/app.js') --}}
  <link rel="stylesheet" href="/build/assets/app-4ee38e02.css">
  <link rel="icon" href="../img/silat.png">
  <title>Dashboard UNO</title>
</head>
<body>
  
  {{-- navbar --}}
  @include('dashboard.layouts.SideNavAdmin')


  <div class="md:mt-16 mt-14 md:ml-72 m-5">
      @yield('container')
  </div>



  
  




  <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script
      src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"
      integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs="
      crossorigin="anonymous"
    ></script>
    <script src="/build/assets/app-91362578.js"></script>
</body>
</html>