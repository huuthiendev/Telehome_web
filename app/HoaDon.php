<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HoaDon extends Model
{
    protected $table = "hoadon";

    public function chitiethoadon()
    {
    	return $this -> hasMany('App\ChiTietHoaDon', 'mahd', 'id');
    }

    public function nguoidung()
    {
    	return $this -> belongsTo('App\NguoiDung', 'mand', 'id');
    }
}
