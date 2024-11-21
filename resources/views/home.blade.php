@extends('layouts.main')

@section('container')
<div class=" bg-gradient-to-t from-primary to-secondary">
  <div class="w-full min-h-screen flex flex-col items-center justify-center  md:pt-20 pb-20">
    <div class="flex w-full mt-16 md:mt-0">
      <div class="flex justify-center items-center  gap-3 w-full  mt-10 ">
        <img src="{{ asset('img/support/ipsi.png') }}" class="md:w-20 md:h-20 w-10 h-10 " alt="">
        <img src="{{ asset('img/support/unper.png') }}" class="md:w-20 md:h-20 w-10 h-10 " alt="">
        <img src="{{ asset('img/support/silat.png') }}" class="md:w-20 md:h-20 w-10 h-10 " alt="">
        <img src="{{ asset('img/support/jabar.png') }}" class="md:w-20 md:h-20 w-10 h-10 " alt="">
        <img src="{{ asset('img/support/disporabudpar.png') }}" class="md:w-20 md:h-20 w-10 h-10 " alt="">
        <img src="{{ asset('img/support/bpjs.png') }}" class="md:w-32 md:h-20 w-20 h-10 " alt="">
      </div>
    </div>
    <div class="flex flex-col w-full h-full justify-center items-center  ">
      <div class="flex flex-wrap justify-center items-center mx-10 h-full ">
        <img src="{{ asset('img/icon/maskot.png') }}" class="md:w-[30%] md:h-1/4 w-72 h-1/2 " alt="">
        <img src="{{ asset('img/icon/logonav.png') }}" class="md:w-[30%] md:h-1/4 w-64 h-1/2 md:-mt-24 -mt-14" alt="">
      </div>
      <div class="flex flex-wrap justify-center items-center mx-10 h-full md:-mt-10 md:gap-5 gap-3">
        <a href="/daftar" class="text-white font-semibold md:text-xl text-base text-center uppercase bg-tertiary px-5 py-3 rounded-xl inline-flex justify-center items-center w-full">Daftar Sekarang <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
      </svg></a>
        <a href="/tentang" class="text-black font-semibold md:text-xl text-base text-center uppercase bg-white px-10 py-3 rounded-xl inline-flex justify-center items-center w-full">Informasi Selengkapnya</a>
      </div>
    </div>
  </div>
  {{-- <section class="mb-10">
    <div class="py-8 px-4 mx-auto max-w-screen-xl text-center lg:py-16">
        <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-gray-900 md:text-5xl lg:text-6xl dark:text-white uppercase">unper open iv</h1>
        <p class="mb-8 text-lg font-normal text-white lg:text-xl sm:px-16 lg:px-48 ">“Mencari Bibit-bibit Daerah Yang Berkualitas Dan Menjunjung Tinggi Sportivitas ”</p>
        <div class="flex flex-col space-y-4 sm:flex-row sm:justify-center sm:space-y-0">
            <a href="/daftar" class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-white rounded-lg bg-tertiary hover:bg-gradient-to-r from-primary to-secondary hover:border-secondary hover:border">
                Daftar Sekarang
                <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                </svg>
            </a>
            <a href="#" class="py-3 px-5 sm:ms-4 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                Tentang UNO IV & UKM
            </a>  
        </div>
    </div>
  </section> --}}
  


  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#921f1b" fill-opacity="1" d="M0,128L12.6,133.3C25.3,139,51,149,76,165.3C101.1,181,126,203,152,213.3C176.8,224,202,224,227,224C252.6,224,278,224,303,234.7C328.4,245,354,267,379,234.7C404.2,203,429,117,455,106.7C480,96,505,160,531,160C555.8,160,581,96,606,90.7C631.6,85,657,139,682,181.3C707.4,224,733,256,758,256C783.2,256,808,224,834,202.7C858.9,181,884,171,909,170.7C934.7,171,960,181,985,208C1010.5,235,1036,277,1061,277.3C1086.3,277,1112,235,1137,213.3C1162.1,192,1187,192,1213,192C1237.9,192,1263,192,1288,170.7C1313.7,149,1339,107,1364,85.3C1389.5,64,1415,64,1427,64L1440,64L1440,320L1427.4,320C1414.7,320,1389,320,1364,320C1338.9,320,1314,320,1288,320C1263.2,320,1238,320,1213,320C1187.4,320,1162,320,1137,320C1111.6,320,1086,320,1061,320C1035.8,320,1011,320,985,320C960,320,935,320,909,320C884.2,320,859,320,834,320C808.4,320,783,320,758,320C732.6,320,707,320,682,320C656.8,320,632,320,606,320C581.1,320,556,320,531,320C505.3,320,480,320,455,320C429.5,320,404,320,379,320C353.7,320,328,320,303,320C277.9,320,253,320,227,320C202.1,320,177,320,152,320C126.3,320,101,320,76,320C50.5,320,25,320,13,320L0,320Z"></path></svg>
</div>
@endsection