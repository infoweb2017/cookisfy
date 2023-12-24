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
        Schema::create('categoria_recetas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('receta_id');
            $table->unsignedBigInteger('categoria_id');
            $table->timestamps();

            $table->foreign('receta_id')->references('id')->on('recetas')->onDelete('cascade');
            $table->foreign('categoria_id')->references('id')->on('categorias')->onDelete('cascade');

            $table->primary(['receta_id', 'categoria_id']); //Clave primaria compuesta
        });
        /**
    * CREATE TABLE categoria_recetas (
        *receta_id BIGINT UNSIGNED NOT NULL,
        *categoria_id BIGINT UNSIGNED NOT NULL,
        *created_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
        *updated_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        *PRIMARY KEY (receta_id, categoria_id)
    *);

    *-- Claves foráneas referenciando a 'recetas' y 'categorias'
    *ALTER TABLE categoria_recetas ADD CONSTRAINT fk_categoria_recetas_receta_id FOREIGN KEY (receta_id) REFERENCES recetas(id) ON DELETE CASCADE;
    *ALTER TABLE categoria_recetas ADD CONSTRAINT fk_categoria_recetas_categoria_id FOREIGN KEY (categoria_id) REFERENCES categorias(id) ON DELETE CASCADE;

         */
    }

    public function down(): void
    {
        Schema::dropIfExists('categoria_recetas');
    }
};
