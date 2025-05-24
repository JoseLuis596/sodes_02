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
        Schema::create('materiaprima', function (Blueprint $table) {
            $table->id('idMateriaPrima');
            $table->text('descripcion');
            $table->date('expiracion')->nullable();
            $table->string('nombre', 100);
            $table->integer('stock');
            $table->unsignedBigInteger('idProveedor');
            $table->unsignedBigInteger('idAlmacen'); // Agregado el campo idAlmacen
            $table->timestamps();

            // Definición de las claves foráneas
            $table->foreign('idProveedor')->references('idProveedor')->on('proveedores')->onDelete('cascade');
            $table->foreign('idAlmacen')->references('idAlmacen')->on('almacenes')->onDelete('restrict'); // Agregado constraint para idAlmacen
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('materiaprima');
    }
};
