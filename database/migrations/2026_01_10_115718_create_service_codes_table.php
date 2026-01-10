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
        Schema::create('service_codes', function (Blueprint $table) {
            $table->id();
            $table->string('area');
            $table->string('title');
            $table->string('origin')->nullable();
            $table->timestamps();

            $table->unique(['area', 'title']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_codes');
    }
};
