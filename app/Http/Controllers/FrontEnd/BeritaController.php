<?php

    namespace App\Http\Controllers\FrontEnd;

    use App\Http\Controllers\Controller;
    use App\Models\Berita;
    use Illuminate\Http\Request;

    class BeritaController extends Controller
    {
        /**
         * Menampilkan halaman daftar semua berita dengan paginasi.
         */
        public function index()
        {
            $berita = Berita::latest()->paginate(9); // 9 berita per halaman
            return view('pages.berita.index', compact('berita'));
        }

        /**
         * Menampilkan halaman detail satu berita berdasarkan slug.
         */
        public function show($slug)
        {
            $post = Berita::where('slug', $slug)->firstOrFail();
            // Ambil 4 berita terbaru lainnya untuk ditampilkan di sidebar
            $latestPosts = Berita::where('id', '!=', $post->id)->latest()->take(4)->get();

            return view('pages.berita.show', compact('post', 'latestPosts'));
        }
    }
    