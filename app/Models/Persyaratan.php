<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persyaratan extends Model
{
    use HasFactory;

    /**
     * Nama tabel yang terhubung dengan model.
     */
    protected $table = 'persyaratan';

    /**
     * Menonaktifkan timestamps (created_at dan updated_at).
     */
    public $timestamps = false;

    /**
     * Kolom yang boleh diisi secara massal.
     */
    protected $fillable = [
        'persyaratan_umum',
        'persyaratan_admin',
    ];
}