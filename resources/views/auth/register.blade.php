@extends('layouts.auth')
@section('title')
    Đăng ký
@endsection
@section('css')
    <style>
        .radio-input {
            display: flex;
            gap: 20px;
            margin-bottom: 25px;
        }
        .label {
            display: block !important;
            font-size: 18px !important;
            color: #252525 !important;
            margin-bottom: 13px !important;
        }
        .text-danger {
            font-size: 16px;

        }
    </style>
@endsection
@section('content')
<div class="breacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <a href="#"><i class="fa fa-home"></i> Trang chủ</a>
                    <span>Đăng ký</span>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="register-login-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="register-form">
                    <h2>Đăng ký</h2>
                    <form action="{{ route('register') }}" method="POST">
                        @csrf 
                        <div class="group-input">
                            <label for="name">Tên người dùng <span class="text-danger">*</span> @error('name')<span class="text-danger">{{ $message }}</span>@enderror</label>
                            <input class="@error('name') is-invalid @enderror" value="" type="text" name="name" id="name" placeholder="abc">
                        </div>
                        <div class="group-input">
                            <label for="email">Email tài khoản <span class="text-danger">*</span> @error('email')<span class="text-danger">{{ $message }}</span>@enderror</label>
                            <input class="@error('email') is-invalid @enderror" value="" type="email" name="email" id="email" placeholder="abc@gmail.com">
                        </div>
                        <div class="group-input">
                            <label for="phone-number">Số điện thoại <span class="text-danger">*</span> @error('phone_number')<span class="text-danger">{{ $message }}</span>@enderror</label>
                            <input class="@error('phone_number') is-invalid @enderror" value="" type="text" name="phone_number" id="phone-number" placeholder="+000-000-000">
                        </div>
                        <div class="radio-input">
                            <label class="label" for="">Giới tính <span class="text-danger">*</span></label>
                            <div class="radio">
                                <input type="radio" name="gender"  value="Nam" id="Nam">
                                <label for="Nam">Nam</label>
                            </div>
                            <div class="radio">
                                <input type="radio" name="gender"  value="Nữ" id="Nữ">
                                <label for="Nữ">Nữ</label>
                            </div>
                            <div class="radio">
                                <input type="radio" name="gender"  value="Khác" id="Khác">
                                <label for="Khác">Khác</label>
                            </div>
                            @error('gender')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="group-input">
                            <label for="pass">Mật khẩu <span class="text-danger">*</span> @error('password')<span class="text-danger">{{ $message }}</span>@enderror</label>
                            <input class="@error('password') is-invalid @enderror" type="password" name="password" id="pass" placeholder="********">
                        </div>
                        <div class="group-input">
                            <label for="con-pass">Xác nhận mật khẩu <span class="text-danger">*</span> @error('password')<span class="text-danger">{{ $message }}</span>@enderror</label>
                            <input type="password" name="confix-password" id="con-pass" placeholder="********">
                        </div>
                        <button type="submit" class="site-btn register-btn">Đăng ký</button>
                    </form>
                    <div class="switch-login">
                        <a href="{{ route('login') }}" class="or-login">Đăng nhập</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
    
@endsection