@extends('layouts.app')

@section('title', 'Home Mahasiswa')

@section('contents')
<div class="d-flex align-items-center justify-content-between">
    <h1 class="mb-0">List Mahasiswa</h1>
    <a href="{{ route('mahasiswas.create')}}" class="btn btn-primary">Add</a>
</div>
<hr />
@if(Session::has('success'))
<div class="alert alert-success" role="alert">
    {{ Session::get('success' )}}
</div>
@endif
<table class="table table-hover">
    <thead class="table-primary">
        <tr>
            <th>#</th>
            <th>Created By</th>
            <th>NIM</th>
            <th>Nama</th>
            <th>Tanggal Lahir</th>
            <th>Alamat</th>
            <th>Action</th>

        </tr>
    </thead>
    <tbody>+
        @if ($mahasiswas->count() >0)
        @foreach ($mahasiswas as $rs)
        <tr>
            <td class="align-middle">{{ $loop->iteration }}</td>
            <td class="align-middle">{{ $rs->created_by_name }}</td>
            <td class="align-middle">{{ $rs->nim }}</td>
            <td class="align-middle">{{ $rs->nama }}</td>
            <td class="align-middle">{{ $rs->tanggal_lahir }}</td>
            <td class="align-middle">{{ $rs->alamat }}</td>
            <td class="align-middle">
                <div class="btn-group" role="group" aria-label="Basic example">
                    <a href="{{ route('mahasiswas.show', $rs->id) }}" type="button" class="btn btn-secondary">Detail</a>
                    <a href="{{ route('mahasiswas.edit', $rs->id) }}" type="button" class="btn btn-warning">Edit</a>
                    <form action="{{ route('mahasiswas.destroy', $rs->id) }}" method="POST" type="button"
                        class="btn btn-danger btn-sm">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm m-0">Delete</button>
                    </form>

                </div>
            </td>
        </tr>

        @endforeach
        @else
        <tr>
            <td class="text-center" colspan="7">Data not found</td>
        </tr>

        @endif
    </tbody>
</table>

@endsection
