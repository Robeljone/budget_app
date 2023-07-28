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
        Schema::create('finacial_years', function (Blueprint $table) {
            $table->id();
            $table->string('financial_year');
            $table->date('start_date');
            $table->date('end_date');
            $table->foreignId('cuid');
            $table->foreignId('uuid')->nullable();
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('finacial_years');
    }
};
