@extends('layouts.main')

@section('container')
<div class=" bg-gradient-to-t from-primary to-secondary">
  <div class="w-full min-h-screen flex flex-col items-center justify-center ">
    <div class="flex flex-col mt-20">
      <img src="{{ asset('img/uno4.png') }}" class="md:w-48 md:h-48 w-32 h-32 mx-auto" alt="">
    </div>
    <div class="w-full p-5 flex flex-col md:flex-row justify-center items-start gap-10">
      <div class="w-full md:w-1/2"> 
        <h1 class="text-xl font-bold text-center text-white mb-5 uppercase">Pendaftaran Unper open iv</h1>
        <form class="max-w-md mx-auto shadow-xl p-6 bg-gradient-to-br from-primary to-secondary rounded-md" action="{{ route('daftar.store') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="relative z-0 w-full mb-5 group">
            <label for="kategori" class="sr-only">Kategori</label>
            <select id="kategori_select" name="id_kategori" class="block py-2.5 px-0 w-full text-sm text-black bg-transparent border-0 border-b-2 border-white   focus:outline-none focus:ring-0 focus:border-tertiary   peer">
                <option selected>Pilih Kategori</option>
                @foreach ($kategori as $item)                 
                <option value="{{ $item->id }}">{{ $item->nama }}</option>
                @endforeach
            </select>
          </div>
          <div class="relative z-0 w-full mb-5 group">
            <label for="gender" class="sr-only">Jenis Kelamin</label>
            <select id="underline_select" name="gender" class="block py-2.5 px-0 w-full text-sm text-black bg-transparent border-0 border-b-2 border-white appearance-none dark:text-gray-400  focus:outline-none focus:ring-0 focus:border-tertiary  peer">
                <option selected>Pilih Jenis Kelamin</option>
                <option value="laki-laki">Laki-laki</option>
                <option value="perempuan">Perempuan</option>
            </select>
          </div>
          <div class="relative z-0 w-full mb-2 group">
            <input type="number" name="berat_badan" id="floating_email" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-white appearance-none dark:text-black dark:border-gray-600 dark:focus:border-tertiary focus:outline-none focus:ring-0 focus:border-tertiary peer" placeholder=" " required min="0" step="0.1" />
            <label for="berat_badan" class="peer-focus:font-medium absolute text-sm text-black  duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-tertiary peer-focus:dark:text-tertiary peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Berat Badan (Kg)</label>
            <span class="text-xs text-white font-semibold italic">*Jika memilih kategori seni, inputkan berat badan 0 saja, lalu pilih kelas sesuai tingkat</span>
          </div>
          <div class="relative z-0 w-full mb-5 group">
            <label for="id_kelas" class="sr-only">Kelas</label>
            <select id="kelas_select" name="id_kelas" class="block py-2.5 px-0 w-full text-sm text-black bg-transparent border-0 border-b-2 border-white appearance-none  focus:outline-none focus:ring-0 focus:border-tertiary   peer">
                <option selected>Pilih Kelas</option>
                @foreach ($kelas as $item)
                <option value="{{ $item->id }}">{{ $item->nama_kelas }} || {{ $item->tingkat }} => {{ $item->BBMin }}Kg - {{ $item->BBMax }}Kg</option>
                @endforeach
            </select>
          </div>
          {{-- <div class="relative z-0 w-full mb-5 group">
              <input type="text" name="nama" id="floating_email" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-white appearance-none dark:text-black  focus:outline-none focus:ring-0 focus:border-tertiary peer" placeholder=" " required />
              <label for="nama" class="peer-focus:font-medium absolute text-sm text-black  duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-tertiary peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Nama Lengkap Peserta</label>
          </div> --}}
          <div id="nama-container" class="relative z-0 w-full mb-5 group">
            <label for="nama" class="peer-focus:font-medium absolute text-sm text-black duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-tertiary peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Nama Lengkap Peserta</label>
        </div>
          <div class="relative z-0 w-full mb-5 group">
              <input type="text" name="kontingen" id="floating_email" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-white appearance-none dark:text-black dark:border-gray-600 dark:focus:border-tertiary focus:outline-none focus:ring-0 focus:border-tertiary peer" placeholder=" " required />
              <label for="kontingen" class="peer-focus:font-medium absolute text-sm text-black  duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-tertiary peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Kontingen</label>
          </div>
          <div class="relative z-0 w-full mb-5 group">
              <input type="email" name="email" id="floating_email" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-white appearance-none dark:text-black  focus:outline-none focus:ring-0 focus:border-tertiary peer" placeholder=" " required />
              <label for="email" class="peer-focus:font-medium absolute text-sm text-black  duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-tertiary peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Email </label>
          </div>
          <div class="relative z-0 w-full mb-5 group">
            <input type="text" name="nohp" id="floating_email" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-white appearance-none dark:text-black  focus:outline-none focus:ring-0 focus:border-tertiary peer" placeholder=" " required />
            <label for="nohp" class="peer-focus:font-medium absolute text-sm text-black  duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-tertiary peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">No. Hp / Whatsapp</label>
        </div>
          <button type="submit" class="text-white bg-tertiary hover:bg-red-800 font-medium rounded-lg text-sm w-full px-5 py-2.5 text-center">Submit</button>
        </form>
      </div>
      <!-- Form Bukti Pembayaran -->
      <div class="w-full md:w-1/2">
        <h1 class="text-xl font-bold text-center text-white mb-5 uppercase">Upload Bukti Pembayaran</h1>
        <form id="formInput" class="shadow-xl p-6 bg-gradient-to-br from-primary to-secondary rounded-md" 
              method="POST" enctype="multipart/form-data">
              @method('PUT')
          @csrf
          <input type="hidden" id="peserta_id" name="peserta_id" >
          <!-- Input untuk mencari nama -->
          <div class="relative  w-full mb-5 group z-10">
            <input type="text" id="search_nama" name="nama[]" 
                   class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-white focus:outline-none focus:ring-0 focus:border-tertiary peer" 
                   placeholder=" " required />
            <label for="search_nama" class="peer-focus:font-medium absolute text-lg text-white duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Cari Nama Peserta</label>
            <ul id="search_results" class="absolute w-full bg-white border border-gray-300 mt-1 hidden"></ul>
          </div>

          <!-- Input untuk upload bukti -->
          <div class="relative z-0 w-full mb-5 group">
            <input type="file" name="bukti_pembayaran" id="bukti_pembayaran"
                   class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none " required onchange="previewImage()">
            <label for="bukti_pembayaran" class="text-sm text-white">Upload Bukti Pembayaran</label>
          </div>
          <div class="relative z-0 w-full mb-5">
            <img id="image-preview" class="w-full h-auto rounded-md hidden" alt="Preview Bukti Pembayaran">
          </div>
          <button type="submit" class="text-white bg-tertiary hover:bg-red-800 font-medium rounded-lg text-sm w-full px-5 py-2.5 text-center">Submit</button>
        </form>
      </div>
    </div>
  </div>
  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#921f1b" fill-opacity="1" d="M0,192L21.8,202.7C43.6,213,87,235,131,218.7C174.5,203,218,149,262,138.7C305.5,128,349,160,393,154.7C436.4,149,480,107,524,106.7C567.3,107,611,149,655,154.7C698.2,160,742,128,785,112C829.1,96,873,96,916,122.7C960,149,1004,203,1047,208C1090.9,213,1135,171,1178,176C1221.8,181,1265,235,1309,229.3C1352.7,224,1396,160,1418,128L1440,96L1440,320L1418.2,320C1396.4,320,1353,320,1309,320C1265.5,320,1222,320,1178,320C1134.5,320,1091,320,1047,320C1003.6,320,960,320,916,320C872.7,320,829,320,785,320C741.8,320,698,320,655,320C610.9,320,567,320,524,320C480,320,436,320,393,320C349.1,320,305,320,262,320C218.2,320,175,320,131,320C87.3,320,44,320,22,320L0,320Z"></path></svg>
