@extends('dashboard.layouts.adminLayouts')

@section('container')
  <div class="max-w-full mx-auto mt-8 p-6 bg-white shadow-md rounded-md">
    <h1 class="text-2xl font-bold mb-6">Edit Kategori</h1>
    
    <!-- Form -->
    <form action="{{ route('kategori.update', $kategori->id) }}" method="POST">
      @csrf
      @method('PUT') <!-- Untuk mendukung metode HTTP PUT -->
      
      <div class="mb-4">
        <label for="nama" class="block text-sm font-medium text-gray-700">Nama Kategori</label>
        <input 
          type="text" 
          id="nama" 
          name="nama" 
          value="{{ old('nama', $kategori->nama) }}" 
          class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-secondary focus:border-secondary sm:text-sm" 
          placeholder="Masukkan nama kategori" 
          required
        >
        @error('nama')
          <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
        @enderror
      </div>

      <div class="flex justify-end space-x-3">
        <a href="/dashboard/kategori" class="px-4 py-2 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-400">
          Batal
        </a>
        <button type="submit" class="px-4 py-2 bg-gradient-to-r from-primary to-secondary text-white rounded-md hover:bg-gradient-to-l transition-colors">
          Simpan
        </button>
      </div>
    </form>
  </div>
@endsection
