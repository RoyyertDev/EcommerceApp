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
        Schema::create('payments', function (Blueprint $table) {
            $table->uuid('id')->primary(); // Define la clave primaria como UUID
            $table->uuid('shopping_cart_id');
            $table->uuid('method_id');
            $table->decimal('amount', 10, 2)->notNullable();
            $table->date('date')->notNullable();
            $table->timestamps();

            // Foreign Keys
            $table->foreign('shopping_cart_id')->references('id')->on('shopping_carts');
            $table->foreign('method_id')->references('id')->on('payment_methods');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
