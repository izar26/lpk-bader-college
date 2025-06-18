@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            @if (session('login_success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="fas fa-check-circle me-2"></i>{{ session('login_success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0">Dashboard</h1>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Kolom Kiri -->
        <div class="col-lg-8">
            <!-- Kartu Statistik -->
            <div class="row">
                <div class="col-xl-6 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Media (Foto & Video)</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $galleryCount }}</div>
                                </div>
                                <div class="col-auto"><i class="fas fa-photo-video fa-2x text-muted"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-md-6 mb-4">
                    <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Soal Latihan</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $soalCount }}</div>
                                </div>
                                <div class="col-auto"><i class="fas fa-book-open fa-2x text-muted"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Kartu Selamat Datang & Ringkasan Situs -->
            <div class="card shadow mb-4">
                <div class="card-header py-3 bg-primary text-white">
                    <h6 class="m-0 font-weight-bold">Selamat Datang, {{ ucwords($adminName) }}!</h6>
                </div>
                <div class="card-body">
                    <p>Ini adalah pusat kendali untuk website LPK Bader College Anda. Dari sini, Anda dapat mengelola semua konten yang ditampilkan di halaman depan.</p>
                    <h6 class="mt-4">Ringkasan Informasi Situs:</h6>
                    <table class="table table-bordered table-sm mt-2">
                        <tbody>
                            <tr>
                                <th width="30%">Nama LPK</th>
                                <td>{{ $siteProfil->nama ?? 'Belum diatur' }}</td>
                            </tr>
                            <tr>
                                <th>No. WhatsApp</th>
                                <td>{{ $siteKontak->no_wa ?? 'Belum diatur' }}</td>
                            </tr>
                            <tr>
                                <th>Alamat</th>
                                <td>{{ $siteKontak->lokasi ?? 'Belum diatur' }}</td>
                            </tr>
                        </tbody>
                    </table>
                    <hr>
                    <h6 class="mt-4">Jalan Pintas:</h6>
                    <a href="{{ route('admin.profil.edit') }}" class="btn btn-outline-primary me-2 mt-2"><i class="fas fa-id-card me-2"></i>Edit Profil</a>
                    {{-- PERBAIKAN UTAMA ADA DI SINI --}}
                    <a href="{{ route('admin.media.index') }}" class="btn btn-outline-info me-2 mt-2"><i class="fas fa-plus-square me-2"></i>Tambah Media</a>
                    <a href="{{ route('admin.kontak.index') }}" class="btn btn-outline-dark mt-2"><i class="fas fa-address-book me-2"></i>Edit Kontak</a>
                </div>
            </div>
        </div>

        <!-- Kolom Kanan (Aktivitas Terbaru) -->
        <div class="col-lg-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Aktivitas Terbaru</h6>
                </div>
                <div class="card-body">
                    {{-- Judul diubah menjadi lebih umum --}}
                    <h6 class="mb-2"><strong><i class="fas fa-photo-video text-primary me-2"></i>{{ $galleryCountToday }} Media Ditambahkan Hari Ini:</strong></h6>
                    <ul class="list-group list-group-flush">
                        {{-- Menggunakan variabel yang benar --}}
                        @forelse ($latestThreePhotos as $item)
                            <li class="list-group-item d-flex align-items-center p-2">
                                @if($item->type == 'foto')
                                    <img src="{{ asset('uploads/' . $item->path) }}" width="40" height="40" class="rounded me-3 object-fit-cover">
                                @else
                                    <i class="fab fa-youtube fa-2x text-danger me-3" style="width: 40px"></i>
                                @endif
                                <div>
                                    <strong class="d-block">{{ Str::limit($item->title, 25) }}</strong>
                                    @if($item->created_at)<small>Pukul {{ $item->created_at->format('H:i') }}</small>@endif
                                </div>
                            </li>
                        @empty
                            <li class="list-group-item text-muted">Belum ada media hari ini.</li>
                        @endforelse
                    </ul>
                    <hr>
                    <h6 class="mb-2 mt-3"><strong><i class="fas fa-book-open text-success me-2"></i>{{ $soalCountToday }} Soal Ditambahkan Hari Ini:</strong></h6>
                    <ul class="list-group list-group-flush">
                        @forelse ($latestThreeSoal as $soal)
                            <li class="list-group-item p-2">
                                <strong>{{ $soal->title }}</strong>
                                @if($soal->created_at)<small class="text-muted d-block">Pukul {{ $soal->created_at->format('H:i') }}</small>@endif
                            </li>
                        @empty
                             <li class="list-group-item text-muted">Belum ada soal hari ini.</li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .card .border-left-primary { border-left: .25rem solid #4e73df !important; }
    .card .border-left-success { border-left: .25rem solid #1cc88a !important; }
    .object-fit-cover { object-fit: cover; }
    .table th { background-color: #f8f9fa; }
</style>
@endpush
