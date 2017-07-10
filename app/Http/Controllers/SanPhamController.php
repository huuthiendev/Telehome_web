<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SanPham;
use App\HinhSanPham;
use App\ThuongHieu;
use App\LoaiSanPham;
use App\ChiTietKhuyenMai;

class SanPhamController extends Controller
{
    public function getDanhSach()
    {
    	$sanpham = SanPham::all();
    	return view('admin.sanpham.danhsach',['dssanpham' => $sanpham]);
    }

    public function getThem()
    {
    	$loaisp = LoaiSanPham::all();
    	$thuonghieu = ThuongHieu::all();
    	return view('admin.sanpham.them', ['dsloaisp' => $loaisp, 'dsthuonghieu' => $thuonghieu]);
    }

    public function postThem(Request $request)
    {
    	$this->validate($request, 
    		['ten'=>'required|min:2|max:100',
    		 'gia'=>'required',
    		 'soluong'=>'required'], 
    		['ten.required'=>'Bạn chưa nhập tên sản phẩm',
    		 'ten.min'=>'Tên sản phẩm phải có độ dài từ 2 đến 100 ký tự',
    		 'ten.max'=>'Tên sản phẩm phải có độ dài từ 2 đến 100 ký tự',
    		 'gia.required'=>'Bạn chưa nhập giá sản phẩm',
    		 'soluong.required'=>'Bạn chưa nhập số lượng sản phẩm']);
    	$sanpham = new SanPham;
    	$sanpham->tensp = $request->ten;
    	$sanpham->gia = $request->gia;
    	$sanpham->soluong = $request->soluong;
    	$sanpham->maloaisp = $request->idloaisp;
    	$sanpham->math = $request->idthuonghieu;
    	$sanpham->mota = $request->mota;
        $sanpham->save();
        
        if($request->hasFile('hinhs')) 
        {
            foreach ($request->hinhs as $file) {
                $duoi = $file->getClientOriginalExtension();
                if ($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg') {
                    return redirect('admin/sanpham/them')->with('loi', 'Bạn chỉ được thêm file hình');
                }
                $name = $file->getClientOriginalName();
                $hinh = 'upload_'.str_random(5)."_".$name;
                while (file_exists("images/".$hinh)) {
                    $hinh = 'upload_'.str_random(5)."_".$name;
                }
                $file->move("images", $hinh);
                $hinhsanpham = new HinhSanPham;
                $hinhsanpham->masp = $sanpham->id;
                $hinhsanpham->duongdan = "images/".$hinh;
                $hinhsanpham->save();
            }
        }

    	return redirect('admin/sanpham/them')->with('thongbao', 'Đã thêm thành công sản phẩm mới');
    }

    public function getCapNhat($id)
    {
    	$sanpham = SanPham::find($id);
        $dsloaisp = LoaiSanPham::all();
        $dsthuonghieu = ThuongHieu::all();
    	return view('admin.sanpham.capnhat', ['sanpham'=>$sanpham, 'dsloaisp' => $dsloaisp, 'dsthuonghieu' => $dsthuonghieu]);
    }

    public function postCapNhat(Request $request, $id)
    {
    	$sanpham = SanPham::find($id);
    	$this->validate($request, 
            ['ten'=>'required|min:2|max:100',
             'gia'=>'required',
             'soluong'=>'required'], 
            ['ten.required'=>'Bạn chưa nhập tên sản phẩm',
             'ten.min'=>'Tên sản phẩm phải có độ dài từ 2 đến 100 ký tự',
             'ten.max'=>'Tên sản phẩm phải có độ dài từ 2 đến 100 ký tự',
             'ten.gia'=>'Bạn chưa nhập giá sản phẩm',
             'soluong'=>'Bạn chưa nhập số lượng sản phẩm']);
    	$sanpham->tensp = $request->ten;
        $sanpham->gia = $request->gia;
        $sanpham->soluong = $request->soluong;
        if($request->idloaisp != null) {
            $sanpham->maloaisp = $request->idloaisp;
        }
        if($request->idthuonghieu != null) {
            $sanpham->math = $request->idthuonghieu;
        }
        $sanpham->mota = $request->mota;
        if($request->hasFile('hinh')) 
        {
            $file = $request->file('hinh');
            $duoi = $file->getClientOriginalExtension();
            if ($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg') {
                return redirect('admin/sanpham/them')->with('loi', 'Bạn chỉ được thêm file hình');
            }
            $name = $file->getClientOriginalName();
            $hinh = 'upload_'.str_random(5)."_".$name;
            while (file_exists("images/".$hinh)) {
                $hinh = 'upload_'.str_random(5)."_".$name;
            }
            $file->move("images", $hinh);
            $hinhsanpham = new HinhSanPham;
            $hinhsanpham->masp = $sanpham->id;
            $hinhsanpham->duongdan = "images/".$hinh;
            $hinhsanpham->save();
        }
        $sanpham->save();

    	return redirect('admin/sanpham/capnhat/'.$id)->with('thongbao', 'Đã cập nhật thành công sản phẩm');
    }

