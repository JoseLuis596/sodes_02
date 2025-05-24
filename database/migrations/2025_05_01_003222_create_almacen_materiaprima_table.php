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
        Schema::create('almacen_materiaprima', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idAlmacen'); // Relación con la tabla almacen
            $table->unsignedBigInteger('idMateriaPrima'); // Relación con la tabla materiaprima
            $table->timestamps();

            // Relaciones
            $table->foreign('idAlmacen')->references('idAlmacen')->on('almacen')->onDelete('cascade');
            $table->foreign('idMateriaPrima')->references('idMateriaPrima')->on('materiaprima')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('almacen_materiaprima');
    }
};
