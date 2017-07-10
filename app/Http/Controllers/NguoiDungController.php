<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\NguoiDung;
use App\LoaiNguoiDung;
use App\SanPham;
use App\ThuongHieu;
use App\LoaiSanPham;

class NguoiDungController extends Controller
{
    public function getDanhSach()
    {
    	$nguoidung = NguoiDung::all();
    	return view('admin.nguoidung.danhsach', ['dsnguoidung' => $nguoidung]);
    }

    public function getThem()
    {
        $dsloaind = LoaiNguoiDung::orderBy('id', 'desc')->get();
    	return view('admin.nguoidung.them', ['dsloaind' => $dsloaind]);
    }

    public function postThem(Request $request)
    {
    	$this->validate($request, 
    		['name'=>'required|min:2',
    		 'email'=>'required|email|unique:users,email',
    		 'password'=>'required|min:5',
    		 'passwordAgain'=>'required|same:password'], 
    		['name.required'=>'Bạn chưa nhập họ và tên',
    		 'name.min'=>'Họ và tên phải có tối thiểu 2 ký tự',
    		 'email.required'=>'Bạn chưa nhập email',
    		 'email.email'=>'Email bạn nhập không hợp lệ',
             'email.unique'=>'Email đã được sử dụng',
    		 'password.required'=>'Bạn chưa nhập mật khẩu',
    		 'password.min'=>'Mật khẩu phải có tối thiểu 5 ký tự',
    		 'passwordAgain.required'=>'Bạn chưa nhập lại mật khẩu',
    		 'passwordAgain.same'=>'Mật khẩu nhập lại không trùng khớp']);
    	$nguoidung = new NguoiDung;
    	$nguoidung->tennd = $request->name;
    	$nguoidung->email = $request->email;
    	$nguoidung->password = bcrypt($request->password);
    	$nguoidung->maloaind = $request->maloaind;
        $nguoidung->diachi = $request->diachi;
        $nguoidung->ngaysinh = $request->ngaysinh;
        $nguoidung->sdt = $request->sdt;
        $nguoidung->gioitinh = $request->gioitinh;
    	$nguoidung->save();

    	return redirect('admin/nguoidung/them')->with('thongbao', 'Đã thêm người dùng mới thành công');
    }

    public function getCapNhat($id)
    {
    	$nguoidung = NguoiDung::find($id);
        $dsloaind = LoaiNguoiDung::orderBy('id', 'desc')->get();
    	return view('admin.nguoidung.capnhat',['nguoidung'=>$nguoidung, 'dsloaind'=>$dsloaind]);
    }

    public function postCapNhat(Request $request, $id)
    {
    	$nguoidung = NguoiDung::find($id);
    	$this->validate($request, 
    		['name'=>'required|min:2',], 
    		['name.required'=>'Bạn chưa nhập họ và tên',
    		 'name.min'=>'Họ và tên phải có tối thiểu 2 ký tự']);
    	$nguoidung->tennd = $request->name;
    	if ($request->changePassword == 'on') 
    	{
    		$this->validate($request, 
    		['password'=>'required|min:5',
    		 'passwordAgain'=>'required|same:password'], 
    		['password.required'=>'Bạn chưa nhập mật khẩu',
    		 'password.min'=>'Mật khẩu phải có tối thiểu 5 ký tự',
    		 'passwordAgain.required'=>'Bạn chưa nhập lại mật khẩu',
    		 'passwordAgain.same'=>'Mật khẩu nhập lại không trùng khớp']);
    		$nguoidung->password = bcrypt($request->password);
    	}
        $nguoidung->maloaind = $request->maloaind;
        $nguoidung->diachi = $request->diachi;
        $nguoidung->ngaysinh = $request->ngaysinh;
        $nguoidung->sdt = $request->sdt;
        $nguoidung->gioitinh = $request->gioitinh;
    	$nguoidung->save();

    	return redirect('admin/nguoidung/capnhat/'.$id)->with('thongbao', 'Đã cập nhật người dùng thành công');
    }

    public function getXoa($id)
    {
    	$nguoidung = NguoiDung::find($id);
    	$nguoidung->delete();
    	return redirect('admin/nguoidung/danhsach')->with('thongbao', 'Đã xóa người dùng thành công');
    }

