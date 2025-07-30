<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void {
        Schema::table('obats', function (Blueprint $table) {
            $table->date('tanggal_kadaluarsa')->nullable()->after('Stok');
        });
    }
    public function down(): void {
        Schema::table('obats', function (Blueprint $table) {
            $table->dropColumn('tanggal_kadaluarsa');
        });
    }
};
