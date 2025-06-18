<?php
namespace App\Http\Controllers\FrontEnd;
use App\Http\Controllers\Controller;
use App\Models\SoalLatihan;

class SoalLatihanController extends Controller {
    public function index() {
        $links = SoalLatihan::latest()->paginate(10); // Ambil 10 soal per halaman
        return view('pages.soal_latihan', ['links' => $links]);
    }
}