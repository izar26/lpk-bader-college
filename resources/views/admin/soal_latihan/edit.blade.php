@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4">Edit Link Soal Latihan</h1>
    <div class="card shadow">
        <div class="card-header">
            <h6 class="m-0 font-weight-bold text-primary">Edit Link</h6>
        </div>
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

            <form action="{{ route('admin.soal-latihan.update', $link->id) }}" method="POST">
                @csrf
                @method('PUT')

                {{-- INPUT UNTUK JUDUL --}}
                <div class="mb-3">
                    <label for="title" class="form-label">Judul Soal</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $link->title) }}" required>
                </div>

                {{-- INPUT UNTUK LINK --}}
                <div class="mb-3">
                    <label for="link" class="form-label">Link Soal</label>
                    <input type="text" class="form-control" id="link" name="link" value="{{ old('link', $link->link) }}" required>
                </div>

                <hr>
                <a href="{{ route('admin.soal-latihan.index') }}" class="btn btn-secondary">Batal</a>
<button class="btn btn-primary" type="submit"><i class="fas fa-save me-2"></i>Simpan Perubahan</button>
            </form>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
@endsection