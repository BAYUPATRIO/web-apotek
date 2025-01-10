<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('category');
            $table->string('image')->nullable();
            $table->enum('status', ['tersedia', 'habis']);
            $table->integer('stock')->default(0);
            $table->timestamps();
        });
    }
    
};