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
        Schema::create('platos_imagenes', function (Blueprint $table) {
            $table->id();
            $table->string('imagen'); // URL o ruta de la imagen
            $table->timestamps();
        });

        /** 
         * CREATE TABLE platos_imagenes (
                *id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                *imagen VARCHAR(255) NOT NULL,
                *created_at TIMESTAMP NULL DEFAULT NULL,
                *updated_at TIMESTAMP NULL DEFAULT NULL
            *);

        */

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('platos_imagenes');
    }
};
