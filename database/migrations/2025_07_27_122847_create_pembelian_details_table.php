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
        Schema::create('pembelian_details', function (Blueprint $table) {
            $table->integer('Jumlah');
            $table->timestamps();

            // Foreign Keys
            $table->string('Nota');
            $table->foreign('Nota')->references('Nota')->on('pembelians')->onDelete('cascade');

            $table->string('KdObat');
            $table->foreign('KdObat')->references('KdObat')->on('obats')->onDelete('cascade');

            // Composite Primary Key
            $table->primary(['Nota', 'KdObat']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembelian_details');
    }
};
