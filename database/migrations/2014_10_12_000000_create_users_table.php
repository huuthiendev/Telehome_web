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
            $table -> increments('id');
            $table -> string('tennd');
            $table -> string('email', 100) -> unique();
            $table -> string('password');
            $table -> string('diachi') -> nullable();
            $table -> string('ngaysinh') -> nullable();
            $table -> string('sdt') -> nullable();
            $table -> boolean('gioitinh') -> nullable();
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
