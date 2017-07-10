@extends('admin.layout.index')     

@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Sản phẩm
                    <small>Thêm mới</small>
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
                <form action="admin/sanpham/them" method="POST" enctype="multipart/form-data">
                    <br/>
                    <input type="hidden" name="_token" value="{{csrf_token()}}" />
                    <div class="form-group">
                        <label>Tên sản phẩm</label>
                        <input class="form-control" name="ten" placeholder="Vui lòng điền tên sản phẩm" />
                    </div>
                    <div class="form-group">
                        <label>Loại sản phẩm</label>
                        <select class="form-control" name="idloaisp">
                            @foreach($dsloaisp as $loaisp)
                                <option value="{{$loaisp -> id}}">{{$loaisp -> tenloaisp}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Thương hiệu</label>
                        <select class="form-control" name="idthuonghieu">
                            @foreach($dsthuonghieu as $thuonghieu)
                                <option value="{{$thuonghieu -> id}}">{{$thuonghieu -> tenth}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Giá sản phẩm</label>
                        <input class="form-control" name="gia" type="number" placeholder="Vui lòng điền giá sản phẩm" />
                    </div>
                    <div class="form-group">
                        <label>Số lượng sản phẩm</label>
                        <input class="form-control" name="soluong" type="number" placeholder="Vui lòng điền số lượng sản phẩm" />
                    </div>
                    <div class="form-group">
                        <label>Mô tả sản phẩm</label>
                        <textarea class="form-control" rows="3" name="mota" placeholder="Vui lòng điền mô tả sản phẩm"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Hình sản phẩm</label>
                        <input type="file" class="form-control" name="hinhs[]" multiple/>
                    </div>
                    <button type="submit" class="btn btn-primary">Thêm</button>
                    <button type="reset" class="btn btn-default">Làm mới</button>
                <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection