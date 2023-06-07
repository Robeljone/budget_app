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
        Schema::create('organization_social_media_account_proprties', function (Blueprint $table) {
            $table->id();
            $table->foreignId('organization_social_media_account_id');
            $table->string('parameter');
            $table->string('value');
            $table->string('status');
            $table->foreignId('cuid')->nullable();
            $table->foreignId('uuid')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('organization_social_media_account_proprties');
    }
};
