<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SoalLatihan extends Model
{
    use HasFactory;

    /**
     * Menentukan nama tabel database secara eksplisit karena tidak jamak.
     * Laravel akan mencari 'soal_latihans' jika ini tidak didefinisikan.
     */
    protected $table = 'soal_latihan';

    /**
     * Kolom yang boleh diisi saat membuat data baru (mass assignment).
     * Ini adalah fitur keamanan.
     */
    protected $fillable = ['title', 'link'];

    /**
     * Kita TIDAK MENARUH 'public $timestamps = false;' di sini.
     * Dengan mengosongkannya, kita memberitahu Laravel untuk secara OTOMATIS
     * mengelola kolom 'created_at' dan 'updated_at' yang sudah Anda buat.
     */
}