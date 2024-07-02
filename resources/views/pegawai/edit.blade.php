@extends('layout.template')

@section('title', 'Edit Pegawai')

@section('content')
    <div class="container">
        <h1>Edit Pegawai</h1>
        <form action="{{ route('pegawai.update', $pegawai->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Nama</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $pegawai->name }}" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ $pegawai->email }}" required>
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" name="alamat" id="alamat" class="form-control" value="{{ $pegawai->alamat }}" required>
            </div>
            <div class="mb-3">
                <label for="no_telp" class="form-label">No Telp</label>
                <input type="text" name="no_telp" id="no_telp" class="form-control" value="{{ $pegawai->no_telp }}" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" id="password" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection
