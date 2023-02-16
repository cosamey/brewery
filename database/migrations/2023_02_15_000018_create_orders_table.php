<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('cart_id')->constrained()->onDelete('cascade');
            $table->foreignUuid('customer_id')->constrained()->onDelete('cascade');
            $table->foreignUuid('address_id')->constrained()->onDelete('cascade');
            $table->enum('status', ['pending', 'processing', 'shipped', 'completed', 'canceled', 'refunded']);
            $table->enum('payment_method', ['card', 'cash', 'transfer']);
            $table->enum('delivery_method', ['pickup', 'courier']);
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }
};
