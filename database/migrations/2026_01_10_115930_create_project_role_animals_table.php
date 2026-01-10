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
        Schema::create('project_role_animals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_role_id')->constrained('project_roles')->cascadeOnDelete();
            $table->foreignId('animal_id')->constrained('animals')->cascadeOnDelete();
            $table->string('status')->default('pending');
            $table->text('cover_letter')->nullable();
            $table->text('director_notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_role_animals');
    }
};
