@extends('admin.layout.index')    

@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Loại người dùng
                    <small>{{$loaind->tenloaind}}</small>
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

                <button type="button" class="btn btn-default btn-sm" onclick="location.href='admin/loainguoidung/danhsach';">
                    <span class="fa fa-chevron-left"></span> Trở về
                </button>
                <form action="admin/loainguoidung/capnhat/{{$loaind->id}}" method="POST">
                    <br/>
                    <input type="hidden" name="_token" value="{{csrf_token()}}" />
                    <div class="form-group">
                        <label>ID loại người dùng</label>
                        <input class="form-control" name="ten" value="{{$loaind -> id}}" disabled/>
                    </div>
                    <div class="form-group">
                        <label>Tên loại người dùng</label>
                        <input class="form-control" name="ten" placeholder="Vui lòng điền tên loại người dùng" value="{{$loaind->tenloaind}}" />
                    </div>
                    <div class="form-group">
                        <label>Ngày tạo</label>
                        <input class="form-control" name="ten" value="{{$loaind->created_at}}" disabled/>
                    </div>
                    <div class="form-group">
                        <label>Ngày cập nhật</label>
                        <input class="form-control" name="ten" value="{{$loaind->updated_at}}" disabled/>
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