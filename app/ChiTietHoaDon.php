<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChiTietHoaDon extends Model
{
    protected $table = "chitiethoadon";

    public function hoadon() 
    {
    	return $this -> belongsTo('App\HoaDon', 'mahd', 'id');
    }

    public function sanpham() 
    {
    	return $this -> belongsTo('App\SanPham', 'masp', 'id');
    }
}
