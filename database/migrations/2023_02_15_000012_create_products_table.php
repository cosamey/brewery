<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->foreignId('category_id')->nullable()->constrained()->onDelete('set null');
            $table->foreignId('brand_id')->nullable()->constrained()->onDelete('set null');
            $table->enum('status', ['inactive', 'active']);
            $table->boolean('is_featured')->default(false);
            $table->integer('stock', unsigned: true)->nullable();
            $table->string('excerpt')->nullable();
            $table->text('description')->nullable();
            $table->tinyInteger('tax_rate', unsigned: true);
            $table->integer('price', unsigned: true);
            $table->json('attributes')->nullable();
            $table->timestamps();
        });
    }
};
