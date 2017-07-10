@extends('admin.layout.index')    

@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Khuyến mãi
                    <small>{{$khuyenmai->tenkm}}</small>
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

                <button type="button" class="btn btn-default btn-sm" onclick="location.href='admin/khuyenmai/danhsach';">
                    <span class="fa fa-chevron-left"></span> Trở về
                </button>
                <form action="admin/khuyenmai/capnhat/{{$khuyenmai->id}}" method="POST">
                    <br/>
                    <input type="hidden" name="_token" value="{{csrf_token()}}" />
                    <div class="form-group">
                        <label>ID khuyến mãi</label>
                        <input class="form-control" name="id" value="{{$khuyenmai -> id}}" disabled/>
                    </div>
                    <div class="form-group">
                        <label>Tên khuyến mãi</label>
                        <input class="form-control" name="tenkm" placeholder="Vui lòng điền tên khuyến mãi" value="{{$khuyenmai->tenkm}}" />
                    </div>
                    <div class="form-group">
                        <label>Hình khuyến mãi</label>
                        <input type="file" class="form-control" name="hinh" />
                        <br/>
                        <img src="{{$khuyenmai -> hinhkm}}" class="img-rounded" alt="{{$khuyenmai -> tenkm}}" width="300" height="300" />
                    </div>
                    <div class="form-group">
                        <label>Ngày bắt đầu</label>
                        <input type="date" class="form-control" name="ngaybd" value="{{$khuyenmai->ngaybd}}" />
                    </div>
                    <div class="form-group">
                        <label>Ngày kết thúc</label>
                        <input type="date" class="form-control" name="ngaykt" value="{{$khuyenmai->ngaykt}}" />
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