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
        .radio-pas {
            width: 15px;
            height: 15px;
        }
        #password {
            display: flex;
            align-items: center;
        }
        .header {
            display: flex;
            justify-content: space-between;
        }
    </style>
@endsection
@section('content')
    {{-- CONTENT --}}
    <div class="be-content">
        <div class="row">
            <div class="page-head col">
                <h2 class="page-head-title">Thêm tài khoản</h2>
                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb page-head-nav">
                        <li class="breadcrumb-item"><a href="#">Quản lý tài khoản</a></li>
                        <li class="breadcrumb-item active">Nhân viên</li>
                        <li class="breadcrumb-item active">Thêm tài khoản</li>
                    </ol>
                </nav>
            </div>
            <div class="col-4 p-3" id="alert">
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
            <form action="{{ route('wp-admin.member.store') }}" id="user-project" onsubmit="return false || validate()" enctype="multipart/form-data" method="post">
                @csrf
                <div class="header mb-3">
                    <button onclick="return window.history.back()" class="btn btn-secondary btn-sm">Quay lại</button>
                    <button id="btn-submit" class="btn btn-success btn-sm">Thêm mới <i class="icon mdi mdi-plus-circle-o"></i></button>
                </div>
                <div class="user-profile">
                    <div class="row">
                        <div class="col-lg-5">
                            <div class="user-info-list card">
                                <div class="card-header card-header-divider">
                                    <h3 class="m-0 p-0"><strong>Thông tin tài khoản</strong> <span class="icon mdi mdi-bookmark-outline"></span></h3>
                                    <span class="card-subtitle">
                                        Thông tin nhân viên sẽ sử dụng tài khoản này.
                                    </span>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label class="form-label" for="name">Tên tài khoản <span class="text-danger">*</span></label> <span class="text-danger" id="name_validate"></span>
                                                <input class="form-control form-control-sm" type="text" name="name" id="name" value="{{old('name')}}" placeholder="Họ & tên">
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label" for="email">Địa chỉ email <span class="text-danger">*</span></label> <span class="text-danger" id="email_validate"></span>
                                                <input class="form-control form-control-sm" type="text" name="email" id="email" placeholder="abc@gmail.com">
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label" for="phone">Số điện thoại <span class="text-danger">*</span></label> <span class="text-danger" id="phone_validate"></span>
                                                <input class="form-control form-control-sm" type="tel" name="phone_number" id="phone" placeholder="+(000)-000-000">
                                            </div>
                                        </div>
                                        <div class="col-4" style="margin: 5px 0px !important">
                                            <label for="image" class="custom-file-upload p-0 m-0">
                                                <span class="text-img"><i class="mdi mdi-collection-image-o"></i> Avata</span>
                                                <img id="image_san_pham" src="" alt="Hình ảnh sản phầm" style="display: none">
                                            </label>
                                            <input type="file" id="image" name="image" style="display: none;" onchange="showImage(event)" accept="image/*"/>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col">
                                            <label class="form-label" for="birthday">Ngày sinh <span class="text-danger">*</span></label> <span class="text-danger" id="birthday_validate"></span>
                                            <input class="form-control form-control-sm" type="date" name="birthday" id="birthday">
                                        </div>
                                        <div class="col">
                                            <label class="form-label" for="gender">Giới tính <span class="text-danger">*</span></label> <span class="text-danger" id="gender_validate"></span>
                                            <select class="form-control form-control-sm" name="gender" id="gender">
                                                <option value="" disabled selected>--- Chọn giới tính ---</option>
                                                <option value="Nam">Nam</option>
                                                <option value="Nữ">Nữ</option>
                                                <option value="Khác">Khác</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="name">Chức vụ<span class="text-danger">*</span></label>
                                        <select class="form-control form-control-sm" name="role" id="role">
                                            <option selected value="Nhân viên">Nhân viên</option>
                                            <option value="Quản lý">Quản lý</option>
                                        </select>
                                    </div>
                                    <div class="form-pass">
                                        <div class="form-group">
                                            <label class="form-label" for="name">Mật khẩu <span class="text-danger">*</span></label> <span class="text-danger" id="password_validate"></span>
                                            <input class="form-control form-control-sm" type="password" name="password" id="password-1" placeholder="Mật khẩu">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="password-2">Xác nhận mật khẩu <span class="text-danger">*</span></label> <span id="password_confix" class="text-danger"></span>
                                            <input class="form-control form-control-sm" type="password" name="password_confix" id="password-2" placeholder="Nhập lại mật khẩu">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="widget widget-fullwidth widget-small">
                                <div class="widget-head pb-6">
                                    <div class="tools">
                                        {{-- BTN --}}
                                    </div>
                                    <div class="title"><strong>Thông tin liên hệ</strong></div>
                                </div>
                                <div class="widget-chart-container">
                                    <div class="accordion" id="accordion">
                                        <div class="card-body">
                                            <input type="hidden" name="location[location_name]" value="Thông tin liên hệ">
                                            <div class="form-group">
                                                <label class="form-label" for="location[user_name]">Họ và Tên <span class="text-danger">*</span></label> <span id="user_name_validate" class="text-danger"></span>
                                                <input class="form-control form-control-sm" type="text" name="location[user_name]" id="location[user_name]" placeholder="Họ và tên nhân viên">
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label" for="location[phone_number]">Số điện thoại liên hệ <span class="text-danger">*</span></label> <span id="phone_number_validate" class="text-danger"></span>
                                                <input class="form-control form-control-sm" type="text" name="location[phone_number]" id="location[phone_number]" placeholder="Số điện thoại lên hệ">
                                            </div>
                                            <label class="form-label">Địa chỉ nhân viên</label>
                                            <hr class="mt-0">
                                            <div class="row">
                                                <div class="form-group col">
                                                    <label class="form-label" for="city">Tỉnh <span class="text-danger">*</span></label> <span id="city_province_validate" class="text-danger"></span>
                                                    <select class="form-control form-control-sm" name="location[city_province]" id="city">
                                                        <option value="" selected>Chọn tỉnh thành</option>           
                                                    </select>
                                                </div>
                                                <div class="form-group col">
                                                    <label class="form-label" for="district">Huyện <span class="text-danger">*</span></label> <span id="district_validate" class="text-danger"></span>
                                                    <select class="form-control form-control-sm" name="location[district]" id="district">
                                                        <option value="" selected>Chọn quận huyện</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col">
                                                    <label class="form-label" for="ward">Xã <span class="text-danger">*</span></label> <span id="commune_validate" class="text-danger"></span>
                                                    <select class="form-control form-control-sm" name="location[commune]" id="ward">
                                                        <option value="" selected>Chọn phường xã</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label" for="location[location_detail]">Địa chỉ chi tiết <span class="text-danger">*</span></label> <span id="location_detail_validate" class="text-danger"></span>
                                                <textarea class="form-control form-control-sm" name="location[location_detail]" id="location[location_detail]" cols="30" rows="3"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
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
                const alert = document.querySelector('#alert');
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
        <script>
            const selectElement = document.getElementById('gender');
            selectElement.addEventListener('change', function() {
                this.options[0].style.display = 'none';
            });
        </script>
    {{--  --}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
        <script>
            const host = "https://provinces.open-api.vn/api/";
            var callAPI = (api) => {
                return axios.get(api)
                    .then((response) => {
                        renderData(response.data, "city");
                    });
            }
            callAPI('https://provinces.open-api.vn/api/?depth=1');
            var callApiDistrict = (api) => {
                return axios.get(api)
                    .then((response) => {
                        renderData(response.data.districts, "district");
                    });
            }
            var callApiWard = (api) => {
                return axios.get(api)
                    .then((response) => {
                        renderData(response.data.wards, "ward");
                    });
            }
            
            var renderData = (array, select) => {
                let row = ' <option disable value="">Chọn</option>';
                array.forEach(element => {
                    row += `<option data-id="${element.code}" value="${element.name}">${element.name}</option>`
                });
                document.querySelector("#" + select).innerHTML = row
            }
            
            $("#city").change(() => {
                callApiDistrict(host + "p/" + $("#city").find(':selected').data('id') + "?depth=2");
                printResult();
            });
            $("#district").change(() => {
                callApiWard(host + "d/" + $("#district").find(':selected').data('id') + "?depth=2");
                printResult();
            });
            $("#ward").change(() => {
                printResult();
            })
            
            var printResult = () => {
                if ($("#district").find(':selected').data('id') != "" && $("#city").find(':selected').data('id') != "" &&
                    $("#ward").find(':selected').data('id') != "") {
                    let result = $("#city option:selected").text() +
                        " | " + $("#district option:selected").text() + " | " +
                        $("#ward option:selected").text();
                    $("#result").text(result)
                }
            
            }
        </script>
    {{-- Validate form user --}}
        <script>
            const birthdayInput = document.getElementById('birthday');
            const today = new Date().toISOString().split('T')[0];
            birthdayInput.max = today;
            const form = document.querySelector('#user-project');
            function validate() {
                var check = true;
                // Tên validate
                    if(form.elements.name.value == "") {
                        document.querySelector('#name_validate').innerText = "Vui lòng không bỏ trống tên!";
                        check = false;
                    }
                    else if(form.elements.name.value.length >= 255) {
                        document.querySelector('#name_validate').innerText = "Tên quá dài!";
                        check = false;
                    }
                    else {
                        document.querySelector('#name_validate').innerText = "";
                        check = true;

                    }
                // Email validate
                    if(form.elements.email.value == "") {
                        document.querySelector('#email_validate').innerText = "Không thể bỏ trống email!";
                        check = false;
                    }
                    else if(!form.elements.email.value.match(/@|\./)) {
                        document.querySelector('#email_validate').innerText = "Email không hợp lệ!";
                        check = false;
                    }
                    else if(form.elements.email.value.length>=255) {
                        document.querySelector('#email_validate').innerText = "Email quá dài!";
                        check = false;
                    }
                    else {
                        document.querySelector('#email_validate').innerText = "";
                        check = true;
                    }
                // SĐT validate
                    var phone = form.elements.phone.value;
                    if(form.elements.phone.value == "") {
                        document.querySelector('#phone_validate').innerText = "Không thể bỏ trống số điện thoại!";
                        check = false;
                    }
                    else if(isNaN(phone)) {
                        document.querySelector('#phone_validate').innerText = "Số điện thoại không hợp lệ!";
                        check = false;
                    }
                    else if(form.elements.phone.value.length>12) {
                        document.querySelector('#phone_validate').innerText = "Số điện thoại quá dài!"
                        check = false;
                    }
                    else {
                        document.querySelector('#phone_validate').innerText = "";
                        check = true;
                    }
                // Birthday validate
                    if(form.elements.birthday.value == "") {
                        document.querySelector('#birthday_validate').innerText = "Không thể bỏ trống ngày sinh!";
                        check = false;
                    }
                    else {
                        document.querySelector('#birthday_validate').innerText = "";
                        check = true;
                    }
                // Giới tính validate
                    if(form.elements.gender.value == "") {
                        document.querySelector('#gender_validate').innerText = "Không thể bỏ trống giới tính!"
                        check = false;
                    }
                    else {
                        document.querySelector('#gender_validate').innerText = ""
                        check = true;
                    }
                // Password validate
                    if(form.elements.password.value == "") {
                        document.querySelector('#password_validate').innerText = "Không thể bỏ trống mật khẩu!"
                        check = false;
                    }
                    else if(form.elements.password.value.length < 6) {
                        document.querySelector('#password_validate').innerText = "Mật khẩu tối thiểu 6 ký tự!"
                        check = false;
                    }
                    else if(form.elements.password.value.length > 255) {
                        document.querySelector('#password_validate').innerText = "Mật khẩu quá dài!"
                        check = false;
                    }
                    else {
                        document.querySelector('#password_validate').innerText = ""
                        check = true;
                        if(form.elements.password_confix.value == "") {
                            document.querySelector('#password_confix').innerText = "Chưa xác nhận mật khẩu";
                            check = false;
                        }
                        else if(form.elements.password_confix.value !== form.elements.password.value) {
                            document.querySelector('#password_confix').innerText = "Mật khẩu không khớp!";
                            check = false
                        }
                        else{
                            document.querySelector('#password_confix').innerText = "";
                            check = true;
                        }
                    }
                // User name
                    if(form.elements['location[user_name]'].value == "") {
                        document.querySelector('#user_name_validate').innerText = "Không thể bỏ trống họ và tên nhân viên!";
                        check = false;
                    }
                    else if(form.elements['location[user_name]'].value.length > 255) {
                        document.querySelector('#user_name_validate').innerText = "Tên nhân viên quá dài!";
                        check = false;
                    }
                    else {
                        document.querySelector('#user_name_validate').innerText = "";
                    }
                    if(form.elements['location[phone_number]'].value == "") {
                        document.querySelector('#phone_number_validate').innerText = "Không thể bỏ trống số điện thoại liên hệ!";
                        check = false;
                    }
                    else if(form.elements['location[phone_number]'].value.length > 11) {
                        document.querySelector('#phone_number_validate').innerText = "Số điện thoại quá dài!";
                        check = false;
                    }
                    else {
                        document.querySelector('#phone_number_validate').innerText = "";
                    }
                    if(form.elements['location[city_province]'].value == "") {
                        document.querySelector('#city_province_validate').innerText = "Bạn chưa chọn Tỉnh!";
                        check = false;
                    }
                    else {
                        document.querySelector('#city_province_validate').innerText = "";
                    }
                    if(form.elements['location[district]'].value == "") {
                        document.querySelector('#district_validate').innerText = "Bạn chưa chọn Tỉnh!";
                        check = false;
                    }
                    else {
                        document.querySelector('#district_validate').innerText = "";
                    }
                    if(form.elements['location[commune]'].value == "") {
                        document.querySelector('#commune_validate').innerText = "Bạn chưa chọn Tỉnh!";
                        check = false;
                    }
                    else {
                        document.querySelector('#commune_validate').innerText = "";
                    }
                    if(form.elements['location[location_detail]'].value == "") {
                        document.querySelector('#location_detail_validate').innerText = "Bạn chưa chọn Tỉnh!";
                        check = false;
                    }
                    else {
                        document.querySelector('#location_detail_validate').innerText = "";
                    }
                if(check) {
                    return true;
                }
                return false;
            }
            
        </script>
    
@endsection
