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
        Schema::create('characteristics', function (Blueprint $table) {
            $table->uuid('id')->primary(); // Define la clave primaria como UUID
            $table->uuid('color_sticky_id');
            $table->uuid('size_id');
            $table->timestamps();

            // Foreign Keys
            $table->foreign('color_sticky_id')->references('id')->on('color_sticky');
            $table->foreign('size_id')->references('id')->on('sizes');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('characteristic');
    }
};
