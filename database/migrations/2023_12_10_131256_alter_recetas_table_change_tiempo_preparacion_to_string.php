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
            $table->string('tiempo_preparacion')->change();
        });
        /**
         * ALTER TABLE recetas MODIFY tiempo_preparacion VARCHAR(255);

         */
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('string', function (Blueprint $table) {
            Schema::table('recetas', function (Blueprint $table) {
                $table->integer('tiempo_preparacion')->change();
            });
        });
    }
};
