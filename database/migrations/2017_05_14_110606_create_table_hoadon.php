<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableHoadon extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hoadon', function (Blueprint $table) {
            $table -> increments('id');
            $table -> integer('mand') -> unsigned();
            $table -> foreign('mand') -> references('id') -> on('users');
            $table -> string('tennguoinhan');
            $table -> string('sdt');
            $table -> string('diachi');
            $table -> integer('trangthai') ->  default(0);
            $table -> integer('tongtien');
            $table -> string('ngaygiao') -> nullable();
            $table -> integer('phuongthucthanhtoan');
            $table -> string('machuyenkhoan') -> nullable();
            $table -> string('ghichu') -> nullable();
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
        Schema::dropIfExists('hoadon');
    }
}
