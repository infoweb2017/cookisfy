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
        Schema::create('contactos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('apellidos');
            $table->string('telefono');
            $table->string('correo');
            $table->text('consulta');
            $table->timestamps();
        });

        /**
         * CREATE TABLE contactos (
            *id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            *nombre VARCHAR(255) NOT NULL,
            *apellidos VARCHAR(255) NOT NULL,
            *telefono VARCHAR(255) NOT NULL,
            *correo VARCHAR(255) NOT NULL,
            *consulta TEXT NOT NULL,
            *created_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
            *updated_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        *);

         */
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contactos');
    }
};
