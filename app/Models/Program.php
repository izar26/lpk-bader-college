<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;

    /**
     * Kolom-kolom yang diizinkan untuk diisi secara massal.
     * Ini penting untuk fitur Tambah dan Edit.
     */
    protected $fillable = [
        'title',
        'icon_class',
        'short_description',
        'long_description',
        'requirements_general',
        'requirements_admin',
    ];
}
