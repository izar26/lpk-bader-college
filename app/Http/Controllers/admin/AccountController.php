<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class AccountController extends Controller
{
    /**
     * Menampilkan halaman form ganti password.
     */
    public function showChangePasswordForm()
    {
        return view('admin.account.change-password');
    }

    /**
     * Memproses dan menyimpan password baru.
     */
    public function updatePassword(Request $request)
    {
        // 1. Validasi Input
        $request->validate([
            'current_password' => ['required', 'string'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $admin = Auth::guard('admin')->user();

        // 2. Cek apakah password lama yang dimasukkan sudah benar
        if (!Hash::check($request->current_password, $admin->password)) {
            return back()->with('error', 'Password lama Anda tidak cocok.');
        }

        // 3. Simpan password baru
        $admin->password = Hash::make($request->password);
        $admin->save();

        return back()->with('success', 'Password berhasil diperbarui!');
    }
}