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
        Schema::create('products', function (Blueprint $table) {
            $table->uuid('id')->primary(); // Define la clave primaria como UUID
            $table->string('name', 100)->notNullable();
            $table->string('description', 250)->notNullable();
            $table->uuid('type_product_id');
            $table->uuid('category_product_id');
            $table->uuid('material_product_id');
            $table->timestamps();

            // Foreign Keys
            $table->foreign('type_product_id')->references('id')->on('type_products');
            $table->foreign('category_product_id')->references('id')->on('category_products');
            $table->foreign('material_product_id')->references('id')->on('material_products');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
