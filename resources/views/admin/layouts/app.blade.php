<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - LPK Bader</title>
    
    {{-- Menggunakan path 'uploads' sesuai catatan Anda --}}
    <link rel="icon" href="{{ asset('uploads/icon.png') }}" type="image/png">

    {{-- CSS Bootstrap dari folder public --}}
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    {{-- CSS Font Awesome dari internet --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    <style>
        /* Definisi Warna dan Font */
        :root {
            --sidebar-bg: #111827;
            --sidebar-text: #9CA3AF;
            --sidebar-hover-bg: #374151;
            --sidebar-active-bg: #0d224b;
            --sidebar-active-text: #FFFFFF;
        }
        body {
            background-color: #f3f4f6;
        }

        /* STRUKTUR UTAMA MENGGUNAKAN FLEXBOX */
        .admin-wrapper {
            display: flex;
            height: 100vh;
            max-height: 100vh;
            overflow-x: hidden;
            overflow-y: auto;
        }
        .sidebar {
            width: 280px;
            background-color: var(--sidebar-bg);
            color: var(--sidebar-text);
            flex-shrink: 0; /* Mencegah sidebar menyusut */
        }
        .main-content {
            flex-grow: 1; /* Konten utama akan mengisi sisa ruang */
            height: 100vh;
            overflow-y: auto; /* Scroll hanya pada konten utama */
        }
        
        /* GAYA VISUAL SIDEBAR BARU */
        .sidebar-header { color: #FFF; text-decoration: none; }
        .sidebar-header img { height: 40px; }
        .sidebar-header span { font-size: 1.25rem; font-weight: 700; }
        .sidebar-nav { list-style: none; padding-left: 0; }
        .sidebar-nav .nav-link {
            display: flex; align-items: center; padding: 0.75rem 1rem;
            border-radius: 0.5rem; color: var(--sidebar-text);
            text-decoration: none; transition: all 0.2s ease-in-out;
        }
        .sidebar-nav .nav-link .nav-icon { width: 20px; margin-right: 1rem; text-align: center; }
        .sidebar-nav .nav-link:hover { background-color: var(--sidebar-hover-bg); color: #FFF; }
        .sidebar-nav .nav-link.active { background-color: var(--sidebar-active-bg); color: var(--sidebar-active-text); font-weight: 600; }
        .nav-heading { font-size: 0.7rem; font-weight: 700; text-transform: uppercase; padding: 0 1rem; margin-top: 1.5rem; margin-bottom: 0.75rem; }
        .profile-section { padding-top: 1rem; border-top: 1px solid #374151; }
    </style>
    @stack('styles')
</head>
<body>
    <div class="admin-wrapper">
        <!-- Sidebar -->
        <div class="sidebar d-flex flex-column p-3">
            <a href="{{ route('admin.dashboard') }}" class="sidebar-header d-flex align-items-center mb-3">
                <img src="{{ asset('uploads/icon.png') }}" alt="Logo" class="me-3">
                <span>Administrator</span>
            </a>

            <ul class="sidebar-nav nav nav-pills flex-column mb-auto">
                {{-- Semua item menu Anda --}}
                <li class="nav-item"><a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}"><i class="fas fa-tachometer-alt nav-icon"></i><span>Dashboard</span></a></li>
                <li class="nav-heading">Manajemen Konten</li>
                <li class="nav-item"><a href="{{ route('admin.profil.edit') }}" class="nav-link {{ request()->routeIs('admin.profil.edit') ? 'active' : '' }}"><i class="fas fa-id-card nav-icon"></i><span>Profil LPK</span></a></li>
                <li class="nav-item"><a href="{{ route('admin.programs.index') }}" class="nav-link {{ request()->routeIs('admin.programs.*') ? 'active' : '' }}"><i class="fas fa-graduation-cap nav-icon"></i><span>Kelola Program</span></a></li>
                <li class="nav-item"><a href="{{ route('admin.media.index') }}" class="nav-link {{ request()->routeIs('admin.media.*') ? 'active' : '' }}"><i class="fas fa-photo-video nav-icon"></i><span>Kelola Media</span></a></li>
                <li class="nav-item"><a href="{{ route('admin.berita.index') }}" class="nav-link {{ request()->routeIs('admin.berita.*') ? 'active' : '' }}"><i class="fas fa-newspaper nav-icon"></i><span>Kelola Berita</span></a></li>
                <li class="nav-item"><a href="{{ route('admin.testimoni.index') }}" class="nav-link {{ request()->routeIs('admin.testimoni.*') ? 'active' : '' }}"><i class="fas fa-comment-dots nav-icon"></i><span>Kelola Testimoni</span></a></li>
                <li class="nav-item"><a href="{{ route('admin.soal-latihan.index') }}" class="nav-link {{ request()->routeIs('admin.soal-latihan.*') ? 'active' : '' }}"><i class="fas fa-book-open nav-icon"></i><span>Soal Latihan</span></a></li>
                <li class="nav-heading">Pengaturan Situs</li>
                <li class="nav-item"><a href="{{ route('admin.kontak.index') }}" class="nav-link {{ request()->routeIs('admin.kontak.index') ? 'active' : '' }}"><i class="fas fa-address-book nav-icon"></i><span>Pengaturan Kontak</span></a></li>
            </ul>

            <div class="profile-section dropdown">
                <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-user-circle fa-2x me-2"></i>
                    <strong>{{ Auth::guard('admin')->user()->username }}</strong>
                </a>
                <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
                    <li><a class="dropdown-item" href="{{ route('admin.account.password.edit') }}"><i class="fas fa-key fa-fw me-2"></i>Ganti Password</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li>
                        <a class="dropdown-item confirm-action" href="#" data-form-id="logout-form" data-message="Apakah Anda yakin ingin keluar?" data-confirm-text="Ya, Logout!"><i class="fas fa-sign-out-alt fa-fw me-2"></i>Logout</a>
                        <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">@csrf</form>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Main Content -->
        <main class="main-content p-4">
             @yield('content')
        </main>
    </div>

    {{-- JavaScript Libraries --}}
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    {{-- Script Universal untuk Notifikasi & Konfirmasi --}}
    <script>
        document.addEventListener('DOMContentLoaded',function(){const t=document.querySelectorAll('.confirm-action');t.forEach(t=>{t.addEventListener('click',function(e){e.preventDefault();const o=this.dataset.formId,n=this.dataset.message||'Apakah Anda yakin?',s=this.dataset.confirmText||'Ya, Lanjutkan!',a=this.dataset.cancelText||'Batal';Swal.fire({title:'Konfirmasi',text:n,icon:'warning',showCancelButton:!0,confirmButtonColor:'#3085d6',cancelButtonColor:'#d33',confirmButtonText:s,cancelButtonText:a}).then(t=>{t.isConfirmed&&document.getElementById(o).submit()})})})});const Toast=Swal.mixin({toast:!0,position:'top-end',showConfirmButton:!1,timer:3e3,timerProgressBar:!0,didOpen:t=>{t.addEventListener('mouseenter',Swal.stopTimer),t.addEventListener('mouseleave',Swal.resumeTimer)}});
        @if(session('success')) Toast.fire({icon:'success',title:'{{ session('success') }}'}); @endif
        @if(session('error')) Toast.fire({icon:'error',title:'{{ session('error') }}'}); @endif
    </script>
    @stack('scripts')
</body>
</html>
