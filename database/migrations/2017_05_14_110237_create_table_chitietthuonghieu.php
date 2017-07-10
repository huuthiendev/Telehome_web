<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableChitietthuonghieu extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chitietthuonghieu', function (Blueprint $table) {
            $table -> increments('id');
            $table -> integer('math') -> unsigned();
            $table -> foreign('math') -> references('id') -> on('thuonghieu');
            $table -> integer('maloaisp') -> unsigned();
            $table -> foreign('maloaisp') -> references('id') -> on('loaisanpham');
            $table -> string('hinhctth') -> nullable();
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
        Schema::dropIfExists('chitietthuonghieu');
    }
}
