<header class="header-area">
        <div class="mask__top">
            <div class="header-wrap">
                <div class="trademark">
                    <a href="#" class="trademark__link">
                        <div class="trademark__logo">
                                <!-- <img src="assets/imgs/brands/phoenix.png" alt=""> -->
                                <img src="{{ asset('assets/theme/imgs/logo/phoenixaudio_logo.png') }}" alt="">
                        </div>
                    </a>
                </div>
                <nav class="mainmenu">
                    <a id="show-about" href="#" class="mainmenu__link">Giới thiệu</a>
                    <a href="{{ route('theme.project') }}" class="mainmenu__link">Dự án</a>
                    <a href="{{ route('theme.news') }}" class="mainmenu__link">Tin tức</a>
                    <a href="{{ route('theme.dealer') }}" class="mainmenu__link">Đại lý</a>
                    <a href="{{ route('theme.support') }}" class="mainmenu__link">Hỗ trợ</a>
                    <a href="{{ route('theme.support') }}" class="mainmenu__link">Tải về</a>
                    <a href="{{ route('theme.contact') }}" class="mainmenu__link">Liên hệ</a>
                </nav>
                <div class="searchbar">
                    <form action="">
                        <input type="text" placeholder="Nhập từ khóa bạn muốn tìm kiếm ...">
                        <button><i class="fa-solid fa-magnifying-glass"></i></button>
                    </form>
                </div>
                <div class="morewrap">
                    <div class="dropdown">
                        <button class="morewrap__btn dropdown-btn"><i class="fa-solid fa-globe"></i></button>
                        <div class="dropdown-menu">
                            <a href="#" class="dropdown-menu__link">English</a>
                            <a href="#" class="dropdown-menu__link">Tiếng Việt</a>
                        </div>
                    </div>
                    <!-- <div class="dropdown">
                        <button class="morewrap__btn dropdown-btn"><i class="fa-solid fa-circle-user"></i></button>
                        <div class="dropdown-menu">
                            <a href="#" class="dropdown-menu__link">Đăng nhập</a>
                            <a href="#" class="dropdown-menu__link">Tạo tài khoản</a>
                        </div>
                    </div> -->
                    <button id="moreButton" class="morewrap__btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"><i class="fa-solid fa-bars"></i></button>

                    <div class="m-area offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
                        <div class="offcanvas-header">
                            <h5 class="offcanvas-title" id="offcanvasRightLabel"></h5>
                            <button type="button" class="morewrap__btn" data-bs-dismiss="offcanvas" aria-label="Close"><i class="fa-solid fa-xmark"></i></button>
                        </div>
                        <div class="offcanvas-body">
                            <nav class="m-mainmenu">
                                <a href="{{ route('theme.about') }}" class="mainmenu__link m-mainmenu__link">Giới thiệu</a>
                                <a href="{{ route('theme.project') }}" class="mainmenu__link m-mainmenu__link">Dự án</a>
                                <a href="{{ route('theme.news') }}" class="mainmenu__link m-mainmenu__link">Tin tức</a>
                                <a href="{{ route('theme.dealer') }}" class="mainmenu__link m-mainmenu__link">Đại lý</a>
                                <a href="{{ route('theme.support') }}" class="mainmenu__link m-mainmenu__link">Hỗ trợ</a>
                                <a href="{{ route('theme.support') }}" class="mainmenu__link m-mainmenu__link">Tải về</a>
                                <a href="{{ route('theme.contact') }}" class="mainmenu__link m-mainmenu__link">Liên hệ</a>
                            </nav>
                            <div class="m-product-portfolio-wrap">
                                <button id="toggleMenuMobileBtn"><i class="fa-solid fa-bars-staggered"></i> <span>Danh mục sản phẩm</span></button>
                                <div class="m-product-portfolio-toggle">
                                    @if($cates != null)
                                        <ul class="m-product-portfolio">
                                        @foreach($cates as $cate)
                                            @if($cate->parent_id == 11)
                                            <li class="m-product-wrap">
                                                <div class="m-product">
                                                    <a href="{{ route('theme.category',$cate->slug) }}" class="m-product__link">{{$cate->name}}</a>
                                                    @if(count($cate->childs) != 0) 
                                                        <span class="m-product__btn-toggle"><i class="fa-solid fa-angle-down"></i></span>
                                                    @endif
                                                </div>
                                                @if(count($cate->childs) != 0) 
                                                    <ul class="m-sub-product-portfolio">
                                                        @foreach($cate->childs as $child)
                                                        <li class="sub-product-wrap">
                                                            <div class="m-sub-product">
                                                                <a href="" class="sub-product__link">{{$child->name}}</a>
                                                            </div>
                                                        </li>
                                                        @endforeach
                                                    </ul>
                                                @endif
                                            </li> 
                                            @endif
                                        @endforeach    
                                        </ul>
                                    @endif
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end test -->
                </div>
            </div>
        </div>
        <div class="mask">
            <div class="header-wrap header-wrap--gray">
                <div class="toggle-menu">
                    <button id="toggleMenuBtn"><i class="fa-solid fa-bars-staggered"></i> <span>Danh mục sản phẩm</span></button>
                </div>
                <div class="brands">
                    <nav>
                        <a href="" class="brands__name">
                            <img src="{{ asset('assets/theme/imgs/brands/powersoft.png') }}" alt="" width="60">
                        </a>
                        <a href="" class="brands__name">
                            <img src="{{ asset('assets/theme/imgs/brands/nova.png') }}" alt="" width="60">
                        </a>
                        <a href="" class="brands__name">
                            <img src="{{ asset('assets/theme/imgs/brands/dmx1.png') }}" alt="" width="60">
                        </a>
                        <a href="" class="brands__name">
                            <img src="{{ asset('assets/theme/imgs/brands/lspro.png') }}" alt="" width="60">
                        </a>
                        <a href="" class="brands__name">
                            <img src="{{ asset('assets/theme/imgs/brands/magicktv.png') }}" alt="" width="60">
                        </a>
                        <a href="" class="brands__name">
                            <img src="{{ asset('assets/theme/imgs/brands/phoenix.png') }}" alt="" width="60">
                        </a>
                        <a href="" class="brands__name">
                            <img src="{{ asset('assets/theme/imgs/brands/nexo.png') }}" alt="" width="60">
                        </a>
                        <a href="" class="brands__name">
                            <img src="{{ asset('assets/theme/imgs/brands/magicktv.png') }}" alt="" width="60">
                        </a>
                        <a href="" class="brands__name">
                            <img src="{{ asset('assets/theme/imgs/brands/magicktv.png') }}" alt="" width="60">
                        </a>
                    </nav>
                </div>
            </div>
            <div class="product-portfolio-toggle">
                <ul class="product-portfolio">
               
                    @if($cates != null)
                        @foreach($cates as $cate)
                            @if($cate->parent_id == 11)
                            <li class="product-wrap">
                                <a href="{{ route('theme.category',$cate->slug) }}" class="product__link">{{$cate->name}}
                                @if(count($cate->childs) != 0) 
                                    <i class="fa-solid fa-angle-right"></i>
                                @endif
                                </a>
                                @if(count($cate->childs) != 0) 
                                    <ul class="sub-product-portfolio">
                                        @foreach($cate->childs as $child)
                                        <li class="sub-product-wrap">
                                            <a href="" class="sub-product__link">{{$child->name}}</a>
                                        </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </li> 
                            @endif
                        @endforeach    
                    @endif
                    
                </ul>
            </div>
            <section class="homeabout-area" style="display:none;">
                <div class="homeabout-wrap">
                    <div class="homeabout-title">
                        <h2>phoenix</h2>
                    </div>
                    <div class="homeabout__content">
                        <h5>Công ty Cổ phần Điện Tử và Công nghệ Phượng Hoàng</h5>
                        <p>Công ty Cổ phần Điện Tử và Công nghệ Phượng Hoàng, tiền thân là Công ty Cổ phần Điện Tử Phượng Hoàng (Công ty Phượng Hoàng)<br>
                        Được thành lập từ năm 2015, trải qua gần 10 năm hoạt động và phát triển, Chúng tôi  được biết đến là một trong những công ty thương mại chuyên cung cấp thiết bị âm thanh chuyên nghiệp hàng đầu Việt Nam. Chúng tôi định hướng phát triển công ty theo hướng doanh nghiệp có giá trị bền vững. Điều này dựa trên tiêu chí là luôn đảm bảo duy trì hài hòa lợi ích của công ty với khách hàng, đối tác và người lao động.</p>
                    </div>
                    <a href="{{ route('theme.about') }}" class="homeabout__link inner-about">Tìm hiểu thêm</a>
                </div>
            </section>
        </div>
    
    </header>

    