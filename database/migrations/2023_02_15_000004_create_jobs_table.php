<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('queue')->index();
            $table->longText('payload');
            $table->tinyInteger('attempts', unsigned: true);
            $table->integer('reserved_at', unsigned: true)->nullable();
            $table->integer('available_at', unsigned: true);
            $table->integer('created_at', unsigned: true);
        });
    }
};
