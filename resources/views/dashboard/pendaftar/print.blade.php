<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Peserta</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
        }
        .container {
            max-width: 800px;
            margin: 20px auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .header h1 {
            font-size: 24px;
            color: #555;
            margin: 10px 0;
        }
        .header img {
            width: 80px;
            height: auto;
            margin-bottom: 10px;
        }
        .section-title {
            font-size: 20px;
            color: #444;
            border-bottom: 2px solid #ddd;
            margin-bottom: 15px;
            padding-bottom: 5px;
        }
        .content p {
            margin: 8px 0;
        }
        .content p strong {
            color: #555;
        }
        .file-preview {
            margin: 20px 0;
            text-align: center;
        }
        .file-preview img {
            max-width: 300px;
            height: auto;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        .file-preview iframe {
            width: 100%;
            height: 500px;
            border: none;
        }
        footer {
            text-align: center;
            margin-top: 30px;
            font-size: 12px;
            color: #999;
        }
        @media print {
            body {
                background: none;
                color: #000;
            }
            .container {
                box-shadow: none;
                border-radius: 0;
            }
        }
        /* Foto Peserta */
.foto-peserta {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 16px;
}

.foto-peserta img {
    width: 254px; /* Make the images responsive */
    max-width: 150px; /* Set a maximum width */
    height: auto;
    object-fit: cover;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}
    </style>
</head>
<body>
    <div class="container">
        <!-- Header -->
        <div class="header">
            <img src="./img/uno4.png" alt="Logo">
            <h1>UNPER OPEN IV</h1>
        </div>

        <!-- Informasi Peserta -->
        <div class="content">
            <h2 class="section-title">Informasi Peserta</h2>
            <p><strong>Nama:</strong> {{ $peserta->nama }}</p>
            <p><strong>Kelas:</strong> {{ $peserta->kelas ? $peserta->kelas->nama_kelas : 'Tidak ada kelas' }}</p>
            <p><strong>Tingkat:</strong> {{ $peserta->kelas ? $peserta->kelas->tingkat : 'Tidak ada tingkat' }}</p>
            <p><strong>Kategori:</strong> {{ $peserta->kategori ? $peserta->kategori->nama : 'Tidak ada kategori' }}</p>
            <p><strong>Jenis Kelamin:</strong> {{ $peserta->gender }}</p>
            <p><strong>Berat Badan:</strong> {{ $peserta->berat_badan }} Kg</p>
        </div>

        <!-- Kontak dan Status -->
        <div class="content">
            <h2 class="section-title">Kontak dan Status</h2>
            <p><strong>Kontingen:</strong> {{ $peserta->kontingen }}</p>
            <p><strong>Email:</strong> {{ $peserta->email }}</p>
            <p><strong>No HP / WhatsApp:</strong> {{ $peserta->nohp }}</p>
            <p><strong>Status:</strong> <span style="color: {{ $peserta->status === 0 ? 'red' : 'green' }}; font-weight: bold; max-height: 190px;">{{ $peserta->status === 0 ? 'Belum Diverifikasi' : 'Terverifikasi' }}</span></p>
        </div>

<!-- Foto Peserta -->
<div class="file-preview foto-peserta">
    <h2 class="section-title">Foto Peserta</h2>
    @if (!empty($fotoPaths))
        <div class="flex flex-wrap justify-center gap-4">
            @foreach ($fotoPaths as $fotoPath)
                @php
                    $fotoData = file_get_contents($fotoPath); // Ambil konten file
                    $fotoBase64 = 'data:image/' . pathinfo($fotoPath, PATHINFO_EXTENSION) . ';base64,' . base64_encode($fotoData);
                @endphp
                <img src="{{ $fotoBase64 }}" alt="Foto Peserta" class="h-32 w-32 object-cover rounded-md shadow-md">
            @endforeach
        </div>
    @else
        <p>Tidak ada foto tersedia.</p>
    @endif
</div>

        <!-- Bukti Pembayaran -->
        <div class="file-preview">
            <h2 class="section-title">Bukti Pembayaran</h2>
            @if ($isImage)
            <img src="{{ $filePath }}" alt="Bukti Pembayaran">
            @else
                <p>Format file tidak didukung.</p>
            @endif
        </div>
    </div>

    <!-- Footer -->
    <footer>
        © {{ date('Y') }} UKM Seni Bela Diri Pencak Silat Universitas Perjuangan. All rights reserved.
    </footer>
</body>
</html>
