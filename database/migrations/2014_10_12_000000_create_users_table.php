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

        Schema::create('users', function (Blueprint $table) {
            $table->id()->comment('id user');
            $table->unsignedBigInteger('id_role')->index()->comment('id for user role');
            $table->foreign('id_role')->references('id')->on('roles');
            $table->string('name')->comment('user name');
            $table->string('email')->unique()->comment('email for each user');
            $table->text('password')->comment('password for each user');
            $table->timestamp('email_verified_at')->nullable()->comment('timestamp for validated user email');
            $table->integer('phone_number')->nullable()->comment('phone number for each user');
            $table->string('street_address')->nullable()->comment('street name for address');
            $table->string('city')->nullable()->comment('city name');
            $table->string('postcode')->nullable()->comment('postal code');
            $table->enum('user_status', ["active", "inactive"])->comment('status for each user account');
            $table->timestamp('last_login')->nullable()->comment('timestamp for last user login');
            $table->string('last_login_user_agent')->nullable()->comment('user agent for each last login');
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
