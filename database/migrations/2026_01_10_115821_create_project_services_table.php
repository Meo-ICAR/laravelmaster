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
        Schema::create('project_services', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id')->constrained()->cascadeOnDelete();
            $table->string('name');
            $table->text('description')->nullable();
            $table->foreignId('service_type_id')->nullable()->constrained('service_types')->nullOnDelete();
            $table->string('city')->nullable();
            $table->integer('quantity')->default(1);
            $table->string('unit')->nullable();
            $table->decimal('estimated_cost', 10, 2)->nullable();
            $table->string('status')->default('pending')->index();
            $table->date('needed_until')->nullable();
            $table->text('notes')->nullable();
            $table->text('specifications')->nullable();
            $table->boolean('is_open')->default(true);
            $table->timestamps();

            $table->index(['service_type_id', 'status']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_services');
    }
};
