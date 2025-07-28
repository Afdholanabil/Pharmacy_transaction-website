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
        Schema::create('pembelians', function (Blueprint $table) {
            $table->string('Nota')->primary(); // Primary Key
            $table->date('TglNota');
            $table->decimal('Diskon', 5, 2)->nullable()->default(0);

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
        Schema::dropIfExists('pembelians');
    }
};
