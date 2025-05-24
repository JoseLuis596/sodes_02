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
        Schema::create('proveedores', function (Blueprint $table) {
                $table->id('idProveedor');
                $table->string('razonSocial', 255);
                $table->string('nombreCompleto', 255);
                $table->text('direccion');
                $table->string('telefono', 15)->unique();
                $table->string('correo', 255)->unique();
                $table->string('rfc', 13)->unique();
                $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proveedores');
    }
};
