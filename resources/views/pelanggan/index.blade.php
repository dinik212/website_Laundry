@extends('layout.template')

@section('title', 'Homepage')

@section('content')
    <div class="container">
        <h1>Data Pelanggan</h1>
        <a href="{{ route('pelanggan.create') }}" class="btn btn-primary mb-3 btn-sm">Tambah Pelanggan Baru</a>
        <table class="table">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>No Telp</th>
                    <th>Email</th>
                    <th>Aksi</th>

                    <!-- Tambahkan kolom lainnya sesuai kebutuhan -->
                </tr>
            </thead>
            <tbody>
                @foreach ($pelanggan as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->alamat }}</td>
                        <td>{{ $user->no_telp }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <a href="{{ route('pelanggan.edit', $user->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('pelanggan.destroy', $user->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
