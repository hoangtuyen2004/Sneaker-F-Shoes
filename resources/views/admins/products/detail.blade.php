@extends('layouts.admins')
@section('title')
    Admin|Quản lý sản phẩm
@endsection
@section('css')
    {{-- CSS --}}
    <style>
        #fillter {
            height: 24px !important;
            width: 10%;
        }
        .img-big img {
            max-height: 720px;
            object-fit: cover;
            max-width: 650px;
        }
        .img-small img {
            width: 20%;
            max-width: 160px;
            max-height: 180px;
            object-fit: cover;
        }
        .category{
            display: block;
            font-size: 12px;
            color: #b2b2b2;
            text-transform: uppercase;
            letter-spacing: 2px;
            font-weight: 700;
            line-height: 23px;
        }
        .price {
            color: #e7ab3c;
            font-weight: 700;
            font-size: 24px;
        }
        .VND {
            color: #e7ab3c;
            text-decoration: underline;
        }
        .pd-tags li span {
            color: #252525;
            font-weight: 700;
            text-transform: uppercase;
            font-weight: 700;
        }
        .pd-tags li {
            list-style: none;
            font-size: 16px;
            color: #636363;
            line-height: 30px;
        }
        .pd-tags {
            margin-bottom: 27px;
        }
        .labelColor {
            width: 25px;
            height: 25px;
            border-radius: 50%;
            text-align: center;
            align-content: center;
            padding-top: 1px;
        }
        .labelColor i {
            /* display: none; */
            color: #FFFFFF;
            font-size: 13px
        }
        .ColorInput {
            display: none;
        }
        .labelSize {
            border: 1px solid black;
            padding: 5px 10px;
            border-radius: 4px;
        }
        .SizeInput {
            display: none;
        }
        .quality {
            width: 123px;
            height: 46px;
            border: 2px solid #ebebeb;
            padding: 0 15px;
            float: left;
            margin-right: 14px;
        }
    </style>
    <style>
        #quality {
            text-align: center;
            width: 52px;
            font-size: 14px;
            font-weight: 700;
            border: none;
            color: #4c4c4c;
            line-height: 40px;
            float: left;
        }
        .sub {
            font-size: 24px;
            color: #b2b2b2;
            float: left;
            line-height: 38px;
            cursor: pointer;
            width: 18px;
        }
        .pro-qty {
            width: 123px;
            height: 46px;
            border: 2px solid #ebebeb;
            padding: 0 15px;
            float: left;
            margin-right: 14px;
        }
        .primary-btn {
            display: inline-block;
            font-size: 14px;
            font-weight: 700;
            padding: 12px 30px;
            color: #ffffff;
            background: #e7ab3c;
            text-transform: uppercase;
        }
        .pd-cart {
            width: 50%;
            text-align: center;
        }
        .primary-btn:hover {
            color: #FFFFFF;
            background: #ecbb60;
        }
        #description {
            font-size: 15px;
            font-weight: 500;
        }
        .btn-center {
            align-content: center;
        }
    </style>
