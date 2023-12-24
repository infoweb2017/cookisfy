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
        Schema::table('recetas', function (Blueprint $table) {
            $table->text('descripcion')->change(); // Cambia a TEXT si necesitas almacenar textos muy largos
        });
        /**
         * ALTER TABLE recetas MODIFY descripcion TEXT;
         */
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('recetas', function (Blueprint $table) {
            Schema::table('recetas', function (Blueprint $table) {
                $table->string('descripcion', 255)->change(); // Vuelve al tamaño original en caso de rollback
            });
        });
    }
};
