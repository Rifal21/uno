@extends('dashboard.layouts.adminLayouts')

@section('container')
  <div class="max-w-full mx-auto mt-8 p-6 bg-white shadow-md rounded-md">
    <h1 class="text-2xl font-bold mb-6">Tambah Galeri</h1>
    
    <!-- Form -->
    <form action="{{ route('galeri.store') }}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="mb-4">
        <label for="judul" class="block text-sm font-medium text-gray-700">Judul Gambar</label>
        <input 
          type="text" 
          id="judul" 
          name="judul" 
          class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-secondary focus:border-secondary sm:text-sm" 
          placeholder="Masukkan judul Gambar" 
          required
        >
        @error('judul')
          <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
        @enderror
      </div>
      <div class="mb-4">
        <label for="gambar" class="block text-sm font-medium text-gray-700">Gambar</label>
        <input 
          type="file" 
          id="gambar" 
          name="gambar" 
          class="block w-full px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-secondary focus:border-secondary sm:text-sm"  
          required
          onchange="previewImage()" 
        >
        @error('gambar')
          <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
        @enderror
      </div>
      <div class="relative z-0 w-full mb-5">
        <img id="image-preview" class="w-32 h-32 object-cover rounded-md hidden" alt="Gambar Preview">
      </div>
      <div class="mb-4">
        <label for="deskripsi" class="block text-sm font-medium text-gray-700">Deskripsi Gambar</label>
        <textarea
          id="deskripsi" 
          name="deskripsi" 
          class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-secondary focus:border-secondary sm:text-sm"
        ></textarea>
        @error('deskripsi')
          <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
        @enderror
      </div>

      <div class="flex justify-end space-x-3">
        <a href="/dashboard/galeri" class="px-4 py-2 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-400">
          Batal
        </a>
        <button type="submit" class="px-4 py-2 bg-gradient-to-r from-primary to-secondary text-white rounded-md hover:bg-gradient-to-l transition-colors">
          Simpan
        </button>
      </div>
    </form>
  </div>

  <script>
    function previewImage() {
      const fileInput = document.getElementById('gambar');
      const imagePreview = document.getElementById('image-preview');
      const file = fileInput.files[0];

      if (file) {
        const reader = new FileReader();
        reader.onload = (e) => {
          imagePreview.src = e.target.result;
          imagePreview.classList.remove('hidden');
        };
        reader.readAsDataURL(file);
      } else {
        imagePreview.src = '';
        imagePreview.classList.add('hidden'); // Sembunyikan elemen gambar jika tidak ada file
      }
    }
  </script>
@endsection
