<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/','TrangChuController@getTrangChu');

Route::get('sanpham/{id}','TrangChuController@getSanPham');

Route::get('loaisanpham/{id}','TrangChuController@getLoaiSanPham');

Route::get('thuonghieu/{id}','TrangChuController@getThuongHieu');

Route::post('timkiem','TrangChuController@TimKiem');

Route::get('timkiemtheogia','TrangChuController@getTheoGia');

Route::post('timkiemtheogia','TrangChuController@postTheoGia');

Route::get('dangnhap','NguoiDungController@getDangNhap');

Route::post('dangnhap','NguoiDungController@postDangNhap');

Route::get('dangky','NguoiDungController@getDangKy');

Route::post('dangky','NguoiDungController@postDangKy');

Route::get('dangxuat','NguoiDungController@DangXuat');

Route::group(['prefix'=>'giohang'], function() {
    
    Route::get('them/{id}','GioHangController@Them');

    Route::get('danhsach','GioHangController@DanhSach')->name('giohang');

    Route::get('xoa/{id}','GioHangController@Xoa');

    Route::get('lammoi','GioHangController@LamMoi');

    Route::get('xuatmang','GioHangController@xuatmang');

    Route::get('capnhat/{loai}/{id}','GioHangController@CapNhatSoLuong');

    Route::get('thanhtoan','GioHangController@ThanhToan');

    Route::post('thanhtoan','GioHangController@LuuThanhToan');

    Route::get('thanhcong','GioHangController@ThanhCong')->name('thanhcong');
});

Route::get('admin/dangnhap','NguoiDungController@getDangNhapAdmin');

Route::post('admin/dangnhap','NguoiDungController@postDangNhapAdmin');

Route::get('admin/dangxuat','NguoiDungController@getDangXuatAdmin');

Route::group(['prefix'=>'admin', 'middleware'=>'adminLogin'], function() {

    Route::get('/', function () {
        return view('admin.layout.index');
    });

    Route::group(['prefix'=>'loaisp'], function() {
        Route::get('danhsach','LoaiSanPhamController@getDanhSach');

        Route::get('capnhat/{id}','LoaiSanPhamController@getCapNhat');

        Route::post('capnhat/{id}','LoaiSanPhamController@postCapNhat');

        Route::get('them','LoaiSanPhamController@getThem');

        Route::post('them','LoaiSanPhamController@postThem');

        Route::get('xoa/{id}','LoaiSanPhamController@getXoa');
    });

    Route::group(['prefix'=>'thuonghieu'], function() {
        Route::get('danhsach','ThuongHieuController@getDanhSach');

        Route::get('capnhat/{id}','ThuongHieuController@getCapNhat');

        Route::post('capnhat/{id}','ThuongHieuController@postCapNhat');

        Route::get('them','ThuongHieuController@getThem');

        Route::post('them','ThuongHieuController@postThem');

        Route::get('xoa/{id}','ThuongHieuController@getXoa');
    });

    Route::group(['prefix'=>'sanpham'], function() {
        Route::get('danhsach','SanPhamController@getDanhSach');

        Route::get('capnhat/{id}','SanPhamController@getCapNhat');

        Route::post('capnhat/{id}','SanPhamController@postCapNhat');

        Route::get('them','SanPhamController@getThem');

        Route::post('them','SanPhamController@postThem');

        Route::get('xoa/{id}','SanPhamController@getXoa');

        Route::get('xoahinh/{id}','SanPhamController@getXoaHinh');

        Route::get('capnhathinh/{id}','SanPhamController@getCapNhatHinh');

        Route::post('capnhathinh/{id}','SanPhamController@postCapNhatHinh');
    });

    Route::group(['prefix'=>'nguoidung'], function() {
        Route::get('danhsach','NguoiDungController@getDanhSach');

        Route::get('capnhat/{id}','NguoiDungController@getCapNhat');

        Route::post('capnhat/{id}','NguoiDungController@postCapNhat');

        Route::get('them','NguoiDungController@getThem');

        Route::post('them','NguoiDungController@postThem');

        Route::get('xoa/{id}','NguoiDungController@getXoa');
    });

    Route::group(['prefix'=>'loainguoidung'], function() {
        Route::get('danhsach','LoaiNguoiDungController@getDanhSach');

        Route::get('capnhat/{id}','LoaiNguoiDungController@getCapNhat');

        Route::post('capnhat/{id}','LoaiNguoiDungController@postCapNhat');

        Route::get('them','LoaiNguoiDungController@getThem');

        Route::post('them','LoaiNguoiDungController@postThem');

        Route::get('xoa/{id}','LoaiNguoiDungController@getXoa');
    });

    Route::group(['prefix'=>'hoadon'], function() {
        Route::get('danhsach','HoaDonController@getDanhSach');

        Route::get('chitiet/{id}','HoaDonController@getChiTiet');

        Route::post('chitiet/{id}','HoaDonController@postChiTiet');

        Route::get('soluong/{id}','HoaDonController@CapNhatSoLuong');

        Route::post('soluong/{id}','HoaDonController@postCapNhatSoLuong');

        Route::get('xoasp/{id}','HoaDonController@XoaSanPham');

        Route::get('xoa/{id}','HoaDonController@getXoa');
    });
});

Route::group(['prefix'=>'api'], function () {
    
    Route::group(['prefix'=>'sanpham'], function () {
        Route::get('danhsach','SanPhamController@apiGetSanPhamMoi');
        Route::get('sanphamtheoloai/{id}','SanPhamController@apiGetSanPhamTheoLoai');
        Route::get('sanphamtheoloaitheothuonghieu/{maloaisp}/{math}',
            'SanPhamController@apiGetSanPhamTheoLoaiTheoThuongHieu');
        Route::get('sanphamtheoloaitheogia/{maloaisp}/{giabd}/{giakt}',
            'SanPhamController@apiGetSanPhamTheoLoaiTheoGia');
        Route::get('sanphamtheoloaitheothuonghieutheogia/{maloaisp}/{math}/{giabd}/{giakt}',
            'SanPhamController@apiGetSanPhamTheoLoaiTheoThuongHieuTheoGia');
        Route::get('hinhsanpham/{id}','SanPhamController@apiGetHinhSanPham');   
        Route::get('timkiem/{tensp}','SanPhamController@apiGetSanPhamTimKiem');
    });
    
    Route::group(['prefix'=>'loaisanpham'], function () {
        Route::get('danhsach','LoaiSanPhamController@apiGetLoaiSP');
    });

    Route::group(['prefix'=>'thuonghieu'], function () {
        Route::get('thuonghieutheoloai/{id}','ThuongHieuController@apiGetThuongHieuTheoLoai');
    });

    Route::group(['prefix'=>'khuyenmai'], function () {
        Route::get('danhsach','KhuyenMaiController@apiGetKhuyenMai');
        Route::get('danhsachsanpham/{id}','KhuyenMaiController@apiGetSanPhamKhuyenMai');
    });

    Route::group(['prefix'=>'nguoidung'], function () {
        Route::post('dangnhap','NguoiDungController@apiPostDangNhap');
        Route::post('dangky','NguoiDungController@apiPostDangKy');
        Route::get('thongtin/{id}','NguoiDungController@apiGetNguoiDung');
    });

    Route::group(['prefix'=>'giohang'], function () {
        Route::get('danhsach/{mand}','GioHangController@apiGetGioHang');
        Route::get('themsanpham/{mand}/{masp}/{soluong}','GioHangController@apiGetThemSanPham');
        Route::get('capnhatsanpham/{id}/{soluong}','GioHangController@apiGetCapNhatSanPham');
        Route::get('xoasanpham/{id}','GioHangController@apiGetXoaSanPham');
        Route::get('lammoi/{mand}','GioHangController@apiGetLamMoiGioHang');
        Route::get('soluong/{mand}','GioHangController@apiGetTongSoLuong');
        Route::post('thanhtoan','GioHangController@apiLuuThanhToan');
    });
    
});