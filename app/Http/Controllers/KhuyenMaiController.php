<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\KhuyenMai;
use App\ChiTietKhuyenMai;
use App\SanPham;

class KhuyenMaiController extends Controller
{
    public function apiGetKhuyenMai() 
    {
        $khuyenmai = KhuyenMai::all();
        return $khuyenmai;
    }

    public function apiGetSanPhamKhuyenMai($id) 
    {
        $dssanpham = ChiTietKhuyenMai::where('makm','=', $id) -> get();
        return $this->formatSanPham($dssanpham);
    }

    public function formatSanPham($sanpham) 
    {
        $chuoijson = array();
        foreach($sanpham as $item) {
            $khuyenmai = ChiTietKhuyenMai::where('masp','=', $item -> id) -> first();
            $phantramkm = 0;
            if ($khuyenmai != null) {
                $phantramkm = $khuyenmai -> phantramkm;
            }
            array_push($chuoijson, array("id" => $item -> sanpham -> id,
                                         "tensp" => $item -> sanpham -> tensp,
                                         "gia" => $item -> sanpham -> gia - ($item -> sanpham -> gia * ($phantramkm / 100)),
                                         "giagoc" => $item -> sanpham -> gia,
                                         "phantramkm" => $phantramkm,
                                         "mota" => $item -> sanpham -> mota,
                                         "maloaisp" => $item -> sanpham -> maloaisp,
                                         "math" => $item -> sanpham -> math,
                                         "soluong" => $item -> sanpham -> soluong,
                                         "luotmua" => $item -> sanpham -> luotmua,
                                         "hinhsp" => $item -> sanpham -> hinhsanpham -> first() -> duongdan,
                                         "ngaydang" => $item -> sanpham -> created_at -> timestamp));
        }
        return json_encode($chuoijson, JSON_UNESCAPED_UNICODE);
    }
}
