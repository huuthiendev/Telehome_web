<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KhuyenMai extends Model
{
    protected $table = "khuyenmai";

    public function chitietkhuyenmai()
    {
    	return $this -> hasMany('App\ChiTietKhuyenMai', 'makm', 'id');
    }
}
