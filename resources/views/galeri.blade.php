@extends('layouts.main')

@section('container')
  <div class=" mx-auto bg-gradient-to-bl from-primary to-secondary w-full min-h-screen" data-aos="zoom-out-down" data-aos-duration="1000" data-aos-delay="100">
    <div class="text-center mb-8 pt-24">
      <h2 class="text-2xl font-bold text-white mb-4 uppercase">Galeri Unper Open</h2>
      <p class="text-white">Unit Kegiatan Mahasiswa Seni Bela Diri Pencak Silat Universitas Perjuangan</p>
    </div>

    <!-- Galeri Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 mx-5 mb-20">
      @forelse ($galeri as $item)
      <div class="bg-white shadow-lg rounded-lg overflow-hidden transform hover:scale-105 transition duration-300" data-aos="flip-up">
        <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->judul }}" class="w-full h-56 object-cover">
        <div class="p-4">
          <p class="text-center text-lg font-semibold text-gray-700 uppercase">{{ $item->judul }}</p>
          <p class="text-justify text-sm font-medium text-gray-700">{{ $item->deskripsi }}</p>
        </div>
      </div>
      @empty
      <div class="col-span-full text-center text-gray-500">
        <p>Belum ada galeri yang ditambahkan.</p>
      </div>
      @endforelse
    </div>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
      <path fill="#921f1b" fill-opacity="1" d="M0,32L21.8,32C43.6,32,87,32,131,53.3C174.5,75,218,117,262,138.7C305.5,160,349,160,393,181.3C436.4,203,480,245,524,250.7C567.3,256,611,224,655,218.7C698.2,213,742,235,785,256C829.1,277,873,299,916,272C960,245,1004,171,1047,138.7C1090.9,107,1135,117,1178,128C1221.8,139,1265,149,1309,160C1352.7,171,1396,181,1418,186.7L1440,192L1440,320L1418.2,320C1396.4,320,1353,320,1309,320C1265.5,320,1222,320,1178,320C1134.5,320,1091,320,1047,320C1003.6,320,960,320,916,320C872.7,320,829,320,785,320C741.8,320,698,320,655,320C610.9,320,567,320,524,320C480,320,436,320,393,320C349.1,320,305,320,262,320C218.2,320,175,320,131,320C87.3,320,44,320,22,320L0,320Z"></path>
    </svg>
  </div>

@endsection
