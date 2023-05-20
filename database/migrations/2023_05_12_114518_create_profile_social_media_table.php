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
        Schema::create('profile_social_media', function (Blueprint $table) {
            $table->id();
            $table->integer('pid')->unsigned();
            $table->integer('smtid')->unsigned();
            $table->string('link', 200);
            $table->timestamp('added_on')->default(DB::raw('CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profile_social_media');
    }
};
