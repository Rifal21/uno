<?php

namespace App\Http\Controllers;

use App\Models\Daftar;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Illuminate\Support\Facades\Storage;

class PesertaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Daftar::query();
    
        if ($search = $request->input('search')) {
            $query->where('nama', 'like', "%{$search}%")
                  ->orWhereHas('kelas', function ($q) use ($search) {
                      $q->where('tingkat', 'like', "%{$search}%");
                  })
                  ->orWhereHas('kategori', function ($q) use ($search) {
                      $q->where('nama', 'like', "%{$search}%");
                  });
        }
    
        $peserta = $query->with(['kelas', 'kategori'])->paginate(10);
    
        return view('dashboard.pendaftar.index', compact('peserta'));
    
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $daftar = Daftar::find($id);
        return view('dashboard.pendaftar.show', [
            'peserta' => $daftar
        ]);
    }
    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Daftar $daftar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Daftar $daftar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Daftar $daftar)
    {
        Daftar::destroy($daftar->id);
        return redirect('/dashboard/calon')->with('toast_success', 'Data telah dihapus!');
        // return $daftar;
    }

    public function verify($id)
    {
        $peserta = Daftar::find($id);
        $peserta->update(['status' => 1]);
        return redirect('/dashboard/pendaftaran')->with('toast_success', 'Data telah diverifikasi!');
    }
    public function print($id)
    {
        // Ambil data peserta berdasarkan ID
        $peserta = Daftar::with(['kelas', 'kategori'])->find($id);
    
        // Jika peserta atau file tidak ditemukan, kembalikan pesan error
        if (!$peserta || !$peserta->bukti_pembayaran || !Storage::disk('public')->exists($peserta->bukti_pembayaran)) {
            return redirect()->back()->with('error', 'Bukti pembayaran tidak ditemukan.');
        }
    
        // Cek ekstensi file
        $filePath = storage_path('app/public/' . $peserta->bukti_pembayaran);
        $fileExtension = pathinfo($filePath, PATHINFO_EXTENSION);
    
        // Tentukan apakah file adalah gambar atau PDF
        $isImage = in_array(strtolower($fileExtension), ['jpg', 'jpeg', 'png']);
    
        // Render view ke PDF
        $pdf = PDF::loadView('dashboard.pendaftar.print', [
            'peserta' => $peserta,
            'filePath' => $filePath,
            'isImage' => $isImage,
        ]);
    
        // Tentukan nama file PDF
        $fileName = 'Detail_Peserta_' . $peserta->nama . '.pdf';
    
        // Return PDF ke browser
        return $pdf->stream($fileName);
    }
    
    
}
