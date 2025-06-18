@extends('admin.layouts.app')
@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4">Tambah Testimoni Baru</h1>
    <div class="card shadow">
        <div class="card-body">
            <form action="{{ route('admin.testimoni.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Lengkap</label>
                    <input type="text" name="nama" class="form-control" id="nama" required>
                </div>
                <div class="mb-3">
                    <label for="jabatan" class="form-label">Jabatan / Status</label>
                    <input type="text" name="jabatan" class="form-control" id="jabatan" placeholder="Contoh: Alumni Magang 2024" required>
                </div>
                <div class="mb-3">
                    <label for="foto" class="form-label">Foto</label>
                    <input type="file" name="foto" class="form-control" id="foto" required>
                </div>
                <div class="mb-3">
                    <label for="isi_testimoni" class="form-label">Isi Testimoni</label>
                    <textarea name="isi_testimoni" id="isi_testimoni" class="form-control" rows="5" required></textarea>
                </div>
                <a href="{{ route('admin.testimoni.index') }}" class="btn btn-secondary">Batal</a>
                <button type="submit" class="btn btn-primary">Simpan Testimoni</button>
            </form>
        </div>
    </div>
</div>
@endsection