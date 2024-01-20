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
        Schema::table('buscars', function (Blueprint $table) {
            $table->renameColumn('usuario_id', 'user_id');

            // Define una clave foránea en la columna 'user_id'
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });

        /**
         * -- Renombrar la columna
        *ALTER TABLE buscars RENAME COLUMN usuario_id TO user_id;

        *-- Agregar la clave foránea
        *ALTER TABLE buscars ADD FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE;
         */
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('buscars');
    }
};
