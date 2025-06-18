@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <h1 class="h3 mb-4">Moderasi Testimoni</h1>
            <p class="text-muted">Di sini Anda dapat menyetujui atau menolak testimoni yang dikirim oleh pengunjung. Hanya testimoni yang 'Disetujui' yang akan tampil di halaman depan.</p>
            
            <div class="card shadow">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th width="10%">Foto</th>
                                    <th>Nama & Jabatan</th>
                                    <th>Isi Testimoni</th>
                                    <th width="10%" class="text-center">Status</th>
                                    <th width="20%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($testimoni as $item)
                                <tr>
                                    <td><img src="{{ asset('uploads/' . $item->foto) }}" class="img-thumbnail"></td>
                                    <td>
                                        <strong>{{ $item->nama }}</strong><br>
                                        <small>{{ $item->jabatan }}</small>
                                    </td>
                                    <td>{{ Str::limit($item->isi_testimoni, 100) }}</td>
                                    <td class="text-center">
                                        @if($item->status == 'disetujui')
                                            <span class="badge bg-success">Disetujui</span>
                                        @elseif($item->status == 'ditolak')
                                            <span class="badge bg-danger">Ditolak</span>
                                        @else
                                            <span class="badge bg-warning text-dark">Menunggu</span>
                                        @endif
                                    </td>
                                    <td>
                                        {{-- Tampilkan tombol Setujui/Tolak hanya jika status masih 'menunggu' --}}
                                        @if($item->status == 'menunggu')
                                            <form action="{{ route('admin.testimoni.approve', $item->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="btn btn-sm btn-success" title="Setujui"><i class="fas fa-check"></i></button>
                                            </form>
                                            <form action="{{ route('admin.testimoni.reject', $item->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="btn btn-sm btn-secondary" title="Tolak"><i class="fas fa-times"></i></button>
                                            </form>
                                        @endif
                                        
                                        <a href="{{ route('admin.testimoni.edit', $item->id) }}" class="btn btn-sm btn-primary" title="Edit"><i class="fas fa-edit"></i></a>
                                        
                                        <form id="delete-form-testimoni-{{ $item->id }}" action="{{ route('admin.testimoni.destroy', $item->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-sm btn-danger confirm-action" 
                                                    data-form-id="delete-form-testimoni-{{ $item->id }}"
                                                    data-message="Yakin hapus testimoni dari '{{ $item->nama }}' secara permanen?"
                                                    data-confirm-text="Ya, hapus permanen!">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr><td colspan="5" class="text-center text-muted">Belum ada testimoni yang masuk.</td></tr>
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
