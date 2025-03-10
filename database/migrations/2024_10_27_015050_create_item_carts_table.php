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
        Schema::create('item_carts', function (Blueprint $table) {
            $table->uuid('id')->primary(); // Define la clave primaria como UUID
            $table->uuid('shopping_cart_id');
            $table->uuid('variant_id');
            $table->integer('amount')->notNullable();
            $table->decimal('unit_price', 8, 2)->notNullable();
            $table->timestamps();

            // Foreign Keys
            $table->foreign('shopping_cart_id')->references('id')->on('shopping_carts')->cascadeOnDelete();
            $table->foreign('variant_id')->references('id')->on('variants')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('item_carts');
    }
};
