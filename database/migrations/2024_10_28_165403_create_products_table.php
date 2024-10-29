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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->nullable();
            $table->string('name');
            $table->text('description');
            $table->decimal('price', 8, 2);
            $table->string('cover_image', 2048)->nullable();
            $table->integer('likes')->unsigned()->default(0);
            $table->boolean('published')->default(false);
            $table->timestamps();


            // TODO: do foreign key for type of product






        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
