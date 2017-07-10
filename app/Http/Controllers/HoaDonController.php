<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HoaDon;
use App\ChiTietHoaDon;

class HoaDonController extends Controller
{
    public function getDanhSach()
    {
    	$dshoadon = HoaDon::all();
    	return view('admin.hoadon.danhsach',['dshoadon' => $dshoadon]);
    }

    public function getChiTiet($id)
    {
    	$hoadon = HoaDon::find($id);
        $dscthoadon = ChiTietHoaDon::where('mahd', '=', $id)->get();
    	return view('admin.hoadon.xemchitiet',['hoadon'=>$hoadon, 'dscthoadon'=>$dscthoadon]);
    }

    public function postChiTiet(Request $request, $id)
    {
    	$hoadon = HoaDon::find($id);
    	$this->validate($request, 
    		['sdt'=>'required|min:6|max:11',
             'diachi'=>'required|min:2'], 
    		['sdt.required'=>'Bạn chưa nhập số điện thoại',
             'sdt.min'=>'Số điện thoại phải có từ 6 đến 11 số',
             'sdt.max'=>'Số điện thoại phải có từ 6 đến 11 số',
             'diachi.required'=>'Bạn chưa nhập địa chỉ',
             'diachi.min'=>'Địa chỉ phải có tối thiểu 2 ký tự',]);
        $hoadon->sdt = $request->sdt;
        $hoadon->diachi = $request->diachi;
        $hoadon->ghichu = $request->ghichu;
        $hoadon->trangthai = $request->trangthai;
    	$hoadon->save();

    	return redirect('admin/hoadon/chitiet/'.$id)->with('thongbao', 'Đã sửa thành công loại sản phẩm');
    }

    public function getXoa($id)
    {
    	$hoadon = HoaDon::find($id);
    	$hoadon->delete();
    	return redirect('admin/hoadon/danhsach')->with('thongbao', 'Đã xóa thành công hóa đơn');
    }

    public function CapNhatSoLuong($id)
    {
        $cthoadon = ChiTietHoaDon::find($id);
        return view('admin.hoadon.soluong', ['cthoadon'=>$cthoadon]);
    }

    public function postCapNhatSoLuong(Request $request, $id)
    {
        $cthoadon = ChiTietHoaDon::find($id);
        $cthoadon->soluong = $request->soluong;
        $cthoadon->save();

        $hoadon = HoaDon::find($cthoadon->mahd);
        $dscthoadon = ChiTietHoaDon::where('mahd', '=', $cthoadon->mahd)->get();
        $tong = 0;
        foreach ($dscthoadon as $item) {
            $tong = $item->sanpham->gia * $item->soluong + $tong;
        }
        $hoadon->tongtien = $tong;
        $hoadon->save();

        return redirect('admin/hoadon/chitiet/'.$cthoadon->mahd);
    }

    public function XoaSanPham($id)
    {
        $cthoadon = ChiTietHoaDon::find($id);
        $hoadon = HoaDon::find($cthoadon->mahd);
        $cthoadon->delete();
        $dscthoadon = ChiTietHoaDon::where('mahd', '=', $hoadon->id)->get();
        $tong = 0;
        foreach ($dscthoadon as $item) {
            $tong = $item->sanpham->gia * $item->soluong + $tong;
        }
        $hoadon->tongtien = $tong;
        $hoadon->save();

        return redirect('admin/hoadon/chitiet/'.$hoadon->id);
    }
}
