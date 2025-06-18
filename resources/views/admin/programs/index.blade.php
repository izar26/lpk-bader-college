@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1 class="h3 mb-0">Kelola Program</h1>
                <a href="{{ route('admin.programs.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus me-2"></i>Tambah Program Baru
                </a>
            </div>

            <div class="card shadow">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th width="5%">Ikon</th>
                                    <th>Judul Program</th>
                                    <th>Deskripsi Singkat</th>
                                    <th class="text-center">Status Persyaratan</th>
                                    <th width="15%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($programs as $program)
                                    <tr>
                                        <td class="text-center"><i class="{{ $program->icon_class }} fa-2x"></i></td>
                                        <td>{{ $program->title }}</td>
                                        <td>{{ Str::limit($program->short_description, 70) }}</td>
                                        
                                        {{-- =============================================== --}}
                                        {{-- === LOGIKA BARU UNTUK STATUS PERSYARATAN === --}}
                                        {{-- =============================================== --}}
                                        <td class="text-center">
                                            @if($program->requirements_general && $program->requirements_admin)
                                                <span class="badge bg-success">Lengkap</span>
                                            @elseif($program->requirements_general || $program->requirements_admin)
                                                <span class="badge bg-warning text-dark">Sebagian</span>
                                            @else
                                                <span class="badge bg-secondary">Kosong</span>
                                            @endif
                                        </td>

                                        <td>
                                            <a href="{{ route('admin.programs.edit', $program->id) }}" class="btn btn-sm btn-primary" title="Edit"><i class="fas fa-edit"></i> Edit</a>
                                            <form id="delete-form-program-{{ $program->id }}" action="{{ route('admin.programs.destroy', $program->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="btn btn-sm btn-danger confirm-action" 
                                                        data-form-id="delete-form-program-{{ $program->id }}"
                                                        data-message="Yakin hapus program '{{ $program->title }}'?"
                                                        data-confirm-text="Ya, hapus!"
                                                        title="Hapus">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center text-muted">
                                            Belum ada program yang ditambahkan.
                                        </td>
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
