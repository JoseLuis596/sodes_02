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
        Schema::create('transportes', function (Blueprint $table) {
            $table->id('idTransporte');
            $table->string('marca', 100);
            $table->string('modelo', 100);
            $table->string('anio', 4);
            $table->string('capacidad', 50);
            $table->unsignedBigInteger('idCliente');
            $table->timestamps();

            $table->foreign('idCliente')->references('idCliente')->on('clientes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transportes');
    }
};
