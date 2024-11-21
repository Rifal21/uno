<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Unit Kegiatan Mahasiswa Seni Bela Diri Pencak Silat Universitas Perjuangan</title>
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
    <link rel="stylesheet" href="/build/assets/app-4ee38e02.css">
    <link rel="icon" href="img/silat.png">
  </head>
  <body  >
    @include('partials.navbar')

      @yield('container')

    @include('partials.footer')
    @include('sweetalert::alert')

    <script
    src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"
    integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs="
    crossorigin="anonymous"
  ></script>
  <script src="/build/assets/app-91362578.js"></script>
  </body>
</html>