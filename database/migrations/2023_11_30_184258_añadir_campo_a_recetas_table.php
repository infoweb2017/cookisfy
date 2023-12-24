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
        /**
         * ALTER TABLE recetas ADD COLUMN categoria VARCHAR(255) NOT NULL;
        * ALTER TABLE recetas ADD COLUMN tiempo_preparacion INT NOT NULL;
        * ALTER TABLE recetas ADD COLUMN categoria_id BIGINT UNSIGNED NOT NULL;

        * -- Si 'categoria_id' es una clave foránea que referencia a la tabla 'categorias', también necesitarás agregar la siguiente línea:
        * ALTER TABLE recetas ADD CONSTRAINT fk_recetas_categoria_id FOREIGN KEY (categoria_id) REFERENCES categorias(id) ON DELETE CASCADE;
         */
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
