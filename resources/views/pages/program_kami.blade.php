@extends('layouts.frontend')

@section('title', 'Program Kami - LPK Bader College')

@push('styles')
<style>
    .page-header {
        position: relative; padding: 6rem 0;
        background-image: url('https://images.unsplash.com/photo-1522202176988-66273c2fd55f?q=80&w=2071');
        background-size: cover; background-position: center; color: white;
    }
    .page-header::before {
        content: ''; position: absolute; top: 0; left: 0; right: 0; bottom: 0;
        background-color: rgba(13, 34, 75, 0.7);
    }
    .page-header-content { position: relative; }
    .program-card {
        background-color: #fff; border: 1px solid #e9ecef; border-radius: .75rem; padding: 2.5rem;
        transition: all 0.3s ease; height: 100%; text-align: center;
    }
    .program-card:hover { transform: translateY(-10px); box-shadow: 0 0.5rem 1rem rgba(0,0,0,0.1); }
    .program-card .icon-container { font-size: 3rem; color: #0d224b; margin-bottom: 1.5rem; }
    .program-card .program-title { font-weight: 700; color: #0d224b; margin-bottom: 1rem; }
    .program-card .program-text { color: #6c757d; font-size: 0.95rem; }
</style>
@endpush


@section('content')

<!-- SEKSI HEADER HALAMAN -->
<section class="page-header">
    <div class="container page-header-content text-center" data-aos="fade-down">
        <h1 class="display-4 fw-bold text-white">Program Kami</h1>
        <p class="lead col-md-8 mx-auto">{{ $siteProfil->program ?? 'Kami menawarkan berbagai program unggulan yang dirancang untuk kesuksesan Anda di kancah global.' }}</p>
    </div>
</section>

<!-- SEKSI DAFTAR PROGRAM -->
<section id="program-list" class="py-5">
    <div class="container my-4">
        <div class="row">
    @forelse ($programs as $program)
        <div class="col-lg-6 mb-4" data-aos="fade-up" data-aos-delay="{{ 100 * $loop->iteration }}">
            <div class="program-card">
                <div class="icon-container"><i class="{{ $program->icon_class }}"></i></div>
                <h4 class="program-title">{{ $program->title }}</h4>
                <p class="program-text">{{ $program->short_description }}</p>
                {{-- PERBARUI LINK DI SINI --}}
                <a href="{{ route('program.show', $program->id) }}" class="btn btn-outline-primary mt-3">Lihat Detail Persyaratan</a>
            </div>
        </div>
    @empty
                <div class="col-12 text-center" data-aos="fade-up">
                    <h4 class="text-muted">Program Belum Tersedia</h4>
                    <p>Informasi mengenai program kami akan segera diperbarui. Silakan cek kembali nanti.</p>
                </div>
            @endforelse
        </div>
    </div>
</section>

{{-- Seksi Persyaratan yang lama sudah dihapus dari sini --}}

@endsection
