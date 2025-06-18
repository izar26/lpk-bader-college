@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <h1 class="h3 mb-4">Edit Media: {{ $media->title }}</h1>
            <div class="card shadow">
                <div class="card-header"><h6 class="m-0 font-weight-bold text-primary">Formulir Edit Media</h6></div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger"><ul class="mb-0">@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>
                    @endif
                    <form action="{{ route('admin.media.update', $media->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="title" class="form-label">Judul Media</label>
                            <input type="text" class="form-control" name="title" value="{{ old('title', $media->title) }}" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tipe Media</label>
                            <input type="text" class="form-control" value="{{ ucfirst($media->type) }}" readonly disabled>
                        </div>
                        
                        {{-- Tampilkan input sesuai tipe media --}}
                        @if($media->type == 'foto')
                            <div class="mb-3">
                                <label>Foto Saat Ini:</label><br>
                                <img src="{{ asset('uploads/' . $media->path) }}" height="100" class="img-thumbnail">
                            </div>
                            <div class="mb-3">
                                <label for="photo" class="form-label">Ganti Foto (Opsional)</label>
                                <input class="form-control" type="file" name="photo">
                            </div>
                        @else
                            <div class="mb-3">
                                <label for="path" class="form-label">Link Video YouTube</label>
                                <input type="url" class="form-control" name="path" value="{{ old('path', $media->path) }}">
                            </div>
                        @endif
                        
                        <a href="{{ route('admin.media.index') }}" class="btn btn-secondary">Batal</a>
                        <button type="submit" class="btn btn-primary">Update Media</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
