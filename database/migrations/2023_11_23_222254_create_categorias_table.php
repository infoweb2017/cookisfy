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
        Schema::create('categorias', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->text('descripción')->nullable();
            $table->timestamps();
        });
        /**
         * CREATE TABLE categorias (
            * id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            * nombre VARCHAR(255) NOT NULL,
            * descripción TEXT NULL,
            * created_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
            * updated_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        * );
         */
    }

    /**
     * Se elimina o quita campos
     */
    public function down(): void
    {
        Schema::dropIfExists('categorias');
    }
};
