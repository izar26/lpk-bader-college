<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Jalankan migrasi untuk upgrade tabel.
     */
    public function up(): void
    {
        // 1. Ganti nama tabel dari 'galeri' menjadi 'media'
        Schema::rename('galeri', 'media');

        // 2. Modifikasi tabel 'media' yang baru
        Schema::table('media', function (Blueprint $table) {
            // Ganti nama kolom 'photo' menjadi 'path'
            $table->renameColumn('photo', 'path');
            
            // Tambahkan kolom baru 'title' setelah kolom 'id'
            $table->string('title')->after('id')->nullable();

            // Tambahkan kolom baru 'type' untuk membedakan foto dan video
            $table->enum('type', ['foto', 'video'])->after('title')->default('foto');
        });
    }

    /**
     * Kembalikan perubahan jika migrasi di-rollback.
     */
    public function down(): void
    {
        // Urutannya dibalik
        Schema::table('media', function (Blueprint $table) {
            $table->dropColumn('title');
            $table->dropColumn('type');
            $table->renameColumn('path', 'photo');
        });

        Schema::rename('media', 'galeri');
    }
};
