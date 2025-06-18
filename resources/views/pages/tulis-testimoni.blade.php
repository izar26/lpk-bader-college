@extends('layouts.frontend')
@section('title', 'Tulis Testimoni Anda - LPK Bader College')

@section('content')
<section class="py-5 bg-light">
    <div class="container my-4" data-aos="fade-up">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="text-center mb-5">
                    <h1 class="display-5 fw-bold">Bagikan Pengalaman Anda</h1>
                    <p class="lead text-muted">Cerita Anda sangat berarti bagi kami dan calon siswa lainnya. Terima kasih telah meluangkan waktu.</p>
                </div>

                <div class="card shadow-sm border-0">
                    <div class="card-body p-4 p-md-5">
                        @if(session('testimonial_success'))
                            <div class="alert alert-success">
                                <h4>Terima Kasih!</h4>
                                <p>{{ session('testimonial_success') }}</p>
                                <a href="{{ route('home') }}" class="btn btn-success">Kembali ke Halaman Utama</a>
                            </div>
                        @else
                            <form action="{{ route('testimoni.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama Lengkap Anda</label>
                                    <input type="text" name="nama" class="form-control" id="nama" required>
                                </div>
                                <div class="mb-3">
                                    <label for="jabatan" class="form-label">Status/Jabatan Anda</label>
                                    <input type="text" name="jabatan" class="form-control" id="jabatan" placeholder="Contoh: Alumni Magang 2024" required>
                                </div>
                                <div class="mb-3">
                                    <label for="foto" class="form-label">Foto Anda</label>
                                    <input type="file" name="foto" class="form-control" id="foto" required>
                                </div>
                                <div class="mb-3">
                                    <label for="isi_testimoni" class="form-label">Cerita/Testimoni Anda</label>
                                    <textarea name="isi_testimoni" id="isi_testimoni" class="form-control" rows="5" required></textarea>
                                </div>
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-primary btn-lg">Kirim Testimoni</button>
                                </div>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
