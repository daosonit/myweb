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
            $table->increments('id');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('name');
            $table->string('phone');
            $table->string('address');
            $table->timestamp('birthday');
            $table->tinyInteger('status')->default(0);
            $table->tinyInteger('super_man')->default(0);
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('admins', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('name');
            $table->string('phone');
            $table->string('address');
            $table->timestamp('birthday');
            $table->tinyInteger('status')->default(0);
            $table->tinyInteger('super_man')->default(0);
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('employees', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('name');
            $table->string('phone');
            $table->string('address');
            $table->tinyInteger('status')->default(0);
            $table->timestamp('birthday');
            $table->tinyInteger('super_man')->default(0);
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('customers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('name');
            $table->string('phone');
            $table->string('address');
            $table->timestamp('birthday');
            $table->tinyInteger('status')->default(0);
            $table->tinyInteger('super_man')->default(0);
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
        Schema::drop('users');
        Schema::drop('admins');
        Schema::drop('employees');
        Schema::drop('customers');
    }
}
