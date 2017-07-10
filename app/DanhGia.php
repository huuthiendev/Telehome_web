<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DanhGia extends Model
{
    protected $table = "danhgia";

    public function nguoidung() 
    {
    	return $this -> belongsTo('App\NguoiDung', 'mand', 'id');
    }

    public function sanpham() 
    {
    	return $this -> belongsTo('App\SanPham', 'masp', 'id');
    }
}
