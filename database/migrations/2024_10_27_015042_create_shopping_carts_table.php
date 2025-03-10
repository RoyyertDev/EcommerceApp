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
        Schema::create('shopping_carts', function (Blueprint $table) {
            $table->uuid('id')->primary(); // Define la clave primaria como UUID
            $table->uuid('user_id');
            $table->date('date_create')->notNullable();
            $table->string('state')->default('Pendiente')->notNullable();
            $table->timestamps();

            // Foreign Keys
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shopping_carts');
    }
};
