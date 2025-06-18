@extends('layouts.frontend')

@section('title', 'Soal Latihan - LPK Bader College')

@push('styles')
<style>
    .page-header {
        position: relative; padding: 6rem 0;
        background-image: url('https://images.unsplash.com/photo-1456324504439-367cee3b3c32?q=80&w=2070');
        background-size: cover; background-position: center; color: white;
    }
    .page-header::before {
        content: ''; position: absolute; top: 0; left: 0; right: 0; bottom: 0;
        background-color: rgba(13, 34, 75, 0.7);
    }
    .page-header-content { position: relative; }
    .soal-list-item {
        border: 1px solid #e9ecef;
        border-radius: .5rem;
        padding: 1.5rem;
        transition: all 0.3s ease;
        background-color: white;
    }
    .soal-list-item:hover {
        transform: translateY(-5px);
        box-shadow: 0 0.5rem 1rem rgba(0,0,0,0.1);
    }
</style>
@endpush

@section('content')

<!-- Header Halaman -->
<section class="page-header">
    <div class="container page-header-content text-center" data-aos="fade-down">
        <h1 class="display-4 fw-bold text-white">Soal-soal Latihan</h1>
        <p class="lead">{{ $siteProfil->nama ?? 'LPK Bader College Mandiri' }}</p>
    </div>
</section>

<!-- Konten Daftar Soal -->
<section class="py-5 bg-light">
    <div class="container my-4">
        <div class="row">
            <div class="col-lg-8 mx-auto" data-aos="fade-up">
                <p class="text-center lead mb-5">Untuk menguji kemampuan Anda, silahkan kerjakan soal-soal latihan yang telah kami sediakan di bawah ini.</p>
                
                @forelse ($links as $key => $link)
                    <div class="soal-list-item d-flex justify-content-between align-items-center mb-3" data-aos="fade-up" data-aos-delay="{{ 100 * ($loop->iteration > 5 ? 5 : $loop->iteration) }}">
                        <div>
                            <h5 class="mb-1">{{ $link->title }}</h5>
                            <small class="text-muted">Diupload pada: {{ $link->created_at->format('d F Y') }}</small>
                        </div>
                        <a href="{{ $link->link }}" target="_blank" class="btn btn-primary">
                            Kerjakan <i class="fas fa-external-link-alt ms-2"></i>
                        </a>
                    </div>
                @empty
                    <div class="text-center py-5">
                        <i class="fas fa-folder-open fa-3x text-muted mb-3"></i>
                        <h4 class="text-muted">Belum Ada Soal Latihan</h4>
                        <p>Soal latihan akan segera ditambahkan. Silakan periksa kembali nanti.</p>
                    </div>
                @endforelse

                <!-- Navigasi Halaman -->
                <div class="d-flex justify-content-center mt-5">
                    {{ $links->links() }}
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
