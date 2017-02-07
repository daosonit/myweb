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
            $table->string('name')->comment('Ten nguoi dung');
            $table->string('phone')->comment('SDT');
            $table->string('address')->comment('Dia chi');
            $table->timestamp('birthday')->comment('Ngay sinh');
            $table->tinyInteger('status')->default(0)->comment('Trang thai: 0: NO ACTIVE, 1: ACTIVE');
            $table->tinyInteger('super_man')->default(0)->comment('Tai khoan full quyen: 0: NO, 1: YES');
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('admins', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('name')->comment('Ten nguoi dung');
            $table->string('phone')->comment('SDT');
            $table->string('address')->comment('Dia chi');
            $table->timestamp('birthday')->comment('Ngay sinh');
            $table->tinyInteger('status')->default(0)->comment('Trang thai 0: NO ACTIVE, 1: ACTIVE');
            $table->tinyInteger('super_man')->default(0)->comment('Tai khoan full quyen: 0: NO, 1: YES');
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
    }
}
