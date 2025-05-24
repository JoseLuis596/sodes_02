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
        Schema::table('almacen', function (Blueprint $table) {
            $table->string('unidad_medida', 50)->default('unidades')->after('capacidad'); // Agregar unidad_medida
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('almacen', function (Blueprint $table) {
            $table->dropColumn('unidad_medida'); // Eliminar unidad_medida si se revierte la migración
        });
    }
};
