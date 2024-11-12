<div class="AlOrL">
    <div class="header-order">
        <a id="Btn_back" href="#"><i class="fa-solid fa-arrow-left"></i> Quay lại</a>
        <div class="left-content">
            <div class="order-code">MÃ HÓA ĐƠN - {{$order->order_code}}</div>
            <div class="lAL"></div>
            <div class="order-status">{{$order->status_orders->max()->name_status}}</div>
        </div>
    </div>
    <div class="OrDer_I">
        <div class="leNd">
            @foreach ($order->status_orders as $status)
                <div class="status_OdK">
                    <div class="icon">
                        <i class="fa-solid fa-file-invoice"></i>
                    </div>
                    <div class="name-status">
                        {{$status->name_status}}
                    </div>
                    <div class="date-status">
                        {{ $status->created_at->format('H:i:s'.' - '.'d/m/Y') }}
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="btnOnTp">
        @if ($order->status_orders->max()->name_status == "Hoàn thành" || $order->status_orders->max()->name_status == "Đã hủy")
            <div class="itemBTN">
                <button class="btn-BuyAgain">Mua lại</button>
            </div>
        @endif
        @if ($order->status_orders->max()->name_status == "Chờ xác nhận")
            <div class="itemBTN">
                <form class="form-cancel" action="{{ route('order.update',$order->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <button data-id="{{$order->id}}" class="btn-Cancel">Hủy đơn</button>
                </form>
            </div>
        @endif
    </div>
    <div class="TWLNg9">
        <div class="RO2wsz"></div>
    </div>
    <div class="LoaCtON">
        <div class="header-location">
            <div class="TiXeL">Địa Chỉ Nhận Hàng</div>
            <div class="TiXeR"></div>
        </div>
        <div class="LccIT">
            <div class="LocTL">
                <div class="nameLCT">
                    {{ $order->recipient_name }}
                </div>
                <div class="TextLCT">
                    <span>{{ $order->phone_number }}</span>
                    <span>{{ $order->location_description }} - {{ $order->commune }} - {{ $order->district }} - {{ $order->city }}</span>
                </div>
            </div>
            <div class="LocTR">
            </div>
        </div>
    </div>
    <div class="ProDList">
        @foreach ($order->product_lists as $product)
            <div class="ProDuItem">
                <div class="PrCt">
                    <img src="{{ Storage::url($product->attribute->url_image[0]->url) }}" class="pic-Img" alt="">
                    <div class="TexPro">
                        <div class="namePro"><a href="{{ route('shop-product.show',$product->attribute->product->id) }}">{{$product->product_name}}</a></div>
                        <div class="attribute">Phân loại: màu-{{$product->color_name}} | size-{{$product->size_name}}</div>
                        <div>x {{$product->quanlity}}</div>
                    </div>
                </div>
                <div class="PrPr">
                    @if ($product->attribute->price !== $product->price)
                        <span class="Pr2">{{ number_format($product->price,0,'','.') }}₫</span>
                    @else
                        <span class="Pr1">{{ number_format($product->attribute->price,0,'','.') }}₫</span>
                        <span class="Pr2">{{ number_format($product->price,0,'','.') }}₫</span>
                    @endif
                    
                </div>
                <div class="sTaet">
                    @if ($order->status_orders->max()->name_status == "Hoàn thành")
                        <div class="tt">Đánh giá</div>
                        <div class="point">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                        </div>
                    @endif
                </div>
            </div>    
        @endforeach
    </div>
    <div class="ToTOde">
        <div class="TloY">
            <div class="TLeft">Tổng tiền hàng</div>
            <div class="TRight">{{ number_format($order->total,0,'','.') }}₫</div>
        </div>
        <div class="TloY">
            <div class="TLeft">Giảm giá từ cửa hàng</div>
            <div class="TRight">{{ number_format($order->discount_value,0,'','.') }}₫</div>
        </div>
        <div class="TloY">
            <div class="TLeft">Phí vận chuyển</div>
            <div class="TRight">{{ number_format($order->ship,0,'','.') }}₫</div>
        </div>
        <div class="TloY">
            <div class="TLeft">Voucher</div>
            <div class="TRight">{{ number_format($order->coupons_value,0,'','.') }}₫</div>
        </div>
        <div class="TloY">
            <div class="TLeft">Thành tiền</div>
            <div class="TRight">{{  number_format($order->coin,0,'','.') }}</div>
        </div>
        <div class="TloY">
            <div class="TLeft">Phương thức thanh toán</div>
            <div class="TRight">{{ $order->payment_method }}</div>
        </div>
    </div>
</div>
