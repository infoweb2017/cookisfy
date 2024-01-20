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
        Schema::create('subscribirs', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->timestamps();
        });

        /**
         * CREATE TABLE subscribirs (
            *id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            *email VARCHAR(255) NOT NULL UNIQUE,
            *created_at TIMESTAMP NULL DEFAULT NULL,
            *updated_at TIMESTAMP NULL DEFAULT NULL
        *);
         */
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subscribirs');
    }
};
