<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('movimientos', function (Blueprint $table) {
            // Cambiar tipoMovimiento a ENUM
            $table->enum('tipoMovimiento', ['entrada', 'salida'])
                  ->comment('Tipo de movimiento: entrada o salida')
                  ->change();

            // Agregar comentario a cantidad
            $table->integer('cantidad')
                  ->comment('Número de unidades movidas (ej: 20 metros de tela, 3 cajas de hilo)')
                  ->change();

            // Agregar comentario a fechaMovimiento
            $table->dateTime('fechaMovimiento')
                  ->comment('Fecha y hora en que se registra el movimiento')
                  ->change();
        });
    }

    public function down(): void
    {
        Schema::table('movimientos', function (Blueprint $table) {
            $table->string('tipoMovimiento')->change();
            $table->integer('cantidad')->change();
            $table->dateTime('fechaMovimiento')->change();
        });
    }
};
