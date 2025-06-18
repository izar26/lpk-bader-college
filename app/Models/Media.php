<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory;

    /**
     * Nama tabel yang terhubung dengan model.
     */
    protected $table = 'media';

    /**
     * Kolom-kolom yang diizinkan untuk diisi secara massal.
     */
    protected $fillable = [
        'title',
        'type',
        'path',
    ];
}
