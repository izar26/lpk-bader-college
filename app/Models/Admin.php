<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use HasFactory;

    /**
     * Nama tabel yang terhubung dengan model.
     */
    protected $table = 'admin';

    /**
     * Kolom yang boleh diisi secara massal.
     */
    protected $fillable = [
        'username',
        'password',
    ];

    /**
     * === PERBAIKAN DI SINI ===
     * Memberitahu Laravel bahwa tabel 'admin' tidak menggunakan
     * kolom created_at dan updated_at.
     */
    public $timestamps = false;
}
