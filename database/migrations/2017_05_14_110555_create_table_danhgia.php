<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableDanhgia extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('danhgia', function (Blueprint $table) {
            $table -> increments('id');
            $table -> integer('mand') -> unsigned();
            $table -> foreign('mand') -> references('id') -> on('users');
            $table -> integer('masp') -> unsigned();
            $table -> foreign('masp') -> references('id') -> on('sanpham');
            $table -> string('tieude');
            $table -> string('noidung');
            $table -> integer('sosao');
            $table -> timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('danhgia');
    }
}
