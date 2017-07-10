<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\SanPham;
use App\ThuongHieu;
use App\LoaiSanPham;
use App\HoaDon;
use App\ChiTietHoaDon;
use Gloudemans\Shoppingcart\Facades\Cart;

class GioHangController extends Controller
{
    public function Them($id)
    {
    	$sanpham = SanPham::find($id);
        Cart::add($id ,$sanpham->tensp, 1, $sanpham->gia, ['image' => $sanpham->hinhsanpham->first()->duongdan]);
    	return redirect()->route('giohang');
    }

    public function DanhSach()
    {
        $dsloaisp = LoaiSanPham::all();
        $dsthuonghieu = ThuongHieu::all();
        if(Cart::count()) {
            return view('store.giohang',['giohang' => Cart::content(), 'tong' => Cart::subtotal(), 'tongsl' => Cart::count(), 'dsloaisp' => $dsloaisp, 'dsthuonghieu' => $dsthuonghieu]);
        } else {
            return view('store.giohangrong',['dsloaisp' => $dsloaisp, 'dsthuonghieu' => $dsthuonghieu]);
        }
    }

    public function Xoa($id)
    {
        $giohang = Cart::content();
        foreach ($giohang as $item) {
            if($item -> id == $id) {
                Cart::remove($item->rowId);
                return redirect()->route('giohang');
            }
        }
    }

    public function CapNhatSoLuong($loai, $id)
    {
        if ($loai == 'cong') 
        {
            $giohang = Cart::content();
            foreach ($giohang as $item) {
                if($item -> id == $id) {
                    Cart::update($item->rowId, $item -> qty + 1);
                    $tongtien = Cart::subtotal();
                    $tonggia = $item -> price * $item -> qty;
                    return redirect()->route('giohang');
                }
            }
        }
        if ($loai == 'tru')
        {
            $giohang = Cart::content();
            foreach ($giohang as $item) {
                if($item -> id == $id) {
                    if ($item->qty > 1) {
                        Cart::update($item->rowId, $item->qty - 1);
                        $tongtien = Cart::subtotal();
                        $tonggia = $item -> price * $item -> qty;
                        return redirect()->route('giohang');
                    } else {
                        return redirect()->route('giohang');
                    }
                }
            }
        }
        
    }

    public function LamMoi()
    {
        Cart::destroy();
        return redirect("");
    }

    public function ThanhToan()
    {
        $dsloaisp = LoaiSanPham::all();
        $dsthuonghieu = ThuongHieu::all();
        if(Auth::check()) {
            return view('store.thanhtoan', ['giohang' => Cart::content(), 'tong' => Cart::subtotal(), 'dsloaisp' => $dsloaisp, 'dsthuonghieu' => $dsthuonghieu]);
        } else {
            return view('store.kiemtradangnhap', ['dsloaisp' => $dsloaisp, 'dsthuonghieu' => $dsthuonghieu]);
        }
    }

    public function LuuThanhToan(Request $request)
    {
        $this->validate($request, 
            ['hoten'=>'min:3',
             'sdt'=>'min:10',
             'diachi'=>'min:5'], 
            ['hoten.min'=>'Họ tên phải có độ dài tối thiểu 3 ký tự',
             'sdt.min'=>'Số điện thoại phải có độ dài tối thiểu 10 ký tự',
             'diachi.min'=>'Địa chỉ phải có độ dài tối thiểu 5 ký tự']);
        $hoadon = new HoaDon;
        $hoadon -> mand = Auth::user() -> id;
        $hoadon -> tennguoinhan = $request -> tennguoinhan;
        $hoadon -> sdt = $request -> sdt;
        $hoadon -> diachi = $request -> diachi;
        $hoadon -> trangthai = 0;
        $hoadon -> phuongthucthanhtoan = 1;
        $tong = 0;
        $giohang = Cart::content();
        foreach ($giohang as $item) {
            $tong = $item -> price * $item -> qty + $tong;
        }
        $hoadon -> tongtien = $tong;
        $hoadon -> ghichu = $request -> ghichu;
        $hoadon->save();
        
        foreach ($giohang as $item) {
            $cthoadon = new ChiTietHoaDon;
            $cthoadon -> mahd = $hoadon -> id;
            $cthoadon -> masp = $item -> id;
            $cthoadon -> soluong = $item -> qty;
            $cthoadon -> save();
        }
        Cart::destroy();
        return redirect()->route('thanhcong');
    }

