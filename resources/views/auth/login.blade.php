@extends('layouts.auth')
@section('title')
    Đăng nhập
@endsection
@section('css')
    
@endsection
@section('content')
<div class="breacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <a href="#"><i class="fa fa-home"></i> Trang chủ</a>
                    <span>Đăng nhập</span>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="register-login-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="login-form">
                    <h2>Đăng nhập</h2>
                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        @if (session('message'))
                            <div class="alert alert-danger">
                                {{ session('message') }}
                            </div>
                        @endif
                        <div class="group-input">
                            <label for="username">Email đăng nhập <span class="text-danger">*</span></label>
                            <input type="email" id="username" name="email">
                        </div>
                        @error('email')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                        <div class="group-input">
                            <label for="pass">Mật khẩu <span class="text-danger">*</span></label>
                            <input type="password" id="pass" name="password">
                        </div>
                        @error('password')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                        <div class="group-input gi-check">
                            <div class="gi-more">
                                <label for="save-pass">
                                    Nhớ tài khoản
                                    <input type="checkbox" id="save-pass">
                                    <span class="checkmark"></span>
                                </label>
                                <a href="#" class="forget-pass">Quên mật khẩu</a>
                            </div>
                        </div>
                        <button type="submit" class="site-btn login-btn">Đăng nhập</button>
                    </form>
                    <div class="switch-login">
                        <a href="{{ route('register') }}" class="or-login">Tạo tài khoản mới</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
    
@endsection