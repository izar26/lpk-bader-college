<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kontak extends Model
{
    use HasFactory;

    /**
     * Menentukan nama tabel database secara eksplisit.
     */
    protected $table = 'kontak';

    /**
     * Kolom yang boleh diisi secara massal.
     */
    protected $fillable = [
        'lokasi',
        'telepon',
        'no_wa',
        'instagram',
        'facebook',
        'tiktok',
    ];
}