    public function ThanhCong()
    {
        $dsloaisp = LoaiSanPham::all();
        $dsthuonghieu = ThuongHieu::all();
        return view('store.thanhcong',['dsloaisp' => $dsloaisp, 'dsthuonghieu' => $dsthuonghieu]);
    }

    public function apiGetGioHang($mand)
    {
        $giohang = GioHang::where('mand','=', $mand) -> get();
        return $this -> formatGioHang($giohang);
    }

    public function apiGetThemSanPham($mand, $masp, $soluong)
    {
        $sanpham = SanPham::find($masp);
        $check = GioHang::where('mand','=', $mand) -> where('masp','=', $masp) -> first();
        
        if ($check == null) {
            $giohang = new GioHang;
            $giohang -> mand = $mand;
            $giohang -> masp = $masp;
            $giohang -> soluong = $soluong;
            $giohang -> tongtien = $soluong * $sanpham -> gia;
            $giohang -> save();
        } else {
            $check -> soluong = $check -> soluong + $soluong;
            $check -> tongtien = $check -> soluong * $sanpham -> gia;
            $check -> save();
        }
        
    }

    public function apiGetCapNhatSanPham($id, $soluong)
    {
        $giohang = GioHang::find($id);
        $sanpham = SanPham::find($giohang -> masp);
        
        $giohang -> soluong = $soluong;
        $giohang -> tongtien = $soluong * $sanpham -> gia;
        $giohang -> save();
    }

    public function apiGetXoaSanPham($id)
    {
        $giohang = GioHang::find($id);
        $giohang -> delete();
    }

    public function apiGetLamMoiGioHang($mand)
    {
        $giohang = GioHang::where('mand','=', $mand) -> get();
        foreach($giohang as $item) {
            $item -> delete();
        }
    }

    public function apiGetTongSoLuong($mand)
    {
        $giohang = GioHang::where('mand','=', $mand) -> get();
        $tongsl = 0;
        foreach($giohang as $item) {
            $tongsl += $item -> soluong;
        }
        return $tongsl;
    }

    public function apiLuuThanhToan(Request $request)
    {
        $hoadon = new HoaDon;
        $giohang = GioHang::where('mand','=', $request -> mand) -> get();

        $hoadon -> mand = $request -> mand;
        $hoadon -> tennguoinhan = $request -> tennguoinhan;
        $hoadon -> sdt = $request -> sodt;
        $hoadon -> diachi = $request -> diachi;
        $hoadon -> phuongthucthanhtoan = $request -> phuongthucthanhtoan;
        $hoadon -> tongtien = $this -> LayTongTien($request -> mand);
        $hoadon->save();
        
        foreach ($giohang as $item) {
            $cthoadon = new ChiTietHoaDon;
            $cthoadon -> mahd = $hoadon-> id;
            $cthoadon -> masp = $item -> masp;
            $cthoadon -> soluong = $item -> soluong;
            $cthoadon -> save();

            $item -> delete();
        }
        return "thanhcong";
    }

    public function LayTongTien($mand)
    {
        $giohang = GioHang::where('mand','=', $mand) -> get();
        $tonggia = 0;
        foreach($giohang as $item) {
            $tonggia += $item -> tongtien;
        }
        return $tonggia;
    }

    public function formatGioHang($sanpham) 
    {
        $chuoijson = array();
        foreach($sanpham as $item) {
            array_push($chuoijson, array("id" => $item -> id,
                                         "mand" => $item -> mand,
                                         "masp" => $item -> masp,
                                         "soluong" => $item -> soluong,
                                         "tongtien" => $item -> tongtien,
                                         "tensp" => $item -> sanpham -> tensp,
                                         "gia" => $item -> sanpham -> gia,
                                         "hinhsp" => $item -> sanpham -> hinhsanpham -> first() -> duongdan));
        }
        return json_encode($chuoijson, JSON_UNESCAPED_UNICODE);
    }
}
