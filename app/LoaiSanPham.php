<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoaiSanPham extends Model
{
    protected $table = "loaisanpham";

    public function chitietthuonghieu()
    {
    	return $this -> hasMany('App\ChiTietThuongHieu', 'maloaisp', 'id');
    }

    public function sanpham()
    {
    	return $this -> hasMany('App\SanPham', 'masp', 'id');
    }
}
