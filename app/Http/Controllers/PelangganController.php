<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PelangganController extends Controller
{
    public function index()
    {
        // Mengambil data pengguna dengan role 'pelanggan'
        $pelanggan = User::where('role', 'pelanggan')->get();
        return view('pelanggan.index', compact('pelanggan'));
    }

    public function create()
    {
        return view('pelanggan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'no_telp' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|max:255',
            // tambahkan validasi lainnya sesuai kebutuhan
        ]);

        $user = new User();
        $user->fill($request->only(['name', 'alamat', 'no_telp', 'email', 'password'])); // Mengisi atribut dengan data yang diterima dari request
        $user->role = 'pelanggan';
        // tambahkan atribut lainnya sesuai kebutuhan
        $user->save();

        return redirect()->route('pelanggan.index')->with('success', 'Pelanggan berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $pelanggan = User::findOrFail($id);
        return view('pelanggan.edit', compact('pelanggan'));
    }

    public function update(Request $request, $id)
{
    $pelanggan = User::findOrFail($id);

    $request->validate([
        'name' => 'required|string|max:255',
        'email' => ['required', 'email', Rule::unique('users')->ignore($id)],
        'alamat' => 'required|string|max:255',
        'no_telp' => 'required|string|max:255',
        'password' => 'required|string|max:255', // Tambahkan validasi untuk nomor telepon
        // tambahkan validasi lainnya sesuai kebutuhan
    ]);

    $pelanggan->update($request->only(['name', 'email', 'alamat', 'no_telp', 'password']));

    return redirect()->route('pelanggan.index')->with('success', 'Data pelanggan berhasil diperbarui!');
}

    public function destroy($id)
    {
        $pelanggan = User::findOrFail($id);
        $pelanggan->delete();
        return redirect()->route('pelanggan.index')->with('success', 'Data pelanggan berhasil dihapus!');
    }
}
