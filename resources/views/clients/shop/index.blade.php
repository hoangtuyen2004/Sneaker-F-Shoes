@extends('layouts.client')
@section('title')
    Cửa hàng | F-Shop
@endsection
@section('css')
    {{-- CSS --}}
@endsection
@section('content')
    {{-- Content --}}
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="#"><i class="fa fa-home"></i> Home</a>
                        <span>Shop</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="product-shop spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-8 order-2 order-lg-1 produts-sidebar-filter">
                    <div class="filter-widget">
                        <h4 class="fw-title">Loại giày</h4>
                        <ul class="filter-catagories">
                            @foreach ($categorys as $category)
                                <li><a href="{{ route('category',$category->id) }}">{{$category->name}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="filter-widget">
                        <h4 class="fw-title">Thương hiệu</h4>
                        <ul class="filter-catagories">
                            @foreach ($trademarks as $trademark)
                                <li><a href="{{ route('trademarks',$trademark->id) }}">{{$trademark->name}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="filter-widget">
                        <h4 class="fw-title">Giá</h4>
                        <div class="filter-range-wrap">
                            <div class="range-slider">
                                <div class="price-input">
                                    <input type="text" id="minamount">
                                    <input type="text" id="maxamount">
                                </div>
                            </div>
                            <div class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"
                                data-min="{{$min_price}}" data-max="{{$max_price}}">
                                <div class="ui-slider-range ui-corner-all ui-widget-header"></div>
                                <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                                <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                            </div>
                        </div>
                        <a href="#" class="filter-btn">Filter</a>
                    </div>
                    <div class="filter-widget">
                        <h4 class="fw-title">Màu sắc</h4>
                        <div class="fw-color-choose" style="display: inline-block;">
                            @foreach ($colors as $color)
                                <style>
                                    .filter-widget .fw-color-choose .cs-item label.{{$color->name}}:before {
                                        border:0.5px solid gray;
                                        background: {{ $color->color_code }};
                                    }
                                </style>
                                <div class="cs-item">
                                    <input type="radio" id="{{$color->name}}">
                                    <label class="{{$color->name}}" for="{{$color->name}}">{{$color->name}}</label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="filter-widget">
                        <h4 class="fw-title">Size</h4>
                        <div class="fw-size-choose">
                            @foreach ($sizes as $size)
                                <div class="sc-item">
                                    <input type="radio" id="{{ $size->code }}">
                                    <label for="{{ $size->code }}">{{ $size->name }}</label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 order-1 order-lg-2">
                    <div class="product-show-option">
                        <div class="row">
                            <div class="col-lg-7 col-md-7">
                                <div class="select-option">
                                    <select class="sorting">
                                        <option value="">Sắp xếp mặc định</option>
                                        <option value="">Sắp xếp mặc định</option>
                                    </select>
                                    <select class="p-show">
                                        <option value="">Hiển thị:</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-5 col-md-5 text-right">
                            </div>
                        </div>
                    </div>
                    <div class="product-list">
                        <div class="row">
                            @foreach ($products as $i => $product)
                                <form id="form_{{$i}}" action="{{ route('card.store') }}" onsubmit="return false || checkForm('form_{{$i}}')" method="post" class="col-lg-4 col-sm-6">
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
                                                <a href="{{ route('shop-product.show',$product->id) }}">
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
    <script>
        var rangeSlider = $(".price-range"),
            minamount = $("#minamount"),
            maxamount = $("#maxamount"),
            minPrice = rangeSlider.data('min'),
            maxPrice = rangeSlider.data('max');
            rangeSlider.slider({
            range: true,
            min: minPrice,
            max: maxPrice,
            values: [minPrice, maxPrice],
            slide: function (event, ui) {
                minamount.val(ui.values[0]);
                maxamount.val(ui.values[1]);
            }
        });
        minamount.val(rangeSlider.slider("values", 0));
        maxamount.val(rangeSlider.slider("values", 1));
    </script>
@endsection