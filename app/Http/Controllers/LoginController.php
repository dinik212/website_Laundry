<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function authenticate(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Tentukan peran pengguna
            $role = Auth::user()->role;

            // Arahkan ke halaman yang sesuai berdasarkan peran
            switch ($role) {
                case 'admin':
                    return redirect()->intended('/manager/homepage');
                    break;
                case 'pegawai':
                    return redirect()->intended('/pegawai/homepage');
                    break;
                case 'pelanggan':
                    return redirect()->intended('/pelanggan/homepage');
                    break;
                default:
                    return redirect('/'); // Arahkan ke halaman utama jika peran tidak dikenali
            }
        }

        return back()->withErrors([
            'email' => 'Login gagal.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
