@extends('layout.template')

@section('title', 'Edit Pelanggan')

@section('content')
<div class="container">
    <h1>Edit Pelanggan</h1>
    <form action="{{ route('pelanggan.update', $pelanggan->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Nama</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $pelanggan->name }}">
        </div>
        <div class="form-group">
            <label for="alamat">Alamat</label>
            <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $pelanggan->alamat }}">
        </div>
        <div class="form-group">
            <label for="no_telp">No Telp</label>
            <input type="text" class="form-control" id="no_telp" name="no_telp" value="{{ $pelanggan->no_telp }}">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $pelanggan->email }}">
        </div>
        <div class="form-group">
            <label for="passwrod">Password</label>
            <input type="password" class="form-control" id="password" name="password" value="{{ $pelanggan->passswrod }}">
        </div>
        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    </form>
</div>
@endsection
