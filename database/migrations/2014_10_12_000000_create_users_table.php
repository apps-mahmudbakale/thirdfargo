<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('registration_token');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('username')->unique();
            $table->string('phone')->nullable();
            $table->date('dob')->nullable();
            $table->enum('gender', ['Male', 'Female'])->nullable();
            $table->string('country')->nullable();
            $table->string('address')->nullable();
            $table->string('state')->nullable();
            $table->string('city')->nullable();
            $table->string('currency')->nullable();
            $table->integer('pin')->nullable();
            $table->string('account_type')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
