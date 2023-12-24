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
        Schema::create('ingredientes', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('cantidad_ingredientes');
            $table->boolean('opcional');
            $table->timestamps();
        });
        /**
         *CREATE TABLE ingredientes (
            *id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            *nombre VARCHAR(255) NOT NULL,
            *cantidad_ingredientes VARCHAR(255) NOT NULL,
            *opcional BOOLEAN NOT NULL,
            *created_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
            *updated_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        *);
         */
    }

    /**
     * Se elimina o quita campos.
     */
    public function down(): void
    {
        Schema::dropIfExists('ingredientes');
    }
};