</div>








<script>
  function previewImage() {
    const image = document.querySelector('#image');
    const imgPreview = document.querySelector('.img-preview');

    imgPreview.style.display = 'block';

    const oFReader = new FileReader();
    oFReader.readAsDataURL(image.files[0]);

    oFReader.onload = function(oFREvent) { 
      imgPreview.src = oFREvent.target.result;
    }
  }
</script>
<script>
  document.addEventListener('DOMContentLoaded', () => {
    const kategoriSelect = document.querySelector('select[name="id_kategori"]');
    const beratBadanInput = document.querySelector('input[name="berat_badan"]');
    const kelasSelect = document.querySelector('select[name="id_kelas"]');
    const namaContainer = document.getElementById('nama-container');

    const fetchKelas = () => {
        const kategoriId = kategoriSelect.value;
        const beratBadan = beratBadanInput.value;

        if (kategoriId && beratBadan) {
            fetch(`/get-kelas?id_kategori=${kategoriId}&berat_badan=${beratBadan}`)
                .then(response => response.json())
                .then(data => {
                    // Clear previous options
                    kelasSelect.innerHTML = '<option selected>Pilih Kelas</option>';

                    // Populate with new options
                    data.forEach(kelas => {
                        const option = document.createElement('option');
                        option.value = kelas.id;
                        option.textContent = kelas.nama_kelas + ' || ' + kelas.tingkat + ' => ' + kelas.BBMin + 'Kg - ' + kelas.BBMax + 'Kg';
                        kelasSelect.appendChild(option);
                    });
                })
                .catch(error => console.error('Error fetching kelas:', error));
        }
    };

    const updateNamaInputs = () => {
        const kategoriText = kategoriSelect.options[kategoriSelect.selectedIndex].text.toLowerCase();
        
        // Clear previous inputs
        namaContainer.innerHTML = '';

        // Determine number of input fields
        let jumlahInput = 1;
        if (kategoriText.includes('seni ganda')) {
            jumlahInput = 2;
        } else if (kategoriText.includes('seni regu')) {
            jumlahInput = 3;
        }

        // Generate input fields
        for (let i = 1; i <= jumlahInput; i++) {
            const input = document.createElement('input');
            input.type = 'text';
            input.name = `nama[]`;
            input.placeholder = `Nama Lengkap Peserta ${i}`;
            input.className = 'block py-2.5 px-0 w-full text-sm text-black bg-transparent border-0 border-b-2 border-white focus:outline-none focus:ring-0 focus:border-tertiary peer mb-3';
            input.required = true;

            namaContainer.appendChild(input);
        }
    };

    // Trigger fetch when kategori or berat badan changes
    kategoriSelect.addEventListener('change', () => {
        fetchKelas();
        updateNamaInputs();
    });
    beratBadanInput.addEventListener('input', fetchKelas);
});

