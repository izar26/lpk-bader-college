@extends('layouts.frontend')

@section('title', 'Selamat Datang di LPK Bader College')

@push('styles')
<style>
    /* Style untuk Hero Section */
    .hero-section-v2 {
        position: relative;
        background-color: #f6f7fb; /* Warna latar belakang abu-abu sangat muda */
        padding: 6rem 0;
        overflow: hidden; /* Mencegah SVG keluar dari container */
        min-height: 70vh;
        display: flex;
        align-items: center;
    }
    #hero-svg-background {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 0; /* Pastikan SVG ada di belakang konten teks */
    }
    .hero-content {
        position: relative;
        z-index: 1; /* Konten harus di atas SVG */
        text-align: left;
    }
    .hero-content .hero-pre-title {
        font-size: 1rem;
        font-weight: 500;
        color: #555;
        text-transform: uppercase;
        letter-spacing: 1px;
    }
    .hero-content .hero-main-title {
        font-size: 3.8rem;
        font-weight: 800;
        color: #0d224b; /* Warna Biru Gelap Khas */
        line-height: 1.2;
    }
    .hero-content .hero-sub-title {
        font-size: 1.1rem;
        color: #888;
        margin-top: 1rem;
        font-weight: 500;
    }

    /* Style untuk judul seksi */
    .section-title {
        text-align: center;
        margin-bottom: 1rem;
        font-weight: 700;
        color: #0d224b;
    }
    .section-subtitle {
        text-align: center;
        max-width: 600px;
        margin-left: auto;
        margin-right: auto;
        margin-bottom: 4rem;
        color: #6c757d;
    }

    /* Style untuk judul Visi & Misi */
    .visi-misi-title {
        font-weight: 700;
        color: #0d224b; /* Warna biru gelap */
        display: inline-block; /* Membuat border hanya selebar teks */
        border-bottom: 3px solid #f0ad4e; /* Garis bawah warna emas/kuning */
        padding-bottom: 5px; /* Jarak antara teks dan garis */
        margin-bottom: 1rem;
    }

    /* Style untuk Kartu Program */
    .program-card {
        background-color: #fff;
        border: 1px solid #e9ecef;
        border-radius: .75rem;
        padding: 2.5rem;
        transition: all 0.3s ease;
        height: 100%;
        text-align: center;
    }
    .program-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.1);
    }
    .program-card .icon-container {
        font-size: 3rem;
        color: #0d224b; /* Biru Gelap */
        margin-bottom: 1.5rem;
    }
    .program-card .program-title {
        font-weight: 700;
        color: #0d224b;
        margin-bottom: 1rem;
    }
    .program-card .program-text {
        color: #6c757d;
    }
    
    /* Garis pemisah antar seksi */
    .section-divider {
        border: 0;
        height: 1px;
        background-image: linear-gradient(to right, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.1), rgba(0, 0, 0, 0));
    }
    
    /* CSS untuk Seksi Kontak & Peta */
    .contact-map-section {
        background-color: #eaf6f6; /* Warna latar biru muda kehijauan */
    }
    .cta-banner {
        background-color: #0d224b; /* Biru gelap */
        border-radius: 1rem; /* Sudut bulat */
        color: white;
    }
    .cta-banner h3 {
        font-weight: 700;
        font-size: 2.5rem;
    }
    .cta-banner p {
        font-size: 1.2rem;
        color: rgba(255,255,255,0.8);
    }
    .map-container {
        border-radius: 1rem;
        overflow: hidden; /* Penting agar iframe mengikuti sudut rounded */
        box-shadow: 0 0.5rem 1rem rgba(0,0,0,0.15);
    }
    .map-container iframe {
        border: 0;
    }
.testimoni-slider {
    padding: 2rem 0;
}
.testimoni-card {
    background: #fff;
    padding: 2rem;
    border-radius: 1rem;
    box-shadow: 0 0.5rem 1.5rem rgba(0,0,0,0.1);
    text-align: center;
    margin: 0 1rem;
}
.testimoni-img {
    width: 90px;
    height: 90px;
    border-radius: 50%;
    object-fit: cover;
    margin-bottom: 1rem;
    border: 4px solid #fff;
    box-shadow: 0 0.5rem 1rem rgba(0,0,0,0.1);
}
.testimoni-text {
    font-style: italic;
    color: #6c757d;
    margin-bottom: 1.5rem;
}
.testimoni-name {
    font-weight: 700;
    color: #0d224b;
    margin-bottom: 0.25rem;
}
.testimoni-position {
    color: #6c757d;
    font-size: 0.9rem;
}
.swiper-button-next, .swiper-button-prev {
    color: #0d224b;
}
.swiper-pagination-bullet-active {
    background: #0d224b;
}
.testimonial-cta-section {
        background-color: #f8f9fa; /* Warna abu-abu muda */
    }
    .testimonial-cta-inner {
        background-color: white;
        border: 1px solid #e9ecef;
        border-radius: 1rem;
        padding: 3rem;
        text-align: center;
    }
    .testimonial-cta-inner .cta-icon {
        font-size: 3rem;
        color: var(--brand-gold); /* Warna emas */
        margin-bottom: 1.5rem;
    }
    .testimonial-cta-inner h3 {
        font-weight: 700;
    }
    