    public function getDangNhapAdmin()
    {
        return view('admin.login');
    }

    public function postDangNhapAdmin(Request $request)
    {
        $this->validate($request, 
            ['email'=>'required|email',
             'password'=>'required|min:5'], 
            ['email.required'=>'Bạn chưa nhập email',
             'email.email'=>'Email bạn nhập không hợp lệ',
             'password.required'=>'Bạn chưa nhập mật khẩu',
             'password.min'=>'Mật khẩu phải có tối thiểu 5 ký tự']);
        if (Auth::attempt(['email'=>$request->email, 'password'=>$request->password])) {
            return redirect('admin/sanpham/danhsach');
        }
        else {
            return redirect('admin/dangnhap')->with('thongbao', 'Đăng nhập thất bại email hoặc mật khẩu không chính xác');
        }
    }

    public function getDangXuatAdmin()
    {
        Auth::logout();
        return redirect('admin/dangnhap');
    }

    public function getDangNhap()
    {
        $dsloaisp = LoaiSanPham::all();
        $dsthuonghieu = ThuongHieu::all();
        return view('store.dangnhap',['dsloaisp' => $dsloaisp, 'dsthuonghieu' => $dsthuonghieu]);
    }

    public function postDangNhap(Request $request)
    {
        $this->validate($request, 
            ['password'=>'required|min:5'], 
            ['password.min'=>'Mật khẩu phải có tối thiểu 5 ký tự']);
        if (Auth::attempt(['email'=>$request->email, 'password'=>$request->password])) {
            return redirect('');
        }
        else {
            return redirect('dangnhap')->with('thongbao', 'Đăng nhập thất bại email hoặc mật khẩu không chính xác');
        }
    }

    public function getDangKy()
    {
        $dsloaisp = LoaiSanPham::all();
        $dsthuonghieu = ThuongHieu::all();
        return view('store.dangky',['dsloaisp' => $dsloaisp, 'dsthuonghieu' => $dsthuonghieu]);
    }

    public function postDangKy(Request $request)
    {
        $this->validate($request, 
            ['name'=>'required|min:2',
    		 'email'=>'required|email|unique:users,email',
    		 'password'=>'required|min:5',
    		 'passwordAgain'=>'required|same:password'], 
    		['name.required'=>'Bạn chưa nhập họ và tên',
    		 'name.min'=>'Họ và tên phải có tối thiểu 2 ký tự',
    		 'email.required'=>'Bạn chưa nhập email',
    		 'email.email'=>'Email bạn nhập không hợp lệ',
             'email.unique'=>'Email đã được sử dụng',
    		 'password.required'=>'Bạn chưa nhập mật khẩu',
    		 'password.min'=>'Mật khẩu phải có tối thiểu 5 ký tự',
    		 'passwordAgain.required'=>'Bạn chưa nhập lại mật khẩu',
    		 'passwordAgain.same'=>'Mật khẩu nhập lại không trùng khớp']);
        $nguoidung = new NguoiDung;
        $nguoidung->tennd = $request->name;
        $nguoidung->email = $request->email;
        $nguoidung->password = bcrypt($request->password);
        $nguoidung->maloaind = 3;
        $nguoidung->save();

        Auth::attempt(['email'=>$request->email, 'password'=>$request->password]);
        return redirect('');
    }

    public function DangXuat()
    {
        Auth::logout();
        return redirect('');
    }

    public function apiGetNguoiDung($id)
    {
        $nguoidung = NguoiDung::find($id);
        return $nguoidung;
    }

    public function apiPostDangNhap(Request $request)
    {
        if (Auth::attempt(['email'=>$request->email, 'password'=>$request->password])) {
            return Auth::user();
        }
        else {
            return "thatbai";
        }
    }

    public function apiPostDangKy(Request $request)
    {
        $nguoidung = new NguoiDung;
        $nguoidung->tennd = $request->name;
        $nguoidung->email = $request->email;
        $nguoidung->password = bcrypt($request->password);
        $nguoidung->maloaind = 3;
        $nguoidung->save();
        return "thanhcong";
    }
}
