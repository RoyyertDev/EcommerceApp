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
        Schema::create('color_sticky', function (Blueprint $table) {
            $table->uuid('id')->primary(); // Define la clave primaria como UUID
            $table->uuid('sticky_id');
            $table->uuid('color_id');
            $table->timestamps();

            // Foreign Keys
            $table->foreign('sticky_id')->references('id')->on('stickies');
            $table->foreign('color_id')->references('id')->on('colors');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('color_sticky');
    }
};
