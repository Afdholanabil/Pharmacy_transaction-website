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
        Schema::create('obats', function (Blueprint $table) {
            $table->string('KdObat')->primary(); // Primary Key
            $table->string('NmObat');
            $table->string('Jenis');
            $table->string('Satuan');
            $table->decimal('HargaBeli', 10, 2);
            $table->decimal('HargaJual', 10, 2);
            $table->integer('Stok');

            // Foreign Key ke tabel supliers
            $table->string('KdSuplier');
            $table->foreign('KdSuplier')->references('KdSuplier')->on('supliers');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('obats');
    }
};
