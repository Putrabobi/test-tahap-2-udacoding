@extends('layouts.app')

@section('title', 'Detail Mahasiswa')

@section('contents')
    <h1 class="mb-0">Detail Mahasiswa</h1>
    <hr />
    <div class="row mb-3">
        <div class="col-12 mb-4">
            <label for="nim" class="form-label">NIM</label>
            <input type="text" id="nim" name="nim" class="form-control" readonly value="{{ $mahasiswa->nim }}">
        </div>
        <div class="col-12 mb-4">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" id="nama" name="nama" class="form-control" readonly value="{{ $mahasiswa->nama }}">
        </div>
        <div class="col-12 mb-4">
            <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
            <input type="date" id="tanggal_lahir" name="tanggal_lahir" class="form-control" readonly value="{{ $mahasiswa->tanggal_lahir }}">
        </div>
        <div class="col-12 mb-4">
            <label for="alamat" class="form-label">Alamat</label>
            <input type="text" id="alamat" name="alamat" class="form-control" readonly value="{{ $mahasiswa->alamat }}">
        </div>
        <div class="col-12 mb-4">
            <label for="created_by" class="form-label">Created By Name</label>
            <input type="text" id="created_by" name="created_by" class="form-control" readonly value="{{ $mahasiswa->created_by_name }}">
        </div>
    </div> 
@endsection
