@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Hóa đơn
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
                        <th>Tên người mua</th>
                        <th>Số điện thoại</th>
                        <th>Địa chỉ</th>
                        <th>Tổng tiền</th>
                        <th>Trạng thái</th>
                        <th>Ngày mua</th>
                        <th>Ngày cập nhật</th>
                        <th>Xem chi tiết</th>
                        <th>Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($dshoadon as $item)
                        <tr class="odd gradeX" align="center">
                            <td>{{$item -> id}}</td>
                            <td>{{$item -> nguoidung -> tennd}}</td>
                            <td>{{$item -> sdt}}</td>
                            <td>{{$item -> diachi}}</td>
                            <td>{{{number_format($item -> tongtien)}}}<u>đ</u></td>
                            <td>
                                @if($item -> trangThai == 0)
                                    {{"Chờ xữ lý"}}
                                @elseif($item -> trangThai == 1)
                                    {{"Đã xữ lý"}}
                                @else 
                                    {{"Đã giao"}}
                                @endif
                            </td>
                            <td>{{$item -> created_at}}</td>
                            <td>{{$item -> updated_at}}</td>
                            <td class="center"><i class="fa fa-list-alt fa-fw"></i> <a href="admin/hoadon/chitiet/{{$item -> id}}">Xem chi tiết</a></td>
                            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a onclick="return confirm('Bạn có chắc chắn muốn xóa?');" href="admin/hoadon/xoa/{{$item -> id}}">Xóa</a></td>
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
