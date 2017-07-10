@extends('admin.layout.index')    

@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Người dùng
                    <small>{{$nguoidung->tennd}}</small>
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

                <button type="button" class="btn btn-default btn-sm" onclick="location.href='admin/nguoidung/danhsach';">
                    <span class="fa fa-chevron-left"></span> Trở về
                </button>
                <form action="admin/nguoidung/capnhat/{{$nguoidung->id}}" method="POST">
                    <br/>
                    <input type="hidden" name="_token" value="{{csrf_token()}}" />
                    <div class="form-group">
                        <label>Họ và tên</label>
                        <input class="form-control" name="name" value="{{$nguoidung->tennd}}" placeholder="Vui lòng điền họ và tên" />
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" value="{{$nguoidung->email}}" placeholder="Vui lòng điền email"disabled/>
                    </div>
                    <div class="form-group">
                        <label>Địa chỉ</label>
                        <input class="form-control" name="diachi" value="{{$nguoidung->diachi}}" placeholder="Vui lòng điền địa chỉ" />
                    </div>
                    <div class="form-group">
                        <label>Ngày sinh</label>
                        <input type="date" class="form-control" name="ngaysinh" value="{{$nguoidung->ngaysinh}}" placeholder="Vui lòng điền ngày sinh" />
                    </div>
                    <div class="form-group">
                        <label>Số điện thoại</label>
                        <input type="number" class="form-control" name="sdt" value="{{$nguoidung->sdt}}" placeholder="Vui lòng điền số điện thoại" />
                    </div>
                    <div class="form-group">
                        <label>Giới tính</label><br/>
                        <label class="radio-inline">
                            <input name="gioitinh" value="1" type="radio" 
                            @if($nguoidung -> gioitinh == 1)
                                checked
                            @endif/> Nam
                        </label>
                        <label class="radio-inline">
                            <input name="gioitinh" value="0" type="radio"
                            @if($nguoidung -> gioitinh == 0)
                                checked
                            @endif/> Nữ
                        </label>
                    </div>
                    <div class="form-group">
                        <label>Loại người dùng</label><br/>
                        @foreach($dsloaind as $loaind)
                            <label class="radio-inline">
                                <input name="maloaind" value="{{$loaind -> id}}" type="radio"
                                    @if($nguoidung -> maloaind == $loaind -> id) 
                                        checked
                                    @endif
                                />{{$loaind -> tenloaind}}
                            </label>
                        @endforeach
                    </div>
                    <div class="form-group">
                        <input type="checkbox" id="changePassword" name="changePassword">
                        <label>Đổi mật khẩu</label>

                        <input class="form-control password" type="password" name="password" placeholder="Vui lòng điền mật khẩu" disabled="" />
                    </div>
                    <div class="form-group">
                        <label>Nhập lại mật khẩu</label>
                        <input class="form-control password" type="password" name="passwordAgain" placeholder="Vui lòng nhập lại mật khẩu" disabled="" />
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

@section('script')
    <script>
        $(document).ready(function() {
            $('#changePassword').change(function(){
                if($(this).is(':checked'))
                {
                    $('.password').removeAttr('disabled');
                }
                else 
                {
                    $('.password').attr('disabled','');
                }
            });
        });
    </script>
@endsection
