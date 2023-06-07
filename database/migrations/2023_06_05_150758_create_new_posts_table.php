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
        Schema::create('new_posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('account_id');
            $table->text('title');
            $table->text('content');
            $table->foreignId('posted_by');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('new_posts');
    }
};
