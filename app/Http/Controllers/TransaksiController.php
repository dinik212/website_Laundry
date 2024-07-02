<?php

namespace App\Http\Controllers;

use App\Models\Weight;
use App\Models\Pakaian;
use App\Models\Pemesanan;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;

class TransaksiController extends Controller
{
public function index()
{
    $Role = auth()->user()->role;
    $transaksis = Transaksi::all();

    if (Auth::user()->role == 'pegawai') {
        return view('pegawai.hasil', compact('transaksis'));
    } else {
        return view('transaksi.index', compact('transaksis'));
    }
}

  public function create(Request $request)
{
    $pemesanan_id = $request->input('pemesanan_id');
    $pemesanan = Pemesanan::find($pemesanan_id);
    $user = null;
    $pakaian = Pakaian::all();

    // Mengambil data berat terbaru dari tabel weight_data
    $weight_data = Weight::latest()->first();

    // Check if the provided pemesanan_id is valid
    if (!$pemesanan) {
        // Handle the case where the Pemesanan is not found
        return redirect()->route('pemesanan.index')->with('error', 'Invalid Pemesanan ID.');
    }

    // Fetch the user associated with the Pemesanan, if available
    if ($pemesanan->id_user) {
        $user = User::find($pemesanan->id_user);
    }

    return view('transaksi.create', compact('pemesanan', 'user', 'pakaian', 'weight_data'));
}



public function store(Request $request)
{
    // Validasi data jika diperlukan

    // Hitung total bayar
    $totalBerat = $request->total_berat;
    $pakaianId = $request->pakaian_id;
    $diskon = $request->diskon;
    $hargaPakaian = \App\Models\Pakaian::findOrFail($pakaianId)->harga;
    $totalBayar = ($totalBerat * $hargaPakaian) - $diskon;

    // Buat instance Transaksi dan set nilai atribut
    $transaksi = new Transaksi();
    $transaksi->user_id = $request->user_id;
    $transaksi->pakaian_id = $pakaianId;
    $transaksi->pemesanan_id = $request->pemesanan_id;
    $transaksi->tgl_ditimbang = $request->tgl_ditimbang;
    $transaksi->tgl_diambil = $request->tgl_diambil;
    $transaksi->total_berat = $totalBerat;
    $transaksi->diskon = $diskon;
    $transaksi->total_bayar = $totalBayar;
    $transaksi->status_pembayaran = 'belum lunas'; // Tetap set ke 'belum lunas'

    // Simpan transaksi ke database
    $transaksi->save();
    // Perbarui status pemesanan
    $pemesanan = Pemesanan::find($request->pemesanan_id);
    $pemesanan->status_pemesanan = 'sudah diproses';
    $pemesanan->save();

    // Tentukan rute dan tindakan yang sesuai berdasarkan peran
    if (Auth::user()->role == 'pegawai') {
    // Jika yang melakukan adalah pegawai, arahkan ke view tanpa aksi
    return redirect()->route('pegawai.hasil')->with('success', 'Transaksi berhasil ditambahkan.');
    } else {
    // Jika yang melakukan adalah admin, arahkan ke halaman index transaksi
    return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil ditambahkan.');
    }

    }

    // Metode untuk memperbarui transaksi
    public function update(Request $request, $id)
    {
        $request->validate([
            'user_id' => 'required',
            'pakaian_id' => 'required',
            'pemesanan_id' => 'required',
            'total_berat' => 'required|numeric',
            'diskon' => 'required|numeric',
            'tgl_ditimbang' => 'required|date',
            'status_pembayaran' => 'required|in:belum_lunas,lunas',
            'bukti_pembayaran' => 'nullable|file',
        ]);

        $transaksi = Transaksi::findOrFail($id);
        $pakaian = Pakaian::findOrFail($request->pakaian_id);
        $totalBayar = ($request->total_berat * $pakaian->harga) - $request->diskon;

        $transaksi->update([
            'user_id' => $request->user_id,
            'pakaian_id' => $request->pakaian_id,
            'pemesanan_id' => $request->pemesanan_id,
            'total_berat' => $request->total_berat,
            'diskon' => $request->diskon,
            'tgl_ditimbang' => $request->tgl_ditimbang,
            'status_pembayaran' => $request->status_pembayaran,
            'total_bayar' => $totalBayar,
        ]);

        if ($request->hasFile('bukti_pembayaran')) {
            $path = $request->file('bukti_pembayaran')->store('bukti_pembayaran');
            $transaksi->bukti_pembayaran = $path;
        }

        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil diperbarui.');
    }

        public function confirm($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $transaksi->tgl_diambil = Carbon::now();
        $transaksi->save();

        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil dikonfirmasi.');
    }
        public function print($id)
    {
        $transaksi = Transaksi::with('user', 'pakaian', 'pemesanan')->findOrFail($id);

        $html = view('transaksi.print', compact('transaksi'))->render();

        // Konfigurasi header untuk mendownload file HTML
        return response($html)
            ->header('Content-Type', 'application/octet-stream')
            ->header('Content-Disposition', 'attachment; filename="Laporan_Transaksi_'.$transaksi->id.'.html"');
    }
        public function destroy($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $transaksi->delete();

        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil dihapus.');
    }
public function show($id)
{
    $transaksi = Transaksi::findOrFail($id);
    $pemesanan = $transaksi->pemesanan;
    return view('transaksi.show', compact('transaksi', 'pemesanan'));
}


    public function bayar(Request $request, $id)
    {
        $request->validate([
            'bukti_pembayaran' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $transaksi = Transaksi::findOrFail($id);

        if ($request->hasFile('bukti_pembayaran')) {
            $buktiPath = $request->file('bukti_pembayaran')->store('pembayaran', 'public');
            $transaksi->bukti_pembayaran = $buktiPath;
        }

        $transaksi->status_pembayaran = 'lunas';
        $transaksi->save();

        return redirect()->back()->with('success', 'Pembayaran berhasil dilakukan.');
    }

        public function riwayat()
    {
        // Ambil semua transaksi yang dilakukan oleh pengguna yang sedang masuk
        $transaksis = Transaksi::where('user_id', Auth::user()->id)->latest()->paginate(10);

        // Tampilkan view riwayat transaksi dengan data transaksi yang telah diambil
        return view('pelanggan.rtransaksi', compact('transaksis'));
    }
    public function cekTransaksi($id)
{
    $pemesanan = Pemesanan::find($id);
    if ($pemesanan) {
        $pemesanan->status_pemesanan = 'sudah diperiksa';
        $pemesanan->save();
    }

    return redirect()->route('pelanggan.rtransaksi'); // Ganti 'home' dengan rute ke halaman yang sesuai
}

}
