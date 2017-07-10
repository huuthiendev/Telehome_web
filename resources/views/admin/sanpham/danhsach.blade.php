@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Sản phẩm
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
                        <th>Tên sản phẩm</th>
                        <th>Giá</th>
                        <th>Loại sản phẩm</th>
                        <th>Thương hiệu</th>
                        <th>Hình sản phẩm</th>
                        <th>Số lượng</th>
                        <th>Lượt mua</th>
                        <th>Cập nhật</th>
                        <th>Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($dssanpham as $item)
                        <a href="admin/sanpham/sua/{{$item -> id}}">
                            <tr class="odd gradeX" align="center">
                                <td>{{$item -> id}}</td>
                                <td>{{$item -> tensp}}</td>
                                <td>{{{number_format($item -> gia)}}}<u>đ</u></td>
                                <td>{{$item -> loaisanpham -> tenloaisp}}</td>
                                <td>{{$item -> thuonghieu -> tenth}}</td>
                                <td><img src="{{$item -> hinhsanpham -> first() -> duongdan}}" class="img-rounded" alt="{{$item -> tenSP}}" width="100" height="100"></td>
                                <td>{{$item -> soluong}}</td>
                                <td>{{$item -> luotmua}}</td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/sanpham/capnhat/{{$item -> id}}">Cập nhật</a></td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a onclick="return confirm('Bạn có chắc chắn muốn xóa?');" href="admin/sanpham/xoa/{{$item -> id}}">Xóa</a></td>
                            </tr>
                        </a>
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
