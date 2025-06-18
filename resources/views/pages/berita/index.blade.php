    @extends('layouts.frontend')
    @section('title', 'Berita & Informasi - LPK Bader College')

    @section('content')
    <section class="page-header py-5 bg-light">
        <div class="container text-center">
            <h1 class="display-4 fw-bold">Berita & Informasi</h1>
            <p class="lead col-md-8 mx-auto">Semua artikel, pengumuman, dan informasi terbaru dari kami.</p>
        </div>
    </section>
    <section class="py-5">
        <div class="container">
            <div class="row">
                @forelse ($berita as $item)
                    <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up">
                        <div class="card h-100 shadow-sm border-0">
                            <img src="{{ asset('uploads/' . $item->gambar_thumbnail) }}" class="card-img-top" alt="{{ $item->judul }}" style="height: 200px; object-fit: cover;">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title">{{ Str::limit($item->judul, 50) }}</h5>
                                <p class="card-text text-muted flex-grow-1">{{ Str::limit(strip_tags($item->isi_konten), 100) }}</p>
                                <a href="{{ route('berita.show', $item->slug) }}" class="btn btn-primary mt-auto">Baca Selengkapnya</a>
                            </div>
                            <div class="card-footer bg-white border-0">
                                <small class="text-muted">{{ $item->created_at->format('d F Y') }}</small>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center py-5">
                        <h4 class="text-muted">Belum ada berita.</h4>
                    </div>
                @endforelse
            </div>
            <div class="d-flex justify-content-center mt-4">
                {{ $berita->links() }}
            </div>
        </div>
    </section>
    @endsection
    