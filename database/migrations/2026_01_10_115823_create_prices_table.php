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
        Schema::create('prices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('service_id')->constrained()->cascadeOnDelete();
            $table->string('name')->nullable();
            $table->integer('amount');
            $table->string('currency')->default('usd');
            $table->string('stripe_price_id')->nullable();
            $table->string('type')->default('one_time');
            $table->string('interval')->nullable();
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
        Schema::dropIfExists('prices');
    }
};
