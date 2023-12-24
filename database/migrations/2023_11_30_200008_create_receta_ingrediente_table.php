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
        Schema::create('receta_ingrediente', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('receta_id');
            $table->unsignedBigInteger('ingrediente_id');
            $table->decimal('cantidad', 8, 2); // Por ejemplo, una cantidad decimal
            $table->string('unidad'); // Unidad de medida
            $table->timestamps();
        });
        /** 
         * CREATE TABLE receta_ingrediente (
            *id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            *receta_id BIGINT UNSIGNED NOT NULL,
            *ingrediente_id BIGINT UNSIGNED NOT NULL,
            *cantidad DECIMAL(8, 2) NOT NULL,
            *unidad VARCHAR(255) NOT NULL,
            *created_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
            *updated_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        *);

        *-- Claves foráneas referenciando a 'recetas' y 'ingredientes'
        *ALTER TABLE receta_ingrediente ADD CONSTRAINT fk_receta_ingrediente_receta_id FOREIGN KEY (receta_id) REFERENCES recetas(id) ON DELETE CASCADE;
        *ALTER TABLE receta_ingrediente ADD CONSTRAINT fk_receta_ingrediente_ingrediente_id FOREIGN KEY (ingrediente_id) REFERENCES ingredientes(id) ON DELETE CASCADE;
        */

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('receta_ingrediente');
    }
};
