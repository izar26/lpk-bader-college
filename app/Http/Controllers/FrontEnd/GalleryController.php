<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Media;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    /**
     * Menampilkan halaman khusus untuk FOTO.
     */
    public function photos()
    {
        // Ambil media yang tipenya 'foto', bagi per 12 item per halaman.
        $photos = Media::where('type', 'foto')->latest()->paginate(12);

        return view('pages.gallery-photos', ['photos' => $photos]);
    }

    /**
     * Menampilkan halaman khusus untuk VIDEO.
     */
    public function videos()
    {
        // Ambil media yang tipenya 'video', bagi per 12 item per halaman.
        $videos = Media::where('type', 'video')->latest()->paginate(12);

        return view('pages.gallery-videos', ['videos' => $videos]);
    }
}
