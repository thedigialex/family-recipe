<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('recipes', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('serving_size');
            $table->text('cook_time');
            $table->text('ingredients');
            $table->text('description');
            $table->text('instructions');
            $table->string('image_path')->nullable();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('family_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
