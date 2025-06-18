    @extends('layouts.frontend')
    @section('title', $post->judul)

    @section('content')
    <div class="container py-5 my-4">
        <div class="row">
            <div class="col-lg-8">
                <!-- Konten Utama Artikel -->
                <article>
                    <header class="mb-4">
                        <h1 class="fw-bolder mb-1">{{ $post->judul }}</h1>
                        <div class="text-muted fst-italic mb-2">Dipublikasikan pada {{ $post->created_at->format('d F Y') }}</div>
                    </header>
                    <figure class="mb-4">
                        <img class="img-fluid rounded" src="{{ asset('uploads/' . $post->gambar_thumbnail) }}" alt="{{ $post->judul }}">
                    </figure>
                    <section class="mb-5 article-content">
                        {!! $post->isi_konten !!}
                    </section>
                </article>
            </div>
            <!-- Sidebar Widget -->
            <div class="col-lg-4">
                <div class="card shadow-sm">
                    <div class="card-header">Berita Terbaru Lainnya</div>
                    <div class="card-body">
                        @foreach ($latestPosts as $latest)
                            <div class="d-flex mb-3">
                                <div class="flex-shrink-0">
                                    <img src="{{ asset('uploads/' . $latest->gambar_thumbnail) }}" width="60" height="60" class="rounded object-fit-cover">
                                </div>
                                <div class="ms-3">
                                    <a href="{{ route('berita.show', $latest->slug) }}" class="fw-bold text-decoration-none">{{ $latest->judul }}</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
    