// document.addEventListener('DOMContentLoaded', () => {
//     const searchNamaInput = document.querySelector('#search_nama');
//     const searchResults = document.querySelector('#search_results');

//     searchNamaInput.addEventListener('input', () => {
//         const query = searchNamaInput.value;

//         if (query.length > 2) { // Mulai pencarian jika karakter lebih dari 2
//             fetch(`/search-nama?query=${query}`)
//                 .then(response => response.json())
//                 .then(data => {
//                     searchResults.innerHTML = ''; // Kosongkan hasil sebelumnya
//                     data.forEach(item => {
//                         const li = document.createElement('li');
//                         li.textContent = item.nama;
//                         li.className = 'p-2 cursor-pointer hover:bg-gray-200';
//                         li.addEventListener('click', () => {
//                             searchNamaInput.value = item.nama;
//                             searchResults.innerHTML = '';
//                             searchResults.classList.add('hidden');
//                         });
//                         searchResults.appendChild(li);
//                     });
//                     searchResults.classList.remove('hidden');
//                 })
//                 .catch(error => console.error('Error:', error));
//         } else {
//             searchResults.innerHTML = '';
//             searchResults.classList.add('hidden');
//         }
//     });

//     document.addEventListener('click', (e) => {
//         if (!searchNamaInput.contains(e.target) && !searchResults.contains(e.target)) {
//             searchResults.innerHTML = '';
//             searchResults.classList.add('hidden');
//         }
//     });
// });

// document.addEventListener('DOMContentLoaded', () => {
//     const searchNamaInput = document.querySelector('#search_nama');
//     const searchResults = document.querySelector('#search_results');

//     searchNamaInput.addEventListener('input', () => {
//         const query = searchNamaInput.value;

