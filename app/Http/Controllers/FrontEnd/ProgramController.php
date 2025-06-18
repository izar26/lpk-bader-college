<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Program;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    /**
     * Menampilkan halaman daftar semua program.
     */
    public function index()
    {
        $programs = Program::latest()->get();
        return view('pages.program_kami', ['programs' => $programs]);
    }

    /**
     * === METHOD BARU UNTUK MENAMPILKAN DETAIL SATU PROGRAM ===
     *
     * @param  \App\Models\Program  $program
     * @return \Illuminate\View\View
     */
    public function show(Program $program)
    {
        // Laravel secara otomatis akan mencari program di database berdasarkan ID dari URL.
        // Kita hanya perlu mengirimkan data program tersebut ke view.
        return view('pages.program-detail', ['program' => $program]);
    }
}
