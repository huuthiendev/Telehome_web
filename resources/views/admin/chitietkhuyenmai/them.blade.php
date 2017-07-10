@extends('admin.layout.index')    

@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Chi tiết khuyến mãi
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
                <button type="button" class="btn btn-default btn-sm" onclick="location.href='admin/chitietkhuyenmai/danhsach';">
                    <span class="fa fa-chevron-left"></span> Trở về
                </button>
                <form action="admin/chitietkhuyenmai/them" method="POST" enctype="multipart/form-data">
                    <br/>
                    <input type="hidden" name="_token" value="{{csrf_token()}}" />
                    <div class="form-group">
                        <label>Chọn khuyến mãi</label>
                        <select class="form-control" name="makm">
                            @foreach($dskhuyenmai as $khuyenmai)
                                <option value="{{$khuyenmai -> id}}">{{$khuyenmai -> tenkm}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Chọn sản phẩm</label>
                        <select class="form-control" name="masp">
                            @foreach($dssanpham as $sanpham)
                                <option value="{{$sanpham -> id}}">{{$sanpham -> tensp}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Phần trăm khuyến mãi</label>
                        <input type="number" class="form-control" name="phantramkm" placeholder="Vui lòng điền phần trăm khuyến mãi" />
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