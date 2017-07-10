<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SanPham extends Model
{
    protected $table = "sanpham";

	public function loaisanpham()
    {
    	return $this -> belongsTo('App\LoaiSanPham', 'maloaisp', 'id');
    }

    public function thuonghieu()
    {
    	return $this -> belongsTo('App\ThuongHieu', 'math', 'id');
    }

    public function chitietsanpham()
    {
    	return $this -> hasMany('App\ChiTietSanPham', 'masp', 'id');
    }

    public function chitiethoadon()
    {
    	return $this -> hasMany('App\ChiTietHoaDon', 'masp', 'id');
    }

    public function binhluan()
    {
        return $this -> hasMany('App\BinhLuan', 'masp', 'id');
    }

    public function danhgia()
    {
        return $this -> hasMany('App\DanhGia', 'masp', 'id');
    }

    public function hinhsanpham()
    {
        return $this -> hasMany('App\HinhSanPham', 'masp', 'id');
    }

    public function chitietkhuyenmai()
    {
    	return $this -> belongsTo('App\ChiTietKhuyenMai', 'masp', 'id');
    }
}
