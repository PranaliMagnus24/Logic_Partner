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
    Schema::create('properties', function (Blueprint $table) {
        $table->id();
        $table->integer('property_id')->nullable();
        $table->string('property_type')->nullable();
        $table->enum('status', ['available', 'not-available'])->default('available');
        $table->string('contract_type')->nullable();
        $table->string('title_type')->nullable();
        $table->string('titled')->nullable();
        $table->string('indicative_package')->nullable();
        $table->date('estimated_date')->nullable();
        $table->decimal('rent_yield', 8, 2)->nullable();
        $table->boolean('smsf')->nullable();
        $table->boolean('addm')->nullable();
        $table->decimal('approx_weekly_rent', 10, 2)->nullable();
        $table->decimal('vacancy_rate', 5, 2)->nullable();
        $table->decimal('land_area', 10, 2)->nullable();
        $table->decimal('house_area', 10, 2)->nullable();
        $table->string('design')->nullable();
        $table->decimal('stamp_duty_est', 10, 2)->nullable();
        $table->decimal('gov_transfer_fee', 10, 2)->nullable();
        $table->decimal('owners_corp_fee', 10, 2)->nullable();
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
