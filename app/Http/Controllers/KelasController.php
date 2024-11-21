<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Kategori;
use Illuminate\Http\Request;
use App\Http\Requests\StoreKelasRequest;
use App\Http\Requests\UpdateKelasRequest;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kelas = Kelas::with('kategori')->latest()->paginate(10); 
        return view('dashboard.kelas.index', compact('kelas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.kelas.create', [
            'categories' => Kategori::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_kelas' => 'required|string|max:255',
            'tingkat' => 'required|string|max:255',
            'id_kategori' => 'required', // Pastikan ID kategori valid
            'BBMin' => 'nullable|numeric|min:0', // Berat minimum harus berupa angka positif
            'BBMax' => 'nullable|numeric|min:0', // Berat maksimum harus berupa angka positif
        ]);
    
        // Set nilai default untuk BBMin dan BBMax jika tidak diberikan
        $validatedData['BBMin'] = $validatedData['BBMin'] ?? null;
        $validatedData['BBMax'] = $validatedData['BBMax'] ?? null;
    
        // Pastikan BBMin tidak lebih besar dari BBMax
        if (!is_null($validatedData['BBMin']) && !is_null($validatedData['BBMax'])) {
            if ($validatedData['BBMin'] > $validatedData['BBMax']) {
                return redirect()->back()->withErrors([
                    'BBMax' => 'Berat maksimum tidak boleh lebih kecil dari berat minimum.',
                ])->withInput();
            }
        }
    
        // Simpan data ke tabel Kelas
        Kelas::create($validatedData);
    
        return redirect('/dashboard/kelas')->with('toast_success', 'Kelas berhasil dibuat!');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(Kelas $kelas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $kelas = Kelas::findOrFail($id);
        $categories = Kategori::all(); // Ambil semua kategori
        return view('dashboard.kelas.edit', compact('kelas', 'categories'));
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama_kelas' => 'required|string|max:255',
            'tingkat' => 'required|string|max:255',
            'id_kategori' => 'required',
            'BBMin' => 'nullable|numeric|min:0',
            'BBMax' => 'nullable|numeric|min:0',
        ]);
    
        if (!is_null($validatedData['BBMin']) && !is_null($validatedData['BBMax'])) {
            if ($validatedData['BBMin'] > $validatedData['BBMax']) {
                return redirect()->back()->withErrors([
                    'BBMax' => 'Berat maksimum tidak boleh lebih kecil dari berat minimum.',
                ])->withInput();
            }
        }
    
        $kelas = Kelas::findOrFail($id);
        $kelas->update($validatedData);
    
        return redirect('/dashboard/kelas')->with('toast_success', 'Kelas berhasil diperbarui!');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $Kelas = Kelas::find($id);
        $Kelas->delete();
        return redirect('/dashboard/kelas')->with('toast_success', 'Kelas berhasil dihapus!!');
    }

    public function getKelasByKategoriAndBerat(Request $request)
{
    $kategoriId = $request->input('id_kategori');
    $beratBadan = $request->input('berat_badan');

    $kelas = Kelas::where('id_kategori', $kategoriId)
                  ->where('BBMin', '<=', $beratBadan)
                  ->where('BBMax', '>=', $beratBadan)
                  ->get();

    return response()->json($kelas);
}
}
