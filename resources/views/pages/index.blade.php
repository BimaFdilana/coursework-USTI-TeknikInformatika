{{-- resources/views/pengujian/index.blade.php --}}
@extends('layout.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h2>CRUD Data Pengujian</h2>
                <a class="btn btn-success" href="{{ route('pengujian.create') }}"> Tambah Data</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>NIM</th> <!-- DITAMBAHKAN -->
                <th>Nama Mahasiswa</th>
                <th>Prodi & Kelas</th>
                <th>Nama Penguji</th>
                <th width="280px">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($dataPengujian as $pengujian)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $pengujian->nim }}</td> <!-- DITAMBAHKAN -->
                    <td>{{ $pengujian->nama }}</td>
                    <td>{{ $pengujian->prodi_kelas }}</td>
                    <td>{{ $pengujian->nama_penguji }}</td>
                    <td>
                        <form action="{{ route('pengujian.destroy', $pengujian->id) }}" method="POST">
                            <a class="btn btn-sm btn-primary" href="{{ route('pengujian.edit', $pengujian->id) }}">Edit</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger"
                                onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <!-- colspan diubah menjadi 6 -->
                <tr>
                    <td colspan="6" class="text-center">Data masih kosong.</td>
                </tr>
            @endforelse
        </tbody>
    </table>


    {{-- Menampilkan Paginasi --}}
    {!! $dataPengujian->links() !!}
@endsection
