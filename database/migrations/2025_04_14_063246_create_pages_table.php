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
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->string('about_title')->nullable();
            $table->text('about_body')->nullable();
            $table->string('services_title')->nullable();
            $table->text('services_body')->nullable();
            $table->string('team_title')->nullable();
            $table->text('team_body')->nullable();
            $table->string('slug')->nullable();
            $table->enum('status', ['active', 'inactive','draft'])->default('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pages');
    }
};
