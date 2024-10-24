@extends('layouts.admins')
@section('title')
    ADMIN
@endsection
@section('css')
    {{-- CSS --}}
    <style>
        .modal-dialog {
            max-width: 700px !important;
        }
        .modal-content {
            max-width: 700px !important;
        }
        .custom-file-upload {
            border: 1px solid #ccc;
            display: inline-block;
            padding: 6px 12px;
            text-align: center;
            width: 100%;
            height: 100%;
            align-content: center;
        }
        #image_san_pham {
            margin: 0px;
            padding: 0px;
            width: 100%;
            height: 100%;
            max-height: 248px;
            object-fit: cover;
        }
    </style>
@endsection
@section('content')
    {{-- CONTENT --}}
    <div class="be-content">
        <div class="row">
            <div class="page-head col">
                <h2 class="page-head-title">Chi tiết</h2>
                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb page-head-nav">
                        <li class="breadcrumb-item"><a href="#">Quản lý tài khoản</a></li>
                        <li class="breadcrumb-item active">Người dùng</li>
                        <li class="breadcrumb-item active">Chi tiết</li>
                    </ol>
                </nav>
            </div>
            <div class="col-4 p-3">
                @if (session('success'))
                    <div id="successAlert" class="alert alert-success alert-dismissible" role="alert">
                        <a class="close" type="button" data-dismiss="alert" aria-label="Close"><span class="mdi mdi-close" aria-hidden="true"></span></a>
                        <div class="icon"><span class="mdi mdi-check"></span></div>
                        <div class="message"><strong>Thông báo!</strong> {{session('success')}}</div>
                    </div>
                @elseif (session('warning'))
                    <div id="warningAlert" class="alert alert-warning alert-dismissible" role="alert">
                        <a class="close" type="button" data-dismiss="alert" aria-label="Close"><span class="mdi mdi-close" aria-hidden="true"></span></a>
                        <div class="icon"><span class="mdi mdi-alert-circle-o"></span></div>
                        <div class="message"><strong>Thông báo!</strong> {{session('warning')}}</div>
                    </div>
                @elseif (session('error'))
                    <div id="warningAlert" class="alert alert-danger alert-dismissible" role="alert">
                        <a class="close" type="button" data-dismiss="alert" aria-label="Close"><span class="mdi mdi-close" aria-hidden="true"></span></a>
                        <div class="icon"><span class="mdi mdi-alert-triangle"></span></div>
                        <div class="message"><strong>Thông báo!</strong> {{session('error')}}</div>
                    </div>
                @endif
            </div>
        </div>
        <div class="main-content container-fluid">
            <div class="user-profile">
                <div class="row">
                    <div class="col-lg-5">
                        <div class="user-display">
                            <div class="user-display-bg">
                                <img src="{{ asset('assets/admins/img/user-profile-display.png') }}" alt="Profile Background">
                            </div>
                            <div class="user-display-bottom">
                                <div class="user-display-avatar">
                                    @if ($user->image != null && Storage::disk('public')->exists($user->image))
                                        <img style="object-fit: cover;" src="{{ Storage::url($user->image) }}" alt="Avatar">
                                    @else
                                        <img src="{{ asset('assets/admins/img/avatar-150.png') }}" alt="Avatar">
                                    @endif
                                </div>
                                <div class="user-display-info">
                                <div class="name">{{$user->name}}</div>
                                <div class="nick"><span class="mdi mdi-email"></span> {{$user->email}}</div>
                                </div>
                                <div class="row user-display-details">
                                <div class="col-4">
                                    <div class="title"></div>
                                    <div class="counter"></div>
                                </div>
                                <div class="col-4">
                                    <div class="title"></div>
                                    <div class="counter"></div>
                                </div>
                                <div class="col-4">
                                    <div class="title"></div>
                                    <div class="counter"></div>
                                </div>
                                </div>
                            </div>
                        </div>
                        <div class="user-info-list card">
                        <div class="card-header card-header-divider">
                            Thông tin <span class="tools">
                                <button title="Sửa" class="btn p-0 m-0" style="box-shadow: none !important" data-toggle="modal" data-target="#md-user-edit" type="button">
                                    <i class="icon mdi mdi-edit"></i>
                                </button>
                            </span><span class="card-subtitle"></span>
                        </div>
                        {{-- Sửa user --}}
                        <div class="modal fade" id="md-user-edit" tabindex="-1" role="dialog">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form action="{{ route('wp-admin.user.update',$user->id) }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="modal-header">
                                            <button class="close" type="button" data-dismiss="modal" aria-hidden="true"><span class="mdi mdi-close"></span></button>
                                        </div>
                                        <div class="modal-body">
                                            <h2 class="text-center mt-0 mb-5">Sửa tài khoản</h2>
                                            <div class="row">
                                                <div class="col-8">
                                                    <div class="form-group">
                                                        <label class="form-label" for="name">Tên tài khoản <span class="text-danger">*</span></label>
                                                        <input class="form-control form-control-sm" type="text" name="name" id="name" placeholder="Họ & tên" value="{{$user->name}}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="form-label" for="email">Email <span class="text-danger">*</span></label>
                                                        <input class="form-control form-control-sm" type="email" name="email" id="email" placeholder="abc@gmail.com" value="{{$user->email}}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="form-label" for="phone_number">Số điện thoại <span class="text-danger">*</span></label>
                                                        <input class="form-control form-control-sm" type="text" name="phone_number" id="phone_number" placeholder="+(000)-000-000" value="{{$user->phone_number}}">
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <label for="image" class="custom-file-upload p-0">
                                                        <span class="text-img"><i class="mdi mdi-collection-image-o"></i> Avata</span>
                                                        <img id="image_san_pham" src="" alt="Hình ảnh sản phầm" style="display: none">
                                                    </label>
                                                    <input type="file" id="image" name="image" style="display: none;" onchange="showImage(event)" accept="image/*"/>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col form-group">
                                                    <label class="form-label" for="birthday">Ngày sinh </label>
                                                    <input class="form-control form-control-sm" type="date" name="birthday" id="birthday" placeholder="dd-mm-yyyy" value="{{$user->birthday}}">
                                                </div>
                                                <div class="col form-group">
                                                    <label class="form-label" for="gender">Giới tính <span class="text-danger">*</span></label>
                                                    <select name="gender" class="form-control form-control-sm" id="gender">
                                                        <option {{$user->gender=="Nam"?"selected":""}} value="Nam">Nam</option>
                                                        <option {{$user->gender=="Nữ"?"selected":""}} value="Nữ">Nữ</option>
                                                        <option {{$user->gender=="Khác"?"selected":""}} value="Khác">Khác</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col form-group">
                                                    <label class="form-label" for="role">Chức vụ <span class="text-danger">*</span></label>
                                                    <select @if(Auth::user()->role !== "Quản lý") disabled @endif name="role" class="form-control form-control-sm" id="role">
                                                        <option {{$user->role=="Quản lý"?"selected":""}} value="Quản lý">Quản lý</option>
                                                        <option {{$user->role=="Nhân viên"?"selected":""}} value="Nhân viên">Nhân viên</option>
                                                        <option {{$user->role=="Khách hàng"?"selected":""}} value="Khách hàng">Khách hàng</option>
                                                    </select>
                                                </div>
                                                <div class="col form-group">
                                                    <label class="form-label" for="status">Trạng thái <span class="text-danger">*</span></label>
                                                    <select name="status" class="form-control form-control-sm" id="status">
                                                        <option {{$user->status=="Hoạt động"?"selected":""}} value="Hoạt động">Hoạt động</option>
                                                        <option {{$user->status=="Đã khóa"?"selected":""}} value="Đã khóa">Đã khóa</option>
                                                        <option {{$user->status=="Xóa"?"selected":""}} value="Xóa">Xóa</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Hủy</button>
                                            <button class="btn btn-success" type="submit" value="true" name="user-update">Lưu</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="no-border no-strip skills">
                            <tbody class="no-border-x no-border-y">
                                <tr>
                                    <td class="icon"><span class="mdi mdi-code"></span></td>
                                    <td class="item">Mã khách hàng<span class="icon s7-portfolio"></span></td>
                                    <td>{{$user->user_code}}</td>
                                </tr>
                                <tr>
                                    <td class="icon"><span class="mdi mdi-cake"></span></td>
                                    <td class="item">Ngày sinh<span class="icon s7-gift"></span></td>
                                    <td>
                                        @if ($user->birthday != null)
                                        {{$user->birthday}}
                                        @else
                                            dd-mm-yyyy
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td class="icon">
                                        <span class="mdi mdi-account"></span>
                                    </td>
                                    <td class="item">Giới tính<span class="icon s7-gift"></span></td>
                                    <td>{{Auth::user()->gender}}</td>
                                </tr>
                                <tr>
                                    <td class="icon"><span class="mdi mdi-local-phone"></span></td>
                                    <td class="item">Số điện thoại<span class="icon s7-phone"></span></td>
                                    <td>{{$user->phone_number}}</td>
                                </tr>
                                <tr>
                                    <td class="icon"><span class="mdi mdi-label"></span></td>
                                    <td class="item">Chức vụ<span class="icon s7-map-marker"></span></td>
                                    <td>
                                        {{$user->role}}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="icon">
                                        @if ($user->status == 'Hoạt động')
                                            <span class="mdi mdi-check-circle"></span>
                                        @elseif ($user->status == 'Đã khóa')
                                            <span class="mdi mdi-lock"></span>
                                        @else
                                            <span class="mdi mdi-delete"></span>
                                        @endif
                                    </td>
                                    <td class="item">Trạng thái<span class="icon s7-global"></span></td>
                                    <td>
                                        <span class="@if ($user->status == 'Hoạt động') text-success @elseif ($user->status == 'Đã khóa') text-secondary @else text-danger @endif">
                                            {{$user->status}}
                                        </span>
                                    </td>
                                </tr>
                            </tbody>
                            </table>
                        </div>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="row">
                            <div class="col-12 col-lg-12 col-xl-6">
                                <div class="widget widget-tile hda">
                                    <div class="chart sparkline" id="spark1"></div>
                                    <div class="data-info">
                                        <div class="desc">New Users</div>
                                        <div class="value"><span class="indicator indicator-equal mdi mdi-chevron-right"></span><span class="number" data-toggle="counter" data-end="113">0</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-lg-12 col-xl-6">
                                <div class="widget widget-tile hda">
                                    <div class="chart sparkline" id="spark2"></div>
                                    <div class="data-info">
                                        <div class="desc">Monthly Sales</div>
                                        <div class="value"><span class="indicator indicator-positive mdi mdi-chevron-up"></span><span class="number" data-toggle="counter" data-end="80" data-suffix="%">0</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-lg-12 col-xl-6">
                                <div class="widget widget-tile hda">
                                    <div class="chart sparkline" id="spark3"></div>
                                    <div class="data-info">
                                        <div class="desc">Impressions</div>
                                        <div class="value"><span class="indicator indicator-positive mdi mdi-chevron-up"></span><span class="number" data-toggle="counter" data-end="532">0</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-lg-12 col-xl-6">
                                <div class="widget widget-tile hda">
                                    <div class="chart sparkline" id="spark4"></div>
                                    <div class="data-info">
                                        <div class="desc">Downloads</div>
                                        <div class="value"><span class="indicator indicator-negative mdi mdi-chevron-down"></span><span class="number" data-toggle="counter" data-end="113">0</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="widget widget-fullwidth widget-small">
                            <div class="widget-head pb-6">
                                <div class="tools">
                                    <button class="btn btn-space btn-outline-success btn-space" data-toggle="modal" data-target="#md-footer-success" type="button">Thêm mới địa chỉ <i class=" mdi mdi-pin-drop"></i></button>
                                </div>
                                <div class="title">Địa chỉ</div>
                            </div>
                            <div class="row m-0 p-0">
                                <div class="col-12 col-lg-12">
                                    <div class="accordion" id="accordion">
                                    @foreach ($user->location as $key => $location)
                                        <div class="card">
                                            <div class="card-header" id="heading{{$key}}">
                                                <div class="" data-toggle="collapse" data-target="#collapse{{$key}}" aria-expanded="false" aria-controls="collapse{{$key}}">
                                                    <button class="btn">
                                                        <i class="icon mdi mdi-chevron-right"></i>{{$location->location_name}} @if ($location->status) <span class="badge badge-primary">mặc định</span> @endif
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="collapse" id="collapse{{$key}}" aria-labelledby="heading{{$key}}" data-parent="#accordion">
                                                <div class="card-body" style="border-top: 1px solid #d9d9d9;">
                                                    <div class="user-info-list">
                                                        <div class="card-body">
                                                            <table class="no-border no-strip skills">
                                                            <tbody class="no-border-x no-border-y">
                                                                <tr>
                                                                    <td class="icon"><span class="mdi mdi-gesture"></span></td>
                                                                    <td class="item">Tên người nhận<span class="icon s7-portfolio"></span></td>
                                                                    <td>{{ $location->user_name }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="icon"><span class="mdi mdi-local-phone"></span></td>
                                                                    <td class="item">Số điện thoại<span class="icon s7-portfolio"></span></td>
                                                                    <td>{{ $location->phone_number }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="icon"><span class="mdi mdi-pin"></span></td>
                                                                    <td class="item">Địa chỉ<span class="icon s7-portfolio"></span></td>
                                                                    <td>{{$location->city_province}} - {{$location->district}} - {{$location->commune}} - {{$location->location_detail}}</td>
                                                                </tr>
                                                            </tbody>
                                                            </table>
                                                        </div>
                                                        <div style="text-align: end;">
                                                            <button class="btn btn-space btn-outline-danger btn-space" data-toggle="modal" data-target="#md-footer-delete{{$key}}" type="button">Xóa</button>
                                                            <div class="modal fade" id="md-footer-delete{{$key}}" tabindex="-1" role="dialog">
                                                                <div class="modal-dialog">
                                                                  <div class="modal-content">
                                                                    <div class="modal-header">
                                                                      <button class="close" type="button" data-dismiss="modal" aria-hidden="true"><span class="mdi mdi-close"></span></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                      <div class="text-center">
                                                                        <div class="text-danger"><span class="modal-main-icon mdi mdi-alert-circle-o"></span></div>
                                                                        <h3>Thông báo!</h3>
                                                                        <p>Bạn đang thực hiện xóa địa chỉ: <strong>{{$location->location_name}}</strong><br>Bạn chắc chắn muốn xóa địa chỉ này!</p>
                                                                      </div>
                                                                    </div>
                                                                    <form action="{{route('wp-admin.location.delete',$location->id)}}" method="POST">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <div class="modal-footer">
                                                                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Hủy</button>
                                                                            <button class="btn btn-danger" type="submit" name="delete-location">Xóa</button>
                                                                          </div>
                                                                    </form>
                                                                  </div>
                                                                </div>
                                                            </div>
                                                            @if (!$location->status)
                                                                <form class="m-0 p-0 btn" style="box-shadow: none;" action="{{route('wp-admin.location.update',$location->id)}}" method="POST">
                                                                    @csrf
                                                                    @method('PUT')
                                                                    <button class="btn btn-space btn-outline-info btn-space" type="submit" name="up-nomal">Đặt làm mặc định</button>
                                                                </form>
                                                            @endif
                                                            <button class="btn btn-space btn-outline-success btn-space" data-toggle="modal" data-target="#md-footer-update{{$key}}" type="button">Sửa</button>
                                                            {{-- Sửa --}}
                                                            <div class="modal fade" id="md-footer-update{{$key}}" tabindex="-1" role="dialog" style="text-align: start;">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <form action="{{ route('wp-admin.location.update',$location->id) }}" method="post">
                                                                            @csrf
                                                                            @method('PUT')
                                                                            <div class="modal-header">
                                                                                <button class="close" type="button" data-dismiss="modal" aria-hidden="true"><span class="mdi mdi-close"></span></button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <div class="container">
                                                                                    <h2 class="text-center mt-0 mb-5">Sửa địa chỉ</h2>
                                                                                    <div class="form-group">
                                                                                        <label class="form-label" for="location_name">Tên địa chỉ</label>
                                                                                        <input class="form-control form-control-sm" type="text" name="location_name" id="location_name" placeholder="Tên địa chỉ" value="{{ $location->location_name }}">
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label class="form-label" for="user_name">Tên người nhận</label>
                                                                                        <input class="form-control form-control-sm" type="text" name="user_name" id="user_name" placeholder="Họ & tên" value="{{$location->user_name}}">
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label class="form-label" for="phone_number">Số điện thoại</label>
                                                                                        <input class="form-control form-control-sm" type="text" name="phone_number" id="phone_number" placeholder="+(00)-0000-0000" value="{{$location->phone_number}}">
                                                                                    </div>
                                                                                    <div class="row">
                                                                                        <div class="form-group col">
                                                                                            <label class="form-label" for="city_province">Tỉnh/Thành phố</label>
                                                                                            <input class="form-control form-control-sm" type="text" name="city_province" id="city_province" placeholder="city_province" value="{{$location->city_province}}">
                                                                                        </div>
                                                                                        <div class="form-group col">
                                                                                            <label class="form-label" for="district">Quận/Huyện</label>
                                                                                            <input class="form-control form-control-sm" type="text" name="district" id="district" placeholder="district" value="{{$location->district}}">
                                                                                        </div>
                                                                                        <div class="form-group col">
                                                                                            <label class="form-label" for="commune">Xã</label>
                                                                                            <input class="form-control form-control-sm" type="text" name="commune" id="commune" placeholder="commune" value="{{$location->commune}}">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label class="form-label" for="location_detail">Địa chỉ chi tiết</label>
                                                                                        <textarea class="form-control form-control-sm" name="location_detail" id="location_detail" cols="30" rows="3">{{$location->location_detail}}</textarea>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Hủy</button>
                                                                                <button class="btn btn-success" type="submit" name="location-update">Lưu</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    </div>
                                  </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="md-footer-success" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('wp-admin.user.update',$user->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="modal-header">
                        <button class="close" type="button" data-dismiss="modal" aria-hidden="true"><span class="mdi mdi-close"></span></button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <h2 class="text-center mt-0 mb-5">Thêm địa chỉ</h2>
                            <div class="form-group">
                                <label class="form-label" for="location_name">Tên địa chỉ</label>
                                <input class="form-control form-control-sm" type="text" name="location_name" id="location_name" placeholder="Tên địa chỉ" value="Địa chỉ {{$user->location->count('id')+1}}">
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="user_name">Tên người nhận</label>
                                <input class="form-control form-control-sm" type="text" name="user_name" id="user_name" placeholder="Họ & tên">
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="phone_number">Số điện thoại</label>
                                <input class="form-control form-control-sm" type="text" name="phone_number" id="phone_number" placeholder="+(00)-0000-0000">
                            </div>
                            <div class="row">
                                <div class="form-group col">
                                    <label class="form-label" for="city_province">Tỉnh/Thành phố</label>
                                    <input class="form-control form-control-sm" type="text" name="city_province" id="city_province" placeholder="city_province">
                                </div>
                                <div class="form-group col">
                                    <label class="form-label" for="district">Quận/Huyện</label>
                                    <input class="form-control form-control-sm" type="text" name="district" id="district" placeholder="district">
                                </div>
                                <div class="form-group col">
                                    <label class="form-label" for="commune">Xã</label>
                                    <input class="form-control form-control-sm" type="text" name="commune" id="commune" placeholder="commune">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="location_detail">Địa chỉ chi tiết</label>
                                <textarea class="form-control form-control-sm" name="location_detail" id="location_detail" cols="30" rows="3"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Hủy</button>
                        <button class="btn btn-success" type="submit" value="true" name="create-location">Thêm</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('js')
    {{-- JAVASCRIPT-LINK --}}
        <script type="text/javascript">
          $(document).ready(function(){
              //-initialize the javascript
              App.init();
              App.dashboard();
          });
        </script>
    {{-- JS --}}
        <script>
            window.addEventListener('DOMContentLoaded', () => {
            setTimeout(() => {
                const alert = document.querySelector('.alert');
                alert.style.display = "none";
            }, 5000);
            });
        </script>
        <script>
            function showImage(event) {
                const image_san_pham = document.getElementById('image_san_pham');

                const file = event.target.files[0];

                const reader = new FileReader();

                reader.onload = function () {
                    image_san_pham.src = reader.result;
                    image_san_pham.style.display = 'block';
                    document.querySelector('.text-img').style.display = 'none';
                }

                if (file) {
                    reader.readAsDataURL(file);
                }
            }
        </script>
@endsection
