@extends('layouts.client')
@section('title')
    Sản phẩm | F-Shop
@endsection
@section('css')
    {{-- CSS --}}
    <style>
        .product-big-img {
            max-width: 555px;
            max-height: 655px;
            object-fit: contain;
        }
    </style>
@endsection
@section('content')
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text product-more">
                        <a href="./home.html"><i class="fa fa-home"></i> Home</a>
                        <a href="./shop.html">Shop</a>
                        <span>Detail</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="product-shop spad page-details">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="product-pic-zoom d-flex">
                                @foreach ($product->attribute as $attribute)
                                    @foreach ($attribute->url_image as $img)
                                        <img class="product-big-img" src="{{ Storage::url($img->url) }}" alt="">
                                    @endforeach
                                @endforeach
                            </div>
                            <div class="product-thumbs">
                                <div class="product-thumbs-track ps-slider owl-carousel">
                                    @foreach ($product->attribute as $attribute)
                                        @foreach ($attribute->url_image as $img)
                                            <div class="pt active img_mini" data-imgbigurl="{{ Storage::url($img->url) }}">
                                                <img src="{{ Storage::url($img->url) }}" alt="">
                                            </div>
                                        @endforeach
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <form id="form" action="{{ route('card.store') }}" onsubmit="return false || checkForm('form')" method="post">
                                @csrf
                            <div class="product-details">
                                <div class="pd-title">
                                    <span>{{$product->categorys->name}}</span>
                                    <h3>{{ $product->name }} | {{$product->materials->name}} | {{$product->soles->name}}</h3>
                                    <input type="hidden" name="id" value="{{$product->id}}">
                                </div>
                                <div class="pd-rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o"></i>
                                    <span>(5)</span>
                                </div>
                                <div class="pd-desc">
                                    @if ($product->attribute->min('price') == $product->attribute->max('price'))
                                        <h4><span class="price">₫</span>{{number_format($product->attribute->min('price'),0,'','.')}}</h4>
                                    @else
                                        <h4><span class="price">₫</span>{{ number_format($product->attribute->min('price'),0,'','.') }} - <span class="price">₫</span>{{ number_format($product->attribute->max('price'),0,'','.') }}</h4>
                                    @endif
                                </div>
                                <div class="pd-color">
                                    <h6>Màu sắc:</h6>
                                    <div class="color row m-0 p-0">
                                        <div class="color-item col p-0">
                                            @foreach ($product->attribute->groupBy('colors.color_code') as $key => $attributes)
                                                <div class="item">
                                                    <label onclick="coloSet('{{$key}}')" id="color-{{$key}}" style="background-color:{{$key}};" class="labelColor" for="color_id-{{$key}}">
                                                        <i style="display: none;" id="icon-{{$key}}" class="icon-check fa-solid fa-check"></i>
                                                    </label>
                                                    <input style="display: none" class="checkColor" type="radio" name="color_code" id="color_id-{{$key}}" value="{{$key}}">
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="pd-color d-flex" style="align-items: baseline;">
                                    <h6>Kích thước:</h6>
                                    <div class="size row m-0 p-0">
                                        <div class="size-item col p-0">
                                            @foreach ($product->attribute->groupBy('sizes.size_code') as $key => $attributes)
                                                <div class="item">
                                                    <label onclick="Size('{{$key}}')" id="size-{{$key}}" class="labelsize" for="size_id-{{$key}}">{{$key}}</label>
                                                    <input style="display: none;" class="checkSize" type="radio" name="size_code" id="size_id-{{$key}}" value="{{$key}}">
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="pd-color d-flex" style="align-items: baseline;">
                                    <h6>Số lượng: </h6>
                                    <div class="size row m-0 p-0">
                                        <div class="size-item col p-0">
                                            {{ $product->attribute->sum('quanlity') }}
                                        </div>
                                    </div>
                                </div>
                                <div class="quantity">
                                    <div class="pro-qty">
                                        <input type="text" name="quantity" id="quantity" value="1">
                                    </div>
                                    <button type="submit" class="btn m-0 p-0">
                                        <a class="primary-btn pd-cart">Thêm vào giỏ hàng</a>
                                    </button>
                                </div>
                                <ul class="pd-tags">
                                    <li><span>Thương hiệu: </span>{{ $product->trademarks->name }}</li>
                                    <li><span>Loại giày: </span>{{ $product->categorys->name }}</li>
                                </ul>
                                <div class="pd-share">
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                    <div class="product-tab">
                        <div class="tab-item">
                            <ul class="nav" role="tablist">
                                <li>
                                    <a class="active" data-toggle="tab" href="#tab-1" role="tab">Mô tả</a>
                                </li>
                                <li>
                                    <a data-toggle="tab" href="#tab-2" role="tab">Thông số</a>
                                </li>
                                <li>
                                    <a data-toggle="tab" href="#tab-3" role="tab">Đánh giá</a>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-item-content">
                            <div class="tab-content">
                                <div class="tab-pane fade-in active" id="tab-1" role="tabpanel">
                                    <div class="product-content">
                                        <div class="row">
                                            <div class="col-lg-7">
                                                <h5>Mô tả sản phẩm</h5>
                                                <p>{{ $product->description }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tab-2" role="tabpanel">
                                    <div class="specification-table">
                                        <table>
                                            <tr>
                                                <td class="p-catagory">Giá</td>
                                                <td>
                                                    <div class="p-price">
                                                        @if ($product->attribute->min('price') == $product->attribute->max('price'))
                                                            <span class="price">₫</span>{{number_format($product->attribute->min('price'),0,'','.')}}
                                                        @else
                                                            <span class="price">₫</span>{{ number_format($product->attribute->min('price'),0,'','.') }} - <span class="price">₫</span>{{ number_format($product->attribute->max('price'),0,'','.') }}
                                                        @endif
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="p-catagory">Số lượng</td>
                                                <td>
                                                    <div class="p-stock">{{ $product->attribute->sum('quanlity') }}</div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="p-catagory">Khối lượng</td>
                                                <td>
                                                    <div class="p-weight">
                                                        @if ($product->attribute->min('weight') == $product->attribute->max('weight'))
                                                            <span class="weight"></span>{{$product->attribute->min('weight')}}gam
                                                        @else
                                                            <span class="weight"></span>{{ $product->attribute->min('weight') }}gam - <span class="weight"></span>{{ $product->attribute->max('weight') }}gam
                                                        @endif
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="p-catagory">Kích thước</td>
                                                <td>
                                                    <div class="p-size">
                                                        @foreach ($product->attribute->groupBy('sizes.size_code') as $key => $attributes)
                                                            {{$key}},
                                                        @endforeach
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="p-catagory">Màu sắc</td>
                                                <td>
                                                    @foreach ($product->attribute->groupBy('colors.color_code') as $key => $attributes)
                                                        @foreach ($colors as $color)
                                                            @if ($color->color_code == $key)
                                                                <span class="cs">{{$color->name}}, </span>
                                                            @endif
                                                        @endforeach
                                                    @endforeach
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tab-3" role="tabpanel">
                                    <div class="customer-review-option">
                                        <h4>2 Comments</h4>
                                        <div class="comment-option">
                                            <div class="co-item">
                                                <div class="avatar-pic">
                                                    <img src="{{ asset('assets/clients/img/product-single/avatar-1.png') }}" alt="">
                                                </div>
                                                <div class="avatar-text">
                                                    <div class="at-rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <h5>Brandon Kelley <span>27 Aug 2019</span></h5>
                                                    <div class="at-reply">Nice !</div>
                                                </div>
                                            </div>
                                            <div class="co-item">
                                                <div class="avatar-pic">
                                                    <img src="{{ asset('assets/clients/img/product-single/avatar-2.png') }}" alt="">
                                                </div>
                                                <div class="avatar-text">
                                                    <div class="at-rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <h5>Roy Banks <span>27 Aug 2019</span></h5>
                                                    <div class="at-reply">Nice !</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="personal-rating">
                                            <h6>Your Ratind</h6>
                                            <div class="rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-o"></i>
                                            </div>
                                        </div>
                                        <div class="leave-comment">
                                            <h4>Leave A Comment</h4>
                                            <form action="#" class="comment-form">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <input type="text" placeholder="Name">
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <input type="text" placeholder="Email">
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <textarea placeholder="Messages"></textarea>
                                                        <button type="submit" class="site-btn">Send message</button>
                                                    </div>
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
        </div>
    </section>
    <div class="related-products spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Sản phẩm liên quan</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($products as $i => $product_c)
                    @if ($product_c->id != $product->id)
                        <div class="product-item">
                            <div class="pi-pic">
                                @foreach ($product_c->attribute as $k=>$attributes)
                                    @foreach ($attributes->url_image as $key=>$url_image)
                                        <img class="image-item" style="display:@if($k==0&&$key==0) display @else none @endif" src="{{ Storage::url($url_image->url) }}" alt="">
                                        <input type="hidden" name="id" value="{{$product_c->id}}">
                                    @endforeach
                                @endforeach
                                <ul>
                                    <li class="quick-view"><a href="{{ route('shop-product.show',$product_c->id) }}">+ Xem thêm</a></li>
                                </ul>
                            </div>
                            <div class="pi-content">
                                <div class="pi-text">
                                    <div class="catagory-name">{{$product_c->categorys->name}}</div>
                                    <a href="{{ route('shop-product.show',$product_c->id) }}">
                                        <h5>{{$product_c->name}}</h5>
                                    </a>
                                    <div class="product-price">
                                        @if ($product_c->attribute->min('price') == $product_c->attribute->max('price'))
                                            <span class="price">₫</span>{{number_format($product_c->attribute->min('price'),0,'','.')}}
                                        @else
                                            <span class="price">₫</span>{{number_format($product_c->attribute->min('price'),0,'','.')}} - <span class="price">₫</span>{{number_format($product_c->attribute->max('price'),0,'','.')}}
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
@endsection
@section('js')
    {{-- JavaScript --}}
        <script>
            const checkColor = document.querySelectorAll('.checkColor');
            const labelColor = document.querySelectorAll('.labelColor');
            const iconcheck = document.querySelectorAll('.icon-check')
            function coloSet(key) {
                const label = document.getElementById(`color-${key}`);
                const icon = document.getElementById(`icon-${key}`);
                const input = document.getElementById(`color_id-${key}`)
                checkColor.forEach(element => {
                    element.checked = false;
                });
                labelColor.forEach(element => {
                    element.style.width = "50px";
                    element.style.border = "none";
                    element.style.border = "1px solid gainsboro";
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
            function Size(key) {
                const label = document.getElementById(`size-${key}`);
                const input = document.getElementById(`size_id-${key}`);
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
            $(document).ready(function () {
                $('#quantity').on('change', function() {
                    var value = parseInt($(this).val(), 10);
                    if(isNaN(value) || value < 1) {
                        alert('Số lượng phải lớn hơn hoặc bằng 1');
                        $(this).val(1)
                    }

                })
                // Xóa sản phẩ
            });
        </script>
@endsection