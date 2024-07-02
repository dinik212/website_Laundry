<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PegawaiController extends Controller
{
    public function index()
    {
        // Mengambil data pengguna dengan role 'pegawai'
        $pegawai = User::where('role', 'pegawai')->get();
        return view('pegawai.index', compact('pegawai'));
    }

    public function create()
    {
        return view('pegawai.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'no_telp' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|max:255',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->no_telp = $request->no_telp;
        $user->alamat = $request->alamat;
        $user->password = bcrypt($request->password);
        $user->role = 'pegawai';
        $user->save();

        return redirect()->route('pegawai.index')->with('success', 'Pegawai berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $pegawai = User::findOrFail($id);
        return view('pegawai.edit', compact('pegawai'));
    }

    public function update(Request $request, $id)
    {
        $pegawai = User::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'no_telp' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'email' => ['required', 'email', Rule::unique('users')->ignore($pegawai->id)],
            'password' => 'required|string|max:255',
        ]);

        $pegawai->update($request->only(['name', 'no_telp', 'alamat', 'email','password']));

        return redirect()->route('pegawai.index')->with('success', 'Data pegawai berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $pegawai = User::findOrFail($id);
        $pegawai->delete();
        return redirect()->route('pegawai.index')->with('success', 'Data pegawai berhasil dihapus!');
    }
}
