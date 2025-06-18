@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <h1 class="h3 mb-4">Edit Berita</h1>
            <div class="card shadow">
                <div class="card-body">
                     @if ($errors->any())
                        <div class="alert alert-danger"><ul class="mb-0">@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>
                    @endif
                    
                    {{-- PERBAIKAN UTAMA ADA DI BARIS INI --}}
                    <form action="{{ route('admin.berita.update', $berita->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="judul" class="form-label">Judul Berita</label>
                            <input type="text" class="form-control" id="judul" name="judul" value="{{ old('judul', $berita->judul) }}" required>
                        </div>
                        <div class="mb-3">
                            <label>Gambar Saat Ini:</label><br>
                            <img src="{{ asset('uploads/' . $berita->gambar_thumbnail) }}" height="150" class="img-thumbnail">
                        </div>
                        <div class="mb-3">
                            <label for="gambar_thumbnail" class="form-label">Ganti Gambar (Opsional)</label>
                            <input type="file" class="form-control" id="gambar_thumbnail" name="gambar_thumbnail">
                        </div>
                        <div class="mb-3">
                            <label for="isi_konten" class="form-label">Isi Konten Berita</label>
                            <textarea class="form-control" id="isi_konten" name="isi_konten" rows="15">{{ old('isi_konten', $berita->isi_konten) }}</textarea>
                        </div>
                        <a href="{{ route('admin.berita.index') }}" class="btn btn-secondary">Batal</a>
                        <button type="submit" class="btn btn-primary">Update Berita</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
