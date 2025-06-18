@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <h1 class="h3 mb-4">Tambah Media Baru</h1>
            <div class="card shadow">
                <div class="card-header"><h6 class="m-0 font-weight-bold text-primary">Formulir Media</h6></div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger"><ul class="mb-0">@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>
                    @endif
                    <form action="{{ route('admin.media.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="title" class="form-label">Judul Media</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" placeholder="Contoh: Wisuda Angkatan ke-5" required>
                        </div>
                        <div class="mb-3">
                            <label for="type" class="form-label">Tipe Media</label>
                            <select class="form-select" id="type" name="type">
                                <option value="foto" {{ old('type') == 'foto' ? 'selected' : '' }}>Foto</option>
                                <option value="video" {{ old('type') == 'video' ? 'selected' : '' }}>Video YouTube</option>
                            </select>
                        </div>
                        {{-- Input untuk Foto (muncul/hilang secara dinamis) --}}
                        <div id="photo-input-group" class="mb-3">
                            <label for="photo" class="form-label">Upload File Foto</label>
                            <input class="form-control" type="file" id="photo" name="photo">
                        </div>
                        {{-- Input untuk Video (muncul/hilang secara dinamis) --}}
                        <div id="video-input-group" class="mb-3" style="display: none;">
                            <label for="path" class="form-label">Link Video YouTube</label>
                            <input type="url" class="form-control" id="path" name="path" value="{{ old('path') }}" placeholder="https://www.youtube.com/watch?v=...">
                        </div>
                        <a href="{{ route('admin.media.index') }}" class="btn btn-secondary">Batal</a>
                        <button type="submit" class="btn btn-primary">Simpan Media</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const typeSelect = document.getElementById('type');
        const photoInput = document.getElementById('photo-input-group');
        const videoInput = document.getElementById('video-input-group');

        function toggleInputs() {
            if (typeSelect.value === 'video') {
                videoInput.style.display = 'block';
                photoInput.style.display = 'none';
            } else {
                videoInput.style.display = 'none';
                photoInput.style.display = 'block';
            }
        }

        // Jalankan saat halaman dimuat
        toggleInputs();

        // Jalankan saat dropdown diubah
        typeSelect.addEventListener('change', toggleInputs);
    });
</script>
@endpush
@endsection
