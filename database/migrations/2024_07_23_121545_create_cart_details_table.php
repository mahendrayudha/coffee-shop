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

        Schema::create('cart_details', function (Blueprint $table) {
            $table->id()->comment('id for cart detail');
            $table->unsignedBigInteger('id_cart')->index()->comment('id for cart');
            $table->foreign('id_cart')->references('id')->on('carts');
            $table->unsignedBigInteger('id_product')->index()->comment('id for product');
            $table->foreign('id_product')->references('id')->on('products');
            $table->integer('quantity')->comment('quantity for each product');
            $table->timestamp('created_at')->nullable()->comment('timestamp for each cart detail created');
            $table->timestamp('updated_at')->nullable()->comment('timestamp for each cart detail updated');
            $table->timestamp('deleted_at')->nullable()->comment('timestamp for each cart detail deleted');
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cart_details');
    }
};
