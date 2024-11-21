@extends('layouts.main')

@section('container')
<div class="min-h-screen flex flex-wrap items-center justify-center bg-gradient-to-b from-primary to-secondary text-white gap-5">
    <div class="p-6 max-w-lg w-full bg-white shadow-lg rounded-lg text-gray-800 mt-24 md:mt-0">
        <h2 class="text-2xl font-bold text-center mb-4">Kontak Narahubung</h2>
        <p class="text-center text-gray-600 mb-6">Silakan hubungi kami melalui kontak di bawah ini untuk informasi lebih lanjut.</p>
        <div class="space-y-4">
            <a href="https://wa.me/6287838933656" class="flex items-center space-x-4 hover:shadow-lg transition hover:scale-105 p-1">
                <span class="bg-primary text-white rounded-full p-3">
                    <i class="fab fa-whatsapp"></i>
                </span>
                <div>
                    <p class="text-sm text-gray-500 uppercase font-bold">sarah</p>
                    <p class="font-medium">+6287838933656</p>
                </div>
            </a>
            <a href="https://wa.me/6288901349117" class="flex items-center space-x-4 hover:shadow-lg transition hover:scale-105 p-1">
                <span class="bg-primary text-white rounded-full p-3">
                  <i class="fab fa-whatsapp"></i>
                </span>
                <div>
                    <p class="text-sm text-gray-500 uppercase font-bold">ihsan</p>
                    <p class="font-medium">+6288901349117</p>
                </div>
            </a>
        </div>
    </div>
    <div class="p-6 max-w-lg w-full bg-white shadow-lg rounded-lg text-gray-800">
        <h2 class="text-2xl font-bold text-center mb-4">Informasi Pembayaran</h2>
        <p class="text-center text-gray-600 mb-6">Silakan lakukan pembayaran lewat transfer ke rekening di bawah ini.</p>
        <div class="space-y-4 flex justify-between">
          <a href="https://wa.me/6287838933656" class="flex items-center space-x-4 hover:shadow-lg transition hover:scale-105 p-1">
              <span class="bg-primary text-white rounded-full p-3">
                  <i class="fas fa-credit-card"></i>
              </span>
              <div>
                  <p class="text-sm text-gray-500 capitalize">Bank BRI A/N Negi Rahmah Azizia</p>
                  <p class="font-medium">No. Rekening : <span id="rekening">445701032629536</span></p>
              </div>
          </a>
          <button onclick="copyToClipboard('445701032629536')" class="mt-2 px-4 py-2 bg-secondary text-white rounded hover:bg-secondary-dark transition">
              Salin No. Rekening
          </button>
        </div>      
    </div>
</div>
<script>
  function copyToClipboard(text) {
      navigator.clipboard.writeText(text).then(() => {
          alert('No. Rekening berhasil disalin!');
      }).catch(err => {
          alert('Gagal menyalin. Silakan coba lagi.');
          console.error(err);
      });
  }
</script>
@endsection
