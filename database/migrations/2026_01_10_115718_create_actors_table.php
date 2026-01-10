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
        Schema::create('actors', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('phone')->nullable();
            $table->string('stage_name')->nullable();
            $table->string('slug')->unique()->nullable();
            $table->date('birth_date')->nullable()->index();
            $table->string('gender', 50)->nullable()->index();
            $table->string('city')->nullable();
            $table->string('country')->default('IT')->index();
            $table->string('province', 2)->nullable();
            $table->unsignedSmallInteger('height_cm')->nullable()->index();
            $table->unsignedSmallInteger('weight_kg')->nullable();
            $table->json('appearance')->nullable();
            $table->json('measurements')->nullable();
            $table->json('capabilities')->nullable();
            $table->json('socials')->nullable();
            $table->boolean('is_visible')->default(true);
            $table->boolean('is_represented')->nullable();
            $table->enum('scene_nudo', ['no', 'parziale', 'si'])->default('no');
            $table->boolean('consenso_privacy')->default(false);
            $table->string('agency_name')->nullable();
            $table->foreignId('tipologia_id')->nullable()->constrained('tipologias')->nullOnDelete();
            $table->string('professione')->nullable();
            $table->decimal('latitude', 10, 2)->nullable();
            $table->decimal('longitude', 10, 2)->nullable();
            $table->foreignId('company_id')->nullable()->constrained()->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('actors');
    }
};
