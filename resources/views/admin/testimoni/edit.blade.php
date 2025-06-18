@extends('admin.layouts.app')
@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4">Edit Testimoni</h1>
    <div class="card shadow">
        <div class="card-body">
            <form action="{{ route('admin.testimoni.update', $testimoni->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Lengkap</label>
                    <input type="text" name="nama" class="form-control" id="nama" value="{{ $testimoni->nama }}" required>
                </div>
                <div class="mb-3">
                    <label for="jabatan" class="form-label">Jabatan / Status</label>
                    <input type="text" name="jabatan" class="form-control" id="jabatan" value="{{ $testimoni->jabatan }}" required>
                </div>
                <div class="mb-3">
                    <label>Foto Saat Ini:</label><br>
                    <img src="{{ asset('uploads/' . $testimoni->foto) }}" height="100" class="img-thumbnail">
                </div>
                <div class="mb-3">
                    <label for="foto" class="form-label">Ganti Foto (Opsional)</label>
                    <input type="file" name="foto" class="form-control" id="foto">
                </div>
                <div class="mb-3">
                    <label for="isi_testimoni" class="form-label">Isi Testimoni</label>
                    <textarea name="isi_testimoni" id="isi_testimoni" class="form-control" rows="5" required>{{ $testimoni->isi_testimoni }}</textarea>
                </div>
                <a href="{{ route('admin.testimoni.index') }}" class="btn btn-secondary">Batal</a>
                <button type="submit" class="btn btn-primary">Update Testimoni</button>
            </form>
        </div>
    </div>
</div>
@endsection
