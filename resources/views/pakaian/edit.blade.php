
@extends('layout.template')

@section('title', 'Homepage')

@section('content')
    <div class="container">
        <h2>Edit Pakaian</h2>
        <form action="{{ route('pakaian.update', $pakaian->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="jenis_pakaian">Jenis Pakaian</label>
                <input type="text" class="form-control" id="jenis_pakaian" name="jenis_pakaian" value="{{ $pakaian->jenis_pakaian }}" required>
            </div>
            <div class="form-group">
                <label for="harga">Harga /Kg</label>
                <input type="number" class="form-control" id="harga" name="harga" value="{{ $pakaian->harga }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </form>
    </div>
@endsection
