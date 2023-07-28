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
        Schema::create('purchase_requestes', function (Blueprint $table) {
            $table->id();
            $table->string('refrence_number');
            $table->foreignId('organization_id');
            $table->foreignId('job_section_id');
            $table->foreignId('item_code');
            $table->string('quantity');
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
        Schema::dropIfExists('purchase_requestes');
    }
};
