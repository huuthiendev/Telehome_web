<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HinhSanPham extends Model
{
    protected $table = "hinhsanpham";

    public function sanpham()
    {
    	return $this -> belongsTo('App\SanPham', 'masp', 'id');
    }
}
