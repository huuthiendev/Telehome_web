@extends('admin.layout.index')     

@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Hình sản phẩm
                    <small>Cập nhật</small>
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
                <button type="button" class="btn btn-default btn-sm" onclick="location.href='admin/sanpham/capnhat/{{$hinhsanpham->masp}}';">
                    <span class="fa fa-chevron-left"></span> Trở về
                </button>
                <form action="admin/sanpham/capnhathinh/{{$hinhsanpham -> id}}" method="POST" enctype="multipart/form-data">
                    <br/>
                    <input type="hidden" name="_token" value="{{csrf_token()}}" />
                    <div class="form-group">
                        <label>ID hình sản phẩm</label>
                        <input class="form-control" name="id" value="{{$hinhsanpham -> id}}" disabled/>
                    </div>
                    <div class="form-group">
                        <label>ID sản phẩm</label>
                        <input class="form-control" name="masp" value="{{$hinhsanpham -> masp}}" disabled/>
                    </div>
                    <div class="form-group">
                        <label>Hình sản phẩm</label>
                        <input type="file" class="form-control" name="hinh" />
                        <br/>
                        <img src="{{$hinhsanpham -> duongdan}}" class="img-rounded" alt="{{$hinhsanpham -> sanpham -> tensp}}" width="300" height="300" />
                    </div>
                    <button type="submit" class="btn btn-primary">Cập nhật</button>
                    <button type="reset" class="btn btn-default">Làm mới</button>
                <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection