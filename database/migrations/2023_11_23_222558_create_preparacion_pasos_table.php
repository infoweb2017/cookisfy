<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Se utiliza para crear o modificar tablas.
     */
    public function up(): void
    {
        Schema::create('preparacion_pasos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('receta_id');
            $table->text('pasos');
            $table->integer('solicitar')->nullable();
            $table->timestamps();

            $table->foreign('receta_id')->references('id')->on('recetas')->onDelete('cascade');
        });
        /**
         * CREATE TABLE preparacion_pasos (
            * id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            * receta_id BIGINT UNSIGNED NOT NULL,
            * pasos TEXT NOT NULL,
            * solicitar INT NULL,
            * created_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
            * updated_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        * );

        * -- Clave foránea referenciando a 'recetas'
        * ALTER TABLE preparacion_pasos ADD CONSTRAINT fk_preparacion_pasos_receta_id FOREIGN KEY (receta_id) REFERENCES recetas(id) ON DELETE CASCADE;

         */
    }

    /**
     * Se elimina o quita campos.
     */
    public function down(): void
    {
        Schema::dropIfExists('preparacion_pasos');
    }
};
