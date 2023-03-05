<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('order_id')->constrained()->onDelete('cascade');
            $table->enum('status', ['pending', 'paid', 'canceled', 'refunded']);
            $table->integer('amount', unsigned: true);
            $table->json('meta')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
};
