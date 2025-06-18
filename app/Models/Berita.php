<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;

    /**
     * Menentukan nama tabel database secara eksplisit.
     */
    protected $table = 'berita';

    /**
     * Kolom-kolom yang diizinkan untuk diisi secara massal.
     */
    protected $fillable = [
        'judul',
        'slug',
        'gambar_thumbnail',
        'isi_konten',
    ];
}