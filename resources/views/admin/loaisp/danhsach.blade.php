@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Loại sản phẩm
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
                        <th>Tên loại sản phẩm</th>
                        <th>Hình loại sản phẩm</th>
                        <th>Nhóm loại sản phẩm</th>
                        <th>Ngày tạo</th>
                        <th>Ngày cập nhật</th>
                        <th>Cập nhật</th>
                        <th>Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($dsloaisp as $item)
                        <tr class="odd gradeX" align="center" data-href='admin/loaisp/capnhat/{{$item -> id}}'>
                            <td>{{$item -> id}}</td>
                            <td>{{$item -> tenloaisp}}</td>
                            <td><img src="{{$item -> hinhloaisp}}" class="img-rounded" alt="{{$item -> tenloaisp}}" width="100" height="100"></td>
                            <td>
                                @foreach($dsloaisp as $loaisp)
                                    @if($loaisp -> id == $item -> maloaicha)
                                        {{$loaisp -> tenloaisp}}
                                    @endif
                                @endforeach
                            </td>
                            <td>{{$item -> created_at}}</td>
                            <td>{{$item -> updated_at}}</td>
                            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/loaisp/capnhat/{{$item -> id}}">Cập nhật</a></td>
                            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a onclick="return confirm('Bạn có chắc chắn muốn xóa?');" href="admin/loaisp/xoa/{{$item -> id}}">Xóa</a></td>
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
