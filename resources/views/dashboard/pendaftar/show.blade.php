@extends('dashboard.layouts.adminLayouts')

@section('container')
<div class="container mx-auto p-6">
  <!-- Header -->
  <div class="flex flex-col md:flex-row justify-between items-center mb-6">
    <h1 class="text-3xl font-bold text-gray-800">Detail Peserta</h1>
  </div>

  <!-- Detail Card -->
  <div class="bg-white shadow-md rounded-lg p-6">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
      <!-- Left Column -->
      <div>
        <h2 class="text-lg font-bold text-gray-700 border-b-2 pb-2 border-black md:w-1/2">Informasi Peserta</h2>
        <div class="mt-4 space-y-2">
          <p><span class="font-semibold">Nama:</span> {{ $peserta->nama }}</p>
          <p><span class="font-semibold">Nomor Kartu Keluarga:</span> {{ $peserta->noKK }}</p>
          <p><span class="font-semibold">NIK:</span> {{ $peserta->NIK }}</p>
          <p><span class="font-semibold">Kelas:</span> {{ $peserta->kelas ? $peserta->kelas->nama_kelas : 'Tidak ada kelas' }}</p>
          <p><span class="font-semibold">Tingkat:</span> {{ $peserta->kelas ? $peserta->kelas->tingkat : 'Tidak ada tingkat' }}</p>
          <p><span class="font-semibold">Kategori:</span> {{ $peserta->kategori ? $peserta->kategori->nama : 'Tidak ada kategori' }}</p>
          <p><span class="font-semibold">Jenis Kelamin:</span> {{ $peserta->gender }}</p>
          <p><span class="font-semibold">Berat Badan:</span> {{ $peserta->berat_badan }} Kg</p>
          <div class="font-semibold">Bukti Pembayaran:<img src="{{ asset('storage/' . $peserta->bukti_pembayaran) }}" class=" mx-auto max-h-48" alt=""></div>
          <div class=""> <!-- Gambar Tambahan (Multiple Images) -->
            @if($peserta->foto) <!-- Pastikan field 'foto' tidak kosong -->
              @php
                // Memecah string gambar menjadi array
                $fotoPaths = explode(',', $peserta->foto);
              @endphp
              <div class="font-semibold">Foto Peserta:</div>
              <div class="flex flex-wrap gap-4">
                @foreach ($fotoPaths as $foto)
                  <img src="{{ asset('storage/' . trim($foto)) }}" alt="Foto Peserta" class="h-32 w-32 object-cover rounded-md shadow">
                @endforeach
              </div>
            @endif</div>
        </div>
      </div>

      <!-- Right Column -->
      <div>
        <h2 class="text-lg font-semibold text-gray-700 border-b-2 pb-2 border-black md:w-1/2">Kontak dan Status</h2>
        <div class="mt-4 space-y-2">
          <p><span class="font-semibold">Kontingen:</span> {{ $peserta->kontingen }}</p>
          <p><span class="font-semibold">Email:</span> {{ $peserta->email }}</p>
          <p><span class="font-semibold">No HP / WhatsApp:</span> {{ $peserta->nohp }}</p>
          <p>
            <span class="font-semibold">Status:</span>
            <span 
              class="px-2 py-1 rounded text-white {{ $peserta->status === 0 ? 'bg-red-500' : 'bg-green-500' }}">
              {{ $peserta->status === 0 ? 'Belum Diverifikasi' : 'Terverifikasi' }}
            </span>
          </p>
        </div>
      </div>
    </div>

    <!-- Action Buttons -->
    <div class="mt-6 flex justify-end space-x-3">
      @if($peserta->status === 0)
      <form action="{{ route('pendaftaran.verify', $peserta->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin verifikasi peserta ini?');">
        @csrf
        <button type="submit" class="px-4 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600 transition">
          <i class="fas fa-check"></i> Verifikasi
        </button>
      </form>
      @endif
      <a href="{{ route('pendaftaran.print', $peserta->id) }}" target="_blank" class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition">
        <i class="fas fa-print"></i> Cetak
      </a>
      <a 
      href="{{ route('pendaftaran.index') }}" 
      class=" px-4 py-2 bg-primary text-white rounded-lg shadow-md hover:bg-secondary transition">
      <i class="fas fa-arrow-left"></i> Kembali
      </a>
    </div>
  </div>
</div>
@endsection
