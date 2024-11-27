<div class="be-left-sidebar">
    <div class="left-sidebar-wrapper"><a class="left-sidebar-toggle" href="#">Dashboard</a>
        <div class="left-sidebar-spacer">
            <div class="left-sidebar-scroll">
                <div class="left-sidebar-content">
                    <ul class="sidebar-elements">
                        <li class="divider">Menu</li>
                        <li class="parent"><!-- active -->
                            <a href="/wp-admin">
                                <i class="icon mdi mdi-home"></i><span>Thống kê</span>
                            </a>
                        </li>
                        <li class="parent">
                            <a href="#">
                                <i class="icon mdi mdi-inbox"></i><span>Bán hàng tại quầy</span>
                            </a>
                            <ul class="sub-menu">
                                <li><a href="ui-tabs-accordions.html">Tabs &amp; Accordions</a>
                                </li>
                                <li><a href="ui-nestable-lists.html">Nestable Lists</a>
                                </li>
                            </ul>
                        </li>
                        <li class="parent">
                            <a href="{{ route('wp-admin.order.index') }}">
                                <i class="icon mdi mdi-book"></i><span>Quản lý hóa đơn</span>
                            </a>
                        </li>
                        <li class="parent">
                            <a href="">
                                <i class="icon mdi mdi-layers"></i><span>Quản lý sản phẩm</span>
                            </a>
                            <ul class="sub-menu">
                                <li><a href="{{ route('wp-admin.product.index') }}">Sản phẩm</a>
                                </li>
                                <li><a href="{{ route('wp-admin.sole.index') }}">Đế giày</a>
                                </li>
                                <li><a href="{{ route('wp-admin.category.index') }}">Loại giày</a>
                                </li>
                                <li><a href="{{ route('wp-admin.material.index') }}">Chất liệu</a>
                                </li>
                                <li><a href="{{ route('wp-admin.trademark.index') }}">Thương hiệu</a>
                                </li>
                            </ul>
                        </li>
                        <li class="parent">
                            <a href="#">
                                <i class="icon mdi mdi-dot-circle"></i><span>Trả hàng</span>
                            </a>
                            <ul class="sub-menu">
                                <li><a href="email-inbox.html">Inbox</a>
                                </li>
                                <li><a href="email-read.html">Email Detail</a>
                                </li>
                                <li><a href="email-compose.html">Email Compose</a>
                                </li>
                            </ul>
                        </li>
                        <li class="parent">
                            <a href="#">
                                <i class="icon mdi mdi-view-web"></i><span>Giảm giá</span>
                            </a>
                            <ul class="sub-menu">
                                <li><a href="{{ route('wp-admin.voucher.index') }}">Phiếu giảm giá</a></li>
                                <li><a href="#">Sự kiện giảm giá</a></li>
                            </ul>
                        </li>
                        <li class="parent">
                            <a href="#">
                                <i class="icon mdi mdi-face"></i><span>Tài khoản</span>
                            </a>
                            <ul class="sub-menu">
                                <li><a href="{{ route('wp-admin.member.index') }}">Quản lý nhân viên</a>
                                </li>
                                <li><a href="{{ route('wp-admin.user.index') }}">Quản lý khách hàng</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>