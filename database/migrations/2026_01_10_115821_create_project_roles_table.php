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
        Schema::create('project_roles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id')->constrained()->cascadeOnDelete();
            $table->string('name')->default('?');
            $table->text('description')->nullable();
            $table->json('requirements')->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->unsignedInteger('salary_min')->nullable();
            $table->unsignedInteger('salary_max')->nullable();
            $table->boolean('is_open')->default(true);
            $table->string('city')->nullable();
            $table->enum('scene_nudo', ['no', 'parziale', 'si'])->default('no');
            $table->integer('n')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_roles');
    }
};
