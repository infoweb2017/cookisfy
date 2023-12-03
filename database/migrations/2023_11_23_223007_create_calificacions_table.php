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
        Schema::create('calificacions', function (Blueprint $table) {
            $table->id();$table->unsignedBigInteger('receta_id');
            $table->unsignedBigInteger('user_id');
            $table->tinyInteger('valoración'); // Puede ser de 1 a 5, por ejemplo
            $table->text('reseña')->nullable(); // Opcional, si quieres permitir que los usuarios dejen un comentario con su calificación
            $table->timestamps();

            $table->foreign('receta_id')->references('id')->on('recetas')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Se elimina o quita campos.
     */
    public function down(): void
    {
        Schema::dropIfExists('calificacions');
    }
};
