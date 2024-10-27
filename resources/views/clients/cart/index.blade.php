@extends('layouts.client')
@section('title')
    Giỏ hàng | F-Shop
@endsection
@section('css')
    {{-- CSS --}}
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
                        <form id="cartForm" method="post">
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
                                    @foreach ($cart as $key=>$item)
                                        <tr>
                                            <td class="cart-pic first-row"><img src="{{ Storage::url($item['img'][0]) }}" alt=""></td>
                                            <td class="cart-title first-row">
                                                <h5>{{$item['name']}}</h5><input type="hidden" name="attribute_id" id="attribute_id" value="{{ $item['attribute_id'] }}">
                                                <div class="attribute">
                                                    <span>Màu: {{$item['color']}}</span> | <span>Size: {{$item['size']}}</span>
                                                </div>
                                            </td>
                                            <td class="p-price first-row">₫{{number_format($item['price'],0,'','.')}}</td>
                                            <td class="qua-col first-row">
                                                <div class="quantity">
                                                    <div class="pro-qty">
                                                        <input class="quantityInput" type="text" name="quantity" data-price="{{$item['price']}}" value="{{$item['quantity']}}">
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="total-price first-row sub-Total">₫{{number_format(($item['price']*$item['quantity']),0,'','.')}}</td>
                                            <td class="close-td first-row"><i class="ti-close"></i></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </form>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="cart-buttons">
                                <button class="primary-btn continue-shop">Tiếp tục mua sắm</button>
                                <button id="saveCart" class="primary-btn up-cart">Lưu giỏ</button>
                            </div>
                            <div class="discount-coupon">
                                <h6>Mã giảm giá</h6>
                                <form action="#" class="coupon-form">
                                    <input type="text" placeholder="Điền mã">
                                    <button type="submit" class="site-btn coupon-btn">Áp dụng</button>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-4 offset-lg-4">
                            <div class="proceed-checkout">
                                <ul>
                                    <li class="subtotal">Tổng cộng
                                        <span class="subTotal">{{ number_format($subTotal,0,' ','.')."₫" }}</span>
                                    </li>
                                    <li class="subtotal">Giảm giá <span class="voucher">{{ number_format($voucher,0,' ','.')."₫" }}</span></li>
                                    <li class="cart-total">Tổng 
                                        <span class="total">{{ number_format($total,0,' ','.')."₫" }}</span>
                                    </li>
                                </ul>
                                <a href="#" class="proceed-btn">Thanh toán</a>
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
                proQty.prepend('<span class="dec qtybtn">-</span>');
                proQty.append('<span class="inc qtybtn">+</span>');
                proQty.on('click', '.qtybtn', function () {
                    var $button = $(this);
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
                $('.close-td').on('click', function () {
                    event.preventDefault();
                    var $row = $(this).closest('tr');
                    $row.remove()
                    updateTotal();
                });
                updateTotal()
        </script>
    {{-- Gủi form --}}
        <script>
            $('#saveCart').click(function(event) {
            event.preventDefault();
                const form = document.querySelector('#cartForm');
            });
            
        </script>
@endsection