@extends('layouts.main')

@section('container')
<div class="bg-gradient-to-b from-primary to-secondary min-h-screen text-white">
  <div class=" mx-auto  md:px-20 px-5">
    <!-- Header -->
    <div class="text-center mb-8 mt-20 flex flex-col md:flex-row md:justify-center">
      <img src="img/uno4.png" alt="Logo" class="md:w-72 md:h-72 w-48 h-48 mx-auto rounded-full " />
      <img src="img/icon/logonav.png" alt="Logo" class="md:w-96 md:h-72 w-72 h-48 mx-auto rounded-full " />
    </div>

    <!-- Deskripsi -->
    <div class="mb-5">
      <h5 class="text-3xl font-bold mb-4 text-center uppercase text-white bg-gradient-to-r from-primary to-secondary shadow-lg">Unper open iv</h5>
      <p class="text-justify indent-8 text-lg leading-relaxed font-medium">
        UKM Pencak Silat Universitas Perjuangan ini bukan pertama kali nya membuat
        kegiatan Kejuaraan Pencak Silat, dari awal kejuaraan ini di buat yaitu UNPER OPEN I
        pada tahun 2018, yang di selenggarakan pada tingkat Daerah (KEJURDA) UNPER
        OPEN II, pada tahun 2019, yang di selenggarakan pada tingkat Nasional
        (KEJURNAS).
      </p>
      <p class="text-justify indent-8 text-lg leading-relaxed font-medium">
        Pada tahun 2020 Kejuaraan Pencaksilat Universitas Perjuangan tersendat atau
        terhenti di karnakan Virus Covid 19 yang menyebabkan tidak terselenggarakan nya
        kegiatan Kejuaraan Universitas Perjuwangan. Pada tahun 2023 Unit Kegiatan
        Mahasiswa (UKM) Pencak Silat Universitas Perjuangan telah menyelengarakan lagi
        Kejuaraan Nasional yang telah terhenti selama 3 tahun lamanya.
      </p>
      <p class="text-justify indent-8 text-lg leading-relaxed font-medium">
        Pada taun 2023 UNPER OPEN III, yang di selenggarakan pada tingkat Daerah
        (KEJURDA) alhamdulillah terlaksana dengan baik dan lancar. Adapun kejuaraan
        UNPER OPEN IV akan diselenggarakan pada tanggal 9 – 10 Februari 2025 dan
        bertujuan untuk menjadi ajang kompetisi yang tidak hanya menguji keterampilan para
        atlet, tetapi juga menjadi sarana pembinaan dan pengembangan bakat pencak silat di
        tingkat daerah.
      </p>
      <p class="text-justify indent-8 text-lg leading-relaxed font-medium">
        Kejuaraan ini diharapkan dapat memberikan kesempatan bagi para atlet muda
        untuk berkompetisi, menunjukan kemampuan, serta mempersiapkan diri untuk ajang
        yang lebih tinggi, seperti kejuaraan nasional (Porda) dan internasional (Kejuaraan
        dunia).
      </p>
      <p class="text-justify indent-8 text-lg leading-relaxed font-medium">
        Melalui UNPER OPEN IV, UKM Pencak Silat Universitas Perjuangan ingin
        menegaskan komitmennya dalam melestarikan dan mengembangkan budaya pencak
        silat sebagai warisan bangsa. Kegiatan ini diharapkan dapat menginspirasi mahasiswa
        untuk lebih mencintai seni bela diri, serta membangun semangat sportifitas dan
        kebersamaan di antara para peserta.
      </p>
      <p class="text-justify indent-8 text-lg leading-relaxed font-medium">
        Kami berharap, UNPER OPEN IV tidak hanya sekadar
        kompetisi, tetapi juga menjadi wadah bagi para peserta untuk
        belajar, bertukar pengalaman, dan menjalin jaringan di antara
        pencinta pencak silat.
      </p>
      <p class="text-justify indent-8 text-lg leading-relaxed font-medium">
        Dengan demikian, kejuaraan ini akan berkontribusi dalam
        menciptakan atlet yang berprestasi dan mencintai budaya
        Indonesia, sekaligus memperkuat visi dan Misi Universitas
        Perjuangan dalam mengedepankan nilai-nilai kebudayaan dan
        prestasi di kancah nasional.
      </p>
    </div>

    <!-- Kejuaraan -->
    <div class="">
      {{-- <h5 class="text-lg font-bold mb-6 text-tertiary"></h5> --}}
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        <div class="space-y-4">
          <h6 class="font-bold text-tertiary"><i class="fas fa-award"></i> Tema Kegiatan</h6>
          <p class="text-sm font-medium">
            "Menguatkan Tradisi, Mengukir Prestasi: Menjadikan Pencak Silat
