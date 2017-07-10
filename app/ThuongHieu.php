<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ThuongHieu extends Model
{
    protected $table = "thuonghieu";

    public function chitietthuonghieu()
    {
    	return $this -> hasMany('App\ChiTietThuongHieu', 'math', 'id');
    }

    public function sanpham()
    {
    	return $this -> hasMany('App\SanPham', 'math', 'id');
    }
}
