<?php

namespace App\Http\Controllers;

use App\Models\GaleriUNO;
use Illuminate\Http\Request;
use App\Http\Requests\StoreGaleriUNORequest;
use App\Http\Requests\UpdateGaleriUNORequest;
use Illuminate\Support\Facades\Storage;

class GaleriUNOController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.galeri.index', [
            'galeri' => GaleriUNO::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.galeri.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'judul' => 'required|max:255',
            'gambar' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'deskripsi' => 'required',
        ]);

        if ($request->hasFile('gambar')) {
            $validatedData['gambar'] = $request->file('gambar')->store('galeri');
        }

        GaleriUNO::create($validatedData);

        return redirect('/dashboard/galeri')->with('toast_success', 'Gambar berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(GaleriUNO $galeriUNO)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(GaleriUNO $galeri)
    {
        return view('dashboard.galeri.edit', [
            'galeri' => $galeri
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,GaleriUNO $galeri)
    {
        $validatedData = $request->validate([
            'judul' => 'required|max:255',
            'deskripsi' => 'required',
        ]);

        if ($request->hasFile('gambar')) {
            Storage::delete($galeri->gambar);
            $validatedData['gambar'] = $request->file('gambar')->store('galeri');
        }

        GaleriUNO::where('id', $galeri->id)->update($validatedData);

        return redirect('/dashboard/galeri')->with('toast_success', 'Gambar berhasil diubah!!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $galeri = GaleriUNO::findOrFail($id);
        if ($galeri->gambar) {
            Storage::delete($galeri->gambar);
        }
        $galeri->delete();
        return redirect('/dashboard/galeri')->with('toast_success', 'Gambar berhasil dihapus!!');
    }
}
