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

        Schema::create('carts', function (Blueprint $table) {
            $table->id()->comment('id cart')->foreign('cart_details.id');
            $table->unsignedBigInteger('id_user')->index()->comment('id customer for each cart');
            $table->foreign('id_user')->references('id')->on('users');
            $table->timestamp('created_at')->nullable()->comment('timestamp for each cart created');
            $table->timestamp('updated_at')->nullable()->comment('timestamp for each cart updated');
            $table->timestamp('deleted_at')->nullable()->comment('timestamp for each cart deleted');
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carts');
    }
};
