<div class="header-top">
    <div class="container">
        <div class="ht-left">
            <div class="mail-service">
                <i class=" fa fa-envelope"></i>
                hello.colorlib@gmail.com
            </div>
            <div class="phone-service">
                <i class=" fa fa-phone"></i>
                +65 11.188.888
            </div>
        </div>
        <div class="ht-right">
            @if (Auth::user())
                <div class="login-panel d-flex" style="align-items: center !important;">
                    <a href="#" class="text-dark"><i class="fa fa-user"></i> {{Auth::user()->name}}</a>
                    <form action="{{ route('logout') }}" method="POST" class="mx-3">
                        @csrf
                        <button type="submit" class="btn m-0 p-0"><i class="fa-solid fa-right-from-bracket"></i></button>
                    </form>
                </div>
            @else
                <a href="{{ route('login') }}" class="login-panel"><i class="fa fa-user"></i>Đăng nhập</a>
            @endif
            <div class="top-social" style="border-right: none;">
                <a href="#"><i class="ti-facebook"></i></a>
                <a href="#"><i class="ti-twitter-alt"></i></a>
                <a href="#"><i class="ti-linkedin"></i></a>
                <a href="#"><i class="ti-pinterest"></i></a>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="inner-header">
        <div class="row">
            <div class="col-lg-2 col-md-2">
                <div class="logo">
                    <a href="./index.html">
                        <img src="{{ asset('assets/clients/img/logo.png') }}" alt="">
                    </a>
                </div>
            </div>
            <div class="col-lg-7 col-md-7">
                <div class="advanced-search">
                    <button type="button" class="category-btn">All Categories</button>
                    <div class="input-group">
                        <input type="text" placeholder="What do you need?">
                        <button type="button"><i class="ti-search"></i></button>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 text-right col-md-3">
                <ul class="nav-right">
                    <li class="heart-icon">
                        <a href="#">
                            <i class="icon_heart_alt"></i>
                            <span>1</span>
                        </a>
                    </li>
                    <li class="cart-icon">
                        <a href="{{ route('card.index') }}">
                            <i class="icon_bag_alt"></i>
                            <span>{{ session('cart') ? count(session('cart')) : "0" }}</span>
                        </a>
                        <div class="cart-hover">
                            <div class="select-items">
                                <table>
                                    <tbody>
                                        @if (session('cart'))
                                            @foreach (session('cart') as $cart)
                                                <tr>
                                                    <td class="si-pic"><img src="{{ Storage::url($cart['img'][0]) }}" width="70px" height="70px" style="object-fit: cover;" alt=""></td>
                                                    <td class="si-text">
                                                        <div class="product-selected">
                                                            <p>₫{{number_format($cart['price'],0,'','.')}} x {{$cart['quantity']}}</p>
                                                            <h6>{{$cart['name']}}</h6>
                                                            <div style="font-size: 12px;color:gray;"><span>{{$cart['color']}}</span>-<span>{{$cart['size']}}</span></div>
                                                        </div>
                                                    </td>
                                                    <td class="si-close">
                                                        <form action="{{ route('card.update',$cart['attribute_id']) }}" method="post">
                                                            @csrf
                                                            @method('PUT')
                                                            <button type="submit" name="delete_Pr" value="true" class="btn p-0">
                                                                <i class="ti-close"></i>
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                            <div class="select-total">
                                <span>Tổng:</span>
                                <h5>
                                    @if (!Auth::user())
                                        @php
                                            $total = 0;
                                            if(session('cart')) {
                                                foreach (session('cart') as $cart) {
                                                    $total +=$cart['price']*$cart['quantity'];
                                                }   
                                            }
                                            echo number_format($total,0,' ','.')."₫";
                                        @endphp
                                    @else
                                        0₫
                                    @endif
                                </h5>
                            </div>
                            <div class="select-button">
                                <a href="{{ route('card.index') }}" class="primary-btn view-card">Xem Giỏ</a>
                                <a href="#" class="primary-btn checkout-btn">Thanh Toán</a>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
