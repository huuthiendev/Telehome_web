<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChiTietThuongHieu extends Model
{
    protected $table = "chitietthuonghieu";

    public function thuonghieu() 
    {
    	return $this -> belongsTo('App\ThuongHieu', 'math', 'id');
    }

    public function loaisanpham() 
    {
    	return $this -> belongsTo('App\LoaiSanPham', 'maloaisp', 'id');
    }
}