</style>
@endpush


@section('content')

<!-- 1. HERO SECTION -->
<section class="hero-section-v2">
    <svg id="hero-svg-background" preserveAspectRatio="xMidYMid slice" viewBox="0 0 100 100"> <circle cx="80" cy="20" r="20" fill="rgba(13, 34, 75, 0.05)"></circle> <circle cx="20" cy="85" r="15" fill="rgba(13, 34, 75, 0.05)"></circle> <path d="M 0 70 Q 15 80 30 70 T 60 70 T 90 70 T 120 70" stroke="rgba(13, 34, 75, 0.1)" stroke-width="0.5" fill="none"></path></svg>
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="hero-content" data-aos="fade-right">
                    <p class="hero-pre-title">Lembaga Pelatihan Kerja dan Magang ke Korea</p>
                    <h1 class="hero-main-title">{{ $siteProfil->nama ?? 'LPK BADER COLLEGE MANDIRI' }}</h1>
                    <p class="hero-sub-title">Izin Disnakertran : 563/123-Disnakertran/2024</p>
                </div>
            </div>
        </div>
    </div>
</section>

<hr class="section-divider">

<!-- 2. VISI & MISI SECTION -->
<section id="visi-misi" class="py-5">
    <div class="container my-5" data-aos="fade-up">
        <div class="row">
            <div class="col-md-8 mx-auto text-center">
                <h2 class="section-title">Siapa Kami</h2>
                <p class="lead text-muted">
                    {{ $siteProfil->tentang ?? 'Kami adalah lembaga pelatihan kerja yang berdedikasi untuk mempersiapkan calon tenaga kerja Indonesia yang kompeten dan siap bersaing di pasar global, khususnya Korea Selatan.' }}
                </p>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-md-6 text-center mb-4" data-aos="fade-up" data-aos-delay="100">
                <h3 class="visi-misi-title">Visi</h3>
                <p class="mt-3 text-muted">{{ $siteProfil->visi ?? 'Visi perusahaan akan segera ditampilkan di sini.' }}</p>
            </div>
            <div class="col-md-6 text-center mb-4" data-aos="fade-up" data-aos-delay="200">
                <h3 class="visi-misi-title">Misi</h3>
                <p class="mt-3 text-muted">{{ $siteProfil->misi ?? 'Misi perusahaan akan segera ditampilkan di sini.' }}</p>
            </div>
        </div>
    </div>
</section>

<hr class="section-divider">

<!-- 3. PROGRAM KAMI -->
<section id="program-kami" class="py-5 bg-light">
    <div class="container my-5" data-aos="fade-up">
        <h2 class="section-title">Program Kami</h2>
        {{-- Deskripsi umum program sekarang diambil dari tabel profil --}}
        <p class="section-subtitle">{{ $siteProfil->program ?? 'Kami menawarkan berbagai program unggulan yang dirancang untuk kesuksesan Anda.' }}</p>
        <div class="row">
    @forelse ($programs as $program)
        <div class="col-lg-6 col-md-6 mb-4" data-aos="zoom-in" data-aos-delay="{{ 100 * $loop->iteration }}">
            <div class="program-card">
                <div class="icon-container"><i class="{{ $program->icon_class }}"></i></div>
                <h4 class="program-title">{{ $program->title }}</h4>
                <p class="program-text">{{ $program->short_description }}</p>
                {{-- PERBARUI LINK DI SINI --}}
                <a href="{{ route('program.show', $program->id) }}" class="btn btn-outline-primary mt-3">Detail</a>
            </div>
        </div>
    @empty
        <div class="col-12 text-center">
                    <p class="text-muted">Belum ada program yang tersedia saat ini. Silakan cek kembali nanti.</p>
                </div>
    @endforelse
</div>
        
        <div class="text-center mt-4">
            <a href="{{ route('program.kami') }}" class="btn btn-primary btn-lg">Lihat Semua Program</a>
        </div>
    </div>
</section>

<hr class="section-divider">

