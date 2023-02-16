<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('customer_id')->constrained()->onDelete('cascade');
            $table->enum('type', ['billing', 'shipping']);
            $table->string('street');
            $table->string('city');
            $table->string('post_code');
            $table->string('region')->nullable();
            $table->string('state')->nullable();
            $table->string('country_code', 2)->nullable();
            $table->timestamps();

            $table->foreign('country_code')->references('code')->on('countries');
        });
    }
};
