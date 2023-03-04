<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('customer_id')->nullable()->constrained()->onDelete('cascade');
            $table->enum('status', ['open', 'abandoned', 'completed']);
            $table->timestamp('completed_at')->nullable();
            $table->timestamps();
        });
    }
};
