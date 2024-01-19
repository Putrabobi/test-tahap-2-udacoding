@extends('layouts.app')

@section('title', 'Edit Mahasiswa')

@section('contents')
    <h1 class="mb-0">Edit Mahasiswa</h1>
    <hr />
    <form action="{{ route('mahasiswas.update', $mahasiswa->id) }}" method="POST">
        @csrf
        @method('PUT')
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="row mb-3">
            <div class="col-12 mb-4">
                <label for="nim" class="form-label">NIM</label>
                <input type="text" id="nim" name="nim" class="form-control" placeholder="NIM" value="{{ $mahasiswa->nim }}">
            </div>
            <div class="col-12 mb-4">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" id="nama" name="nama" class="form-control" placeholder="Nama" value="{{ $mahasiswa->nama }}">
            </div>
            <div class="col-12 mb-4">
                <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                <input type="date" id="tanggal_lahir" name="tanggal_lahir" class="form-control" placeholder="Tanggal Lahir" value="{{ $mahasiswa->tanggal_lahir }}">
            </div>
            <div class="col-12 mb-4">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" id="alamat" name="alamat" class="form-control" placeholder="Alamat" value="{{ $mahasiswa->alamat }}">
            </div>
        </div> 
        <div class="row">
            <div class="d-grid">
                <button class="btn btn-warning">Update</button>
            </div>
        </div>
    </form>
@endsection
