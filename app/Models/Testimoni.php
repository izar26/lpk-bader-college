<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimoni extends Model
{
    use HasFactory;

    protected $table = 'testimoni';

    /**
     * Kolom-kolom yang diizinkan untuk diisi secara massal.
     * PERBAIKAN: Menambahkan 'status' ke dalam array ini.
     */
    protected $fillable = [
        'nama',
        'jabatan',
        'isi_testimoni',
        'foto',
        'status', // <-- PASTIKAN BARIS INI ADA
    ];
}