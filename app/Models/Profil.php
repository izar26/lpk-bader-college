<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profil extends Model
{
    use HasFactory;

    protected $table = 'profil';
    public $timestamps = false;

    /**
     * Kolom yang boleh diisi secara massal.
     * 'kontak' dan 'alamat' sudah dihapus dari sini.
     */
    protected $fillable = [
        'nama',
        'tentang',
        'visi',
        'misi',
        'program',
        'magang',
        'kuliah',
        'travel',
        'eks_korea',
        'foto',
    ];
}