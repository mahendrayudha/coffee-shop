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

        Schema::create('orders', function (Blueprint $table) {
            $table->id()->comment('id order');
            $table->unsignedBigInteger('id_user')->index()->comment('id customer who ordered');
            $table->foreign('id_user')->references('id')->on('users');
            $table->unsignedBigInteger('id_cart')->index()->comment('id cart');
            $table->foreign('id_cart')->references('id')->on('carts');
            $table->integer('total_price')->comment('total price for each order');
            $table->enum('delivery', ["dine-in","takeaway","delivery"])->comment('delivery method for each order');
            $table->enum('payment_method', ["cash","cashless"])->comment('payment method for each customer');
            $table->enum('status', ["waiting","done"])->comment('order status');
            $table->timestamp('created_at')->nullable()->comment('timestamp for each order created');
            $table->timestamp('updated_at')->nullable()->comment('timestamp for each order updated');
            $table->timestamp('deleted_at')->nullable()->comment('timestamp for each order deleted');
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
