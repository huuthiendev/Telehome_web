<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LoaiSanPham;

class LoaiSanPhamController extends Controller
{
    public function getDanhSach()
    {
    	$loaisp = LoaiSanPham::all();
    	return view('admin.loaisp.danhsach', ['dsloaisp' => $loaisp]);
    }

    public function getThem()
    {
        $loaisp = LoaiSanPham::all();
    	return view('admin.loaisp.them', ['dsloaisp' => $loaisp]);
    }

    public function postThem(Request $request)
    {
    	$this->validate($request, 
    		['ten'=>'required|min:2|max:100'], 
    		['ten.required'=>'Bạn chưa nhập tên loại sản phẩm',
    		 'ten.min'=>'Tên loại sản phẩm phải có độ dài từ 2 đến 100 ký tự',
    		 'ten.max'=>'Tên loại sản phẩm phải có độ dài từ 2 đến 100 ký tự']);
    	$loaisp = new LoaiSanPham;
    	$loaisp->tenloaisp = $request->ten;
        if($request->hasFile('hinh')) 
        {
            $file = $request->file('hinh');
            $duoi = $file->getClientOriginalExtension();
            if ($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg') {
                return redirect('admin/loaisp/them')->with('loi', 'Bạn chỉ được thêm file hình');
            }
            $name = $file->getClientOriginalName();
            $hinh = 'upload_'.str_random(5)."_".$name;
            while (file_exists("images/".$hinh)) {
                $hinh = 'upload_'.str_random(5)."_".$name;
            }
            $file->move("images", $hinh);
            $loaisp->hinhloaisp = "images/".$hinh; 
        }
        $loaisp->maloaicha = $request->maloaicha;
    	$loaisp->save();

    	return redirect('admin/loaisp/them')->with('thongbao', 'Đã thêm thành công loại sản phẩm mới');
    }

    public function getCapNhat($id)
    {
    	$loaisp = LoaiSanPham::find($id);
        $dsloaisp = LoaiSanPham::all();
    	return view('admin.loaisp.capnhat',['loaisp'=>$loaisp, 'dsloaisp' => $dsloaisp]);
    }

    public function postCapNhat(Request $request, $id)
    {
    	$loaisp = LoaiSanPham::find($id);
    	$this -> validate($request, 
    		['ten'=>'required|min:2|max:100'], 
    		['ten.required'=>'Bạn chưa nhập tên loại sản phẩm',
    		 'ten.min'=>'Tên loại sản phẩm phải có độ dài từ 2 đến 100 ký tự',
    		 'ten.max'=>'Tên loại sản phẩm phải có độ dài từ 2 đến 100 ký tự']);
    	$loaisp -> tenloaisp = $request -> ten;
        if($request -> hasFile('hinh')) 
        {
            $file = $request -> file('hinh');
            $duoi = $file -> getClientOriginalExtension();
            if ($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg') {
                return redirect('admin/loaisp/them')->with('loi', 'Bạn chỉ được thêm file hình');
            }
            $name = $file -> getClientOriginalName();
            $hinh = 'upload_'.str_random(5)."_".$name;
            while (file_exists("images/".$hinh)) {
                $hinh = 'upload_'.str_random(5)."_".$name;
            }
            $file -> move("images", $hinh);
            $loaisp -> hinhloaisp = "images/".$hinh;
        }
        $loaisp -> maloaicha = $request -> maloaicha;
    	$loaisp -> save();

    	return redirect('admin/loaisp/capnhat/'.$id)->with('thongbao', 'Đã cập nhật thành công loại sản phẩm');
    }

    public function getXoa($id)
    {
    	$loaisp = LoaiSanPham::find($id);
    	$loaisp->delete();
    	return redirect('admin/loaisp/danhsach')->with('thongbao', 'Đã xóa thành công loại sản phẩm');
    }

    public function apiGetLoaiSP() 
    {
        $loaisp = LoaiSanPham::where('maloaicha','!=', null) -> get();
        return $loaisp;
    }
}
