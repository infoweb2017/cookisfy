<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Se utiliza para crear o modificar tablas  
     */
    public function up(): void
    {
        Schema::create('recetas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // suponiendo que las recetas pertenecen a usuarios
            $table->string('titulo');
            $table->text('ingredientes'); // puedes cambiar esto a un tipo de dato diferente si lo necesitas
            $table->longText('instrucciones');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
        /**
         * CREATE TABLE recetas (
            *id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            *user_id BIGINT UNSIGNED NOT NULL,
            *titulo VARCHAR(255) NOT NULL,
            *ingredientes TEXT NOT NULL,
            *instrucciones LONGTEXT NOT NULL,
            *created_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
            *updated_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        *);
            *-- Clave foránea referenciando a 'users'
            *ALTER TABLE recetas ADD CONSTRAINT fk_recetas_user_id FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE;
         */
    }

    /**
     * Se elimina o quita campos
     */
    public function down(): void
    {
        Schema::dropIfExists('recetas');
    }
};