<!-- SEKSI TESTIMONI BARU -->
<section id="testimoni" class="py-5">
    <div class="container my-4" data-aos="fade-up">
        <h2 class="section-title">Apa Kata Mereka?</h2>
        <p class="section-subtitle">Simak cerita dan pengalaman dari para alumni kami yang telah sukses meniti karir.</p>
        
        <!-- Slider Swiper -->
        <div class="swiper testimoni-slider">
            <div class="swiper-wrapper">
                @forelse ($testimoni as $item)
                    <!-- Slide -->
                    <div class="swiper-slide">
                        <div class="testimoni-card">
                            <img src="{{ asset('uploads/' . $item->foto) }}" alt="{{ $item->nama }}" class="testimoni-img">
                            <p class="testimoni-text">"{{ $item->isi_testimoni }}"</p>
                            <h5 class="testimoni-name">{{ $item->nama }}</h5>
                            <p class="testimoni-position">{{ $item->jabatan }}</p>
                        </div>
                    </div>
                @empty
                    {{-- Jika tidak ada testimoni yang disetujui, seksi ini tidak akan menampilkan apa-apa --}}
                @endforelse
            </div>
            <!-- Tombol Navigasi Slider -->
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <!-- Paginasi Slider (titik-titik di bawah) -->
            <div class="swiper-pagination"></div>
        </div>
    </div>
</section>

<hr class="section-divider">

<section class="testimonial-cta-section py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-10 mx-auto" data-aos="zoom-in">
                <div class="testimonial-cta-inner">
                    <i class="fas fa-pen-fancy cta-icon"></i>
                    <h3>Punya Cerita Sukses Bersama Kami?</h3>
                    <p class="lead text-muted my-3">Bagikan pengalaman berharga Anda untuk menginspirasi calon siswa lainnya. Testimoni Anda sangat berarti bagi kami.</p>
                    <a href="{{ route('testimoni.create') }}" class="btn btn-primary btn-lg">Tulis Testimoni Anda Sekarang</a>
                </div>
            </div>
        </div>
    </div>
</section>
    {{-- Tambahkan ini di bawah </section> Program Kami --}}
    <hr class="section-divider">

    <!-- 5. BERITA TERBARU -->
    <section id="berita" class="py-5">
        <div class="container my-4" data-aos="fade-up">
            <h2 class="section-title">Berita & Informasi Terbaru</h2>
            <p class="section-subtitle">Ikuti perkembangan terbaru, pengumuman penting, dan cerita sukses dari LPK Bader College.</p>
            <div class="row">
                @forelse ($latestBerita as $berita)
                    <div class="col-lg-4 mb-4">
                        <div class="card h-100 shadow-sm border-0">
                            <img src="{{ asset('uploads/' . $berita->gambar_thumbnail) }}" class="card-img-top" alt="{{ $berita->judul }}" style="height: 200px; object-fit: cover;">
                            <div class="card-body">
                                <h5 class="card-title">{{ Str::limit($berita->judul, 50) }}</h5>
                                <p class="card-text text-muted">{{ Str::limit(strip_tags($berita->isi_konten), 100) }}</p>
                                <a href="{{ route('berita.show', $berita->slug) }}" class="btn btn-primary">Baca Selengkapnya</a>
                            </div>
                            <div class="card-footer bg-white border-0">
                                <small class="text-muted">{{ $berita->created_at->format('d F Y') }}</small>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center">
                        <p class="text-muted">Belum ada berita untuk ditampilkan.</p>
                    </div>
                @endforelse
            </div>
            <div class="text-center mt-4">
                <a href="{{ route('berita.index') }}" class="btn btn-outline-primary btn-lg">Lihat Semua Berita</a>
            </div>
        </div>
    </section>
    
    

<!-- 6. SEKSI KONTAK & PETA -->
<section class="contact-map-section py-5">
    <div class="container" data-aos="fade-up">
        <div class="row">
            <div class="col-12">
                <!-- Banner Ajakan (Call to Action) -->
                <div class="cta-banner p-5 mb-5">
                    <div class="d-flex flex-column flex-md-row justify-content-between align-items-center">
                        <div class="text-center text-md-start mb-4 mb-md-0">
                            <p class="fs-5">Ingin Konsultasi?</p>
                            <h3>Silahkan Hubungi</h3>
                        </div>
                        <div>
                            @if($siteKontak && $siteKontak->no_wa)
                                <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $siteKontak->no_wa) }}" target="_blank" class="btn btn-lg btn-warning fw-bold px-5 py-3">Kontak Kami</a>
                            @endif
                        </div>
                    </div>
                </div>
                <!-- Peta Google Maps Dinamis -->
                <div class="map-container">
                    <iframe 
                        width="100%" 
                        height="450" 
                        style="border:0" 
                        loading="lazy" 
                        allowfullscreen 
                        referrerpolicy="no-referrer-when-downgrade" 
                        src="https://maps.google.com/maps?q={{ urlencode($siteKontak->lokasi ?? 'Cianjur') }}&t=&z=15&ie=UTF8&iwloc=&output=embed">
                    </iframe>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
  const swiper = new Swiper('.testimoni-slider', {
    loop: true,
    slidesPerView: 1,
    spaceBetween: 30,
    autoplay: {
      delay: 5000,
      disableOnInteraction: false,
    },
    pagination: {
      el: '.swiper-pagination',
      clickable: true,
    },
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
    breakpoints: {
      768: { slidesPerView: 2, spaceBetween: 40 },
      992: { slidesPerView: 3, spaceBetween: 50 },
    }
  });
});
</script>
@endpush