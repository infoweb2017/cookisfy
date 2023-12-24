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
        Schema::table('categorias', function (Blueprint $table) {
            $table->string('categoria_tipo')->default('ingrediente'); // Valor predeterminado para ingredientes
        });
        /**
         * ALTER TABLE categorias ADD COLUMN categoria_tipo VARCHAR(255) DEFAULT 'ingrediente';

         */
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('categorias', function (Blueprint $table) {
            Schema::table('categorias', function (Blueprint $table) {
                $table->dropColumn('categoria_tipo');
            });
        });
    }
};
