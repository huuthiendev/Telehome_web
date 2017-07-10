@extends('admin.layout.index')    

@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Thương hiệu
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
                <button type="button" class="btn btn-default btn-sm" onclick="location.href='admin/thuonghieu/danhsach';">
                    <span class="fa fa-chevron-left"></span> Trở về
                </button>
                <form action="admin/thuonghieu/them" method="POST" enctype="multipart/form-data">
                    <br/>
                    <input type="hidden" name="_token" value="{{csrf_token()}}" />
                    <div class="form-group">
                        <label>Tên thương hiệu</label>
                        <input class="form-control" name="ten" placeholder="Vui lòng điền tên thương hiệu" />
                    </div>
                    <div class="form-group">
                        <label>Hình thương hiệu</label>
                        <input type="file" class="form-control" name="hinh" />
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