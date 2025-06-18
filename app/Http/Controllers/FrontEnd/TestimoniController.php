<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Testimoni;
use Illuminate\Http\Request;

class TestimoniController extends Controller
{
    public function create()
    {
        return view('pages.tulis-testimoni');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'isi_testimoni' => 'required|string',
            'foto' => 'required|image|max:2048',
        ]);

        $path = $request->file('foto')->store('testimoni_photos', 'public');
        $validatedData['foto'] = $path;

        // Status otomatis diatur sebagai 'menunggu' karena itu adalah default di database
        Testimoni::create($validatedData);

        return redirect()->back()->with('testimonial_success', 'Testimoni Anda telah berhasil dikirim. Kami akan meninjaunya terlebih dahulu sebelum ditampilkan. Terima kasih atas partisipasi Anda!');
    }
}
