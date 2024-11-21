@extends('dashboard.layouts.adminLayouts')

@section('container')
  <div class="max-w-full mx-auto mt-8 p-6 bg-white shadow-md rounded-md">
    <h1 class="text-2xl font-bold mb-6">Edit Kelas</h1>
    
    <!-- Form -->
    <form action="{{ route('kelas.update', $kelas->id) }}" method="POST">
      @csrf
      @method('PUT')
      <div class="mb-4">
        <label for="id_kategori" class="block text-sm font-medium text-gray-700">Kategori Tanding</label>
        <select 
          id="id_kategori" 
          name="id_kategori" 
          class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-secondary focus:border-secondary sm:text-sm" 
          required
        >
          <option value="" disabled>Pilih kategori</option>
          @foreach ($categories as $kategori)
            <option 
              value="{{ $kategori->id }}" 
              {{ $kelas->id_kategori == $kategori->id ? 'selected' : '' }}
            >
              {{ $kategori->nama }}
            </option>
          @endforeach
        </select>
        @error('id_kategori')
          <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
        @enderror
      </div>      
      <div class="mb-4">
        <label for="nama_kelas" class="block text-sm font-medium text-gray-700">Nama Kelas</label>
        <input 
          type="text" 
          id="nama_kelas" 
          name="nama_kelas" 
          value="{{ old('nama_kelas', $kelas->nama_kelas) }}"
          class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-secondary focus:border-secondary sm:text-sm" 
          placeholder="Masukkan nama kelas" 
          required
        >
        @error('nama_kelas')
          <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
        @enderror
      </div>
      <div class="mb-4">
        <label for="tingkat" class="block text-sm font-medium text-gray-700">Tingkat</label>
        <input 
          type="text" 
          id="tingkat" 
          name="tingkat" 
          value="{{ old('tingkat', $kelas->tingkat) }}"
          class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-secondary focus:border-secondary sm:text-sm" 
          placeholder="Masukkan tingkat kelas" 
          required
        >
        @error('tingkat')
          <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
        @enderror
      </div>
      <div class="mb-4">
        <label for="BBMin" class="block text-sm font-medium text-gray-700">Berat Badan Minimum</label>
        <input 
          type="number" 
          id="BBMin" 
          name="BBMin" 
          value="{{ old('BBMin', $kelas->BBMin) }}"
          class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-secondary focus:border-secondary sm:text-sm" 
          placeholder="Masukkan BB Minimum" 
        >
        @error('BBMin')
          <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
        @enderror
      </div>
      <div class="mb-4">
        <label for="BBMax" class="block text-sm font-medium text-gray-700">Berat Badan Maximum</label>
        <input 
          type="number" 
          id="BBMax" 
          name="BBMax" 
          value="{{ old('BBMax', $kelas->BBMax) }}"
          class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-secondary focus:border-secondary sm:text-sm" 
          placeholder="Masukkan BB Maximum" 
        >
        @error('BBMax')
          <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
        @enderror
      </div>

      <div class="flex justify-end space-x-3">
        <a href="/dashboard/kelas" class="px-4 py-2 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-400">
          Batal
        </a>
        <button type="submit" class="px-4 py-2 bg-gradient-to-r from-primary to-secondary text-white rounded-md hover:bg-gradient-to-l transition-colors">
          Simpan
        </button>
      </div>
    </form>
  </div>
@endsection
