<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('testimoni', function (Blueprint $table) {
            // Tambahkan kolom status setelah kolom 'foto'
            // Defaultnya adalah 'menunggu' untuk setiap testimoni baru
            $table->enum('status', ['menunggu', 'disetujui', 'ditolak'])
                  ->after('foto')
                  ->default('menunggu');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('testimoni', function (Blueprint $table) {
            // Hapus kolom 'status' jika migrasi di-rollback
            $table->dropColumn('status');
        });
    }
};