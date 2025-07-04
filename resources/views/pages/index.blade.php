@extends('layout.app')

@section('title', 'Data Siswa')

@section('content')
    <h2>Data Siswa</h2>
    <a href="{{ route('siswa.create') }}" class="btn btn-primary mb-3">Tambah Siswa</a>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <table class="table table-bordered table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>Nama</th>
                        <th>NISN</th>
                        <th>Tempat, Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>Asal Sekolah</th>
                        <th>Jurusan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($siswas as $siswa)
                        <tr>
                            <td>{{ $siswa->nama }}</td>
                            <td>{{ $siswa->nisn }}</td>
                            <td>{{ $siswa->tempat_lahir }},
                                {{ \Carbon\Carbon::parse($siswa->tanggal_lahir)->translatedFormat('d F Y') }}</td>
                            <td>{{ $siswa->alamat }}</td>
                            <td>{{ $siswa->asal_sekolah }}</td>
                            <td>{{ $siswa->jurusan }}</td>
                            <td>
                                <form onsubmit="return confirm('Apakah Anda Yakin Ingin Menghapus Data Ini?');"
                                    action="{{ route('siswa.destroy', $siswa->id) }}" method="POST">
                                    <a href="{{ route('siswa.edit', $siswa->id) }}" class="btn btn-sm btn-warning">EDIT</a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center bg-light">Data Siswa belum Tersedia.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            {{-- Tampilkan Paginasi --}}
            <div class="d-flex justify-content-center">
                {{ $siswas->links() }}
            </div>
        </div>
    </div>
@endsection
