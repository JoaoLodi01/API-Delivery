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
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->string('cep', 8);
            $table->string('state', 2);
            $table->string('city', 100);
            $table->string('neighborhood', 100);
            $table->string('street', 100);
            $table->string('number', 8);
            $table->string('complement', 200);
            $table->string('reference', 200);
            $table->string('service');
            $table->string('latitude', 200);
            $table->string('longitude', 200);
            $table->boolean('active')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('addresses');
    }
};