//         if (query.length > 2) { // Mulai pencarian jika karakter lebih dari 2
//             fetch(`/search-nama?query=${query}`)
//                 .then(response => response.json())
//                 .then(data => {
//                     searchResults.innerHTML = ''; // Kosongkan hasil sebelumnya
//                     data.forEach(item => {
//                         const li = document.createElement('li');
//                         // Jika item.nama adalah array, gabungkan elemen-elemen menjadi string
//                         li.textContent = Array.isArray(item.nama) ? item.nama.join(', ') : item.nama;
//                         li.className = 'p-2 cursor-pointer hover:bg-gray-200';
//                         li.addEventListener('click', () => {
//                             searchNamaInput.value = item.nama;
//                             searchResults.innerHTML = ''; // Kosongkan hasil setelah memilih
//                             searchResults.classList.add('hidden');
//                         });
//                         searchResults.appendChild(li);
//                     });
//                     searchResults.classList.remove('hidden'); // Tampilkan hasil pencarian
//                 })
//                 .catch(error => console.error('Error:', error));
//         } else {
//             searchResults.innerHTML = ''; // Kosongkan hasil pencarian jika query terlalu pendek
//             searchResults.classList.add('hidden'); // Sembunyikan hasil
//         }
//     });

//     // Menutup hasil pencarian jika klik di luar input atau hasil pencarian
//     document.addEventListener('click', (e) => {
//         if (!searchNamaInput.contains(e.target) && !searchResults.contains(e.target)) {
//             searchResults.innerHTML = ''; // Kosongkan hasil
//             searchResults.classList.add('hidden'); // Sembunyikan hasil
//         }
//     });
// });

document.addEventListener('DOMContentLoaded', () => {
    const searchNamaInput = document.querySelector('#search_nama');
    const searchResults = document.querySelector('#search_results');
    const hiddenPesertaId = document.querySelector('#peserta_id'); // Input hidden untuk ID
    const formElement = document.querySelector('#formInput'); // Form elemen untuk mengupdate action URL

    // Event ketika user mengetik di input pencarian
    searchNamaInput.addEventListener('input', () => {
        const query = searchNamaInput.value;

        if (query.length > 2) { // Mulai pencarian jika input lebih dari 2 karakter
            fetch(`/search-nama?query=${query}`)
                .then(response => response.json())
                .then(data => {
                    searchResults.innerHTML = ''; // Kosongkan hasil pencarian sebelumnya
                    if (data.length === 0) {
                        const li = document.createElement('li');
                        li.textContent = 'Nama tidak ditemukan';
                        li.className = 'p-2 text-gray-500';
                        searchResults.appendChild(li);
                    } else {
                        data.forEach(item => {
                            const li = document.createElement('li');
                            li.textContent = item.nama; // Tampilkan nama peserta
                            li.className = 'p-2 cursor-pointer hover:bg-gray-200';

                            // Klik item pencarian untuk memilih nama
                            li.addEventListener('click', () => {
                                searchNamaInput.value = item.nama; // Isi input dengan nama peserta
                                hiddenPesertaId.value = item.id; // Isi hidden input dengan ID peserta
                                searchResults.innerHTML = ''; // Kosongkan hasil pencarian
                                searchResults.classList.add('hidden'); // Sembunyikan hasil pencarian

                                // Update form action dengan ID peserta
                                formElement.action = `/daftar/${item.id}`;
                            });

                            searchResults.appendChild(li);
                        });
                    }
                    searchResults.classList.remove('hidden'); // Tampilkan hasil pencarian
                })
                .catch(error => console.error('Error:', error));
        } else {
            searchResults.innerHTML = ''; // Kosongkan jika input terlalu pendek
            searchResults.classList.add('hidden'); // Sembunyikan hasil pencarian
        }
    });

    // Menutup dropdown hasil pencarian jika klik di luar
    document.addEventListener('click', (e) => {
        if (!searchNamaInput.contains(e.target) && !searchResults.contains(e.target)) {
            searchResults.innerHTML = ''; // Kosongkan hasil
            searchResults.classList.add('hidden'); // Sembunyikan hasil pencarian
        }
    });
});






function previewImage() {
    const fileInput = document.getElementById('bukti_pembayaran');
    const imagePreview = document.getElementById('image-preview');
    const file = fileInput.files[0];

    if (file) {
      const reader = new FileReader();
      reader.onload = (e) => {
        imagePreview.src = e.target.result;
        imagePreview.classList.remove('hidden'); // Tampilkan elemen gambar
      };
      reader.readAsDataURL(file);
    } else {
      imagePreview.src = '';
      imagePreview.classList.add('hidden'); // Sembunyikan elemen gambar jika tidak ada file
    }
  }
</script>
@endsection
