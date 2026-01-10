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
        Schema::create('animals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('species_id')->nullable()->constrained('species')->nullOnDelete();
            $table->foreignId('animal_breed_id')->nullable()->constrained('animal_breeds')->nullOnDelete();
            $table->string('name')->nullable();
            $table->enum('gender', ['male', 'female', 'unknown'])->nullable();
            $table->date('birth_date')->nullable();
            $table->decimal('weight', 5, 2)->nullable();
            $table->text('special_signs')->nullable();
            $table->text('bio')->nullable();
            $table->string('location')->nullable();
            $table->decimal('latitude', 5, 2)->nullable();
            $table->decimal('longitude', 5, 2)->nullable();
            $table->boolean('is_certified')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('animals');
    }
};
