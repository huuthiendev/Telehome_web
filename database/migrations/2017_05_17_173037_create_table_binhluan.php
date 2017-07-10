<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableBinhluan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('binhluan', function (Blueprint $table) {
            $table -> increments('id');
            $table -> integer('mand') -> unsigned();
            $table -> foreign('mand') -> references('id') -> on('users');
            $table -> integer('masp') -> unsigned();
            $table -> foreign('masp') -> references('id') -> on('sanpham');
            $table -> string('noidung');
            $table -> integer('matraloibl') -> nullable();
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
        Schema::dropIfExists('binhluan');
    }
}
