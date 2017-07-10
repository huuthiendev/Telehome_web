<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SanPham;
use App\ThuongHieu;
use App\LoaiSanPham;
use App\ChiTietHoaDon;
use Illuminate\Support\Facades\DB;

class TrangChuController extends Controller
{
    public function getTrangchu()
    {
        $dsloaisp = LoaiSanPham::all();
        $dsthuonghieu = ThuongHieu::all();
    	$dssanpham = SanPham::orderBy('id', 'desc')->take(8)->get();
        // $sptop = ChiTietHoaDon::selectRaw('idSP, COUNT(*) as soluong')
        //                         ->groupBy('idSP')
        //                         ->orderBy('soluong','DESC')
        //                         ->take(5)
        //                         ->get();
    	return view('store.trangchu',['dssanpham' => $dssanpham, 'dsloaisp' => $dsloaisp, 'dsthuonghieu' => $dsthuonghieu]);
    }

    public function getSanPham($id)
    {
        $dsloaisp = LoaiSanPham::all();
        $dsthuonghieu = ThuongHieu::all();
        $sanpham = SanPham::find($id);
        $dssplienquan = SanPham::where('maloaisp', $sanpham -> maloaisp) -> where('id','!=', $id) -> take(4) -> get();
        return view('store.sanpham', 
            ['sanpham' => $sanpham, 
             'dssplienquan' => $dssplienquan,
             'dsloaisp' => $dsloaisp, 
             'dsthuonghieu' => $dsthuonghieu]);
    }

    public function getLoaiSanPham($id)
    {
        $dsloaisp = LoaiSanPham::all();
        $dsthuonghieu = ThuongHieu::all();
        $dssanpham = SanPham::where('maloaisp', $id) -> get();
        return view('store.loaisanpham', ['dssanpham' => $dssanpham, 'dsloaisp' => $dsloaisp, 'dsthuonghieu' => $dsthuonghieu]);
    }

    public function getThuongHieu($id)
    {
        $dsloaisp = LoaiSanPham::all();
        $dsthuonghieu = ThuongHieu::all();
        $dssanpham = SanPham::where('math', $id) -> get();
        return view('store.loaisanpham', ['dssanpham' => $dssanpham, 'dsloaisp' => $dsloaisp, 'dsthuonghieu' => $dsthuonghieu]);
    }

    public function TimKiem(Request $request)
    {
        $dsloaisp = LoaiSanPham::all();
        $dsthuonghieu = ThuongHieu::all();
        $dssanpham = SanPham::where('tensp','like', '%'.$request -> chuoi.'%') -> get();
        return view('store.timkiem',['dssanpham' => $dssanpham, 'dsloaisp' => $dsloaisp, 'dsthuonghieu' => $dsthuonghieu]);
    }

    public function getTheoGia()
    {
        $dsloaisp = LoaiSanPham::all();
        $dsthuonghieu = ThuongHieu::all();
        return view('store.theogia',['dsloaisp' => $dsloaisp, 'dsthuonghieu' => $dsthuonghieu]);
    }

    public function postTheoGia(Request $request)
    {
        $dsloaisp = LoaiSanPham::all();
        $dsthuonghieu = ThuongHieu::all();
        $dssanpham = SanPham::where('gia','>=', $request->giabd) -> where('gia','<=', $request->giakt) -> get();
        return view('store.timkiem',['dssanpham' => $dssanpham, 'dsloaisp' => $dsloaisp, 'dsthuonghieu' => $dsthuonghieu]);
    }

}
