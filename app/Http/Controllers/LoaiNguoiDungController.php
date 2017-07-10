<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LoaiNguoiDung;

class LoaiNguoiDungController extends Controller
{
    public function getDanhSach()
    {
    	$dsloaind = LoaiNguoiDung::all();
    	return view('admin.loainguoidung.danhsach',['dsloaind' => $dsloaind]);
    }

    public function getThem()
    {
    	return view('admin.loainguoidung.them');
    }

    public function postThem(Request $request)
    {
    	$this->validate($request, 
    		['ten'=>'required|min:2|max:100'], 
    		['ten.required'=>'Bạn chưa nhập tên loại người dùng',
    		 'ten.min'=>'Tên loại người dùng phải có độ dài từ 2 đến 100 ký tự',
    		 'ten.max'=>'Tên loại người dùng phải có độ dài từ 2 đến 100 ký tự']);
    	$loaind = new LoaiNguoiDung;
    	$loaind->tenloaind = $request->ten;
    	$loaind->save();

    	return redirect('admin/loainguoidung/them')->with('thongbao', 'Đã thêm thành công loại người dùng mới');
    }

    public function getCapNhat($id)
    {
    	$loaind = LoaiNguoiDung::find($id);
    	return view('admin.loainguoidung.capnhat',['loaind'=>$loaind]);
    }

    public function postCapNhat(Request $request, $id)
    {
    	$loaind = LoaiNguoiDung::find($id);
    	$this->validate($request, 
    		['ten'=>'required|min:2|max:100'], 
    		['ten.required'=>'Bạn chưa nhập tên loại người dùng',
    		 'ten.min'=>'Tên loại người dùng phải có độ dài từ 2 đến 100 ký tự',
    		 'ten.max'=>'Tên loại người dùng phải có độ dài từ 2 đến 100 ký tự']);
    	$loaind->tenloaind = $request->ten;
    	$loaind->save();

    	return redirect('admin/loainguoidung/capnhat/'.$id)->with('thongbao', 'Đã cập nhật thành công loại người dùng');
    }

    public function getXoa($id)
    {
    	$loaind = LoaiNguoiDung::find($id);
    	$loaind->delete();
    	return redirect('admin/loainguoidung/danhsach')->with('thongbao', 'Đã xóa thành công loại người dùng');
    }
}
