@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4">Pengaturan Profil LPK</h1>

    <form action="{{ route('admin.profil.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-lg-8">
                <div class="card shadow mb-4">
                    <div class="card-header">
                        <h6 class="m-0 font-weight-bold text-primary">Edit Data Profil</h6>
                    </div>
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
                            </div>
                        @endif

                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama LPK</label>
                            <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama', $profil->nama) }}">
                        </div>
                        <div class="mb-3">
                            <label for="tentang" class="form-label">Tentang Kami (Singkat)</label>
                            <textarea class="form-control" id="tentang" name="tentang" rows="3">{{ old('tentang', $profil->tentang) }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="visi" class="form-label">Visi</label>
                            <textarea class="form-control" id="visi" name="visi" rows="3">{{ old('visi', $profil->visi) }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="misi" class="form-label">Misi</label>
                            <textarea class="form-control" id="misi" name="misi" rows="3">{{ old('misi', $profil->misi) }}</textarea>
                        </div>
                        <hr>
                        <h5 class="mt-4 mb-3">Deskripsi Program</h5>
                        <div class="mb-3">
                            <label for="program" class="form-label">Deskripsi Umum Program (di halaman Program Kami)</label>
                            <textarea class="form-control" id="program" name="program" rows="3">{{ old('program', $profil->program) }}</textarea>
                        </div>
                        {{-- DIV UNTUK ALAMAT DAN KONTAK SUDAH DIHAPUS DARI SINI --}}
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card shadow mb-4">
                    <div class="card-header">
                        <h6 class="m-0 font-weight-bold text-primary">Logo LPK</h6>
                    </div>
                    <div class="card-body text-center">
                        @if($profil->foto)
                            <img src="{{ asset('uploads/' . $profil->foto) }}" class="img-thumbnail mb-3" alt="Logo LPK" style="max-width: 150px;">
                        @else
                            <p class="text-muted">Belum ada logo.</p>
                        @endif
                        <input class="form-control" type="file" id="foto" name="foto">
                        <small class="text-muted">Kosongkan jika tidak ingin mengubah logo.</small>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary w-100"><i class="fas fa-save me-2"></i>Simpan Perubahan Profil</button>
            </div>
        </div>
    </form>
</div>
@endsection