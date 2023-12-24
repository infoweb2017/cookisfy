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
        Schema::create('personal_access_tokens', function (Blueprint $table) {
            $table->id();
            $table->morphs('tokenable');
            $table->string('name');
            $table->string('token', 64)->unique();
            $table->text('abilities')->nullable();
            $table->timestamp('last_used_at')->nullable();
            $table->timestamp('expires_at')->nullable();
            $table->timestamps();
        });
        /**
         * CREATE TABLE personal_access_tokens (
            *id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            *tokenable_id BIGINT UNSIGNED NOT NULL,
            *tokenable_type VARCHAR(255) NOT NULL,
            *name VARCHAR(255) NOT NULL,
            *token VARCHAR(64) UNIQUE NOT NULL,
            *abilities TEXT NULL,
            *last_used_at TIMESTAMP NULL DEFAULT NULL,
            *expires_at TIMESTAMP NULL DEFAULT NULL,
            *created_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
            *updated_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        *);

*-- Índices para la relación polimórfica
*CREATE INDEX idx_personal_access_tokens_tokenable_type_tokenable_id ON personal_access_tokens(tokenable_type, tokenable_id);
         */
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personal_access_tokens');
    }
};
