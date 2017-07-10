<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NguoiDung extends Model
{
    protected $table = "users";

    public function loainguoidung()
    {
    	return $this -> belongsTo('App\LoaiNguoiDung', 'maloaind', 'id');
    }

    public function hoadon()
    {
    	return $this -> hasMany('App\HoaDon', 'mand', 'id');
    }

    public function binhluan()
    {
    	return $this -> hasMany('App\BinhLuan', 'mand', 'id');
    }

    public function danhgia()
    {
    	return $this -> hasMany('App\DanhGia', 'mand', 'id');
    }
}
