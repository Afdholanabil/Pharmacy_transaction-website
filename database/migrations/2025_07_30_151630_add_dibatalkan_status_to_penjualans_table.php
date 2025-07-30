<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void {
        // Mengubah kolom enum untuk menambahkan status 'dibatalkan'
        Schema::table('penjualans', function (Blueprint $table) {
            $table->enum('status', ['belum_diproses', 'diproses', 'dikirim', 'diterima', 'dibatalkan'])
                  ->default('belum_diproses')->change();
        });
    }
    public function down(): void {
        Schema::table('penjualans', function (Blueprint $table) {
            $table->enum('status', ['belum_diproses', 'diproses', 'dikirim', 'diterima'])
                  ->default('belum_diproses')->change();
        });
    }
};
