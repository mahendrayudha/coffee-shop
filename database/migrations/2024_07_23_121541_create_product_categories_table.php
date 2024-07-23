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

        Schema::create('product_categories', function (Blueprint $table) {
            $table->id()->comment('id category');
            $table->string('name')->comment('category name');
            $table->timestamp('created_at')->nullable()->comment('timestamp for each category created');
            $table->timestamp('updated_at')->nullable()->comment('timestamp for each category updated');
            $table->timestamp('deleted_at')->nullable()->comment('timestamp for each category deleted');
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_categories');
    }
};
