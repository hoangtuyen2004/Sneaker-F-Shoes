@php
    use App\Models\Category;
    use App\Models\Trademark;
    $LG = Category::query()->get();
    $TH = Trademark::query()->get();
@endphp
<div class="nav-item">
    <div class="container">
        <div class="nav-depart">
            <div class="depart-btn">
                <i class="ti-menu"></i>
                <span>Danh mục</span>
                <ul class="depart-hover">
                    <li>
                        <h5 style="padding: 0px 30px;margin-top: 14px;padding-bottom: 8px;border-bottom: 1px solid rgb(209, 209, 209)"><strong>Loại giày</strong></h5>
                    </li>
                    @foreach ($LG as $category)
                        <li><a href="{{ route('category',$category->id) }}">{{$category->name}}</a></li>
                    @endforeach
                    <li>
                        <h5 style="padding: 0px 30px;margin-top: 14px;padding-bottom: 8px;border-bottom: 1px solid rgb(209, 209, 209)"><strong>Thương hiệu</strong></h5>
                    </li>
                    @foreach ($TH as $trademark)
                        <li><a href="{{ route('trademarks',$trademark->id) }}">{{$trademark->name}}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
        <nav class="nav-menu mobile-menu">
            <ul>
                <li><a href="/">Trang chủ</a></li>
                <li><a href="{{ route('shop-product.index') }}">Sản phẩm</a></li>
                <li><a href="#">Tra cứu hóa đơn</a></li>
            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
    </div>
</div>
