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
        Schema::create('project_location_offers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_location_id')->constrained('project_locations')->cascadeOnDelete();
            $table->foreignId('location_id')->constrained('locations')->cascadeOnDelete();
            $table->decimal('price', 10, 2);
            $table->text('notes')->nullable();
            $table->enum('status', ['pending', 'accepted', 'rejected'])->default('pending');
            $table->date('valid_until');
            $table->timestamps();

            $table->unique(['project_location_id', 'location_id'], 'offers_proj_loc_unique');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_location_offers');
    }
};
