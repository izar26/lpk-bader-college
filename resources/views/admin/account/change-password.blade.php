@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <h1 class="h3 mb-4 text-center">Ganti Password Akun</h1>

            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h6 class="m-0 font-weight-bold"><i class="fas fa-key me-2"></i>Formulir Ganti Password</h6>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('admin.account.password.update') }}" method="POST">
                        @csrf

                        {{-- Menampilkan notifikasi error validasi --}}
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        {{-- Input untuk Password Lama --}}
                        <div class="mb-3">
                            <label for="current_password" class="form-label fw-bold">Password Saat Ini</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-lock-open"></i></span>
                                <input type="password" class="form-control" id="current_password" name="current_password" required>
                            </div>
                        </div>

                        <hr class="my-4">

                        {{-- Input untuk Password Baru --}}
                        <div class="mb-3">
                            <label for="password" class="form-label fw-bold">Password Baru</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <small class="form-text text-muted">Minimal 8 karakter.</small>
                        </div>

                        {{-- Input untuk Konfirmasi Password Baru --}}
                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label fw-bold">Konfirmasi Password Baru</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-check-circle"></i></span>
                                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="d-grid mt-4">
                            <button type="submit" class="btn btn-primary btn-lg">
                                <i class="fas fa-save me-2"></i>Update Password
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
