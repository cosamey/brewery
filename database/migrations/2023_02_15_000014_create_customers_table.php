<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('first_name');
            $table->string('last_name');
            $table->enum('type', ['individual', 'company']);
            $table->string('company')->nullable();
            $table->string('email');
            $table->string('phone');
            $table->json('meta')->nullable();
            $table->timestamps();
        });
    }
};
