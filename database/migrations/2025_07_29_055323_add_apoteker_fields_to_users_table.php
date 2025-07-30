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
        Schema::table('users', function (Blueprint $table) {
        $table->string('foto_profil')->nullable()->after('password');
        $table->text('alamat')->nullable()->after('foto_profil');
        $table->string('jabatan')->nullable()->after('alamat');
        $table->date('tanggal_mulai_tugas')->nullable()->after('jabatan');
        $table->boolean('status_aktif')->default(true)->after('tanggal_mulai_tugas');
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
       Schema::table('users', function (Blueprint $table) {
        $table->dropColumn(['foto_profil', 'alamat', 'jabatan', 'tanggal_mulai_tugas', 'status_aktif']);
    });
    }
};
