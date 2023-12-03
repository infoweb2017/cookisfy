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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->boolean('is_admin')->default(0);
            $table->rememberToken();
            $table->timestamps();

            /*$table->unsignedBigInteger('imagen_perfil')->nullable(); // Clave foránea, BIGINT UNSIGNED

            // Definición de la clave foránea
            $table->foreign('imagen_perfil')->references('id')->on('imagen_perfils')->onDelete('set null');*/
        });

        /*** CREATE TABLE `users` (
         `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
        `nombre` VARCHAR(191) NOT NULL,
        `email` VARCHAR(191) NOT NULL,
        `email_verified_at` TIMESTAMP NULL,
        `password` VARCHAR(191) NOT NULL,
        `remember_token` VARCHAR(100) NULL,
        `is_admin` TINYINT(1) NOT NULL DEFAULT '0',
        `created_at` TIMESTAMP NULL,
        `updated_at` TIMESTAMP NULL,
        `imagen_perfil` BIGINT UNSIGNED NULL,
        UNIQUE (`email`)
        ) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
         */
    }

    /**
     * Se elimina o quita campos
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
