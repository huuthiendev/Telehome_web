@extends('admin.layout.index')    

@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Chi tiết khuyến mãi
                    <small>{{$ctkhuyenmai->khuyenmai->tenkm}}</small>
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

                <button type="button" class="btn btn-default btn-sm" onclick="location.href='admin/chitietkhuyenmai/danhsach';">
                    <span class="fa fa-chevron-left"></span> Trở về
                </button>
                <form action="admin/chitietkhuyenmai/capnhat/{{$ctkhuyenmai->id}}" method="POST">
                    <br/>
                    <input type="hidden" name="_token" value="{{csrf_token()}}" />
                    <div class="form-group">
                        <label>ID chi tiết khuyến mãi</label>
                        <input class="form-control" name="id" value="{{$ctkhuyenmai -> id}}" disabled/>
                    </div>
                    <div class="form-group">
                        <label>Tên khuyến mãi</label>
                        <select class="form-control" name="makm">
                            @foreach($dskhuyenmai as $khuyenmai)
                                <option
                                    @if($khuyenmai -> id == $ctkhuyenmai -> makm)
                                        {{"selected"}}
                                    @endif
                                    value="{{$khuyenmai -> id}}">{{$khuyenmai -> tenkm}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Sản phẩm khuyến mãi</label>
                        <select class="form-control" name="masp">
                            @foreach($dssanpham as $sanpham)
                                <option 
                                    @if($sanpham -> id == $ctkhuyenmai -> masp)
                                        {{"selected"}}
                                    @endif
                                    value="{{$sanpham -> id}}">{{$sanpham -> tensp}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Phần trăm khuyến mãi</label>
                        <input class="form-control" name="phantramkm" value="{{$ctkhuyenmai -> phantramkm}}" />
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