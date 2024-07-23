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
        Schema::disableForeignKeyConstraints();

        Schema::create('products', function (Blueprint $table) {
            $table->id()->comment('id item');
            $table->string('name')->comment('item name');
            $table->unsignedBigInteger('id_product_category')->index()->comment('id for item category');
            $table->foreign('id_product_category')->references('id')->on('product_categories');
            $table->integer('price')->comment('item price');
            $table->string('image')->nullable();
            $table->text('description')->nullable()->comment('product description');
            $table->timestamp('created_at')->nullable()->comment('timestamp for each item created');
            $table->timestamp('updated_at')->nullable()->comment('timestamp for each item updated');
            $table->timestamp('deleted_at')->nullable()->comment('timestamp for each item deleted');
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
