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
        Schema::create('imagen_perfils', function (Blueprint $table) {
            $table->unsignedBigInteger('id'); // Clave primaria, BIGINT UNSIGNED y autoincremental
            $table->unsignedBigInteger('user_id');
            $table->string('file_path');
            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');
        });

        /**CREATE TABLE users (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    email_verified_at TIMESTAMP NULL DEFAULT NULL,
    password VARCHAR(255) NOT NULL,
    is_admin BOOLEAN NOT NULL DEFAULT 0,
    remember_token VARCHAR(100) NULL,
    created_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    imagen_perfil BIGINT UNSIGNED NULL
);

-- Clave foránea referenciando a 'imagen_perfils'
ALTER TABLE users ADD CONSTRAINT fk_users_imagen_perfil FOREIGN KEY (imagen_perfil) REFERENCES imagen_perfils(id) ON DELETE SET NULL;*/
    }

    /**
     * Se elimina o quita campos
     */
    public function down(): void
    {
        Schema::dropIfExists('imagen_perfils');
    }
};
