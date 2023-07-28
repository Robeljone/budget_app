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
        Schema::create('job_sections', function (Blueprint $table) {
            $table->id();
            $table->foreignId('organization_id');
            $table->string('allocated_budget');
            $table->string('budget_code');
            $table->string('job_section_name');
            $table->foreignId('cuid');
            $table->foreignId('uuid');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_sections');
    }
};
