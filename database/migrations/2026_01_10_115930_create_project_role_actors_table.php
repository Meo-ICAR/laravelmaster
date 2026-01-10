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
        Schema::create('project_role_actors', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_role_id')->constrained('project_roles')->cascadeOnDelete();
            $table->foreignId('actor_id')->constrained('actors')->cascadeOnDelete();
            $table->string('status')->default('pending')->index();
            $table->text('cover_letter')->nullable();
            $table->text('director_notes')->nullable();
            $table->timestamps();

            $table->unique(['project_role_id', 'actor_id'], 'apps_role_actor_unique');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_role_actors');
    }
};
