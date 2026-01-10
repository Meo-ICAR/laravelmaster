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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('contact_name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('mobile')->nullable();
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('province', 2)->nullable();
            $table->string('postal_code', 10)->nullable();
            $table->string('country')->default('IT');
            $table->decimal('latitude', 10, 2)->nullable();
            $table->decimal('longitude', 10, 2)->nullable();
            $table->integer('travel_km')->nullable();
            $table->text('storage')->nullable();
            $table->text('transport')->nullable();
            $table->foreignId('service_type_id')->nullable()->constrained('service_types')->nullOnDelete();
            $table->text('description')->nullable();
            $table->string('website')->nullable();
            $table->text('notes')->nullable();
            $table->boolean('is_active')->default(true)->index();
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('company_id')->nullable()->constrained()->nullOnDelete();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
