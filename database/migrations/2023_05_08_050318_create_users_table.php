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
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('fullName', 100);
            $table->string('email', 100)->uniqid();
            $table->string('password', 100);
            $table->integer('userCat')->unsigned();
            $table->integer('userRoll')->unsigned();
            $table->integer('district')->unsigned();
            $table->longText('img')->nullable();
            $table->integer('stat')->unsigned();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
