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
        Schema::table('recetas', function (Blueprint $table) {
            $table->string('descripcion')->nullable()->after('instrucciones');
            $table->dropColumn('instrucciones');
        });
        /**
         * ALTER TABLE recetas ADD COLUMN descripcion VARCHAR(255) NULL AFTER instrucciones;
         * ALTER TABLE recetas DROP COLUMN instrucciones;
         */
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recetas');
    }
};
