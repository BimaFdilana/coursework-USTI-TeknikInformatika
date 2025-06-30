{{-- resources/views/pages/edit.blade.php --}}
@extends('layout.app') {{-- Pastikan nama layout Anda benar, jika layout.app maka ini benar --}}

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="pull-left">
                <h2>Edit Data</h2>
            </div>
            <div class="pull-right mb-3">
                <a class="btn btn-primary" href="{{ route('pengujian.index') }}"> Kembali</a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> Ada masalah dengan input Anda.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- BAGIAN YANG DITAMBAHKAN: FORM TAG --}}
    <form action="{{ route('pengujian.update', $pengujian->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row mt-3">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group mb-3">
                    <strong>NIM:</strong>
                    <input type="text" name="nim" class="form-control" placeholder="Nomor Induk Mahasiswa"
                        value="{{ old('nim', $pengujian->nim) }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group mb-3">
                    <strong>Nama Mahasiswa:</strong>
                    <input type="text" name="nama" class="form-control" placeholder="Nama Mahasiswa"
                        value="{{ old('nama', $pengujian->nama) }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group mb-3">
                    <strong>Prodi & Kelas:</strong>
                    <input type="text" name="prodi_kelas" class="form-control" placeholder="Contoh: TI-2022-A"
                        value="{{ old('prodi_kelas', $pengujian->prodi_kelas) }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group mb-3">
                    <strong>Nama Penguji:</strong>
                    <input type="text" name="nama_penguji" class="form-control" placeholder="Nama Dosen Penguji"
                        value="{{ old('nama_penguji', $pengujian->nama_penguji) }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-success">UPDATE DATA</button>
            </div>
        </div>

    </form> {{-- BAGIAN YANG DITAMBAHKAN: PENUTUP FORM --}}

@endsection
