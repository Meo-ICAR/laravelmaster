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
        Schema::create('locations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('address');
            $table->string('city');
            $table->string('province', 2)->nullable();
            $table->string('postal_code', 10)->nullable();
            $table->string('country')->default('IT');
            $table->decimal('latitude', 10, 8)->nullable();
            $table->decimal('longitude', 11, 8)->nullable();
            $table->string('contact_person')->nullable();
            $table->string('contact_phone')->nullable();
            $table->string('contact_email')->nullable();
            $table->json('features')->nullable();
            $table->text('notes')->nullable();
            $table->text('accessibility_camion')->nullable();
            $table->text('parking_camion')->nullable();
            $table->integer('potenza_elettrica')->nullable();
            $table->string('website')->nullable();
            $table->boolean('is_water')->nullable();
            $table->boolean('is_consent_work')->nullable();
            $table->foreignId('created_by')->nullable()->constrained('users')->nullOnDelete();
            $table->boolean('is_active')->default(true);
            $table->foreignId('company_id')->nullable()->constrained()->nullOnDelete();
            $table->softDeletes();
            $table->timestamps();

            $table->index(['city', 'province']);
            $table->index(['latitude', 'longitude']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('locations');
    }
};
