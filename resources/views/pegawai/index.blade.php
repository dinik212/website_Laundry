@extends('layout.template')

@section('title', 'Data Pegawai')

@section('content')
    <div class="container">
        <h1>Data Pegawai</h1>
        <a href="{{ route('pegawai.create') }}" class="btn btn-primary mb-3 btn-sm">Tambah Pegawai</a>
        <table class="table">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Alamat</th>
                    <th>No Telp</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pegawai as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->alamat }}</td>
                        <td>{{ $user->no_telp }}</td>
                        <td>
                            <a href="{{ route('pegawai.edit', $user->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('pegawai.destroy', $user->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus pegawai ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
