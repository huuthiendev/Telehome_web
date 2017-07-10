@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Người dùng
                    <small>Danh sách</small>
                </h1>
            </div>
            <div class="col-lg-12">
                @if(session('thongbao'))
                    <div class="alert alert-success">
                        {{session('thongbao')}}
                    </div>
                @endif
            </div>
            <!-- /.col-lg-12 -->
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>Họ và tên</th>
                        <th>Email</th>
                        <th>Quyền</th>
                        <th>Địa chỉ</th>
                        <th>Ngày sinh</th>
                        <th>Số điện thoại</th>
                        <th>Giới tính</th>
                        <th>Cập nhật</th>
                        <th>Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($dsnguoidung as $item)
                        <tr class="odd gradeX" align="center">
                            <td>{{$item -> id}}</td>
                            <td>{{$item -> tennd}}</td>
                            <td>{{$item -> email}}</td>
                            <td>{{$item -> loainguoidung -> tenloaind}}</td>
                            <td>{{$item -> diachi}}</td>
                            <td>{{$item -> ngaysinh}}</td>
                            <td>{{$item -> sdt}}</td>
                            <td>
                                @if($item -> gioitinh == 1) 
                                    Nam
                                @elseif($item -> gioitinh == 0) 
                                    Nữ
                                @endif
                            </td>
                            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/nguoidung/capnhat/{{$item -> id}}">Cập nhật</a></td>
                            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a onclick="return confirm('Bạn có chắc chắn muốn xóa?');" href="admin/nguoidung/xoa/{{$item -> id}}">Xóa</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
@endsection
