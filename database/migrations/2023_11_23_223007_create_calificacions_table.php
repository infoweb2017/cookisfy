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
        Schema::create('calificacions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('receta_id');
            $table->unsignedBigInteger('user_id');
            $table->tinyInteger('valoracion'); // Puede ser de 1 a 5
            $table->text('resena')->nullable(); // Opcional, si quiero permitir que los usuarios dejen un comentario con su calificación
            $table->timestamps();

            $table->foreign('receta_id')->references('id')->on('recetas')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
        /**
         * CREATE TABLE calificacions (
            *id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            *receta_id BIGINT UNSIGNED NOT NULL,
            *user_id BIGINT UNSIGNED NOT NULL,
            *valoracion TINYINT NOT NULL,
            *resena TEXT NULL,
            *created_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
            *updated_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        *);

        *-- Claves foráneas referenciando a 'recetas' y 'users'
        *ALTER TABLE calificacions ADD CONSTRAINT fk_calificacions_receta_id FOREIGN KEY (receta_id) REFERENCES recetas(id) ON DELETE CASCADE;
        *ALTER TABLE calificacions ADD CONSTRAINT fk_calificacions_user_id FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE;
         */
    }

    /**
     * Se elimina o quita campos.
     */
    public function down(): void
    {
        Schema::dropIfExists('calificacions');
    }
};
