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
        Schema::create('cliente_materiaprima', function (Blueprint $table) {
            $table->unsignedBigInteger('idCliente');
            $table->unsignedBigInteger('idMateriaPrima');
            $table->foreign('idCliente')->references('idCliente')->on('clientes')->onDelete('cascade');
            $table->foreign('idMateriaPrima')->references('idMateriaPrima')->on('materiaprima')->onDelete('cascade');

            $table->primary(['idCliente', 'idMateriaPrima']);;
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cliente_materiaprima');
    }
};
