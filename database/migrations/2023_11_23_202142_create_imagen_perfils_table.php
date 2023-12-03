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
        Schema::create('imagen_perfils', function (Blueprint $table) {
            $table->unsignedBigInteger('id'); // Clave primaria, BIGINT UNSIGNED y autoincremental
            $table->unsignedBigInteger('user_id');
            $table->string('file_path');
            $table->timestamps();
        
            $table->foreign('user_id')
                  ->references('id')->on('users')
                  ->onDelete('cascade');
        });
    }

    /**
     * Se elimina o quita campos
     */
    public function down(): void
    {
        Schema::dropIfExists('imagen_perfils');
    }
};
