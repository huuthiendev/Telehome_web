<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChiTietSanPham extends Model
{
    protected $table = "chitietsanpham";

    public function sanpham() 
    {
    	return $this -> belongsTo('App\SanPham', 'masp', 'id');
    }
}
