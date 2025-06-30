<?php

// app/Http/Controllers/PengujianController.php

namespace App\Http\Controllers;

use App\Models\Pengujian; // Import model
use Illuminate\Http\Request;

class PengujianController extends Controller
{
    /**
     * Menampilkan daftar semua data.
     */
    public function index()
    {
        $dataPengujian = Pengujian::latest()->paginate(10);
        return view('pages.index', compact('dataPengujian'));
    }

    /**
     * Menampilkan form untuk membuat data baru.
     */
    public function create()
    {
        return view('pages.create');
    }

    /**
     * Menyimpan data baru ke database.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nim'          => 'required|string|max:20|unique:pengujians,nim',
            'nama'         => 'required|string|max:255',
            'prodi_kelas'  => 'required|string|max:255',
            'nama_penguji' => 'required|string|max:255',
        ]);

        Pengujian::create($request->all());

        return redirect()->route('pengujian.index')
            ->with('success', 'Data berhasil ditambahkan.');
    }

    /**
     * Menampilkan form untuk mengedit data.
     */
    public function edit(Pengujian $pengujian)
    {
        return view('pages.edit', compact('pengujian'));
    }

    /**
     * Memperbarui data di database.
     */
    public function update(Request $request, Pengujian $pengujian)
    {
        // Validasi input
        $request->validate([
            'nim'          => 'required|string|max:20|unique:pengujians,nim,' . $pengujian->id,
            'nama'         => 'required|string|max:255',
            'prodi_kelas'  => 'required|string|max:255',
            'nama_penguji' => 'required|string|max:255',
        ]);

        $pengujian->update($request->all());

        return redirect()->route('pengujian.index')
            ->with('success', 'Data berhasil diperbarui.');
    }

    /**
     * Menghapus data dari database.
     */
    public function destroy(Pengujian $pengujian)
    {
        $pengujian->delete();

        return redirect()->route('pengujian.index')
            ->with('success', 'Data berhasil dihapus.');
    }
}