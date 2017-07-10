<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableSanpham extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sanpham', function (Blueprint $table) {
            $table -> increments('id');
            $table -> string('tensp');
            $table -> integer('gia');
            $table -> string('mota') -> nullable();
            $table -> integer('maloaisp') -> unsigned();
            $table -> foreign('maloaisp') -> references('id') -> on('loaisanpham');
            $table -> integer('math') -> unsigned();
            $table -> foreign('math') -> references('id') -> on('thuonghieu');
            $table -> integer('soluong');
            $table -> integer('luotmua') -> default(0);
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
        Schema::dropIfExists('sanpham');
    }
}
