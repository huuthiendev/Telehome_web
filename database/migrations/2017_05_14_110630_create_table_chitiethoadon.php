<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableChitiethoadon extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chitiethoadon', function (Blueprint $table) {
            $table -> increments('id');
            $table -> integer('mahd') -> unsigned();
            $table -> foreign('mahd') -> references('id') -> on('hoadon');
            $table -> integer('masp') -> unsigned();
            $table -> foreign('masp') -> references('id') -> on('sanpham');
            $table -> integer('soluong');
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
        Schema::dropIfExists('chitiethoadon');
    }
}
