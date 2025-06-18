@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1 class="h3 mb-0">Kelola Berita</h1>
                <a href="{{ route('admin.berita.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus me-2"></i>Tulis Berita Baru
                </a>
            </div>

            <div class="card shadow">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th width="10%">Gambar</th>
                                    <th>Judul Berita</th>
                                    <th width="15%">Tanggal Publikasi</th>
                                    <th width="15%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($beritaItems as $item)
                                    <tr>
                                        {{-- Menggunakan path 'uploads' sesuai catatan Anda --}}
                                        <td><img src="{{ asset('uploads/' . $item->gambar_thumbnail) }}" class="img-thumbnail" width="100"></td>
                                        <td>{{ $item->judul }}</td>
                                        <td>{{ $item->created_at->format('d M Y') }}</td>
                                        <td>
                                            <a href="{{ route('admin.berita.edit', $item->id) }}" class="btn btn-sm btn-primary" title="Edit"><i class="fas fa-edit"></i></a>
                                            
                                            {{-- PERBAIKAN DI SINI: Menambahkan id pada tag <form> --}}
                                            <form id="delete-form-berita-{{ $item->id }}" action="{{ route('admin.berita.destroy', $item->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="btn btn-sm btn-danger confirm-action" 
                                                        data-form-id="delete-form-berita-{{ $item->id }}"
                                                        data-message="Yakin hapus berita '{{ $item->judul }}'?"
                                                        data-confirm-text="Ya, hapus!"
                                                        title="Hapus">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center text-muted">Belum ada berita yang ditulis.</td>
                                    </tr>
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
