@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Khuyến mãi
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
                        <th>Tên khuyến mãi</th>
                        <th>Hình khuyến mãi</th>
                        <th>Ngày bắt đầu</th>
                        <th>Ngày kết thúc</th>
                        <th>Cập nhật</th>
                        <th>Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($dskhuyenmai as $item)
                        <tr class="odd gradeX" align="center">
                            <td>{{$item -> id}}</td>
                            <td>{{$item -> tenkm}}</td>
                            <td><img src="{{$item -> hinhkm}}" class="img-rounded" alt="{{$item -> tenkm}}" width="100" height="100"></td>
                            <td>{{$item -> ngaybd}}</td>
                            <td>{{$item -> ngaykt}}</td>
                            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/khuyenmai/capnhat/{{$item -> id}}">Cập nhật</a></td>
                            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a onclick="return confirm('Bạn có chắc chắn muốn xóa?');" href="admin/khuyenmai/xoa/{{$item -> id}}">Xóa</a></td>
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
