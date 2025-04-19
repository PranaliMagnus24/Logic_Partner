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
        Schema::create('quotations', function (Blueprint $table) {
            $table->id();
            $table->string('pifa_report_name')->nullable();
            $table->longText('summary')->nullable();
            $table->string('property')->nullable();
            $table->string('contract_type')->nullable();
            $table->string('land_purchase_cost')->nullable();
            $table->string('building_cost')->nullable();
            $table->string('purchase_price')->nullable();
            $table->string('eoi_deposite_land')->nullable();
            $table->string('eoi_deposite_build')->nullable();
            $table->string('land_deposite_percent')->nullable();
            $table->string('land_deposite_price')->nullable();
            $table->string('building_deposite_percent')->nullable();
            $table->string('building_deposite_price')->nullable();
            $table->string('cash_deposite')->nullable();
            $table->string('bank_interest_rate')->nullable();
            $table->string('contigency_purchase_price')->nullable();
            $table->string('capital_growth_pa')->nullable();
            $table->string('state')->nullable();
            $table->string('stamp_duty')->nullable();
            $table->string('trans')->nullable();
            $table->string('soliditor_price')->nullable();
            $table->string('misc_purchase_cost')->nullable();
            $table->date('eoi_date')->nullable();
            $table->string('unconditional_days')->nullable();
            $table->string('titles')->nullable();
            $table->date('estimate_titled_date')->nullable();
            $table->string('settlement_days')->nullable();
            $table->string('estimate_settlemet_date')->nullable();
            $table->string('site_start_week')->nullable();
            $table->string('handover_amount')->nullable();
            $table->string('handover_days')->nullable();
            $table->string('total_time_month')->nullable();
            $table->string('payment_template')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quotations');
    }
};
