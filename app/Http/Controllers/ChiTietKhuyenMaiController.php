<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\KhuyenMai;
use App\ChiTietKhuyenMai;
use App\SanPham;

class ChiTietKhuyenMaiController extends Controller
{
    public function getDanhSach()
    {
    	$khuyenmai = ChiTietKhuyenMai::all();
    	return view('admin.chitietkhuyenmai.danhsach',['dskhuyenmai' => $khuyenmai]);
    }

    public function getThem()
    {
        $dskhuyenmai = KhuyenMai::all();
        $dssanpham = SanPham::all();
        $dsctkhuyenmai = ChiTietKhuyenMai::all();
    	return view('admin.chitietkhuyenmai.them',['dskhuyenmai' => $dskhuyenmai, 'dssanpham' => $dssanpham, 'dsctkhuyenmai' => $dsctkhuyenmai]);
    }

    public function postThem(Request $request)
    {
    	$ctkhuyenmai = new ChiTietKhuyenMai;
    	$ctkhuyenmai -> makm = $request -> makm;
        $ctkhuyenmai -> masp = $request -> masp;
        $ctkhuyenmai -> phantramkm = $request -> phantramkm;
    	$ctkhuyenmai -> save();

    	return redirect('admin/chitietkhuyenmai/them') -> with('thongbao', 'Đã thêm thành công chi tiết khuyến mãi mới');
    }

    public function getCapNhat($id)
    {
    	$ctkhuyenmai = ChiTietKhuyenMai::find($id);
        $dskhuyenmai = KhuyenMai::all();
        $dssanpham = SanPham::all();
    	return view('admin.chitietkhuyenmai.capnhat',['ctkhuyenmai'=>$ctkhuyenmai, 'dskhuyenmai'=>$dskhuyenmai, 'dssanpham'=>$dssanpham]);
    }

    public function postCapNhat(Request $request, $id)
    {
    	$ctkhuyenmai = ChiTietKhuyenMai::find($id);
    	$ctkhuyenmai -> makm = $request -> makm;
        $ctkhuyenmai -> masp = $request -> masp;
        $ctkhuyenmai -> phantramkm = $request -> phantramkm;
    	$ctkhuyenmai -> save();

    	return redirect('admin/chitietkhuyenmai/capnhat/'.$id)->with('thongbao', 'Đã cập nhật thành công thông tin khuyến mãi');
    }

    public function getXoa($id)
    {
    	$khuyenmai = ChiTietKhuyenMai::find($id);
    	$khuyenmai->delete();
    	return redirect('admin/chitietkhuyenmai/danhsach')->with('thongbao', 'Đã xóa thành công khuyến mãi');
    }
}
