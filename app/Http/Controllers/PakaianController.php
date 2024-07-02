<?php

namespace App\Http\Controllers;

use App\Models\Pakaian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PakaianController extends Controller
{
    public function index(Request $request)
{
    $namaPakaian = $request->input('nama_pakaian');
    $pakaian = Pakaian::where('jenis_pakaian', 'like', "%$namaPakaian%")->get();
    return view('pakaian.index', compact('pakaian'));
}

     public function cekPakaian()
    {
        return view('pelanggan.cek');
    }

    public function searchPakaian(Request $request)
    {
        $namaPakaian = $request->input('nama_pakaian');
        $pakaian = Pakaian::where('jenis_pakaian', 'LIKE', "%{$namaPakaian}%")->get();

        return view('pelanggan.cek', compact('pakaian'));
    }


    public function create()
    {
        return view('pakaian.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'jenis_pakaian' => 'required|string|max:255',
            'harga' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->route('pakaian.create')
                        ->withErrors($validator)
                        ->withInput();
        }

        Pakaian::create($request->all());

        return redirect()->route('pakaian.index')->with('success', 'Pakaian berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $pakaian = Pakaian::findOrFail($id);
        return view('pakaian.edit', compact('pakaian'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'jenis_pakaian' => 'required|string|max:255',
            'harga' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->route('pakaian.edit', $id)
                        ->withErrors($validator)
                        ->withInput();
        }

        $pakaian = Pakaian::findOrFail($id);
        $pakaian->update($request->all());

        return redirect()->route('pakaian.index')->with('success', 'Pakaian berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $pakaian = Pakaian::findOrFail($id);
        $pakaian->delete();

        return redirect()->route('pakaian.index')->with('success', 'Pakaian berhasil dihapus!');
    }
}
