<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoaiNguoiDung extends Model
{
    protected $table = "loainguoidung";

    public function nguoidung()
    {
    	return $this -> hasMany('App\NguoiDung', 'mand', 'id');
    }
}
