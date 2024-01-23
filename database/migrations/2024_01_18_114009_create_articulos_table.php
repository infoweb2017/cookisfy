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
        Schema::create('articulos', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->text('descripcion');
            $table->string('url');
            $table->string('imagen')->nullable();
            $table->timestamps();
        });
    }

    /**
     * CREATE TABLE articulos (
    *id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    *titulo VARCHAR(255),
    *descripcion TEXT,
    *url VARCHAR(255),
    *imagen VARCHAR(255) NULL,
    *created_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
    *updated_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
*);
     */

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articulos');
    }
};
