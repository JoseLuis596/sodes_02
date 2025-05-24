<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('numControl', 50)->unique()->nullable(false);
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            // Elimina la restricción unique antes de cambiar el campo
            $table->dropUnique(['numControl']);
            $table->string('numControl', 50)->nullable()->change();
        });
    }
};
