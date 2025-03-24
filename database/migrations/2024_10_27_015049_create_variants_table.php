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
        Schema::create('variants', function (Blueprint $table) {
            $table->uuid('id')->primary(); // Define la clave primaria como UUID
            $table->uuid('product_id');
            $table->uuid('characteristic_id');
            $table->string('image', 250)->notNullable();
            $table->decimal('price', 10, 2)->notNullable();
            $table->integer('stock')->notNullable();
            $table->integer('number_sales')->notNullable()->default(0);
            $table->boolean('promotion')->notNullable();
            $table->float('discount')->notNullable();
            $table->timestamps();

            // Foreign Keys
            $table->foreign('product_id')->references('id')->on('products');
            $table->foreign('characteristic_id')->references('id')->on('characteristics');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('variants');
    }
};
