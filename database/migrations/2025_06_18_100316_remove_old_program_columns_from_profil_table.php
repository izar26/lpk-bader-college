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
        Schema::table('profil', function (Blueprint $table) {
            // HANYA menghapus kolom-kolom ini
            $table->dropColumn(['magang', 'kuliah', 'travel', 'eks_korea']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('profil', function (Blueprint $table) {
            // Untuk jaga-jaga jika perlu rollback
            $table->text('magang')->nullable();
            $table->text('kuliah')->nullable();
            $table->text('travel')->nullable();
            $table->text('eks_korea')->nullable();
        });
    }
};
