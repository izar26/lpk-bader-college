<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Menampilkan halaman Hubungi Kami.
     */
    public function index()
    {
        // Kita tidak perlu mengambil data apa pun di sini,
        // karena data profil & kontak sudah disediakan secara global
        // oleh AppServiceProvider. Kita hanya perlu menampilkan view-nya.
        return view('pages.contact');
    }
}