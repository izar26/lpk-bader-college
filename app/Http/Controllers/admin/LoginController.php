<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Menampilkan halaman form login untuk admin.
     */
    public function showLoginForm()
    {
        if (Auth::guard('admin')->check()) {
            return redirect()->route('admin.dashboard');
        }
        return view('admin.auth.login');
    }

    /**
     * Menangani proses login.
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        if (Auth::guard('admin')->attempt($credentials)) {
            $request->session()->regenerate();
            $request->session()->flash('login_success', 'Anda berhasil login!');
            return redirect()->intended(route('admin.dashboard'));
        }

        // ========================================================
        // ===== BAGIAN PENTING ADA DI SINI =====
        // Pastikan Anda menggunakan ->with('error', ...), bukan ->withErrors([...])
        // ========================================================
        return back()->with('error', 'Username atau Password yang Anda masukkan salah.')->onlyInput('username');
    }

    /**
     * Menangani proses logout.
     */
    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}