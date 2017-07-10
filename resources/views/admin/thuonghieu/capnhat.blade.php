@extends('admin.layout.index')    

@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Nhà sản xuất
                    <small>{{$thuonghieu->tenth}}</small>
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

                <button type="button" class="btn btn-default btn-sm" onclick="location.href='admin/thuonghieu/danhsach';">
                    <span class="fa fa-chevron-left"></span> Trở về
                </button>
                <form action="admin/thuonghieu/capnhat/{{$thuonghieu->id}}" method="POST">
                    <br/>
                    <input type="hidden" name="_token" value="{{csrf_token()}}" />
                    <div class="form-group">
                        <label>ID thương hiệu</label>
                        <input class="form-control" name="ten" value="{{$thuonghieu -> id}}" disabled/>
                    </div>
                    <div class="form-group">
                        <label>Tên thương hiệu</label>
                        <input class="form-control" name="ten" placeholder="Vui lòng điền tên thương hiệu" value="{{$thuonghieu->tenth}}" />
                    </div>
                    <div class="form-group">
                        <label>Hình thương hiệu</label>
                        <input type="file" class="form-control" name="hinh" />
                        <br/>
                        <img src="{{$thuonghieu -> hinhth}}" class="img-rounded" alt="{{$thuonghieu -> tenth}}" width="300" height="300" />
                    </div>
                    <div class="form-group">
                        <label>Ngày tạo</label>
                        <input class="form-control" name="ten" value="{{$thuonghieu->created_at}}" disabled/>
                    </div>
                    <div class="form-group">
                        <label>Ngày cập nhật</label>
                        <input class="form-control" name="ten" value="{{$thuonghieu->updated_at}}" disabled/>
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