@endsection
@section('content')
    <div class="be-content">
        <div class="row">
            <div class="page-head col">
                <h2 class="page-head-title">Chi tiết sản phẩm</h2>
                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb page-head-nav">
                        <li class="breadcrumb-item"><a href="#">Quản lý sản phẩm</a></li>
                        <li class="breadcrumb-item active">Sản phẩm</li>
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
                @elseif (session('danger'))
                    <div id="dangerAlert" class="alert alert-danger alert-dismissible" role="alert">
                        <a class="close" type="button" data-dismiss="alert" aria-label="Close"><span class="mdi mdi-close" aria-hidden="true"></span></a>
                        <div class="icon"><span class="mdi mdi-check"></span></div>
                        <div class="message"><strong>Thông báo!</strong> {{session('danger')}}</div>
                    </div>
                @endif
            </div>
        </div>
        <div class="main-content container-fluid">
                <div class="row">{{---Sản phẩm---}}
                    <div class="col-md-12">
                        <div class="card card-contrast">
                            <div class="card-header px-3 py-1 card-header-contrast card-header-featured" style="background-color: #FECBA1 !important;">
                                <div class="d-flex" style="gap: 10px">
                                    <a href="{{route('product.index')}}" class="btn btn-center btn-space btn-secondary btn-xs m-0">
                                        <i class="icon mdi mdi-arrow-left"></i> Quay lại
                                    </a>
                                    <form action="" class="input-group" method="GET" style="width: 10%;">
                                        @csrf
                                        <input class="form-control form-control-xs" id="fillter" type="text" value="{{$product->id}}" name="id" placeholder="Mã sản phẩm">{{-- Đổi sản phẩm nhanh --}}
                                        <button class="btn btn-space btn-secondary btn-xs m-0" type="submit">
                                            <i class="icon mdi mdi-refresh"></i>
                                        </button>
                                    </form>
                                    <a href="{{route('product.edit',$product->id)}}" class="btn btn-center btn-space btn-info btn-xs m-0">
                                        <i class="icon mdi mdi-edit"></i> Sửa sản phẩm
                                    </a>
                                    @if ($product->status == "Đang bán")
                                        <button class="btn btn-space btn-warning btn-xs m-0">
                                            <i class="icon mdi mdi-info"></i> Dừng bán
                                        </button>
                                    @else
                                        <button class="btn btn-space btn-success btn-xs m-0">
                                            <i class="icon mdi mdi-check-circle"></i> Mở bán
                                        </button>
                                    @endif
                                    <button class="btn btn-space btn-danger btn-xs m-0">
                                        <i class="icon mdi mdi-delete"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="w-75 m-auto">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="img-big">
                                                <img class="w-100" src="https://i.pinimg.com/736x/09/da/58/09da58d375d51cff3455665307dd2bd1.jpg" alt="">
                                            </div>
                                            <div class="img-small row m-auto">
                                                @foreach ($product->attribute as $attribute)
                                                    @foreach ($attribute->url_image as $img)
                                                        <img class="col p-0 m-3" src="{{Storage::url($img->url)}}" alt="">
                                                    @endforeach
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div>
                                                <span class="text-secondary category">
                                                    {{$product->categorys->name}}
                                                </span>
                                            </div>
                                            <h1 class="m-0"><strong>{{$product->name}}</strong></h2>
                                            <div class="space m-5"></div>
                                            <div>
                                                <span class="price">{{$product->attribute()->min('price')}}</span><span class="VND">đ</span>
                                                <span class="price"> - </span>
                                                <span class="price">{{$product->attribute()->max('price')}}</span><span class="VND">đ</span>
                                            </div>

                                            <div class="attribute">
                                                <div class="color row" style="align-items: baseline;">
                                                    <h6 class="col-2">Màu sắc:</h6>
                                                    <div class="col color-choose d-flex" style="align-items: center; gap: 10px;">
                                                        @foreach ($product->attribute as $attribute)
                                                            <div class="color-item">
                                                                <label class="labelColor" for="IdColor" style="background-color: {{$attribute->colors->color_code}}">
                                                                    <i class="icon mdi mdi-check-circle"></i>
                                                                </label>
                                                                <input class="ColorInput" type="radio" value="{{$attribute->colors->id}}" name="Code" id="IdColor">
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                                
                                                <div class="size row" style="align-items: baseline;">
                                                    <h6 class="col-2">kích thước</h6>
                                                    <div class="col size-choose d-flex" style="align-items: center;gap:10px;">
                                                        @foreach ($product->attribute as $attribute)
                                                                <div class="size-item">
                                                                    <label title="" class="labelSize" id="Sizelable1" for="IDSize1">{{$attribute->sizes->size_code}}</label>
                                                                    <input class="SizeInput" type="radio" name="size" id="IDSize1">
                                                                </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="space" style="margin: 10px"></div>
                                            <div>
                                                <p><span id="description">Số lượng</span>: {{$product->attribute->sum('quanlity')}}</p>
                                            </div>
                                            <div class="space" style="margin: 60px"></div>
                                            <div class="tag">
                                                <ul class="pd-tags p-0" style="list-style: none;">
                                                    <li><span>THƯƠNG HIỆU</span>: {{$product->trademarks->name}}</li>
                                                    <li><span>CHẤT LIỆU</span>: {{$product->materials->name}}</li>
                                                    <li><span>ĐẾ GIÀY</span>: {{$product->soles->name}}</li>
                                                </ul>
                                            </div>
                                            <div class="space" style="margin: 60px"></div>
                                            <div class="quantity">
                                                <div class="pro-qty">
                                                    <span class="sub">-</span>
                                                    <input type="text" id="quality" value="1">
                                                    <span class="sub">+</span>
                                                </div>
                                                <a href="#" class="primary-btn pd-cart">Add To Cart</a>
                                            </div>
                                            <div class="space" style="margin: 30px"></div>
                                            <div class="description">
                                                <p><span id="description">Mô tả</span>: {{$product->description}}</p>
                                            </div>
                                        </div>
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
    {{-- JS --}}
    
    <script type="text/javascript">
        $(document).ready(function() {
            //-initialize the javascript
            App.init();
            App.uiNotifications();
        });
    </script>

@endsection
