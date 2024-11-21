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
        timer: 5000,                // Display for 3 seconds
        timerProgressBar: true,     // Show progress bar during the timer
        customClass: {
          popup: 'colored-toast'    // Optional: Add custom styling class if needed
        }
      });
    });
  </script>
  @endif

  <div class="flex flex-col space-y-6">
    <!-- Header -->
    <div class="flex justify-between items-center">
      <h1 class="text-2xl font-bold">Kelas Pertandingan</h1>
      <button 
        class="flex items-center px-4 py-2 bg-primary text-white text-sm font-medium rounded "
        onclick="window.location.href='{{ route('kelas.create') }}'">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
        </svg>
        Tambah Kelas
      </button>
    </div>

    <!-- Table -->
    <div class="overflow-x-auto shadow border border-gray-200 rounded-lg">
      <table class="min-w-full bg-white divide-y divide-gray-200">
        <thead class="bg-gray-50">
          <tr>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">#</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama Kelas</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tingkat</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kategori</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Berat Badan Minimum</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Berat Badan Maximum</th>
            <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
          @foreach($kelas as $index => $item)
          <tr>
            <td class="px-6 py-4 text-sm text-gray-700">{{ $index + 1 }}</td>
            <td class="px-6 py-4 text-sm text-gray-700">{{ $item->nama_kelas }}</td>
            <td class="px-6 py-4 text-sm text-gray-700">{{ $item->tingkat }}</td>
            <td class="px-6 py-4 text-sm text-gray-700">{{ $item->kategori->nama }}</td>
            <td class="px-6 py-4 text-sm text-gray-700">{{ $item->BBMin }}Kg</td>
            <td class="px-6 py-4 text-sm text-gray-700">{{ $item->BBMax }}Kg</td>
            <td class="px-6 py-4 text-center">
              <div class="flex justify-center space-x-2">
                <!-- Edit Button -->
                <a href="{{ route('kelas.edit', $item->id) }}" 
                  class="px-3 py-2 bg-primary text-white rounded hover:bg-gradient-to-bl from-primary to-secondary inline-flex justify-center items-center gap-1">
                  <i class="fas fa-edit"></i> <span class="md:flex hidden">Edit</span>
                </a>
                <!-- Delete Button -->
                <form action="{{ route('kelas.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus kelas ini?');">
                  @csrf
                  @method('DELETE')
                  <button type="submit" 
                    class="px-3 py-2 bg-tertiary text-white rounded hover:bg-red-700 inline-flex justify-center items-center gap-1">
                   <i class="fas fa-trash"></i> <span class="md:flex hidden">Delete</span>
                  </button>
                </form>
              </div>
            </td>
          </tr>
          @endforeach
          </tbody>
        </table>
      </div>
      <div class=" flex justify-end items-start">
        {{ $kelas->links() }}
      </div>
  </div>
@endsection
