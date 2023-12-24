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
            $table->unsignedBigInteger('categoria_id');
            $table->foreign('categoria_id')->references('id')->on('categorias');
        });
        /**
         * ALTER TABLE ingredientes ADD COLUMN categoria_id BIGINT UNSIGNED NOT NULL;
         * ALTER TABLE ingredientes ADD CONSTRAINT fk_ingredientes_categoria_id FOREIGN KEY (categoria_id) REFERENCES categorias(id);
         */
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('ingredientes', function (Blueprint $table) {
            Schema::dropIfExists('ingredientes');
        });
    }
};
