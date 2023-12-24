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
        Schema::create('comentarios', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('receta_id');
            $table->text('comentarios');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('receta_id')->references('id')->on('recetas')->onDelete('cascade');
            
        });
        /**
         * CREATE TABLE comentarios (
            * id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            * user_id BIGINT UNSIGNED NOT NULL,
            * receta_id BIGINT UNSIGNED NOT NULL,
            * comentarios TEXT NOT NULL,
            * created_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
            * updated_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        * );

        * -- Claves foráneas referenciando a 'users' y 'recetas'
        * ALTER TABLE comentarios ADD CONSTRAINT fk_comentarios_user_id FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE;
        * ALTER TABLE comentarios ADD CONSTRAINT fk_comentarios_receta_id FOREIGN KEY (receta_id) REFERENCES recetas(id) ON DELETE CASCADE;
         */
    }

    /**
     *Se elimina o quita campos.
     */
    public function down(): void
    {
        Schema::dropIfExists('comentarios');
    }
};
