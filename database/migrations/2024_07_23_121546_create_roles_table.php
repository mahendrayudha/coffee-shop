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

        Schema::create('roles', function (Blueprint $table) {
            $table->id()->comment('id employee position');
            $table->string('name')->comment('position name');
            $table->timestamp('created_at')->nullable()->comment('timestamp for each position created');
            $table->timestamp('updated_at')->nullable()->comment('timestamp for each position updated');
            $table->timestamp('deleted_at')->nullable()->comment('timestamp for each position deleted');
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('roles');
    }
};