sebagai Pilar Karakter Bangsa”.
          </p>
        </div>
        <div class="space-y-4">
          <h6 class="font-bold text-tertiary"><i class="fas fa-fire"></i> Nama Kegiatan</h6>
          <p class="text-sm font-medium">
            Kegiatan ini bernama “ UNPER OPEN IV “.
          </p>
        </div>
        <div class="space-y-4">
          <h6 class="font-bold text-tertiary"><i class="fas fa-users"></i> Peserta</h6>
          <p class="text-sm font-medium">
            Peserta yaitu pesilat usia SD (Pra Usia Dini & Usia Dini), SMP (Pra Remaja), SMA
            (Remaja) dan Dewasa yang mewakili Sekolah/Perguruan Pencak Silat /Club/PengKab
            IPSI se-Jawa barat dan Undangan yang terdiri dari 1500 pesilat.
          </p>
        </div>
        <div class="space-y-4">
          <h6 class="font-bold text-tertiary"><i class="fas fa-users"></i> Pelaksanaan Kegiatan</h6>
          <p class="text-sm font-medium">
            Hari : Jum’at s.d Minggu <br>
            Tanggal : 7 s/d 9 Februari 2025 <br>
            Tempat : GOR Siliwangi Futsal Centre Tasikmalaya
          </p>
        </div>
        <div class="space-y-4">
          <h6 class="font-bold text-tertiary"><i class="fas fa-list"></i> Persyaratan Peserta</h6>
          <p class="text-sm font-medium">
            a. Kategori Pra Usia Dini, Usia Dini, Pra Remaja, Remaja dan Dewasa <br>
            - Foto KK Asli ,KTP (Dewasa) <br>
            - Surat Keterangan Dokter <br>
            - Pas Foto <br>
            - Surat Izin Orang Tua (mencantumkan nomor handphone) <br>
            - Rekomendasi dari Sekolah/Perguruan/Club Pencak Silat/PengCab IPSI <br>
            - Mengisi link Pendaftaran <br>
            - Membayar uang pendaftaran 
          </p>
        </div>
        <div class="space-y-4">
          <h6 class="font-bold text-tertiary"><i class="fas fa-star"></i> Petunjuk Teknis Lebih Lengkap</h6>
          <p class="text-sm font-medium">
            <a href="#" class="hover:text-blue-500 underline"><i class="fas fa-download"></i> Unduh Petunjuk Pelaksana Teknis</a>
          </p>
        </div>
      </div>
    </div>
  </div>
  <div class=" mx-auto md:px-20 px-10">
    <!-- Header -->
    <div class="text-center mb-8 mt-10">
      <h5 class="text-3xl font-bold mb-4 text-center uppercase text-white bg-gradient-to-r from-primary to-secondary shadow-lg">UKM Seni Bela Diri Pencak Silat</h5>
      <img src="img/silat.png" alt="Logo" class="md:w-72 md:h-72 w-48 h-48 mx-auto rounded-full " />
    </div>

    <!-- Deskripsi -->
    <div class="mb-10">
      {{-- <h5 class="text-lg font-bold mb-4 text-center">✓ </h5> --}}
      <p class="text-justify indent-8 text-lg leading-relaxed">
        Unit Kegiatan Mahasiswa Seni Bela Diri Pencak Silat Padjadjaran merupakan salah satu UKM yang didirikan tanggal 
        28 Febuari 2016 di bawah naungan Universitas Perjuangan, bertujuan untuk mewadahi mahasiswa-mahasiswi Universitas 
        Perjuangan yang mempunyai minat dan bakat dalam kegiatan seni bela diri khususnya Pencak Silat.
      </p>
    </div>

    <!-- Kejuaraan -->
    <div class="mb-12">
      <h5 class="text-2xl font-bold mb-6 text-tertiary"><i class="fas fa-trophy"></i> Kejuaraan Yang Pernah Diraih</h5>
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        <div class="space-y-4">
          <h6 class="font-bold text-tertiary">→ Citra resmi wijaya 
          </h6>
          <p class="text-sm font-medium">
            - TIM BK PORDA 2018 kab. TASIKMALAYA <br>
            - juara II porda 2018 <br>
            - ⁠juara III KEJURDA MAHASISWA 2022 <br>
            - JUARA I PAKUBUMI CUP KELAS C <br>
            - ⁠JUARA I PAKUBUMI CUP TGR
          </p>
        </div>
        <div class="space-y-4">
          <h6 class="font-bold text-tertiary">→ SENTANU CADIAMAN WIJAYA

          </h6>
          <p class="text-sm font-medium">
            - TIM BK PORDA 2018 kab. TASIK MALAYA <br>
            - ⁠JUARA I PAKU BUMI CUP 2019 <br>
            - ⁠JUARA I KUNINGAN OPEN
          </p>
        </div>
        <div class="space-y-4">
          <h6 class="font-bold text-tertiary">→ IKHWAN

          </h6>
          <p class="text-sm font-medium">
            - JUARA I PAKU BUMI CUP <br>
            - ⁠JUARA I KUNINGAN OPEN <br>
            - ⁠JUARA III PORDA 2022 <br>
            - ⁠TIM BK PORDA KAB. Tasikmalaya
          </p>
        </div>
        <div class="space-y-4">
          <h6 class="font-bold text-tertiary">→ Diki Rediana</h6>
          <p class="text-sm font-medium">
            - Kejuaraan Silat Banjar Tahun 2022 Meraih Juara 3 <br>
            - Kejuarda Mahasiswa Tahun 2022 Meraih Juara 3 <br>
            - TGO Meraih Juara 2
          </p>
        </div>
        <div class="space-y-4">
          <h6 class="font-bold text-tertiary">→ Seni Mustari</h6>
          <p class="text-sm font-medium">
            - Juara 3 Tanding Putri Banjar Open Championship Tahun 2022 <br>
            - Juara 1 Peragaan Jurus Guru Besar Cup Indramayu 2022
          </p>
        </div>
        <div class="space-y-4">
          <h6 class="font-bold text-tertiary">→ Nia Reswati</h6>
          <p class="text-sm font-medium">
            - Juara 1 Tunggal Putri Jawara Padjadjaran 2022 <br>
            - Juara 3 Tunggal Banjar Open Championship 2022 <br>
            - Juara 1 Tunggal Guru Besar Cup 2022
          </p>
        </div>
        <div class="space-y-4">
          <h6 class="font-bold text-tertiary">→ Salman Rizki</h6>
          <p class="text-sm font-medium">- Juara 3 Tanding Putra Banjar Open Championship 2022</p>
        </div>
        <div class="space-y-4">
          <h6 class="font-bold text-tertiary">→ Farhan Roid</h6>
          <p class="text-sm font-medium">
            - Juara 1 Kejurda Jawara Padjadjaran 2022 <br>
            - Juara 3 Gubes Cup 2022
          </p>
        </div>
        <div class="space-y-4">
          <h6 class="font-bold text-tertiary">→ Gina Sona Eryana</h6>
          <p class="text-sm font-medium">
            - Juara 2 Kejurda Jawara Padjadjaran <br>
            - Juara 3 Gubes Cup Indramayu 2022
          </p>
        </div>
        <div class="space-y-4">
          <h6 class="font-bold text-tertiary">→ Disya</h6>
          <p class="text-sm font-medium">
            - JUARA III BANJAR CAPION SHIP
            - ⁠JUARA III KEJURDA MAHASISWA 2022
            - ⁠JUARA III KEJURNAS
            - ⁠JUARA II KEJURDA PAJADJARAN
          </p>
        </div>
        <div class="space-y-4">
          <h6 class="font-bold text-tertiary">→ Rival</h6>
          <p class="text-sm font-medium">
            - JUARA I KEJURDA PADJAJARAN
          </p>
        </div>
        <div class="space-y-4">
          <h6 class="font-bold text-tertiary">→ Shefia</h6>
          <p class="text-sm font-medium">
            - JUARA II KEJURDA PADJAJARAN <br>
            - JUARA II BANJAR Championship
          </p>
        </div>
        <div class="space-y-4">
          <h6 class="font-bold text-tertiary">→ ALDI HADI HIDAYAT
          </h6>
          <p class="text-sm font-medium">
            - JUARA I PAKUBUMI OPEN ASIA EROPA <br>
            - ⁠JUARA III KEJURDA MAHASISWA 2022 <br>
            - ⁠TIM BK PORDA KAB.TASIK MALAYA <br>
            - ⁠JUARA I JAWARA TATAR GALUH <br>
            - ⁠JUARA JUARA III BANJAR CHAPION SHIP
          </p>
        </div>
      </div>
    </div>
  </div>


  
    <!-- SVG Wave -->
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
      <path fill="#921f1b" fill-opacity="1" d="M0,0L21.8,21.3C43.6,43,87,85,131,85.3C174.5,85,218,43,262,42.7C305.5,43,349,85,393,96C436.4,107,480,85,524,74.7C567.3,64,611,64,655,101.3C698.2,139,742,213,785,208C829.1,203,873,117,916,90.7C960,64,1004,96,1047,96C1090.9,96,1135,64,1178,74.7C1221.8,85,1265,139,1309,154.7C1352.7,171,1396,149,1418,138.7L1440,128L1440,320L1418.2,320C1396.4,320,1353,320,1309,320C1265.5,320,1222,320,1178,320C1134.5,320,1091,320,1047,320C1003.6,320,960,320,916,320C872.7,320,829,320,785,320C741.8,320,698,320,655,320C610.9,320,567,320,524,320C480,320,436,320,393,320C349.1,320,305,320,262,320C218.2,320,175,320,131,320C87.3,320,44,320,22,320L0,320Z"></path>
    </svg>
  </div>
@endsection
