
@extends('layout.template')

@section('title', 'Homepage')

@section('content')
    <div class="container">
        <h2>Daftar Pakaian</h2>
        <a href="{{ route('pakaian.create') }}" class="btn btn-primary mb-3 btn-sm">Tambah Pakaian Baru</a>
        <table class="table">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Jenis Pakaian</th>
                    <th>Harga /Kg</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pakaian as $p)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $p->jenis_pakaian }}</td>
                        <td>Rp{{ number_format($p->harga, 0, ',', '.') }}</td>
                        <td>
                            <a href="{{ route('pakaian.edit', $p->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('pakaian.destroy', $p->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
