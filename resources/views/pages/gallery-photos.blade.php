@extends('layouts.frontend')

@section('title', 'Galeri Foto - LPK Bader College')

@push('styles')
<style>
    .page-header {
        position: relative; padding: 5rem 0; background-color: #f8f9fa;
        border-bottom: 1px solid #dee2e6;
    }
    .media-card {
        position: relative; overflow: hidden; border-radius: .75rem;
        box-shadow: 0 0.5rem 1rem rgba(0,0,0,0.1);
        cursor: pointer;
        background-color: #000;
    }
    .media-thumbnail {
        width: 100%; height: 250px; object-fit: cover;
        transition: transform 0.4s ease, opacity 0.4s ease;
    }
    .media-card:hover .media-thumbnail {
        transform: scale(1.1);
        opacity: 0.5;
    }
    .media-overlay {
        position: absolute; top: 0; left: 0; width: 100%; height: 100%;
        color: white;
        display: flex; flex-direction: column;
        justify-content: center; align-items: center;
        text-align: center; padding: 1rem;
        opacity: 0;
        transition: opacity 0.4s ease;
        background: linear-gradient(to top, rgba(0,0,0,0.8) 0%, rgba(0,0,0,0) 100%);
    }
    .media-card:hover .media-overlay {
        opacity: 1;
    }
    .media-overlay .play-icon {
        font-size: 4rem;
        text-shadow: 0 0 15px rgba(0,0,0,0.5);
    }
    .media-overlay .media-title {
        position: absolute;
        bottom: 1rem;
        left: 1rem;
        right: 1rem;
        font-weight: 600;
        font-size: 1.1rem;
    }
</style>
@endpush

@section('content')

<!-- Header Halaman -->
<section class="page-header" data-aos="fade-down">
    <div class="container text-center">
        <h1 class="display-4 fw-bold">Galeri Foto</h1>
        <p class="lead col-md-8 mx-auto">Momen berharga dari berbagai kegiatan pelatihan dan pemberangkatan.</p>
    </div>
</section>

<!-- Konten Galeri -->
<section class="py-5">
    <div class="container">
        <div class="row" data-aos="fade-up" data-aos-delay="200">
            @forelse ($photos as $photo)
                <div class="col-lg-4 col-md-6 mb-4">
                    <a href="{{ asset('uploads/' . $photo->path) }}" class="glightbox" data-gallery="lpk-gallery" data-title="{{ $photo->title }}">
                        <div class="media-card">
                            <img src="{{ asset('uploads/' . $photo->path) }}" alt="{{ $photo->title }}" class="media-thumbnail">
                            <div class="media-overlay">
                                <i class="fas fa-search-plus play-icon"></i>
                                <h5 class="media-title">{{ $photo->title }}</h5>
                            </div>
                        </div>
                    </a>
                </div>
            @empty
                <div class="col-12 text-center">
                    <h4 class="text-muted">Belum ada foto di galeri.</h4>
                </div>
            @endforelse
        </div>
        <div class="d-flex justify-content-center mt-4">
            {{ $photos->links() }}
        </div>
    </div>
</section>

@endsection

@push('scripts')
<script>
    window.addEventListener('load', function () {
        const lightbox = GLightbox({ selector: '.glightbox' });
    });
</script>
@endpush
