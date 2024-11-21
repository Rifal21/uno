<?php

namespace App\Http\Controllers;

use App\Models\Daftar;
use App\Models\Kategori;
use App\Models\Kelas;
use Illuminate\Http\Request;
use App\Http\Requests\StoreDaftarRequest;
use App\Http\Requests\UpdateDaftarRequest;

class DaftarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('daftar', [
            // 'prodies' => Prodi::all()
            'kategori' => Kategori::all(),
            'kelas' => Kelas::all(),
            'peserta' => Daftar::all()
        ]);
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
        $validatedData = $request->validate([
            'id_kategori' => 'required',
            'gender' => 'required',
            'nama' => 'required|array',
            'nama.*' => 'required',
            'berat_badan' => 'required',
            'id_kelas' => 'required',
            'kontingen' => 'required',
            'email' => 'required',
            'nohp' => 'required',
        ]);

        $validatedData['nama'] = implode(', ', $validatedData['nama']);
        
        $number = $request->input('nohp');

            if (!is_numeric($number)) {
                return back()->with('toast_error', 'Input yang anda masukan bukan nomor hp')->withInput();
        }

        Daftar::create($validatedData);

        return redirect('/kontak')->with('toast_success', 'Pendaftaran Berhasil');
    }

    /**
     * Display the specified resource.
     */
    public function show(Daftar $daftar)
    {
        //
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
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'bukti_pembayaran' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);


        $daftar = Daftar::findOrFail($id);
        if ($request->hasFile('bukti_pembayaran')) {
            $validatedData['bukti_pembayaran'] = $request->file('bukti_pembayaran')->store('bukti_pembayaran');
        }

        $daftar->update($validatedData);

        return redirect('/daftar')->with('toast_success', 'Bukti pembayaran berhasil dilampirkan!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Daftar $daftar)
    {
        //
    }

    public function searchNama(Request $request)
{
    $request->validate([
        'query' => 'required|string|max:255',
    ]);

    $query = $request->query('query');

    $results = Daftar::where('nama', 'LIKE', "%{$query}%")->get(['nama', 'id']);

    return response()->json($results);
}

}
