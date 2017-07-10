<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChiTietKhuyenMai extends Model
{
    protected $table = "chitietkhuyenmai";

    public function khuyenmai() 
    {
    	return $this -> belongsTo('App\KhuyenMai', 'makm', 'id');
    }

    public function sanpham() 
    {
    	return $this -> belongsTo('App\SanPham', 'masp', 'id');
    }
}
