@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <h1 class="h3 mb-4">Tambah Program Baru</h1>

            <div class="card shadow">
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('admin.programs.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-8">
                                <div class="mb-3">
                                    <label for="title" class="form-label">Judul Program</label>
                                    <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" placeholder="Contoh: Magang" required>
                                </div>
                                <div class="mb-3">
                                    <label for="short_description" class="form-label">Deskripsi Singkat (untuk halaman depan)</label>
                                    <textarea class="form-control" id="short_description" name="short_description" rows="3" required>{{ old('short_description') }}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="long_description" class="form-label">Deskripsi Lengkap (untuk halaman detail)</label>
                                    <textarea class="form-control" id="long_description" name="long_description" rows="5">{{ old('long_description') }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="icon_class" class="form-label">Pilih Ikon</label>
                                    <select class="form-select" id="icon_class" name="icon_class">
                                        <option value="fas fa-handshake">Magang (Jabat Tangan)</option>
                                        <option value="fas fa-graduation-cap">Kuliah (Topi Wisuda)</option>
                                        <option value="fas fa-plane-departure">Travel (Pesawat)</option>
                                        <option value="fas fa-user-plus">Eks Korea (Tambah User)</option>
                                        <option value="fas fa-book">Lainnya (Buku)</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <hr class="my-4">
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="requirements_general" class="form-label">Persyaratan Umum</label>
                                    <textarea class="form-control" id="requirements_general" name="requirements_general" rows="10" placeholder="Satu persyaratan per baris...">{{ old('requirements_general') }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                 <div class="mb-3">
                                    <label for="requirements_admin" class="form-label">Persyaratan Administrasi</label>
                                    <textarea class="form-control" id="requirements_admin" name="requirements_admin" rows="10" placeholder="Satu persyaratan per baris...">{{ old('requirements_admin') }}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="mt-3">
                            <a href="{{ route('admin.programs.index') }}" class="btn btn-secondary">Batal</a>
                            <button type="submit" class="btn btn-primary">Simpan Program</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
