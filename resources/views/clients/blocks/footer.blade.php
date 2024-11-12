<div class="container">
    <div class="row">
        <div class="col-lg-3 offset-lg-1">
            <div class="footer-widget">
                <h5>Trang</h5>
                <ul>
                    <li><a href="/">Trang chủ</a></li>
                    <li><a href="{{ route('shop-product.index') }}">Sản phẩm</a></li>
                    <li><a href="#">Mã giảm giá</a></li>
                    <li><a href="#">Serivius</a></li>
                </ul>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="footer-widget">
                <h5>Tài khoản</h5>
                @if (Auth::user())
                    <ul>
                        <li><a href="{{ route('wp-client.my-account') }}">Tài khoản của tôi</a></li>
                        <li><a href="{{ route('card.index') }}">Giỏ hàng</a></li>
                        <li><a href="#">Hóa đơn</a></li>
                        <li><a href="#">Mã giảm giá</a></li>
                    </ul>
                @else
                    <ul>
                        <li><a href="{{ route('login') }}">Đăng nhập</a></li>
                        <li><a href="{{ route('register') }}">Đăng ký</a></li>
                    </ul>
                @endif
            </div>
        </div>
        <div class="col-lg-5">
            <div class="newslatter-item">
                <h5>Tìm hóa đơn</h5>
                <p>Mã hóa đơn của bạn.</p>
                <form action="#" class="subscribe-form">
                    <input type="text" placeholder="HD_">
                    <button type="button">Tìm kiếm</button>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="copyright-reserved">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="copyright-text">
                    Copyright &copy;
                    <script>
                        document.write(new Date().getFullYear());
                    </script> All rights reserved 
                </div>
            </div>
        </div>
    </div>
</div>