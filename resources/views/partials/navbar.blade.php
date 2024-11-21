<nav class="bg-tertiary dark:bg-gray-900 fixed w-full z-20 top-0 start-0">
  <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
    <a href="/" class="flex items-center space-x-3 rtl:space-x-reverse">
      <img src="{{ asset('img/uno4.png') }}" class="w-full h-12" alt="UNO Logo">
      <span class="self-center text-2xl font-semibold whitespace-nowrap text-white">UNO IV</span>
    </a>
    <div class="flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
      <a href="/daftar" class="text-white bg-gradient-to-r from-primary to-secondary hover:bg-gradient-to-l  font-medium rounded-lg text-sm px-4 py-2 text-center ">Daftar</a>
      <button data-collapse-toggle="navbar-sticky" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-white rounded-lg md:hidden   " aria-controls="navbar-sticky" aria-expanded="false">
        <span class="sr-only">Open main menu</span>
        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
        </svg>
      </button>
    </div>
    <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
      <ul class="flex flex-col p-4 md:p-0 mt-4 font-medium border rounded-lg md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 text-white">
        <li>
          <a href="/" class="block py-2 px-3 text-white rounded lg:hover:bg-transparent md:bg-transparent hover:bg-gradient-to-r from-primary to-secondary md:hover:bg-none md:p-0 {{ Request::is('/') ? 'active' : '' }}" aria-current="page">Beranda</a>
        </li>
        <li>
          <a href="/galeri" class="block py-2 px-3 text-white rounded hover:bg-gradient-to-r from-primary to-secondary md:hover:bg-none md:p-0 {{ Request::is('galeri') ? 'active' : '' }}">Galeri</a>
        </li>
        <li>
          <a href="/tentang" class="block py-2 px-3 text-white rounded hover:bg-gradient-to-r from-primary to-secondary md:hover:bg-none md:p-0 {{ Request::is('tentang') ? 'active' : '' }}">Seputar UNO</a>
        </li>
        <li>
          <a href="/kontak" class="block py-2 px-3 text-white rounded hover:bg-gradient-to-r from-primary to-secondary md:hover:bg-none md:p-0 {{ Request::is('kontak') ? 'active' : '' }}">Kontak</a>
        </li>
      </ul>
    </div>
  </div>
</nav>