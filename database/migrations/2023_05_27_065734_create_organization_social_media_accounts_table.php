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
        Schema::create('organization_social_media_accounts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('social_media_type');
            $table->foreignId('organization');
            $table->foreignId('social_media_manager');
            $table->string('social_media_account_name');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('organization_social_media_accounts');
    }
};
