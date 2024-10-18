@extends('layouts.client')
@section('title')
    Trang chủ
@endsection
@section('css')
    {{-- CSS --}}
    <style>
        .gigi {
            color: #e7ab3c !important;
            text-decoration: none !important;
            font-size: 14px;
        }
        .attribute {
            list-style-type: none;
        }
        .text-attribute {
            color: #252525;
            font-weight: 700;
            margin-right: 28px;
        }
        .colorCheckbox {
            height: 20px;
            width: 20px;
            background: #252525;
            border-radius: 50%;
            cursor: pointer;
            margin-bottom: 0;
        }
    </style>
@endsection
@section('content')
    {{-- Content --}}
    <section class="hero-section">
        <div class="hero-items owl-carousel">
            <div class="single-hero-items set-bg" data-setbg="{{ asset('assets/clients/img/hero-1.jpg') }}">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5">
                            <span>Bag,kids</span>
                            <h1>Black friday</h1>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore</p>
                            <a href="#" class="primary-btn">Shop Now</a>
                        </div>
                    </div>
                    <div class="off-card">
                        <h2>Sale <span>50%</span></h2>
                    </div>
                </div>
            </div>
            <div class="single-hero-items set-bg" data-setbg="{{ asset('assets/clients/img/hero-2.jpg') }}">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5">
                            <span>Bag,kids</span>
                            <h1>Black friday</h1>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore</p>
                            <a href="#" class="primary-btn">Shop Now</a>
                        </div>
                    </div>
                    <div class="off-card">
                        <h2>Sale <span>50%</span></h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="man-banner spad">
        <div class="container-fluid">
            <div class="">
                <div class="container">
                    <div class="filter-control">
                        <ul>
                            <li class="active">Clothings</li>
                            <li>HandBag</li>
                            <li>Shoes</li>
                            <li>Accessories</li>
                        </ul>
                    </div>
                    <div class="product-slider owl-carousel">
                        @foreach ($products as $product)
                                <div class="product-item">
                                    <div class="pi-pic">
                                        @foreach ($product->attribute as $k=>$attributes)
                                            @foreach ($attributes->url_image as $key=>$url_image)
                                                <img class="image-item" style="display:@if($k==0&&$key==0) display @else none @endif" src="{{ Storage::url($url_image->url) }}" alt="">
                                            @endforeach
                                        @endforeach
                                        <div class="sale pp-sale">Sale</div>
                                        <div class="icon">
                                            <i class="icon_heart_alt"></i>
                                        </div>
                                        <ul>
                                            <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
                                            <li class="quick-view"><a href="#">+ Xem thêm</a></li>
                                            <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="pi-content">
                                        <div class="pi-text">
                                            <div class="catagory-name">{{$product->categorys->name}}</div>
                                            <a href="#">
                                                <h5>{{$product->name}}</h5>
                                            </a>
                                            <div class="product-price">
                                                <span class="price">₫</span>{{$product->attribute->min('price')}} - <span class="price">₫</span>{{$product->attribute->max('price')}}
                                            </div>
                                        </div>
                                        <div class="pi-attribute">
                                            <div class="color row m-0 p-0">
                                                <div class="color-item col p-0">
                                                    @foreach ($product->attribute->groupBy('colors.color_code') as $key => $attributes)
                                                        <div class="item">
                                                            <label style="background-color:{{$key}};" class="labelColor" for="color_id{{$key}}"><i class="fa-solid fa-check"></i></label>
                                                            <input type="radio" name="color_code" id="color_id{{$key}}" value="{{$key}}">
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                            <div class="size row m-0 p-0">
                                                <div class="size-item col p-0">
                                                    @foreach ($product->attribute->groupBy('sizes.size_code') as $key => $attributes)
                                                        <div class="item">
                                                            <label class="labelsize" for="size_id{{$key}}">{{$key}}</label>
                                                            <input type="radio" name="size_code" id="size_id{{$key}}" value="{{$key}}">
                                                        </div>
                                                    @endforeach
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
    </section>
@endsection
@section('js')
    {{-- JavaScript --}}
@endsection