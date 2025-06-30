{{-- resources/views/pengujian/create.blade.php --}}
@extends('layout.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="pull-left">
                <h2>Tambah Data Baru</h2>
            </div>
            <div class="pull-right mb-3">
                <a class="btn btn-primary" href="{{ route('pengujian.index') }}"> Kembali</a>
            </div>
        </div>
    </div>

    <form action="{{ route('pengujian.store') }}" method="POST">
        @csrf
        <div class="row">
            <!-- FIELD NIM DITAMBAHKAN -->
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group mb-3">
                    <strong>NIM:</strong>
                    <input type="text" name="nim" class="form-control" placeholder="Nomor Induk Mahasiswa"
                        value="{{ old('nim') }}">
                    @error('nim')
                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <!-- AKHIR FIELD NIM -->

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group mb-3">
                    <strong>Nama Mahasiswa:</strong>
                    <input type="text" name="nama" class="form-control" placeholder="Nama Mahasiswa"
                        value="{{ old('nama') }}">
                    @error('nama')
                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group mb-3">
                    <strong>Prodi & Kelas:</strong>
                    <input type="text" name="prodi_kelas" class="form-control" placeholder="Contoh: TI-2022-A"
                        value="{{ old('prodi_kelas') }}">
                    @error('prodi_kelas')
                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group mb-3">
                    <strong>Nama Dosen:</strong>
                    <input type="text" name="nama_penguji" class="form-control" placeholder="Nama Dosen"
                        value="{{ old('nama_penguji') }}">
                    @error('nama_penguji')
                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-success">SAVE</button>
            </div>
        </div>
    </form>
@endsection
