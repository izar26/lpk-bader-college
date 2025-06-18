@extends('layouts.frontend')

@section('title', 'Hubungi Kami - LPK Bader College')

@push('styles')
<style>
    .page-header {
        position: relative; padding: 6rem 0;
        background-image: url('https://images.unsplash.com/photo-1554224155-1696413565d3?q=80&w=2070');
        background-size: cover; background-position: center; color: white;
    }
    .page-header::before {
        content: ''; position: absolute; top: 0; left: 0; right: 0; bottom: 0;
        background-color: rgba(13, 34, 75, 0.75); /* Overlay biru gelap */
    }
    .page-header-content { position: relative; }
    .contact-info-section { background-color: #f8f9fa; }
    .contact-card {
        background-color: white;
        padding: 2rem;
        border-radius: .75rem;
        box-shadow: 0 0.5rem 1rem rgba(0,0,0,0.1);
        height: 100%;
    }
    .contact-card h3 { color: #0d224b; font-weight: 700; }
    .contact-details p { margin-bottom: 0.5rem; }
    .contact-details i { color: #0d224b; width: 20px; text-align: center; margin-right: 10px; }
    .btn-whatsapp { background-color: #25D366; color: white; font-weight: bold; }
    .btn-whatsapp:hover { background-color: #1DA851; }
</style>
@endpush

@section('content')

<!-- Header Halaman Kontak -->
<section class="page-header">
    <div class="container page-header-content text-center" data-aos="fade-down">
        <h1 class="display-4 fw-bold text-white">Hubungi Kami</h1>
        <p class="lead">{{ $siteProfil->nama ?? 'LPK Bader College Mandiri' }}</p>
    </div>
</section>

<!-- Konten Utama Kontak -->
<section class="contact-info-section py-5">
    <div class="container my-4">
        <div class="row g-4">
            <!-- Kolom Kiri: Konsultasi -->
            <div class="col-lg-6" data-aos="fade-right" data-aos-delay="200">
                <div class="contact-card">
                    <h3>Konsultasi</h3>
                    <p class="text-muted mt-3">
                        Untuk permintaan konsultasi gratis, silahkan klik tombol di bawah ini. Selanjutnya Anda akan terhubung ke nomor WhatsApp resmi kami.
                    </p>
                    <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $siteKontak->no_wa ?? '') }}" target="_blank" class="btn btn-whatsapp btn-lg mt-4">
                        <i class="fab fa-whatsapp me-2"></i> Klik di Sini
                    </a>
                </div>
            </div>

            <!-- Kolom Kanan: Detail Kantor -->
            <div class="col-lg-6" data-aos="fade-left" data-aos-delay="300">
                <div class="contact-card">
                    <h3>Kantor</h3>
                    <div class="contact-details mt-3">
                        <p><i class="fas fa-map-marker-alt"></i> {{ $siteKontak->lokasi ?? 'Alamat belum diatur.' }}</p>
                        <p><i class="fas fa-phone"></i> {{ $siteKontak->telepon ?? 'Telepon belum diatur.' }}</p>
                        <p><i class="fab fa-whatsapp"></i> {{ $siteKontak->no_wa ?? 'WhatsApp belum diatur.' }}</p>
                        <hr>
                        <p><i class="fab fa-instagram"></i> {{ $siteKontak->instagram ?? 'Instagram belum diatur.' }}</p>
                        <p><i class="fab fa-facebook"></i> {{ $siteKontak->facebook ?? 'Facebook belum diatur.' }}</p>
                        <p><i class="fab fa-tiktok"></i> {{ $siteKontak->tiktok ?? 'TikTok belum diatur.' }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
