@extends('admin.layout.index')     

@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Sản phẩm
                    <small>{{$sanpham->tensp}}</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                @if(count($errors) > 0)
                    <div class="alert alert-danger">
                        @foreach($errors -> all() as $err)
                            {{$err}}<br/>
                        @endforeach
                    </div>
                @endif

                @if(session('thongbao'))
                    <div class="alert alert-success">
                        {{session('thongbao')}}
                    </div>
                @endif

                @if(session('loi'))
                    <div class="alert alert-warning">
                        {{session('loi')}}
                    </div>
                @endif
                <button type="button" class="btn btn-default btn-sm" onclick="location.href='admin/sanpham/danhsach';">
                    <span class="fa fa-chevron-left"></span> Trở về
                </button>
                <form action="admin/sanpham/capnhat/{{$sanpham -> id}}" method="POST" enctype="multipart/form-data" enctype="multipart/form-data">
                    <br/>
                    <input type="hidden" name="_token" value="{{csrf_token()}}" />
                    <div class="form-group">
                        <label>ID sản phẩm</label>
                        <input class="form-control" name="ten" value="{{$sanpham -> id}}" disabled/>
                    </div>
                    <div class="form-group">
                        <label>Tên sản phẩm</label>
                        <input class="form-control" name="ten" placeholder="Vui lòng điền tên sản phẩm" value="{{$sanpham -> tensp}}" />
                    </div>
                    <div class="form-group">
                        <label>Giá sản phẩm</label>
                        <input class="form-control" name="gia" type="number" placeholder="Vui lòng điền giá sản phẩm" value="{{$sanpham -> gia}}"/>
                    </div>
                    <div class="form-group">
                        <label>Số lượng sản phẩm</label>
                        <input class="form-control" name="soluong" type="number" placeholder="Vui lòng điền số lượng sản phẩm" value="{{$sanpham -> soluong}}" />
                    </div>
                    <div class="form-group">
                        <label>Loại sản phẩm</label>
                        <select class="form-control" name="idloaisp">
                            @foreach($dsloaisp as $loaisp)
                                <option 
                                        @if($sanpham->loaisanpham->id == $loaisp->id)
                                            {{"selected"}}
                                        @endif
                                    value="{{$loaisp -> id}}">{{$loaisp -> tenloaisp}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Thương hiệu</label>
                        <select class="form-control" name="idthuonghieu">
                            @foreach($dsthuonghieu as $thuonghieu)
                                <option 
                                    @if($sanpham->thuonghieu->id == $thuonghieu->id)
                                        {{"selected"}}
                                    @endif
                                    
                                value="{{$thuonghieu -> id}}">{{$thuonghieu -> tenth}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Mô tả sản phẩm</label>
                        <textarea class="form-control" rows="3" name="mota" placeholder="Vui lòng điền mô tả sản phẩm">{{$sanpham -> mota}}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Thêm hình sản phẩm</label>
                        <input type="file" class="form-control" name="hinh" />
                    </div>
                    <div class="form-group">
                        <label>Ngày tạo</label>
                        <input class="form-control" name="ten" value="{{$sanpham->created_at}}" disabled/>
                    </div>
                    <div class="form-group">
                        <label>Ngày cập nhật</label>
                        <input class="form-control" name="ten" value="{{$sanpham->updated_at}}" disabled/>
                    </div>
                    <button type="submit" class="btn btn-primary">Cập nhật</button>
                    <button type="reset" class="btn btn-default">Làm mới</button>
                <form>
            </div>
            <div>
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr align="center">
                            <th>ID</th>
                            <th>Hình sản phẩm</th>
                            <th>Cập nhật</th>
                            <th>Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($sanpham -> hinhsanpham as $hinh)
                            <tr class="odd gradeX" align="center">
                                <td>{{$hinh -> id}}</td>
                                <td><img src="{{$hinh -> duongdan}}" class="img-rounded" alt="{{$sanpham->tensp}}" width="100" height="100"></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i><a id="capnhat" href="admin/sanpham/capnhathinh/{{$hinh->id}}">Cập nhật</a></td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a onclick="return confirm('Bạn có chắc chắn muốn xóa?');" href="admin/sanpham/xoahinh/{{$hinh->id}}">Xóa</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection