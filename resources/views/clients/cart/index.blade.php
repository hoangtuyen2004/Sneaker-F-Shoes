@extends('layouts.client')
@section('title')
    Giỏ hàng | F-Shop
@endsection
@section('css')
    {{-- CSS --}}
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css">
    <style>
        .cart-pic img {
            max-width: 170px;
            max-height: 170px;
            object-fit: cover;
        }
        .attribute {
            color: gray;
        }
        tr td {
            padding: 15px 0px !important;
        }
    </style>
@endsection
@section('content')
    {{-- Content --}}
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="#"><i class="fa fa-home"></i> Trang chủ</a>
                        <span>Giỏ hàng</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="shopping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="cart-table">
                        <table>
                            <thead>
                                <tr>
                                    <th>Ảnh</th>
                                    <th class="p-name">Tên sản phẩm</th>
                                    <th>Giá</th>
                                    <th>Số lượng</th>
                                    <th>Tổng</th>
                                    <th>Xóa</th>
                                </tr>
                            </thead>
                            <tbody class="cart">
                                @foreach ($cart as $key=>$element)
                                @foreach ($attributes as $attribute)
                                    @if (Auth::user())
                                        @if ($attribute->id === $element->attributes_id)
                                        <tr>
                                            <td class="cart-pic first-row"><img src="{{ Storage::url($attribute->url_image[0]->url) }}" alt=""></td>
                                            <td class="cart-title first-row">
                                                <h5>{{$attribute->product->name}}</h5>
                                                <div class="attribute">
                                                    <span>Màu: {{$attribute->colors->name}}</span> | <span>Size: {{$attribute->sizes->name}}</span>
                                                </div>
                                            </td>
                                            <td class="p-price first-row">₫{{number_format($attribute->price,0,'','.')}}</td>
                                            <td class="qua-col first-row">
                                                <div class="quantity">
                                                    <form action="{{ route('card.update',$element->id) }}" method="post">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="pro-qty">
                                                            <button type="submit" name="giam" class="dec qtybtn btn m-0 p-0">-</button>
                                                            <input class="quantityInput" type="text" name="cart[{{$key}}][quantity]" data-price="{{$attribute->price}}" value="{{$element->quanlity}}">
                                                            <button type="submit" name="tang" class="inc qtybtn btn m-0 p-0">+</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </td>
                                            <td class="total-price first-row sub-Total">₫{{number_format(($element->quanlity*$attribute->price),0,'','.')}}</td>
                                            <td class="close-td first-row">
                                                <form action="{{ route('card.destroy',$element->id) }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="remove-cart btn m-0 p-0"><i class="ti-close"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endif
                                    @else
                                        @if ($attribute->id === $element['attribute_id'])
                                        <tr>
                                            <td class="cart-pic first-row"><img src="{{ Storage::url($attribute->url_image[0]->url) }}" alt=""></td>
                                            <td class="cart-title first-row">
                                                <h5>{{$attribute->product->name}}</h5>
                                                <div class="attribute">
                                                    <span>Màu: {{$attribute->colors->name}}</span> | <span>Size: {{$attribute->sizes->name}}</span>
                                                </div>
                                            </td>
                                            <td class="p-price first-row">₫{{number_format($attribute->price,0,'','.')}}</td>
                                            <td class="qua-col first-row">
                                                <div class="quantity">
                                                    <form action="{{ route('card.update',$element['attribute_id']) }}" method="post">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="pro-qty">
                                                            <button type="submit" name="giam" class="dec qtybtn btn m-0 p-0">-</button>
                                                            <input class="quantityInput" type="text" name="quantity" data-price="{{$attribute->price}}" value="{{$element['quantity']}}">
                                                            <button type="submit" name="tang" class="inc qtybtn btn m-0 p-0">+</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </td>
                                            <td class="total-price first-row sub-Total">₫{{number_format(($element['quantity']*$attribute->price),0,'','.')}}</td>
                                            <td class="close-td first-row">
                                                <form action="{{ route('card.destroy',$element['attribute_id']) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" name="delete_Pr" class="remove-cart btn m-0 p-0"><i class="ti-close"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endif   
                                    @endif
                                @endforeach
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="cart-buttons">
                                <button type="button" class="primary-btn continue-shop">Tiếp tục mua sắm</button>
                                <button id="saveCart" type="submit" class="primary-btn up-cart">Lưu giỏ</button>
                            </div>
                            <div class="discount-coupon">
                                {{-- <h6>Mã giảm giá</h6>
                                <form action="{{ route('card.index') }}" class="coupon-form" method="post">
                                    @csrf
                                    <input type="text" name="voucher_code" placeholder="Điền mã">
                                    @if (Auth::user())
                                        <button type="button" class="site-btn coupon-btn">Áp dụng</button>
                                    @else
                                        <button type="button" id="addCupon" class="site-btn coupon-btn">Áp dụng</button>
                                    @endif
                                </form> --}}
                            </div>
                        </div>
                        <div class="col-lg-4 offset-lg-4">
                            <form action="{{ route('order.index') }}" class="proceed-checkout">
                                <ul>
                                    <li class="subtotal">Tổng cộng
                                        <span class="subTotal">{{ number_format($subTotal,0,' ','.')."₫" }}</span>
                                    </li>
                                    <li class="subtotal">
                                        Giảm giá <span class="voucher">{{ number_format($voucher,0,' ','.')."₫" }}</span>
                                        @if ($voucher != 0)
                                            <input type="hidden" name="voucher_id" value="{{ $cp->id }}">
                                        @endif
                                    </li>
                                    <li class="cart-total">Tổng     
                                        <span class="total">{{ number_format($total,0,' ','.')."₫" }}</span>
                                    </li>
                                </ul>
                                @if (!Auth::user())
                                    <button type="submit" @if(session('cart')=="") id="disl" @endif class="proceed-btn w-100">Đến trang thanh toán</button>
                                @else
                                <button type="submit" class="proceed-btn w-100">Đến trang thanh toán</button>                               
                                @endif
                            </form>
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
                function updateTotal() {
                    var subTotal = 0;
                    $('.quantityInput').each(function () {
                        var $input = $(this);
                        var price = parseFloat($input.data('price'));
                        var quantity = parseFloat($input.val());
                        subTotal += price * quantity;

                        // Mã giảm giá
                        var voucher = parseFloat($('.voucher').text().replace(/\./g,'').replace('₫', ''));
                        var total = subTotal - voucher;
                        // hiện giá trị
                        $('.voucher').text(voucher.toLocaleString('vi-VN')+'₫');
                        $('.subTotal').text(subTotal.toLocaleString('vi-VN')+'₫');
                        $('.total').text(total.toLocaleString('vi-VN')+'₫');
                    })
                }
                var proQty = $('.pro-qty');
                proQty.on('click', '.qtybtn', function () {
                    var $button = $(this);
                    var url = $(this).attr('data-url');
                    var $input =  $button.parent().find('input');
                    var oldValue = $button.parent().find('input').val();
                    if ($button.hasClass('inc')) {
                        var newVal = parseFloat(oldValue) + 1;
                    } else {
                        // Don't allow decrementing below zero
                        if (oldValue > 1) {
                            var newVal = parseFloat(oldValue) - 1;
                        } else {
                            newVal = 1;
                        }
                    }
                    $input.val(newVal);
                    
                    var price = parseFloat($input.data('price'));
                    var subTotalElement = $input.closest('tr').find('.sub-Total');
                    var newSubtotal = newVal * price;
                    subTotalElement.text('₫' + newSubtotal.toLocaleString('vi-VN'));
                    updateTotal();
                });

                $('.quantityInput').on('change', function() {
                    var value = parseInt($(this).val(), 10);
                    if(isNaN(value) || value < 1) {
                        alert('Số lượng phải lớn hơn hoặc bằng 1');
                        $(this).val(1)
                        var $input =  $(this).parent().find('input');
                        var price = parseFloat($input.data('price'));
                        var subTotalElement = $input.closest('tr').find('.sub-Total');
                        var newSubtotal = 1 * price;
                        subTotalElement.text('₫' + newSubtotal.toLocaleString('vi-VN'));
                        updateTotal();
                    }

                })
                // Xóa sản phẩm trong giỏ hàng
                
                updateTotal()
        </script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    {{-- Sử lý ajax --}}
        <script>
            $('#addCupon').on('click', function(e) {
                swal("Thông báo!", "Cần đăng nhập để sử dụng tính năng này!", "warning");
                return false;
            })
            $('#disl').on('click', function(e) {
                swal("Thông báo!", "Giỏ hàng trống!", "warning");
                return false;
            })
        </script>
@endsection