<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BinhLuan extends Model
{
    protected $table = "binhluan";

    public function nguoidung() 
    {
    	return $this -> belongsTo('App\NguoiDung', 'mand', 'id');
    }

    public function sanpham() 
    {
    	return $this -> belongsTo('App\SanPham', 'masp', 'id');
    }
}
