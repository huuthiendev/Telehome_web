<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableChitietkhuyenmai extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chitietkhuyenmai', function (Blueprint $table) {
            $table -> increments('id');
            $table -> integer('makm') -> unsigned();
            $table -> foreign('makm') -> references('id') -> on('khuyenmai');
            $table -> integer('masp') -> unsigned();
            $table -> foreign('masp') -> references('id') -> on('sanpham');
            $table -> integer('phantramkm');
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
        Schema::dropIfExists('chitietkhuyenmai');
    }
}
