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
        Schema::create('books', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('image');
            $table->integer('quantity');
            $table->float('price');
            $table->float('price_discount')->nullable();
            $table->date('publish_date');
            $table->integer('page');
            $table->string('description')->nullable();
            $table->boolean('status')->default(0);
            $table->integer('typebook_id')->unsigned();
            $table->integer('author_id')->unsigned();
            $table->integer('publisher_id')->unsigned();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
