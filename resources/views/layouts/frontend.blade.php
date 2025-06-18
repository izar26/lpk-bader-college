<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'LPK Bader College')</title>
    
    {{-- Favicon --}}
    <link rel="icon" href="{{ asset('uploads/icon.png') }}" type="image/png">
    
    {{-- Google Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    {{-- CSS Libraries --}}
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glightbox/dist/css/glightbox.min.css" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    @stack('styles')
    
    <style>
        :root {
            --bs-primary: #0d224b; --bs-secondary: #6c757d; --bs-light: #f8f9fa;
            --brand-gold: #f0ad4e; --brand-blue: #0d224b;
        }
        body { font-family: 'Poppins', sans-serif; padding-top: 76px; line-height: 1.7; }
        h1, h2, h3, h4, h5, h6 { font-weight: 700; color: var(--brand-blue); }
        .navbar { transition: background-color 0.4s ease, box-shadow 0.4s ease; background-color: var(--brand-blue) !important; }
        .navbar.navbar-scrolled { background-color: #ffffff !important; box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); }
        .navbar.navbar-scrolled .nav-link { color: #333 !important; }
        .navbar.navbar-scrolled .nav-link:hover { color: var(--brand-blue) !important; }
        .navbar .nav-item .nav-link { transition: color 0.3s ease; }
        .navbar .nav-item .nav-link.active-link { color: var(--brand-gold) !important; }
        .navbar.navbar-scrolled .nav-item .nav-link.active-link { color: var(--brand-gold) !important; }
        .btn-contact-custom { background-color: transparent; border: 2px solid var(--brand-gold); color: var(--brand-gold); border-radius: 50px; padding: 5px 25px; font-weight: bold; transition: all 0.3s ease; }
        .btn-contact-custom:hover { background-color: var(--brand-gold); color: var(--brand-blue); }
        .navbar.navbar-scrolled .btn-contact-custom { color: var(--brand-blue); border-color: var(--brand-blue); }
        .navbar.navbar-scrolled .btn-contact-custom:hover { background-color: var(--brand-blue); color: white; }
        .navbar-nav .nav-link { font-weight: 500; margin: 0 10px; }
        .main-footer { background-color: var(--brand-blue); color: #adb5bd; padding: 4rem 0 2rem 0; font-size: 0.9rem; }
        .main-footer .footer-title { color: #fff; font-weight: 600; margin-bottom: 1.5rem; }
        .main-footer .footer-links a { color: #adb5bd; text-decoration: none; display: block; margin-bottom: 0.5rem; transition: color 0.3s ease; }
        .main-footer .footer-links a:hover { color: #fff; }
        .footer-social-icons a { color: #adb5bd; font-size: 1.5rem; margin-right: 15px; transition: color 0.3s ease; }
        .footer-social-icons a:hover { color: #fff; }
        .footer-bottom { border-top: 1px solid #343a40; padding-top: 2rem; margin-top: 2rem; }
        .back-to-top { position: fixed; bottom: 25px; right: 25px; display: none; width: 40px; height: 40px; border-radius: 50%; background: var(--brand-blue); color: white; text-align: center; line-height: 40px; font-size: 1.2rem; z-index: 999; transition: opacity 0.4s, visibility 0.4s; }
        .back-to-top.active { display: block; }
        .back-to-top:hover { background: #1a3e7a; color: white; }
    </style>
</head>
<body>

    <header>
        <nav id="mainNav" class="navbar navbar-expand-lg navbar-dark fixed-top py-3">
            <div class="container">
                <a class="navbar-brand" href="{{ route('home') }}">
                    @if($siteProfil && $siteProfil->foto)
                        <img src="{{ asset('uploads/' . $siteProfil->foto) }}" alt="Logo LPK Bader" style="height: 40px;">
                    @else
                        LPK Bader College
                    @endif
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item"><a class="nav-link {{ request()->routeIs('home') ? 'active-link' : '' }}" href="{{ route('home') }}">Home</a></li>
                        <li class="nav-item"><a class="nav-link {{ request()->routeIs('berita.index') ? 'active-link' : '' }}" href="{{ route('berita.index') }}">Berita</a></li>
                        <li class="nav-item"><a class="nav-link {{ request()->routeIs('program.kami') ? 'active-link' : '' }}" href="{{ route('program.kami') }}">Program Kami</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle {{ (request()->routeIs('gallery.photos') || request()->routeIs('gallery.videos')) ? 'active-link' : '' }}" href="#" id="navbarDropdownGallery" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Galeri
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownGallery">
                                <li><a class="dropdown-item" href="{{ route('gallery.photos') }}">Foto Kegiatan</a></li>
                                <li><a class="dropdown-item" href="{{ route('gallery.videos') }}">Video Kegiatan</a></li>
                            </ul>
                        </li>
                        <li class="nav-item"><a class="nav-link {{ request()->routeIs('soal.latihan.index') ? 'active-link' : '' }}" href="{{ route('soal.latihan.index') }}">Soal Latihan</a></li>
                        <li class="nav-item"><a class="nav-link {{ request()->routeIs('contact.index') ? 'active-link' : '' }}" href="{{ route('contact.index') }}">Hubungi Kami</a></li>
                    </ul>
                    <div class="d-flex">
                        @if($siteKontak && $siteKontak->no_wa)
                            <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $siteKontak->no_wa) }}" target="_blank" class="btn btn-contact-custom">Contact</a>
                        @endif
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <main>
        @yield('content')
    </main>

    <!-- FOOTER BARU YANG LEBIH INFORMATIF -->
    <footer class="main-footer">
        <div class="container">
            <div class="row">
                <!-- Kolom Tentang -->
                <div class="col-lg-4 col-md-6 mb-4">
                    <h5 class="footer-title">Tentang {{ $siteProfil->nama ?? 'LPK Bader' }}</h5>
                    <p>{{ Str::limit($siteProfil->tentang ?? 'Deskripsi singkat LPK.', 150) }}</p>
                    <div class="footer-social-icons mt-3">
                        @if($siteKontak && $siteKontak->facebook) <a href="{{ $siteKontak->facebook }}" target="_blank" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a> @endif
                        @if($siteKontak && $siteKontak->instagram) <a href="{{ $siteKontak->instagram }}" target="_blank" aria-label="Instagram"><i class="fab fa-instagram"></i></a> @endif
                        @if($siteKontak && $siteKontak->tiktok) <a href="{{ $siteKontak->tiktok }}" target="_blank" aria-label="TikTok"><i class="fab fa-tiktok"></i></a> @endif
                    </div>
                </div>
                <!-- Kolom Link Cepat -->
                <div class="col-lg-2 col-md-6 mb-4">
                    <h5 class="footer-title">Link Cepat</h5>
                    <div class="footer-links">
                        <a href="{{ route('home') }}">Home</a>
                        <a href="{{ route('profil.kami') }}">Profil</a>
                        <a href="{{ route('program.kami') }}">Program</a>
                        {{-- PERBAIKAN UTAMA ADA DI SINI --}}
                        <a href="{{ route('gallery.photos') }}">Foto Kegiatan</a>
                        <a href="{{ route('gallery.videos') }}">Video Kegiatan</a>
                        <a href="{{ route('contact.index') }}">Kontak</a>
                    </div>
                </div>
                <!-- Kolom Kontak -->
                <div class="col-lg-3 col-md-6 mb-4">
                    <h5 class="footer-title">Hubungi Kami</h5>
                    <p><i class="fas fa-map-marker-alt fa-fw me-2"></i>{{ $siteKontak->lokasi ?? 'Alamat belum diatur' }}</p>
                    <p><i class="fas fa-phone fa-fw me-2"></i>{{ $siteKontak->telepon ?? 'Telepon belum diatur' }}</p>
                    <p><i class="fab fa-whatsapp fa-fw me-2"></i>{{ $siteKontak->no_wa ?? 'WhatsApp belum diatur' }}</p>
                </div>
                <!-- Kolom Peta -->
                <div class="col-lg-3 col-md-6 mb-4">
                    <h5 class="footer-title">Peta Lokasi</h5>
                    <div class="ratio ratio-16x9">
                        <iframe src="https://maps.google.com/maps?q={{ urlencode($siteKontak->lokasi ?? 'Cianjur') }}&t=&z=13&ie=UTF8&iwloc=&output=embed" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                </div>
            </div>
            <div class="footer-bottom text-center">
                <p>Copyright &copy; {{ date('Y') }} LPK Bader College. All Rights Reserved.</p>
            </div>
        </div>
    </footer>

    <a href="#" class="back-to-top" id="backToTopButton"><i class="fas fa-arrow-up"></i></a>

    {{-- JavaScript Libraries & Kustom --}}
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/glightbox/dist/js/glightbox.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    
    
    @push('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function(){
            const navbar = document.getElementById('mainNav');
            const backToTopButton = document.getElementById('backToTopButton');
            
            const scroll_change = () => {
                if (navbar) { if (window.scrollY > 50) { navbar.classList.add('navbar-scrolled'); } else { navbar.classList.remove('navbar-scrolled'); } }
                if (backToTopButton) { if (window.scrollY > 300) { backToTopButton.classList.add('active'); } else { backToTopButton.classList.remove('active'); } }
            };
            
            window.addEventListener('scroll', scroll_change);
            scroll_change();
            AOS.init({ duration: 800, once: true });
        });
    </script>
    @endpush
    
    @stack('scripts')
</body>
</html>
