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
            $table->string('categoria'); // Nuevo campo para la categoría
            $table->integer('tiempo_preparacion'); // Nuevo campo para el tiempo de preparación en minutos
            $table->unsignedBigInteger('categoria_id'); // Nuevo campo para la clave foránea de la categoría
        });
    }

    /**
     * Revertir las migraciones.
     */
    public function down(): void
    {
        Schema::table('recetas', function (Blueprint $table) {
                $table->dropColumn(['categoria', 'tiempo_preparacion', 'categoria_id']);
        });
    }
};
