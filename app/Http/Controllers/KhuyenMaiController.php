<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\KhuyenMai;
use App\ChiTietKhuyenMai;
use App\SanPham;

class KhuyenMaiController extends Controller
{
    public function getDanhSach()
    {
    	$khuyenmai = KhuyenMai::all();
    	return view('admin.khuyenmai.danhsach',['dskhuyenmai' => $khuyenmai]);
    }

    public function getThem()
    {
    	return view('admin.khuyenmai.them');
    }

    public function postThem(Request $request)
    {
    	$this->validate($request, 
    		['tenkm'=>'required|min:2|max:100'], 
    		['tenkm.required'=>'B?n chua nh?p tên khuy?n mãi',
    		 'tenkm.min'=>'Tên nhà s?n xu?t ph?i có d? dài t? 2 d?n 100 ký t?',
    		 'tenkm.max'=>'Tên nhà s?n xu?t ph?i có d? dài t? 2 d?n 100 ký t?']);
    	$khuyenmai = new KhuyenMai;
    	$khuyenmai -> tenkm = $request -> tenkm;
        $khuyenmai -> ngaybd = $request -> ngaybd;
        $khuyenmai -> ngaykt = $request -> ngaykt;
        if($request -> hasFile('hinh')) 
        {
            $file = $request -> file('hinh');
            $duoi = $file -> getClientOriginalExtension();
            if ($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg') {
                return redirect('admin/khuyenmai/them') -> with('loi', 'B?n ch? du?c thêm file hình');
            }
            $name = $file -> getClientOriginalName();
            $hinh = 'upload_'.str_random(5)."_".$name;
            while (file_exists("images/".$hinh)) {
                $hinh = 'upload_'.str_random(5)."_".$name;
            }
            $file -> move("images", $hinh);
            $khuyenmai -> hinhkm = "images/".$hinh;
        }
    	$khuyenmai -> save();

    	return redirect('admin/khuyenmai/them') -> with('thongbao', 'Ðã thêm thành khuy?n mãi m?i');
    }

    public function getCapNhat($id)
    {
    	$khuyenmai = KhuyenMai::find($id);
    	return view('admin.khuyenmai.capnhat',['khuyenmai'=>$khuyenmai]);
    }

    public function postCapNhat(Request $request, $id)
    {
    	$khuyenmai = KhuyenMai::find($id);
    	$this->validate($request, 
    		['tenkm'=>'required|min:2|max:100'], 
    		['tenkm.required'=>'B?n chua nh?p tên khuy?n mãi',
    		 'tenkm.min'=>'Tên nhà s?n xu?t ph?i có d? dài t? 2 d?n 100 ký t?',
    		 'tenkm.max'=>'Tên nhà s?n xu?t ph?i có d? dài t? 2 d?n 100 ký t?']);
    	$khuyenmai -> tenkm = $request -> tenkm;
        $khuyenmai -> ngaybd = $request -> ngaybd;
        $khuyenmai -> ngaykt = $request -> ngaykt;
        if($request -> hasFile('hinh')) 
        {
            $file = $request -> file('hinh');
            $duoi = $file -> getClientOriginalExtension();
            if ($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg') {
                return redirect('admin/khuyenmai/them') -> with('loi', 'B?n ch? du?c thêm file hình');
            }
            $name = $file -> getClientOriginalName();
            $hinh = 'upload_'.str_random(5)."_".$name;
            while (file_exists("images/".$hinh)) {
                $hinh = 'upload_'.str_random(5)."_".$name;
            }
            $file -> move("images", $hinh);
            $khuyenmai -> hinhkm = "images/".$hinh;
        }
    	$khuyenmai->save();

    	return redirect('admin/khuyenmai/capnhat/'.$id)->with('thongbao', 'Ðã c?p nh?t thành công thông tin khuy?n mãi');
    }

    public function getXoa($id)
    {
    	$khuyenmai = KhuyenMai::find($id);
    	$khuyenmai->delete();
    	return redirect('admin/khuyenmai/danhsach')->with('thongbao', 'Ðã xóa thành công khuy?n mãi');
    }

    public function apiGetKhuyenMai() 
    {
        $khuyenmai = KhuyenMai::all();
        return $khuyenmai;
    }

    public function apiGetSanPhamKhuyenMai($id) 
    {
        $dssanpham = ChiTietKhuyenMai::where('makm','=', $id) -> get();
        return $this -> formatSanPham($dssanpham);
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
