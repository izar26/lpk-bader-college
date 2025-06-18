@extends('layouts.frontend')

{{-- Judul halaman akan dinamis sesuai nama program --}}
@section('title', $program->title . ' - LPK Bader College')

@push('styles')
<style>
    .page-header-program {
        position: relative; padding: 6rem 0;
        background-image: url('https://images.unsplash.com/photo-1542744173-8e7e53415bb0?q=80&w=2070');
        background-size: cover; background-position: center; color: white;
    }
    .page-header-program::before {
        content: ''; position: absolute; top: 0; left: 0; right: 0; bottom: 0;
        background-color: rgba(13, 34, 75, 0.7);
    }
    .page-header-program-content { position: relative; }
    
    .requirements-section { background-color: #f8f9fa; }
    .requirements-text {
        white-space: pre-wrap; /* Ini akan menjaga baris baru dari database */
        text-align: justify;
    }

    .cta-section {
        background-color: #0d224b;
        color: white;
    }
    .cta-section .btn-whatsapp { 
        background-color: #25D366; 
        color: white; 
        font-weight: bold; 
        border: none;
    }
    .cta-section .btn-whatsapp:hover { background-color: #1DA851; }
</style>
@endpush

@section('content')

<!-- Header Halaman -->
<section class="page-header-program">
    <div class="container page-header-program-content text-center" data-aos="fade-down">
        <p class="lead mb-2">Program Unggulan</p>
        <h1 class="display-4 fw-bold text-white">{{ $program->title }}</h1>
    </div>
</section>

<!-- Konten Utama Detail Program -->
<section class="py-5">
    <div class="container my-4">
        <div class="row">
            <!-- Kolom Deskripsi Lengkap -->
            <div class="col-12" data-aos="fade-up">
                <div class="text-center mb-5">
                    <i class="{{ $program->icon_class }} fa-4x text-primary"></i>
                    <h2 class="mt-3">{{ $program->title }}</h2>
                    <p class="lead text-muted">{{ $program->long_description }}</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Seksi Persyaratan -->
<section id="persyaratan" class="py-5 requirements-section">
    <div class="container my-4" data-aos="fade-up">
        <div class="row">
            <!-- Kolom Persyaratan Umum -->
            <div class="col-lg-6 mb-4">
                <h3>Persyaratan Umum</h3>
                <hr>
                @if($program->requirements_general)
                        {!! nl2br(e($program->requirements_general)) !!}
                @else
                    Informasi persyaratan umum akan segera tersedia.
                @endif
            </div>

            <!-- Kolom Persyaratan Administrasi -->
            <div class="col-lg-6 mb-4">
                <h3>Persyaratan Administrasi</h3>
                <hr>
                @if($program->requirements_admin)
                        {!! nl2br(e($program->requirements_admin)) !!}
                @else
                    <p class="text-muted">Informasi persyaratan administrasi akan segera tersedia.</p>
                @endif
            </div>
        </div>
    </div>
</section>

<!-- Seksi Ajakan Mendaftar (Call to Action) -->
<section class="cta-section py-5">
    <div class="container text-center text-lg-start" data-aos="zoom-in">
        <div class="d-flex flex-column flex-lg-row justify-content-between align-items-center">
            <div>
                <h2 class="display-5 fw-bold text-white">Siap Bergabung?</h2>
                <p class="fs-4" style="color: rgba(255,255,255,0.8);">Ambil langkah pertama Anda menuju sukses bersama kami.</p>
            </div>
            <div class="mt-4 mt-lg-0">
                <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $siteKontak->no_wa ?? '') }}" target="_blank" class="btn btn-whatsapp btn-lg px-5 py-3">
                    <i class="fab fa-whatsapp me-2"></i>Daftar Sekarang
                </a>
            </div>
        </div>
    </div>
</section>

@endsection
