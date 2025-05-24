<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AddDescriptionsToMateriaprimaTable extends Migration
{
    /**
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared("ALTER TABLE materiaprima DROP FOREIGN KEY materiaprima_idProveedor_foreign");

        DB::unprepared("ALTER TABLE materiaprima MODIFY COLUMN nombre VARCHAR(255) COMMENT 'Nombre comercial o identificador del insumo. Ej: \"Tela lino azul\", \"Caja de hilo #30\".'");
        DB::unprepared("ALTER TABLE materiaprima MODIFY COLUMN descripcion TEXT COMMENT 'Detalle adicional del material: tipo, textura, color, gramaje, etc.'");
        DB::unprepared("ALTER TABLE materiaprima MODIFY COLUMN precio DECIMAL(10,2) COMMENT 'Precio por unidad (Ej: precio por metro o precio por caja).'");
        DB::unprepared("ALTER TABLE materiaprima MODIFY COLUMN expiracion DATE COMMENT 'Fecha de caducidad si aplica (Ej: productos químicos, telas tratadas o resinas). Opcional.'");
        DB::unprepared("ALTER TABLE materiaprima MODIFY COLUMN stock INT COMMENT 'Cantidad disponible en inventario en función de la unidad definida.'");
        DB::unprepared("ALTER TABLE materiaprima ADD CONSTRAINT materiaprima_idProveedor_foreign FOREIGN KEY (idProveedor) REFERENCES proveedores(idProveedor)");

    }

    /**
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared("ALTER TABLE materiaprima MODIFY COLUMN nombre VARCHAR(255) COMMENT ''");
        DB::unprepared("ALTER TABLE materiaprima MODIFY COLUMN descripcion TEXT COMMENT ''");
        DB::unprepared("ALTER TABLE materiaprima MODIFY COLUMN precio DECIMAL(10,2) COMMENT ''");
        DB::unprepared("ALTER TABLE materiaprima MODIFY COLUMN expiracion DATE COMMENT ''");
        DB::unprepared("ALTER TABLE materiaprima MODIFY COLUMN stock INT COMMENT ''");
        DB::unprepared("ALTER TABLE materiaprima MODIFY COLUMN idProveedor INT COMMENT ''");
    }
}
