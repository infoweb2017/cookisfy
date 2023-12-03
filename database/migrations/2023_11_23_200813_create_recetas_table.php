<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Se utiliza para crear o modificar tablas  
     */
    public function up(): void
    {
        Schema::create('recetas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // suponiendo que las recetas pertenecen a usuarios
            $table->string('titulo');
            $table->text('ingredientes'); // puedes cambiar esto a un tipo de dato diferente si lo necesitas
            $table->longText('instrucciones');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Se elimina o quita campos
     */
    public function down(): void
    {
        Schema::dropIfExists('recetas');
    }
};
