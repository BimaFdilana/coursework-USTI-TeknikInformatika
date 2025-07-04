<?php

// app/Http/Controllers/PengujianController.php

namespace App\Http\Controllers;

use App\Models\Pengujian; // Import model
use Illuminate\Http\Request;

class PengujianController extends Controller
{
    // Menampilkan semua data siswa
    public function index()
    {
        $siswas = Pengujian::latest()->paginate(5); // Mengambil data terbaru dan paginasi
        return view('pages.index', compact('siswas'));
    }

    // Menampilkan form untuk membuat data baru
    public function create()
    {
        return view('pages.create');
    }

    // Menyimpan data baru ke database
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required|min:3',
            'nisn' => 'required|unique:pengujians,nisn',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required',
            'asal_sekolah' => 'required',
            'jurusan' => 'required',
        ]);

        // Membuat data baru
        Pengujian::create($request->all());

        return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil ditambahkan.');
    }

    // Menampilkan form untuk mengedit data
    public function edit(Pengujian $siswa)
    {
        return view('pages.edit', compact('siswa'));
    }

    // Memperbarui data di database
    public function update(Request $request, Pengujian $siswa)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required|min:3',
            'nisn' => 'required|unique:siswas,nisn,' . $siswa->id, // NISN boleh sama dengan data yg sedang diedit
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required',
            'asal_sekolah' => 'required',
            'jurusan' => 'required',
        ]);

        // Update data
        $siswa->update($request->all());

        return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil diperbarui.');
    }

    // Menghapus data dari database
    public function destroy(Pengujian $siswa)
    {
        $siswa->delete();
        return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil dihapus.');
    }
}