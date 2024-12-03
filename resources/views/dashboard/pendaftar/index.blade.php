@extends('dashboard.layouts.adminLayouts')

@section('container')
  @if(session()->has('toast_success'))
  <script>
    document.addEventListener("DOMContentLoaded", function() {
      Swal.fire({
        icon: 'success',
        title: '{{ session("toast_success") }}',
        toast: true,                // Enable toast style
        position: 'top-end',        // Position at the top-right corner
        showConfirmButton: false,
        timer: 5000,                // Display for 5 seconds
        timerProgressBar: true,     // Show progress bar during the timer
        customClass: {
          popup: 'colored-toast'    // Optional: Add custom styling class if needed
        }
      });
    });
  </script>
  @endif

  <div class="flex flex-col space-y-3">
    <!-- Header -->
    <h1 class="text-2xl font-bold mb-2">Peserta UNO IV</h1>
    <div class="flex flex-col md:flex-row md:justify-end items-center">
      <form method="GET" action="{{ route('pendaftaran.index') }}" id="filterForm" class="flex flex-wrap items-center md:space-x-3 w-full md:w-full md:justify-end justify-center">
        <input 
          type="search" 
          name="search" 
          value="{{ request('search') }}" 
          placeholder="Cari berdasarkan nama, tingkat, kategori" 
          class="px-4 py-2 border border-gray-300 rounded-lg focus:ring focus:ring-primary focus:outline-none w-full md:w-auto mb-3 md:mb-0" 
          oninput="document.getElementById('filterForm').submit()" {{-- Kirim form saat ada input --}}
        />

        
        <!-- Filter Tingkat -->
        <select name="tingkat" class="px-4 py-2 border border-gray-300 rounded-lg focus:ring focus:ring-primary focus:outline-none w-full md:w-auto mb-3 md:mb-0" onchange="document.getElementById('filterForm').submit()">
          <option value="">Semua Tingkat</option>
          @foreach($tingkatOptions as $tingkat)
            <option value="{{ $tingkat }}" {{ request('tingkat') == $tingkat ? 'selected' : '' }}>
              {{ $tingkat }}
            </option>
          @endforeach
        </select>
        
        <!-- Filter Kategori -->
        <select name="kategori" class="px-4 py-2 border border-gray-300 rounded-lg focus:ring focus:ring-primary focus:outline-none w-full md:w-auto mb-3 md:mb-0" onchange="document.getElementById('filterForm').submit()">
          <option value="">Semua Kategori</option>
          @foreach($kategoriOptions as $kategori)
            <option value="{{ $kategori }}" {{ request('kategori') == $kategori ? 'selected' : '' }}>
              {{ $kategori }}
            </option>
          @endforeach
        </select>
        
        <!-- Filter Kontingen -->
        <select name="kontingen" class="px-4 py-2 border border-gray-300 rounded-lg focus:ring focus:ring-primary focus:outline-none w-full md:w-auto mb-3 md:mb-0" onchange="document.getElementById('filterForm').submit()">
          <option value="">Semua Kontingen</option>
          @foreach($kontingenOptions as $kontingen)
            <option value="{{ $kontingen }}" {{ request('kontingen') == $kontingen ? 'selected' : '' }}>
              {{ $kontingen }}
            </option>
          @endforeach
        </select>
        
        <!-- Filter Kelas -->
        <select name="kelas" class="px-4 py-2 border border-gray-300 rounded-lg focus:ring focus:ring-primary focus:outline-none w-full md:w-auto mb-3 md:mb-0" onchange="document.getElementById('filterForm').submit()">
          <option value="">Semua Kelas</option>
          @foreach($kelasOptions as $kelas)
            <option value="{{ $kelas }}" {{ request('kelas') == $kelas ? 'selected' : '' }}>
              {{ $kelas }}
            </option>
          @endforeach
        </select>
        <a href="{{ route('pendaftaran.export', request()->all()) }}" 
          class="w-full px-4 py-2 bg-primary text-white rounded hover:bg-gradient-to-bl from-primary to-secondary inline-flex justify-center items-center gap-1 transition-all">
         Export to Excel
       </a>
      </form>
    </div>

    <!-- Table -->
    <div class="overflow-x-auto shadow border border-gray-200 rounded-lg">
      <table class="min-w-full bg-white divide-y divide-gray-200">
        <thead class="bg-gray-50">
          <tr>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">#</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nomor Kartu Keluarga</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">NIK</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kelas</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tingkat</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kategori</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jenis Kelamin</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Berat Badan</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kontingen</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama Pelatih</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">E-mail</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No Hp / Whatsapp</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Bukti Pembayaran</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Pas Foto</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">status</th>
            <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
          @foreach($peserta as $index => $data)
            <tr>
              <td class="px-6 py-4 text-sm text-gray-700">{{ $index + 1 }}</td>
              <td class="px-6 py-4 text-sm text-gray-700">{{ $data->nama }}</td>
              <td class="px-6 py-4 text-sm text-gray-700">{{ $data->noKK }}</td>
              <td class="px-6 py-4 text-sm text-gray-700">{{ $data->NIK }}</td>
              <td class="px-6 py-4 text-sm text-gray-700">{{ $data->kelas ? $data->kelas->nama_kelas : 'Tidak ada kelas' }}</td>
              <td class="px-6 py-4 text-sm text-gray-700">{{ $data->kelas ? $data->kelas->tingkat : 'Tidak ada kelas' }}</td>
              <td class="px-6 py-4 text-sm text-gray-700">{{ $data->kategori ? $data->kategori->nama : 'Tidak ada kategori' }}</td>
              <td class="px-6 py-4 text-sm text-gray-700">{{ $data->gender}}</td>
              <td class="px-6 py-4 text-sm text-gray-700">{{ $data->berat_badan}}Kg</td>
              <td class="px-6 py-4 text-sm text-gray-700">{{ $data->kontingen}}</td>
              <td class="px-6 py-4 text-sm text-gray-700">{{ $data->nama_pelatih}}</td>
              <td class="px-6 py-4 text-sm text-gray-700">{{ $data->email}}</td>
              <td class="px-6 py-4 text-sm text-gray-700">{{ $data->nohp}}</td>
              <td class="px-6 py-4 text-sm text-gray-700"><img src="{{ asset('storage/' . $data->bukti_pembayaran) }}" alt="" class="h-20"></td>
              <td class="px-6 py-4 text-sm text-gray-700">    @php
                // Ubah string path menjadi array menggunakan koma sebagai pemisah
                $fotoPaths = explode(',', $data->foto);
            @endphp
            <div class="flex space-x-2">
                @foreach ($fotoPaths as $foto)
                    <img src="{{ asset('storage/' . $foto) }}" alt="Foto" class="h-20 w-20 object-cover rounded-md">
                @endforeach
            </div></td>
              <td class="px-6 py-4 text-sm text-gray-700 font-bold {{ $data->status === 0 ? 'text-red-500' : 'text-green-500' }}">{{ $data->status === 0 ? 'Belum diverifikasi' : 'Terverifikasi'}}</td>
              <td class="px-6 py-4 text-center">
                @if($data->status === 0)
                <div class="flex justify-center space-x-1">
                  <form action="{{ route('pendaftaran.verify', $data->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin verifikasi peserta ini?');">
                    @csrf
                    <button type="submit" 
                      class="px-3 py-2 bg-green-500 text-white rounded hover:bg-green-600 inline-flex justify-center items-center gap-1 transition-all">
                     <i class="fas fa-check"></i>
                    </button>
                  </form>
                  <a href="{{ route('pendaftaran.show', $data->id) }}"
                  class="px-3 py-2 bg-primary text-white rounded hover:bg-gradient-to-bl from-primary to-secondary inline-flex justify-center items-center gap-1 transition-all">
                 <i class="fas fa-eye"></i>
                  </a>
                </div>
                  @else
                  <div class="flex justify-center space-x-1">
                  <a href="{{ route('pendaftaran.print', $data->id) }}"  target="_blank"
                  class="px-3 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 inline-flex justify-center items-center gap-1 transition-all">
                 <i class="fas fa-print"></i> 
                </a>
                <a href="{{ route('pendaftaran.show', $data->id) }}"
                  class="px-3 py-2 bg-primary text-white rounded hover:bg-gradient-to-bl from-primary to-secondary inline-flex justify-center items-center gap-1 transition-all">
                 <i class="fas fa-eye"></i>
                  </a>
                </div>
              @endif
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
      <div class=" flex justify-end items-start">
        {{ $peserta->links() }}
      </div>
    </div>
  </div>
@endsection
