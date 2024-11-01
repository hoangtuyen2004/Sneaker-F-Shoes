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
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 order-1 order-lg-2">
                        <div class="product-list">
                            <div class="row">
                                @foreach ($products as $i => $product)
                                    <form id="form_{{$i}}" action="{{ route('card.store') }}" onsubmit="return false || checkForm('form_{{$i}}')" method="post" class="col-lg-3 col-sm-6">
                                        @csrf
                                        <div class="product-item">
                                            <div class="pi-pic">
                                                @foreach ($product->attribute as $k=>$attributes)
                                                    @foreach ($attributes->url_image as $key=>$url_image)
                                                        <img class="image-item" style="display:@if($k==0&&$key==0) display @else none @endif" src="{{ Storage::url($url_image->url) }}" alt="">
                                                        <input type="hidden" name="id" value="{{$product->id}}">
                                                    @endforeach
                                                @endforeach
                                                <ul>
                                                    <li class="w-icon active">
                                                        <a>
                                                            <button type="submit" class="m-0 p-0 text-light" style="border: none;background:none;">
                                                                <i class="icon_bag_alt"></i>
                                                            </button>
                                                        </a>
                                                    </li>
                                                    <li class="quick-view"><a href="{{ route('shop-product.show',$product->id) }}">+ Xem thêm</a></li>
                                                </ul>
                                            </div>
                                            <div class="pi-content">
                                                <div class="pi-text">
                                                    <div class="catagory-name">{{$product->categorys->name}}</div>
                                                    <a href="#">
                                                        <h5>{{$product->name}}</h5>
                                                    </a>
                                                    <div class="product-price">
                                                        @if ($product->attribute->min('price') == $product->attribute->max('price'))
                                                            <span class="price">₫</span>{{number_format($product->attribute->min('price'),0,'','.')}}
                                                        @else
                                                            <span class="price">₫</span>{{number_format($product->attribute->min('price'),0,'','.')}} - <span class="price">₫</span>{{number_format($product->attribute->max('price'),0,'','.')}}
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="pi-attribute">
                                                    <div class="color row m-0 p-0">
                                                        <div class="color-item col p-0">
                                                            @foreach ($product->attribute->groupBy('colors.color_code') as $key => $attributes)
                                                                <div class="item">
                                                                    <label onclick="coloSet('{{$i}}','{{$key}}')" id="color-{{$i}}-{{$key}}" style="background-color:{{$key}};" class="labelColor" for="color_id-{{$i}}-{{$key}}">
                                                                        <i style="display: none;" id="icon-{{$i}}-{{$key}}" class="icon-check fa-solid fa-check"></i>
                                                                    </label>
                                                                    <input style="display: none" class="checkColor" type="radio" name="color_code" id="color_id-{{$i}}-{{$key}}" value="{{$key}}">
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                    <div class="size row m-0 p-0">
                                                        <div class="size-item col p-0">
                                                            @foreach ($product->attribute->groupBy('sizes.size_code') as $key => $attributes)
                                                                <div class="item">
                                                                    <label onclick="Size('{{$i}}','{{$key}}')" id="size-{{$i}}-{{$key}}" class="labelsize" for="size_id-{{$i}}-{{$key}}">{{$key}}</label>
                                                                    <input class="checkSize" type="radio" name="size_code" id="size_id-{{$i}}-{{$key}}" value="{{$key}}">
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('js')
    {{-- JavaScript --}}
    <script>
        const checkColor = document.querySelectorAll('.checkColor');
        const labelColor = document.querySelectorAll('.labelColor');
        const iconcheck = document.querySelectorAll('.icon-check')
        function coloSet(i,key) {
            const label = document.getElementById(`color-${i}-${key}`);
            const icon = document.getElementById(`icon-${i}-${key}`);
            const input = document.getElementById(`color_id-${i}-${key}`)
            checkColor.forEach(element => {
                element.checked = false;
            });
            labelColor.forEach(element => {
                element.style.width = "50px";
                element.style.border = "none";
                element.style.height = "30px";
            });
            iconcheck.forEach(element => {
                element.style.display = "none";
            });
            input.checked = true;
            if(input.checked) {
                icon.style.display = "block";
                label.style.border = "2px solid black";
            }
        }
        const labelsize = document.querySelectorAll('.labelsize');
        const checkSize = document.querySelectorAll('.checkSize');
        function Size(i,key) {
            const label = document.getElementById(`size-${i}-${key}`);
            const input = document.getElementById(`size_id-${i}-${key}`);
            labelsize.forEach(element => {
                    element.style.background = "none";
                    element.style.border = "1px solid gainsboro";
                    element.style.width = "50px";
                    element.style.height = "30px";
            });
            checkSize.forEach(element => {
                element.checked = false;
            });

            input.checked = true;
            if(input.checked) {
                label.style.background = "gainsboro";
                label.style.border = "2px solid black";
            }
        }   
    </script>
    <script>
        function checkForm(id) {
            const form = document.getElementById(`${id}`);
            if(form.elements.color_code.value == "") {
                alert("Bạn chưa chọn màu!");
                return false;
            }
            if(form.elements.size_code.value == "") {
                alert("Bạn chưa chọn kích thước!");
                return false
            }
            if(form.elements.color_code.value != "" && form.elements.size_code.value != "") {
                return true;
            }
            return false;
        }
    </script>
@endsection