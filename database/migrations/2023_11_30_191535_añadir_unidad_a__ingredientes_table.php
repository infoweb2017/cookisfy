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
        Schema::table('ingredientes', function (Blueprint $table) {
            $table->string('unidad'); // Agrega el campo "unidad" como una cadena de texto
        });
        /**
         * ALTER TABLE ingredientes ADD COLUMN unidad VARCHAR(255) NOT NULL;
         */
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ingredientes');
    }
};
