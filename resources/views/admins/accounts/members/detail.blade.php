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
                        <li class="breadcrumb-item active">Nhân viên</li>
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
                                    @if ($member->image != null && Storage::disk('public')->exists($member->image))
                                        <img style="object-fit: cover;" src="{{ Storage::url($member->image) }}" alt="Avatar">
                                    @else
                                        <img src="{{ asset('assets/admins/img/avatar-150.png') }}" alt="Avatar">
                                    @endif
                                </div>
                                <div class="user-display-info">
                                <div class="name">{{$member->name}}</div>
                                <div class="nick"><span class="mdi mdi-email"></span> {{$member->email}}</div>
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
                            Thông tin tài khoản<span class="tools">
                                <button title="Sửa" class="btn p-0 m-0" style="box-shadow: none !important" data-toggle="modal" data-target="#md-user-edit" type="button">
                                    <i class="icon mdi mdi-edit"></i>
                                </button>
                            </span><span class="card-subtitle"></span>
                        </div>
                        {{-- Sửa user --}}
                        <div class="modal fade" id="md-user-edit" tabindex="-1" role="dialog">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form action="{{ route('wp-admin.member.update',$member->id) }}" method="post" enctype="multipart/form-data">
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
                                                        <input class="form-control form-control-sm" type="text" name="name" id="name" placeholder="Họ & tên" value="{{$member->name}}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="form-label" for="email">Email <span class="text-danger">*</span></label>
                                                        <input class="form-control form-control-sm" type="email" name="email" id="email" placeholder="abc@gmail.com" value="{{$member->email}}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="form-label" for="phone_number">Số điện thoại <span class="text-danger">*</span></label>
                                                        <input class="form-control form-control-sm" type="text" name="phone_number" id="phone_number" placeholder="+(000)-000-000" value="{{$member->phone_number}}">
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
                                                    <input class="form-control form-control-sm" type="date" name="birthday" id="birthday" placeholder="dd-mm-yyyy" value="{{$member->birthday}}">
                                                </div>
                                                <div class="col form-group">
                                                    <label class="form-label" for="gender">Giới tính <span class="text-danger">*</span></label>
                                                    <select name="gender" class="form-control form-control-sm" id="gender">
                                                        <option {{$member->gender=="Nam"?"selected":""}} value="Nam">Nam</option>
                                                        <option {{$member->gender=="Nữ"?"selected":""}} value="Nữ">Nữ</option>
                                                        <option {{$member->gender=="Khác"?"selected":""}} value="Khác">Khác</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col form-group">
                                                    <label class="form-label" for="role">Chức vụ <span class="text-danger">*</span></label>
                                                    <select @if(Auth::user()->role !== "Quản lý") disabled @endif name="role" class="form-control form-control-sm" id="role">
                                                        <option {{$member->role=="Quản lý"?"selected":""}} value="Quản lý">Quản lý</option>
                                                        <option {{$member->role=="Nhân viên"?"selected":""}} value="Nhân viên">Nhân viên</option>
                                                    </select>
                                                </div>
                                                <div class="col form-group">
                                                    <label class="form-label" for="status">Trạng thái <span class="text-danger">*</span></label>
                                                    <select name="status" class="form-control form-control-sm" id="status">
                                                        <option {{$member->status=="Hoạt động"?"selected":""}} value="Hoạt động">Hoạt động</option>
                                                        <option {{$member->status=="Không hoạt động"?"selected":""}} value="Không hoạt động">Không hoạt động</option>
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
                                    <td class="item">Mã nhân viên<span class="icon s7-portfolio"></span></td>
                                    <td>{{$member->user_code}}</td>
                                </tr>
                                <tr>
                                    <td class="icon"><span class="mdi mdi-cake"></span></td>
                                    <td class="item">Ngày sinh<span class="icon s7-gift"></span></td>
                                    <td>
                                        @if ($member->birthday != null)
                                        {{$member->birthday}}
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
                                    <td>{{$member->phone_number}}</td>
                                </tr>
                                <tr>
                                    <td class="icon"><span class="mdi mdi-label"></span></td>
                                    <td class="item">Chức vụ<span class="icon s7-map-marker"></span></td>
                                    <td class="{{$member->role == 'Nhân viên'? 'text-info':'text-danger'}}">
                                        {{$member->role}}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="icon">
                                        @if ($member->status == 'Hoạt động')
                                            <span class="mdi mdi-check-circle"></span>
                                        @elseif ($member->status == 'Đã khóa')
                                            <span class="mdi mdi-lock"></span>
                                        @else
                                            <span class="mdi mdi-delete"></span>
                                        @endif
                                    </td>
                                    <td class="item">Trạng thái<span class="icon s7-global"></span></td>
                                    <td>
                                        <span class="@if ($member->status == 'Hoạt động') text-success @elseif ($member->status == 'Đã khóa') text-secondary @else text-danger @endif">
                                            {{$member->status}}
                                        </span>
                                    </td>
                                </tr>
                            </tbody>
                            </table>
                        </div>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        @foreach ($member->location as $key => $location)
                        <div class="widget widget-fullwidth widget-small">
                            <div class="widget-head pb-6">
                                <div class="tools">
                                    <button class="btn btn-space btn-outline-success btn-space" data-toggle="modal" data-target="#md-footer-update" type="button">Sửa</button>
                                </div>
                                <div class="title">{{$location->location_name}}</div>
                            </div>
                            <div class="row m-0 p-0">
                                <div class="col-12 col-lg-12">
                                    <div class="user-info-list">
                                        <div class="card-body">
                                            <table class="no-border no-strip skills">
                                            <tbody class="no-border-x no-border-y">
                                                <tr>
                                                    <td class="icon"><span class="mdi mdi-account-calendar"></span></td>
                                                    <td class="item">Họ và tên nhân viên<span class="icon s7-portfolio"></span></td>
                                                    <td>{{ $location->user_name }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="icon"><span class="mdi mdi-phone-msg"></span></td>
                                                    <td class="item">Số điện thoại liên hệ<span class="icon s7-portfolio"></span></td>
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
                                            {{-- Sửa --}}
                                            <div class="modal fade" id="md-footer-update" tabindex="-1" role="dialog" style="text-align: start;">
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
                                                                    <h2 class="text-center mt-0 mb-5">Sửa thông tin liên hệ</h2>
                                                                    <div class="form-group">
                                                                        <label class="form-label" for="user_name">Họ và tên</label>
                                                                        <input class="form-control form-control-sm" type="text" name="user_name" id="user_name" placeholder="Họ & tên nhân viên" value="{{$location->user_name}}">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="form-label" for="phone_number">Số điện thoại liên hệ</label>
                                                                        <input class="form-control form-control-sm" type="text" name="phone_number" id="phone_number" placeholder="+(00)-0000-0000" value="{{$location->phone_number}}">
                                                                    </div>
                                                                    <label class="label" for="">Địa chỉ</label>
                                                                    <hr class="mt-0">
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
                        <div class="main-content container-fluid">
                            <div class="row">
                              <div class="col-12">
                                <ul class="timeline timeline-variant">
                                  <li class="timeline-month"><span>September, 2018</span></li>
                                  <li class="timeline-item right">
                                    <div class="timeline-content timeline-type file">
                                      <div class="timeline-icon"><i class="icon mdi mdi-file"></i></div>
                                      <div class="timeline-avatar"><img class="circle" src="{{ asset('assets/admins/img/avatar6.png') }}" alt="Avatar"></div>
                                      <div class="timeline-header"><span class="timeline-autor">Penelope Thornton</span>
                                        <p class="timeline-activity">Pellentesque imperdiet <a href="#">Amet nisl sed mattis</a>.</p><span class="timeline-time">September 16, 2018 - 4:34 PM</span>
                                      </div>
                                    </div>
                                  </li>
                                  <li class="timeline-item timeline-item-detailed left">
                                    <div class="timeline-content timeline-type comment">
                                      <div class="timeline-icon"><i class="icon mdi mdi-comment-text-alt"></i></div>
                                      <div class="timeline-avatar"><img class="circle" src="{{ asset('assets/admins/img/avatar.png"') }} alt="Avatar"></div>
                                      <div class="timeline-header"><span class="timeline-autor">Kristopher Donny  </span>
                                        <p class="timeline-activity">Mauris condimentum est <a href="#">Viverra erat fermentum</a>.</p><span class="timeline-time">September 13, 2018 - 9:54 AM</span>
                                      </div>
                                      <div class="timeline-summary">
                                        <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vivamus sit amet tellus vel leo posuere fames commodo in eget ante. Vivamus vehicula sed velit at pulvinar.  </p>
                                      </div>
                                    </div>
                                  </li>
                                  <li class="timeline-month"><span>August, 2018</span></li>
                                  <li class="timeline-item timeline-item-detailed timeline-item-gallery right">
                                    <div class="timeline-content timeline-type gallery">
                                      <div class="timeline-icon"><i class="icon mdi mdi-image"></i></div>
                                      <div class="timeline-avatar"><img class="circle" src="{{ asset('assets/admins/img/avatar3.png') }}" alt="Avatar"></div>
                                      <div class="timeline-header"><span class="timeline-autor">Sherwood Clifford  </span>
                                        <p class="timeline-activity">pellentesque tortor <a href="#">enim</a>.</p><span class="timeline-time">August 23, 2018 - 10:42 AM</span>
                                      </div>
                                      <div class="timeline-gallery"><img class="gallery-thumbnail" src="{{ asset('assets/admins/img/gallery/img') }}2.jpg" alt="Thumbnail"><img class="gallery-thumbnail" src="{{ asset('assets/admins/img/gallery/img') }}12.jpg" alt="Thumbnail"></div>
                                    </div>
                                  </li>
                                  <li class="timeline-item timeline-item-detailed left">
                                    <div class="timeline-content timeline-type comment">
                                      <div class="timeline-icon"><i class="icon mdi mdi-comment-text-alt"></i></div>
                                      <div class="timeline-avatar"><img class="circle" src="{{ asset('assets/admins/img/avatar4.png') }}" alt="Avatar"></div>
                                      <div class="timeline-header"><span class="timeline-autor">Benji Harper </span>
                                        <p class="timeline-activity">Mauris condimentum est <a href="#">Vestibulum justo neque</a>.</p><span class="timeline-time">August 19, 2018 - 7:15 PM</span>
                                      </div>
                                      <div class="timeline-summary">
                                        <p>Praesent luctus efficitur turpis, nec convallis mauris commodo a. Aliquam sed consectetur tellus, et condimentum diam. Sed efficitur augue urna, et lacinia ex dictum at. Nulla a molestie arcu. </p>
                                      </div>
                                    </div>
                                  </li>
                                  <li class="timeline-item right">
                                    <div class="timeline-content timeline-type file">
                                      <div class="timeline-icon"><i class="icon mdi mdi-file"></i></div>
                                      <div class="timeline-avatar"><img class="circle" src="{{ asset('assets/admins/img/avatar5.png') }}" alt="Avatar"></div>
                                      <div class="timeline-header"><span class="timeline-autor">Justine Myranda </span>
                                        <p class="timeline-activity">Pellentesque imperdiet sit <a href="#">Amet nisl sed mattiss</a>.</p><span class="timeline-time">August 6, 2018 - 12:02 PM</span>
                                      </div>
                                    </div>
                                  </li>
                                  <li class="timeline-item timeline-item-detailed left">
                                    <div class="timeline-content timeline-type quote">
                                      <div class="timeline-icon"><i class="icon mdi mdi-quote"></i></div>
                                      <div class="timeline-avatar"><img class="circle" src="{{ asset('assets/admins/img/avatar3.png') }}" alt="Avatar"></div>
                                      <div class="timeline-header"><span class="timeline-autor">Sherwood Clifford </span>
                                        <p class="timeline-activity">pellentesque tortor <a href="#">Aliquam viverra</a>.</p><span class="timeline-time">August 1, 2018 - 6:25 AM</span>
                                      </div>
                                      <blockquote class="blockquote timeline-blockquote mb-0">
                                        <p>Quisque condimentum enim nec porttitor egestas. </p>
                                        <footer class="blockquote-footer">Aliquam viverra ornare dolor.</footer>
                                      </blockquote>
                                    </div>
                                  </li>
                                  <li class="timeline-item timeline-loadmore"><a class="load-more-btn" href="#">Load more</a></li>
                                </ul>
                              </div>
                            </div>
                          </div>
                    </div>
                </div>
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
