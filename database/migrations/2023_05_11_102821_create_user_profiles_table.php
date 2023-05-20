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
        Schema::create('user_profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('uid')->unsigned()->nullable();
            $table->string('ownName', 30);
            $table->string('fatherName', 30);
            $table->string('gFatherName', 30);
            $table->string('mobNum', 30);
            $table->string('address', 50);
            $table->string('title', 50);
            $table->integer('district')->unsigned();
            $table->timestamp('added_on')->default(DB::raw('CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_profiles');
    }
};
