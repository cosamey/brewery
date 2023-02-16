<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('allergenables', function (Blueprint $table) {
            $table->foreignId('allergen_id')->constrained()->onDelete('cascade');
            $table->morphs('allergenable');
        });
    }
};
