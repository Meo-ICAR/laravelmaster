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
        Schema::create('project_locations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id')->constrained()->cascadeOnDelete();
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('location_type')->nullable();
            $table->string('address')->nullable();
            $table->string('city');
            $table->string('province', 2)->nullable();
            $table->string('postal_code', 10)->nullable();
            $table->string('country')->default('IT');
            $table->decimal('latitude', 10, 8)->nullable();
            $table->decimal('longitude', 11, 8)->nullable();
            $table->date('shooting_date')->nullable();
            $table->time('shooting_time_from')->nullable();
            $table->time('shooting_time_to')->nullable();
            $table->string('status')->default('pending')->index();
            $table->boolean('permission_required')->default(false);
            $table->text('permission_details')->nullable();
            $table->text('notes')->nullable();
            $table->boolean('is_open')->default(true);
            $table->text('specifications')->nullable();
            $table->timestamps();

            $table->index(['city', 'shooting_date']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_locations');
    }
};
