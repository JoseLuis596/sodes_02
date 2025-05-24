<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('movimientos', function (Blueprint $table) {
            $table->id('idMovimiento');
            $table->enum('tipoMovimiento', [
                'Entrada', 
                'Salida', 
                'Transferencia Interna', 
                'Desperdicio o Merma', 
                'Producción', 
                'Retorno de Materiales', 
                'Ajuste de Inventario'
            ]);
            $table->integer('cantidad');
            $table->timestamp('fechaMovimiento')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->unsignedBigInteger('idMateriaPrima');
            $table->unsignedBigInteger('idAlmacen');
            $table->unsignedBigInteger('idUsuario');
            $table->timestamps();

            $table->foreign('idMateriaPrima')->references('idMateriaPrima')->on('materiaprima')->onDelete('cascade');
            $table->foreign('idAlmacen')->references('idAlmacen')->on('almacen')->onDelete('cascade');
            $table->foreign('idUsuario')->references('id')->on('users')->onDelete('cascade');
        });
    }

   
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movimientos');
    }
};
