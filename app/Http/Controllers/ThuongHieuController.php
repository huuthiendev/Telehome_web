<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ThuongHieu;
use App\ChiTietThuongHieu;

class ThuongHieuController extends Controller
{
    public function getDanhSach()
    {
    	$thuonghieu = ThuongHieu::all();
    	return view('admin.thuonghieu.danhsach',['dsthuonghieu' => $thuonghieu]);
    }

    public function getThem()
    {
    	return view('admin.thuonghieu.them');
    }

    public function postThem(Request $request)
    {
    	$this->validate($request, 
    		['ten'=>'required|min:2|max:100'], 
    		['ten.required'=>'Bạn chưa nhập tên thương hiệu',
    		 'ten.min'=>'Tên nhà sản xuất phải có độ dài từ 2 đến 100 ký tự',
    		 'ten.max'=>'Tên nhà sản xuất phải có độ dài từ 2 đến 100 ký tự']);
    	$thuonghieu = new ThuongHieu;
    	$thuonghieu->tenth = $request->ten;
        if($request->hasFile('hinh')) 
        {
            $file = $request->file('hinh');
            $duoi = $file->getClientOriginalExtension();
            if ($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg') {
                return redirect('admin/thuonghieu/them')->with('loi', 'Bạn chỉ được thêm file hình');
            }
            $name = $file->getClientOriginalName();
            $hinh = 'upload_'.str_random(5)."_".$name;
            while (file_exists("images/".$hinh)) {
                $hinh = 'upload_'.str_random(5)."_".$name;
            }
            $file->move("images", $hinh);
            $thuonghieu->hinhth = "images/".$hinh;
        }
    	$thuonghieu->save();

    	return redirect('admin/thuonghieu/them')->with('thongbao', 'Đã thêm thành công thương hiệu mới');
    }

    public function getCapNhat($id)
    {
    	$thuonghieu = ThuongHieu::find($id);
    	return view('admin.thuonghieu.capnhat',['thuonghieu'=>$thuonghieu]);
    }

    public function postCapNhat(Request $request, $id)
    {
    	$thuonghieu = ThuongHieu::find($id);
    	$this->validate($request, 
    		['ten'=>'required|min:2|max:100'], 
    		['ten.required'=>'Bạn chưa nhập tên thương hiệu',
    		 'ten.min'=>'Tên nhà sản xuất phải có độ dài từ 2 đến 100 ký tự',
    		 'ten.max'=>'Tên nhà sản xuất phải có độ dài từ 2 đến 100 ký tự']);
    	$thuonghieu->tenth = $request->ten;
        if($request->hasFile('hinh')) 
        {
            $file = $request->file('hinh');
            $duoi = $file->getClientOriginalExtension();
            if ($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg') {
                return redirect('admin/thuonghieu/them')->with('loi', 'Bạn chỉ được thêm file hình');
            }
            $name = $file->getClientOriginalName();
            $hinh = 'upload_'.str_random(5)."_".$name;
            while (file_exists("images/".$hinh)) {
                $hinh = 'upload_'.str_random(5)."_".$name;
            }
            $file->move("images", $hinh);
            $thuonghieu->hinhth = "images/".$hinh;
        }
    	$thuonghieu->save();

    	return redirect('admin/thuonghieu/capnhat/'.$id)->with('thongbao', 'Đã cập nhật thành công thương hiệu');
    }

    public function getXoa($id)
    {
    	$thuonghieu = ThuongHieu::find($id);
    	$thuonghieu->delete();
    	return redirect('admin/thuonghieu/danhsach')->with('thongbao', 'Đã xóa thành công thương hiệu');
    }

    public function apiGetThuongHieuTheoLoai($id)
    {
        $dschitiet = ChiTietThuongHieu::where('maloaisp','=', $id) -> get();
        $chuoijson = array();
        foreach($dschitiet as $item) {
            $thuonghieu = ThuongHieu::find($item->math);
            array_push($chuoijson, $thuonghieu);
        }
        return json_encode($chuoijson, JSON_UNESCAPED_UNICODE);
    }
}