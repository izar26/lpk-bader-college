@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1 class="h3 mb-0">Kelola Media</h1>
                <a href="{{ route('admin.media.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus me-2"></i>Tambah Media Baru
                </a>
            </div>

            <div class="card shadow">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th width="10%">Preview</th>
                                    <th>Judul</th>
                                    <th width="10%">Tipe</th>
                                    <th width="15%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($mediaItems as $item)
                                    <tr>
                                        <td>
                                            @if($item->type == 'foto')
                                                <img src="{{ asset('uploads/' . $item->path) }}" width="100" class="img-thumbnail">
                                            @else
                                                <div class="text-center"><i class="fab fa-youtube fa-3x text-danger"></i></div>
                                            @endif
                                        </td>
                                        <td>{{ $item->title }}</td>
                                        <td class="text-center">
                                            @if($item->type == 'foto')
                                                <span class="badge bg-primary">Foto</span>
                                            @else
                                                <span class="badge bg-danger">Video</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.media.edit', $item->id) }}" class="btn btn-sm btn-primary" title="Edit"><i class="fas fa-edit"></i> Edit</a>
                                            <form id="delete-form-media-{{ $item->id }}" action="{{ route('admin.media.destroy', $item->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="btn btn-sm btn-danger confirm-action" 
                                                        data-form-id="delete-form-media-{{ $item->id }}"
                                                        data-message="Yakin hapus media '{{ $item->title }}'?"
                                                        data-confirm-text="Ya, hapus!">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr><td colspan="4" class="text-center text-muted">Belum ada media. Silakan tambahkan.</td></tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