    public function getXoa($id)
    {
    	$sanpham = SanPham::find($id);
    	$sanpham->delete();
    	return redirect('admin/sanpham/danhsach')->with('thongbao', 'Đã xóa thành công sản phẩm');
    }

    public function getXoaHinh($id)
    {
    	$hinh = HinhSanPham::find($id);
        $idsp = $hinh -> masp;
    	$hinh->delete();
    	return redirect('admin/sanpham/capnhat'.$idsp)->with('thongbao', 'Đã xóa hình thành công');
    }

    public function getCapNhatHinh($id)
    {
    	$hinhsanpham = HinhSanPham::find($id);
        return view('admin.sanpham.hinh',['hinhsanpham' => $hinhsanpham]);
    }

    public function postCapNhatHinh($id, Request $request)
    {
    	$hinhsanpham = HinhSanPham::find($id);
        if($request->hasFile('hinh')) 
        {
            $file = $request->file('hinh');
            $duoi = $file->getClientOriginalExtension();
            if ($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg') {
                return redirect('admin/sanpham/capnhathinh/'.$hinhsanpham->id)->with('loi', 'Bạn chỉ được thêm file hình');
            }
            $name = $file->getClientOriginalName();
            $hinh = 'upload_'.str_random(5)."_".$name;
            while (file_exists("images/".$hinh)) {
                $hinh = 'upload_'.str_random(5)."_".$name;
            }
            $file->move("images", $hinh);
            $hinhsanpham->duongdan = "images/".$hinh;
        }
    	$hinhsanpham->save();
    	return redirect('admin/sanpham/capnhat/'.$hinhsanpham->masp);
    }

    public function apiGetSanPhamMoi() 
    {
        $dssanpham = SanPham::orderBy('created_at', 'desc')->take(10)->get();
        return $this->formatSanPham($dssanpham);
    }

    public function apiGetSanPhamTheoLoai($id)
    {
        $dssanpham = SanPham::where('maloaisp','=', $id) -> get();
        return $this->formatSanPham($dssanpham);
    }

    public function apiGetSanPhamTheoLoaiTheoThuongHieu($maloaisp, $math)
    {
        $dssanpham = SanPham::where('maloaisp','=', $maloaisp) -> where('math','=', $math) -> get();
        return $this->formatSanPham($dssanpham);
    }

    public function apiGetSanPhamTheoLoaiTheoGia($maloaisp, $giabd, $giakt)
    {
        $dssanpham = SanPham::where('maloaisp','=', $maloaisp) 
                            -> where('gia','>=', $giabd)
                            -> where('gia','<=', $giakt) 
                            -> get();
        return $this->formatSanPham($dssanpham);
    }

    public function apiGetSanPhamTheoLoaiTheoThuongHieuTheoGia($maloaisp, $math, $giabd, $giakt)
    {
        $dssanpham = SanPham::where('maloaisp','=', $maloaisp) 
                            -> where('math','=', $math) 
                            -> where('gia','>=', $giabd)
                            -> where('gia','<=', $giakt) 
                            -> get();
        return $this->formatSanPham($dssanpham);
    }

    public function apiGetHinhSanPham($id)
    {
        $hinhsp = HinhSanPham::where('masp','=', $id) -> get();
        return $hinhsp;
    }

    public function apiGetSanPhamTimKiem($tensp) 
    {
        $dssanpham = SanPham::where('tensp','like', '%'.$tensp.'%') -> get();
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
            array_push($chuoijson, array("id" => $item -> id,
                                         "tensp" => $item -> tensp,
                                         "gia" => $item -> gia - ($item -> gia * ($phantramkm / 100)),
                                         "giagoc" => $item -> gia,
                                         "phantramkm" => $phantramkm,
                                         "mota" => $item -> mota,
                                         "maloaisp" => $item -> maloaisp,
                                         "math" => $item -> math,
                                         "soluong" => $item -> soluong,
                                         "luotmua" => $item -> luotmua,
                                         "hinhsp" => $item -> hinhsanpham -> first() -> duongdan,
                                         "ngaydang" => $item -> created_at -> timestamp));
        }
        return json_encode($chuoijson, JSON_UNESCAPED_UNICODE);
    }
}
