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
    }

    /**
     * Se elimina o quita campos.
     */
    public function down(): void
    {
        Schema::dropIfExists('ingredientes');
    }
};
