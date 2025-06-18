@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4">Pengaturan Kontak & Sosial Media</h1>

    <form action="{{ route('admin.kontak.store') }}" method="POST">
        @csrf
        <div class="card shadow">
            <div class="card-header bg-info text-white">
                <i class="fas fa-address-book me-2"></i>
                Edit Informasi Kontak
            </div>
            <div class="card-body p-4">
               

                <div class="row">
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="lokasi" class="form-label fw-bold">Alamat / Lokasi Kantor</label>
                            {{-- Input lokasi sekarang memanggil fungsi JavaScript saat diketik --}}
                            <input type="text" class="form-control" id="lokasi" name="lokasi" value="{{ old('lokasi', $kontak->lokasi) }}" placeholder="Contoh: Jl. H Muchtar, Cibubut, Cianjur" oninput="updateMapPreview()">
                        </div>

                        <div class="mb-3">
                            <label for="telepon" class="form-label fw-bold">Nomor Telepon</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                <input type="text" class="form-control" id="telepon" name="telepon" value="{{ old('telepon', $kontak->telepon) }}" placeholder="0263-xxxxxx">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="no_wa" class="form-label fw-bold">Nomor WhatsApp</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fab fa-whatsapp"></i></span>
                                <input type="text" class="form-control" id="no_wa" name="no_wa" value="{{ old('no_wa', $kontak->no_wa) }}" placeholder="0812xxxxxxxx">
                            </div>
                        </div>

                        <hr class="my-4">
                        <h5 class="mb-3">Link Sosial Media</h5>
                        {{-- (Input social media tidak berubah) --}}
                        <label for="instagram" class="form-label">Instagram</label>
                        <div class="input-group mb-3"><span class="input-group-text"><i class="fab fa-instagram"></i></span><input type="text" class="form-control" id="instagram" name="instagram" value="{{ old('instagram', $kontak->instagram) }}" placeholder="https://instagram.com/namaakun"></div>
                        <label for="facebook" class="form-label">Facebook</label>
                        <div class="input-group mb-3"><span class="input-group-text"><i class="fab fa-facebook"></i></span><input type="text" class="form-control" id="facebook" name="facebook" value="{{ old('facebook', $kontak->facebook) }}" placeholder="https://facebook.com/namaakun"></div>
                        <label for="tiktok" class="form-label">TikTok</label>
                        <div class="input-group mb-3"><span class="input-group-text"><i class="fab fa-tiktok"></i></span><input type="text" class="form-control" id="tiktok" name="tiktok" value="{{ old('tiktok', $kontak->tiktok) }}" placeholder="https://tiktok.com/@namaakun"></div>
                    </div>
                    
                    <div class="col-lg-6">
                        <label class="form-label fw-bold">Preview Peta</label>
                        <div class="map-container border rounded" style="height: 450px;">
                            {{-- Iframe untuk preview peta --}}
                            <iframe id="mapPreview" width="100%" height="100%" style="border:0;" loading="lazy" referrerpolicy="no-referrer-when-downgrade"
                                src="https://maps.google.com/maps?q={{ urlencode($kontak->lokasi) }}&t=&z=15&ie=UTF8&iwloc=&output=embed">
                            </iframe>
                        </div>
                    </div>
                </div>

            </div>
            <div class="card-footer text-end">
                <button type="submit" class="btn btn-info text-white px-4">
                    <i class="fas fa-save me-2"></i>Simpan Pengaturan Kontak
                </button>
            </div>
        </div>
    </form>
</div>

<script>
    function updateMapPreview() {
        // Ambil elemen input alamat dan iframe peta
        const addressInput = document.getElementById('lokasi');
        const mapPreview = document.getElementById('mapPreview');
        
        // Ambil teks alamat dari input
        const address = addressInput.value;
        
        // Jika input tidak kosong, update URL peta. Jika kosong, tampilkan lokasi default (misal: Cianjur)
        if (address) {
            mapPreview.src = `https://maps.google.com/maps?q=${encodeURIComponent(address)}&t=&z=15&ie=UTF8&iwloc=&output=embed`;
        } else {
            mapPreview.src = `https://maps.google.com/maps?q=Cianjur&t=&z=15&ie=UTF8&iwloc=&output=embed`;
        }
    }
</script>
@endsection