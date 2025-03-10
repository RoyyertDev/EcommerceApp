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
        Schema::create('user_details', function (Blueprint $table) {
            $table->uuid('id')->primary(); // Define la clave primaria como UUID
            $table->uuid('user_id')->unique();
            $table->uuid('role_id');
            $table->string('country', 100)->notNullable();
            $table->string('province', 100)->notNullable();
            $table->string('city', 100)->notNullable();
            $table->string('zip_code', 20)->notNullable();
            $table->string('site_reference', 250)->notNullable();
            $table->string('phone', 20)->notNullable();
            $table->timestamps();

            // Foreign Keys
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
            $table->foreign('role_id')->references('id')->on('role_users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_details');
    }
};
