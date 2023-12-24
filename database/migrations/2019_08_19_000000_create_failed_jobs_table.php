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
        Schema::create('failed_jobs', function (Blueprint $table) {
            $table->id();
            $table->string('uuid')->unique();
            $table->text('connection');
            $table->text('queue');
            $table->longText('payload');
            $table->longText('exception');
            $table->timestamp('failed_at')->useCurrent();
        });
        /**
         * CREATE TABLE failed_jobs (
            *id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            *uuid VARCHAR(255) UNIQUE NOT NULL,
            *connection TEXT NOT NULL,
            *queue TEXT NOT NULL,
            *payload LONGTEXT NOT NULL,
            *exception LONGTEXT NOT NULL,
            *failed_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL
            *);
         */
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('failed_jobs');
    }
};
