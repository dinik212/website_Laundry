<?php
namespace App\Http\Controllers;

use App\Models\Pemesanan;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PemesananController extends Controller
{
    public function index()
    {
        $Role = auth()->user()->role; // Mengambil peran pengguna yang sedang masuk

        // Memilih tampilan berdasarkan peran pengguna
        switch ($Role) {
            case 'admin':
                $pemesanans = Pemesanan::latest()->paginate(10);
                return view('manager.homepage', compact('pemesanans'));
                break;
            case 'pegawai':
                $pemesanans = Pemesanan::latest()->paginate(10);
                return view('pegawai.homepage', compact('pemesanans'));
                break;
            case 'pelanggan':
                $pemesanans = Pemesanan::where('id_user', Auth::id())->get();
                return view('pelanggan.homepage', compact('pemesanans'));
                break;
            default:
                break;
        }
    }

    public function create()
    {
        return view('pemesanan.create');
    }

    public function store(Request $request)
    {

        $pemesanan = new Pemesanan;
        $pemesanan->id_user = Auth::user()->id;
        $pemesanan->tgl_pemesanan = $request->tgl_pemesanan;
        $pemesanan->alamat = $request->alamat;
        $pemesanan->no_telp = $request->no_telp;
        $pemesanan->status_pemesanan = 'belum diproses';
        $pemesanan->save();

    // $pemesanan = Pemesanan::find($request->pemesanan_id);
    // $pemesanan->status_pemesanan = 'sudah diproses';
    // $pemesanan->save();

       if (Auth::user()->role == 'pegawai') {
            return redirect()->route('pegawai.hasil')->with('success', 'Transaksi berhasil ditambahkan.');
        } elseif (Auth::user()->role == 'admin') {
            return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil ditambahkan.');
        } else {
            return redirect()->route('pelanggan.homepage')->with('success', 'Pemesanan berhasil disimpan');
        }
    }

    public function confirm($id)
    {
        $pemesanan = Pemesanan::findOrFail($id);
        $pemesanan->status_pemesanan = 'pegawai menuju lokasi';
        $pemesanan->save();

        // Redirect ke halaman atau rute yang sesuai
        return redirect()->back()->with('success', 'Pemesanan berhasil dikonfirmasi.');
    }
        public function riwayat()
    {
        // Ambil semua pesanan yang dilakukan oleh pengguna yang sedang masuk
        $pesanan = Pemesanan::where('id_user', Auth::user()->id)->latest()->paginate(10);

        // Tampilkan view riwayat pesanan dengan data pesanan yang telah diambil
        return view('pelanggan.rpesanan', compact('pesanan'));
    }

}
