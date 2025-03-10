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
        Schema::create('carrousels', function (Blueprint $table) {
            $table->id();
            $table->integer('order_index')->notNull();
            $table->string('img', 250)->notNull();
            $table->string('description', 100)->nullable();
            $table->string('redirect_product', 100)->notNull();
            $table->boolean('tienda')->notNull();
            $table->boolean('atencion')->notNull();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carrousels');
    }
};
