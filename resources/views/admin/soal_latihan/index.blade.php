@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4">Kelola Link Soal Latihan</h1>

    <div class="card shadow mb-4">
        <div class="card-header"><h6 class="m-0 font-weight-bold text-primary">Tambah Link Baru</h6></div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger"><ul class="mb-0">@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>
            @endif

            <form action="{{ route('admin.soal-latihan.store') }}" method="POST">
                @csrf
                <div class="row g-2">
                    <div class="col-md-5"><input type="text" class="form-control" name="title" placeholder="Judul Soal Latihan" required></div>
                    <div class="col-md-5"><input type="text" class="form-control" name="link" placeholder="https://..." required></div>
                    <div class="col-md-2"><button class="btn btn-primary w-100" type="submit"><i class="fas fa-plus"></i> Tambah</button></div>
                </div>
            </form>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header"><h6 class="m-0 font-weight-bold text-primary">Daftar Link</h6></div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="table-light">
                        <tr><th>No.</th><th>Judul Soal</th><th>Link</th><th width="120px">Aksi</th></tr>
                    </thead>
                    <tbody>
                        @forelse ($links as $key => $link)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $link->title }}</td>
                            <td><a href="{{ $link->link }}" target="_blank">{{ Str::limit($link->link, 50) }}</a></td>
                            <td>
                                <a href="{{ route('admin.soal-latihan.edit', $link->id) }}" class="btn btn-sm btn-primary" title="Edit"><i class="fas fa-edit"></i></a>
                                <form id="delete-form-soal-{{ $link->id }}" action="{{ route('admin.soal-latihan.destroy', $link->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-sm btn-danger confirm-action" 
                                            data-form-id="delete-form-soal-{{ $link->id }}" 
                                            data-message="Yakin hapus link ini?" title="Hapus">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr><td colspan="4" class="text-center text-muted">Belum ada link soal latihan.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection