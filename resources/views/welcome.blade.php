<!doctype html>
<html lang="en">

<!-- Mirrored from template.annimexweb.com/optimal/{{ asset('home') }} by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 14 Jul 2023 20:26:39 GMT -->

<head>
    <!--Required Meta Tags-->
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="description">
    <meta content="width=device-width,initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
    <meta name="theme-color" content="#234556">
    <meta https-equiv="Content-Language" content="vi" />
    <meta content="VN" name="geo.region" />
    <meta name="DC.language" scheme="utf-8" content="vi" />
    <meta name="language" content="Việt Nam">
    <meta name="revisit-after" content="1 days" />
    <meta name='robots' content='index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1' />
    <meta name="description" content="{{ $meta_description }}" />
    <link rel="canonical" href="{{ $meta_url }}">
    <link rel="next" href="" />
    <meta property="og:locale" content="vi_VN" />
    <meta property="og:title" content="{{ $meta_title }}" />
    <meta property="og:description" content="{{ $meta_description }}" />
    <meta property="og:url" content="{{ $meta_url }}" />
    <meta property="og:site_name" content="{{ $meta_title }}" />
    <meta property="og:image" content="{{ $meta_image }}" />
    <meta property="og:image:width" content="300" />
    <meta property="og:image:height" content="55" />
    {{-- twitter meta tag --}}
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:site" content="{{ $meta_url }}" />
    <meta name="twitter:title" content="{{ $meta_title }}" />
    <meta name="twitter:description" content="{{ $meta_description }}" />
    <meta name="twitter:image" content="{{ $meta_image }}" />
    {{-- facebook meta tag html --}}
    <meta property="og:url" content="{{ $meta_url }}" />
    <meta property="og:title" content="{{ $meta_title }}" />
    <meta property="og:description" content="{{ $meta_description }}" />
    <meta property="og:image" content="{{ $meta_image }}" />
    {{-- google meta tag html --}}
    <meta itemprop="name" content="{{ $meta_title }}" />
    <meta itemprop="description" content="{{ $meta_description }}" />
    <!-- Title Of Site -->
    <title>{{ $meta_title }}</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}" />
    <!-- Plugins CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/plugins.css') }}" />
    <!-- Main Style CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}" />
    <link rel="stylesheet" type="text/css"
        href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.5/dist/sweetalert2.min.css">
</head>

<body class="template-product template-index">
    <!-- Page Loader -->
    <div id="pre-loader"><img src="{{ asset('assets/images/loader.gif') }}" alt="Loading..." /></div>
    <!-- End Page Loader -->

    <!--Page Wrapper-->
    <div class="page-wrapper">
        <!--Header-->
        <div id="header" class="header">
            <div class="header-main">
                <header class="header-wrap container d-flex align-items-center">
                    <div class="row g-0 align-items-center w-100">
                        <!--Social Icons-->
                        <div class="col-4 col-sm-4 col-md-4 col-lg-5 d-none d-lg-block">
                            <ul class="social-icons list-inline">
                                <li class="list-inline-item"><a href="#"><i class="an an-facebook"
                                            aria-hidden="true"></i><span class="tooltip-label">Facebook</span></a></li>
                                <li class="list-inline-item"><a href="#"><i class="an an-twitter"
                                            aria-hidden="true"></i><span class="tooltip-label">Twitter</span></a></li>
                                <li class="list-inline-item"><a href="#"><i class="an an-pinterest-p"
                                            aria-hidden="true"></i><span class="tooltip-label">Pinterest</span></a>
                                </li>
                                <li class="list-inline-item"><a href="#"><i class="an an-instagram"
                                            aria-hidden="true"></i><span class="tooltip-label">Instagram</span></a>
                                </li>
                                <li class="list-inline-item"><a href="#"><i class="an an-tiktok"
                                            aria-hidden="true"></i><span class="tooltip-label">TikTok</span></a></li>
                                <li class="list-inline-item"><a href="#"><i class="an an-whatsapp"
                                            aria-hidden="true"></i><span class="tooltip-label">Whatsapp</span></a>
                                </li>
                            </ul>
                        </div>
                        <!--End Social Icons-->
                        <!--Logo / Menu Toggle-->
                        <div class="col-6 col-sm-6 col-md-6 col-lg-2 d-flex">
                            <!--Mobile Toggle-->
                            <button type="button"
                                class="btn--link site-header__menu js-mobile-nav-toggle mobile-nav--open me-3 d-lg-none"><i
                                    class="icon an an-times-l"></i><i class="icon an an-bars-l"></i></button>
                            <!--End Mobile Toggle-->
                            <!--Logo-->
                            <div class="logo mx-lg-auto"><a href="{{ asset('home') }}"><img class="logo-img"
                                        src="{{ asset('assets/images/logo.svg') }}"
                                        alt="Optimal Multipurpose eCommerce Bootstrap 5 Html Template"
                                        title="Optimal Multipurpose eCommerce Bootstrap 5 Html Template" /><span
                                        class="logo-txt d-none">Optimal</span></a></div>
                            <!--End Logo-->
                        </div>
                        <!--End Logo / Menu Toggle-->
                        <!--Right Action-->
                        <div class="col-6 col-sm-6 col-md-6 col-lg-5 icons-col text-right d-flex justify-content-end">
                            <!--Search-->
                            <div class="site-search iconset"><i class="icon an an-search-l"></i><span
                                    class="tooltip-label">@lang('lang.search')</span></div>
                            <!--End Search-->
                            <!--Wishlist-->
                            <div class="wishlist-link iconset">
                                <a href="my-wishlist.html"><i class="icon an an-heart-l"></i><span
                                        class="wishlist-count counter d-flex-center justify-content-center position-absolute translate-middle rounded-circle">0</span><span
                                        class="tooltip-label">@lang('lang.wishlist')</span></a>
                            </div>
                            <!--End Wishlist-->
                            <!--Setting Dropdown-->
                            <div class="user-link iconset"><i class="icon an an-user-expand"></i><span
                                    class="tooltip-label">@lang('lang.account')</span></div>
                            <div id="userLinks">
                                <ul class="user-links">
                                    @php
                                        $customer_id = Session('customer_id');
                                        $shipping_id = Session('shipping_id');
                                        $name = session('customer_name');
                                    @endphp
                                    @if ($customer_id != null && $shipping_id == null)
                                        <li>
                                            <a href="{{ asset('checkout') }}"><i class="fa fa-crosshairs"></i>
                                                @lang('lang.pay')</a>
                                        </li>
                                    @else
                                        <li>
                                            <a href="{{ asset('login-checkout') }}"><i class="fa fa-crosshairs"></i>
                                                @lang('lang.pay')</a>
                                        </li>
                                    @endif
                                    <li>
                                        <a href="{{ asset('cart') }}"><i class="fa fa-shopping-cart"></i>
                                            @lang('lang.cart')</a>
                                    </li>
                                    @if ($customer_id != null)
                                        <li>
                                            <a href="{{ asset('history') }}"><i class="fa fa-lock"></i>
                                                @lang('lang.order_history')</a>
                                        </li>
                                        <li>
                                            <a href="{{ asset('logout-checkout') }}"><i class="fa fa-lock"></i>
                                                @lang('lang.logout')({{ $name }})</a>
                                        </li>
                                    @else
                                        <li>
                                            <a href="{{ asset('login-checkout') }}"><i class="fa fa-lock"></i>
                                                @lang('lang.login')</a>
                                        </li>
                                    @endif
                                </ul>
                            </div>
                            <!--End Setting Dropdown-->
                            <!--Minicart Drawer-->
                            <div class="header-cart iconset">
                                <a href="cart-style1.html" class="site-header__cart btn-minicart"
                                    data-bs-toggle="modal" data-bs-target="#minicart-drawer">
                                    <i class="icon an an-sq-bag"></i><span
                                        class="site-cart-count counter d-flex-center justify-content-center position-absolute translate-middle rounded-circle">2</span><span
                                        class="tooltip-label">@lang('lang.cart')</span>
                                </a>
                            </div>
                            <!--End Minicart Drawer-->
                            <!--Setting Dropdown-->
                            <div class="setting-link iconset pe-0"><i class="icon an an-right-bar-s"></i><span
                                    class="tooltip-label">Cài đặt</span></div>
                            <div id="settingsBox">
                                <div class="currency-picker">
                                    <span class="ttl">Select Currency</span>
                                    <ul id="currencies" class="cnrLangList">
                                        <li class="selected"><a href="#;" class="active">INR</a></li>
                                        <li><a href="#;">GBP</a></li>
                                        <li><a href="#;">CAD</a></li>
                                        <li><a href="#;">USD</a></li>
                                        <li><a href="#;">AUD</a></li>
                                        <li><a href="#;">EUR</a></li>
                                        <li><a href="#;">JPY</a></li>
                                    </ul>
                                </div>
                                <div class="language-picker">
                                    <span class="ttl">@lang('lang.language')</span>
                                    <ul id="language" class="cnrLangList">
                                        <li><a href="{{ asset('lang/vi') }}">Tiếng việt</a></li>
                                        <li><a href="{{ asset('lang/en') }}">Tiếng Anh</a></li>
                                        <li><a href="{{ asset('lang/cn') }}">Tiếng Trung</a></li>
                                    </ul>
                                </div>
                            </div>
                            <!--End Setting Dropdown-->
                        </div>
                        <!--End Right Action-->
                    </div>
                </header>
                <!--Main Navigation Desktop-->
                <div class="menu-outer">
                    <nav class="container">
                        <div class="row">
                            <div class="col-1 col-sm-12 col-md-12 col-lg-12 align-self-center d-menu-col">
                                <!--Desktop Menu-->
                                <nav class="grid__item" id="AccessibleNav">
                                    <ul id="siteNav" class="site-nav medium center hidearrow">
                                        <li class="lvl1 parent megamenu"><a href="#;">Nữ <i
                                                    class="an an-angle-down-l"></i></a>
                                            <div class="megamenu style1">
                                                <div class="row">
                                                    <div class="col-md-8 col-lg-8">
                                                        <div class="row">
                                                            <div class="lvl-1 col-md-5 col-lg-4">
                                                                <a href="#"
                                                                    class="site-nav lvl-1 menu-title">Home Styles</a>
                                                                <ul class="subLinks">
                                                                    <li class="lvl-2"><a href="{{ asset('home') }}"
                                                                            class="site-nav lvl-2">Home 01 -
                                                                            Default</a></li>
                                                                    <li class="lvl-2"><a href="index-demo2.html"
                                                                            class="site-nav lvl-2">Home 02 -
                                                                            Minimal</a></li>
                                                                    <li class="lvl-2"><a href="index-demo3.html"
                                                                            class="site-nav lvl-2">Home 03 -
                                                                            Colorful</a></li>
                                                                    <li class="lvl-2"><a href="index-demo4.html"
                                                                            class="site-nav lvl-2">Home 04 - Modern</a>
                                                                    </li>
                                                                    <li class="lvl-2"><a href="index-demo5.html"
                                                                            class="site-nav lvl-2">Home 05 - Kids
                                                                            Clothing</a></li>
                                                                    <li class="lvl-2"><a href="index-demo6.html"
                                                                            class="site-nav lvl-2">Home 06 - Single
                                                                            Product</a></li>
                                                                    <li class="lvl-2"><a href="index-demo7.html"
                                                                            class="site-nav lvl-2">Home 07 -
                                                                            Glamour</a></li>
                                                                    <li class="lvl-2"><a href="index-demo8.html"
                                                                            class="site-nav lvl-2">Home 08 - Simple</a>
                                                                    </li>
                                                                    <li class="lvl-2"><a href="index-demo9.html"
                                                                            class="site-nav lvl-2">Home 09 - Cool <span
                                                                                class="lbl nm_label1">Hot</span></a>
                                                                    </li>
                                                                    <li class="lvl-2"><a href="index-demo10.html"
                                                                            class="site-nav lvl-2">Home 10 -
                                                                            Cosmetic</a></li>
                                                                </ul>
                                                            </div>
                                                            <div class="lvl-1 col-md-5 col-lg-4">
                                                                <a href="#"
                                                                    class="site-nav lvl-1 menu-title">Home Styles</a>
                                                                <ul class="subLinks">
                                                                    <li class="lvl-2"><a href="index-demo11.html"
                                                                            class="site-nav lvl-2">Home 11 - Pets <span
                                                                                class="lbl nm_label3">Popular</span></a>
                                                                    </li>
                                                                    <li class="lvl-2"><a href="index-demo12.html"
                                                                            class="site-nav lvl-2">Home 12 - Tools &
                                                                            Parts</a></li>
                                                                    <li class="lvl-2"><a href="index-demo13.html"
                                                                            class="site-nav lvl-2">Home 13 - Watches
                                                                            <span class="lbl nm_label1">Hot</span></a>
                                                                    </li>
                                                                    <li class="lvl-2"><a href="index-demo14.html"
                                                                            class="site-nav lvl-2">Home 14 - Food</a>
                                                                    </li>
                                                                    <li class="lvl-2"><a href="index-demo15.html"
                                                                            class="site-nav lvl-2">Home 15 -
                                                                            Christmas</a></li>
                                                                    <li class="lvl-2"><a href="index-demo16.html"
                                                                            class="site-nav lvl-2">Home 16 - Phone
                                                                            Case</a></li>
                                                                    <li class="lvl-2"><a href="index-demo17.html"
                                                                            class="site-nav lvl-2">Home 17 -
                                                                            Jewelry</a></li>
                                                                    <li class="lvl-2"><a href="index-demo18.html"
                                                                            class="site-nav lvl-2">Home 18 - Bag <span
                                                                                class="lbl nm_label3">Popular</span></a>
                                                                    </li>
                                                                    <li class="lvl-2"><a href="index-demo19.html"
                                                                            class="site-nav lvl-2">Home 19 -
                                                                            Swimwear</a></li>
                                                                    <li class="lvl-2"><a href="index-demo20.html"
                                                                            class="site-nav lvl-2">Home 20 - Furniture
                                                                            <span class="lbl nm_label2">New</span></a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                            <div class="lvl-1 col-md-5 col-lg-4">
                                                                <a href="#"
                                                                    class="site-nav lvl-1 menu-title">Home Styles</a>
                                                                <ul class="subLinks">
                                                                    <li class="lvl-2"><a href="index-demo21.html"
                                                                            class="site-nav lvl-2">Home 21 - Party
                                                                            Supplies</a></li>
                                                                    <li class="lvl-2"><a href="index-demo22.html"
                                                                            class="site-nav lvl-2">Home 22 -
                                                                            Digital</a></li>
                                                                    <li class="lvl-2"><a href="index-demo23.html"
                                                                            class="site-nav lvl-2">Home 23 - Vogue</a>
                                                                    </li>
                                                                    <li class="lvl-2"><a href="index-demo24.html"
                                                                            class="site-nav lvl-2">Home 24 -
                                                                            Glamour</a></li>
                                                                    <li class="lvl-2"><a href="index-demo25.html"
                                                                            class="site-nav lvl-2">Home 25 - Shoes
                                                                            <span class="lbl nm_label2">New</span></a>
                                                                    </li>
                                                                    <li class="lvl-2"><a href="index-demo26.html"
                                                                            class="site-nav lvl-2">Home 26 - Books
                                                                            <span class="lbl nm_label2">New</span></a>
                                                                    </li>
                                                                    <li class="lvl-2"><a href="index-demo27.html"
                                                                            class="site-nav lvl-2">Home 27 - Yoga <span
                                                                                class="lbl nm_label2">New</span></a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-lg-4">
                                                        <div class="row mm-Banners">
                                                            <div class="col-md-12 col-lg-12 imageCol text-center">
                                                                <div class="menubox position-relative">
                                                                    <a href="index-demo6.html" class="mb-0"><img
                                                                            class="blur-up lazyload"
                                                                            src="assets/images/megamenu/megamenu-banner8.webp"
                                                                            data-src="assets/images/megamenu/megamenu-banner8.webp"
                                                                            alt="image" width="400"
                                                                            height="342" /></a>
                                                                    <p
                                                                        class="position-absolute bottom-0 start-50 translate-middle-x">
                                                                        <a href="index-demo6.html"
                                                                            class="title text-uppercase">Single Product
                                                                            Layout</a>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="lvl1 parent megamenu"><a href="#;">Nam <i
                                                    class="an an-angle-down-l"></i></a>
                                            <div class="megamenu style4">
                                                <div class="row">
                                                    <div class="lvl-1 col-md-3 col-lg-3"><a href="#"
                                                            class="site-nav lvl-1 menu-title">Category Page</a>
                                                        <ul class="subLinks">
                                                            <li class="lvl-2"><a href="category-2columns.html"
                                                                    class="site-nav lvl-2">2 Columns with style1</a>
                                                            </li>
                                                            <li class="lvl-2"><a href="category-3columns.html"
                                                                    class="site-nav lvl-2">3 Columns with style2</a>
                                                            </li>
                                                            <li class="lvl-2"><a href="category-4columns.html"
                                                                    class="site-nav lvl-2">4 Columns with style3</a>
                                                            </li>
                                                            <li class="lvl-2"><a href="category-5columns.html"
                                                                    class="site-nav lvl-2">5 Columns with style4</a>
                                                            </li>
                                                            <li class="lvl-2"><a href="category-6columns.html"
                                                                    class="site-nav lvl-2">6 Columns with Fullwidth</a>
                                                            </li>
                                                            <li class="lvl-2"><a href="category-7columns.html"
                                                                    class="site-nav lvl-2">7 Columns</a></li>
                                                            <li class="lvl-2"><a href="empty-category.html"
                                                                    class="site-nav lvl-2">Category Empty</a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="lvl-1 col-md-3 col-lg-3"><a href="#"
                                                            class="site-nav lvl-1 menu-title">Shop Page</a>
                                                        <ul class="subLinks">
                                                            <li class="lvl-2"><a href="shop-left-sidebar.html"
                                                                    class="site-nav lvl-2">Left Sidebar</a></li>
                                                            <li class="lvl-2"><a href="shop-right-sidebar.html"
                                                                    class="site-nav lvl-2">Right Sidebar</a></li>
                                                            <li class="lvl-2"><a href="shop-top-filter.html"
                                                                    class="site-nav lvl-2">Top Filter</a></li>
                                                            <li class="lvl-2"><a href="shop-fullwidth.html"
                                                                    class="site-nav lvl-2">Fullwidth</a></li>
                                                            <li class="lvl-2"><a href="shop-no-sidebar.html"
                                                                    class="site-nav lvl-2">Without Filter</a></li>
                                                            <li class="lvl-2"><a href="shop-listview-sidebar.html"
                                                                    class="site-nav lvl-2">List View</a></li>
                                                            <li class="lvl-2"><a href="shop-listview-drawer.html"
                                                                    class="site-nav lvl-2">List View Drawer</a></li>
                                                            <li class="lvl-2"><a href="shop-category-slideshow.html"
                                                                    class="site-nav lvl-2">Category Slideshow</a></li>
                                                            <li class="lvl-2"><a href="shop-heading-with-banner.html"
                                                                    class="site-nav lvl-2">Headings With Banner</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="lvl-1 col-md-3 col-lg-3"><a href="#"
                                                            class="site-nav lvl-1 menu-title">Shop Page</a>
                                                        <ul class="subLinks">
                                                            <li class="lvl-2"><a href="shop-sub-collections.html"
                                                                    class="site-nav lvl-2">Sub Collection List <span
                                                                        class="lbl nm_label5">Hot</span></a></li>
                                                            <li class="lvl-2"><a href="shop-masonry-grid.html"
                                                                    class="site-nav lvl-2">Shop Masonry Grid</a></li>
                                                            <li class="lvl-2"><a href="shop-left-sidebar.html"
                                                                    class="site-nav lvl-2">Shop Countdown</a></li>
                                                            <li class="lvl-2"><a href="shop-hover-info.html"
                                                                    class="site-nav lvl-2">Shop Hover Info</a></li>
                                                            <li class="lvl-2"><a href="shop-right-sidebar.html"
                                                                    class="site-nav lvl-2">Infinite Scrolling</a></li>
                                                            <li class="lvl-2"><a href="shop-fullwidth.html"
                                                                    class="site-nav lvl-2">Classic Pagination</a></li>
                                                            <li class="lvl-2"><a href="shop-swatches-style.html"
                                                                    class="site-nav lvl-2">Swatches Style</a></li>
                                                            <li class="lvl-2"><a href="shop-grid-style.html"
                                                                    class="site-nav lvl-2">Grid Style</a></li>
                                                            <li class="lvl-2"><a href="shop-search-results.html"
                                                                    class="site-nav lvl-2">Search Results</a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="lvl-1 col-md-3 col-lg-3"><a href="#"
                                                            class="site-nav lvl-1 menu-title">Shop Other Page</a>
                                                        <ul class="subLinks">
                                                            <li class="lvl-2"><a href="my-wishlist.html"
                                                                    class="site-nav lvl-2">My Wishlist Style1</a></li>
                                                            <li class="lvl-2"><a href="my-wishlist-style2.html"
                                                                    class="site-nav lvl-2">My Wishlist Style2</a></li>
                                                            <li class="lvl-2"><a href="compare-style1.html"
                                                                    class="site-nav lvl-2">Compare Page Style1</a></li>
                                                            <li class="lvl-2"><a href="compare-style2.html"
                                                                    class="site-nav lvl-2">Compare Page Style2</a></li>
                                                            <li class="lvl-2"><a href="cart-style1.html"
                                                                    class="site-nav lvl-2">Cart Page Style1</a></li>
                                                            <li class="lvl-2"><a href="cart-style2.html"
                                                                    class="site-nav lvl-2">Cart Page Style2</a></li>
                                                            <li class="lvl-2"><a href="checkout-style1.html"
                                                                    class="site-nav lvl-2">Checkout Page Style1</a>
                                                            </li>
                                                            <li class="lvl-2"><a href="checkout-style2.html"
                                                                    class="site-nav lvl-2">Checkout Page Style2</a>
                                                            </li>
                                                            <li class="lvl-2"><a href="checkout-success.html"
                                                                    class="site-nav lvl-2">Checkout Success</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="row clear mt-4">
                                                    <div class="col-md-3 col-lg-3">
                                                        <a href="shop-left-sidebar.html"><img
                                                                src="assets/images/megamenu/megamenu-banner4-1.jpg"
                                                                data-src="assets/images/megamenu/megamenu-banner4-1.jpg"
                                                                alt="image" /></a>
                                                    </div>
                                                    <div class="col-md-3 col-lg-3">
                                                        <a href="shop-left-sidebar.html"><img
                                                                src="assets/images/megamenu/megamenu-banner4-2.jpg"
                                                                data-src="assets/images/megamenu/megamenu-banner4-2.jpg"
                                                                alt="image" /></a>
                                                    </div>
                                                    <div class="col-md-3 col-lg-3">
                                                        <a href="shop-left-sidebar.html"><img
                                                                src="assets/images/megamenu/megamenu-banner4-3.jpg"
                                                                data-src="assets/images/megamenu/megamenu-banner4-3.jpg"
                                                                alt="image" /></a>
                                                    </div>
                                                    <div class="col-md-3 col-lg-3">
                                                        <a href="shop-left-sidebar.html"><img
                                                                src="assets/images/megamenu/megamenu-banner4-4.jpg"
                                                                data-src="assets/images/megamenu/megamenu-banner4-4.jpg"
                                                                alt="image" /></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="lvl1 parent megamenu"><a href="#;">Trẻ em <i
                                                    class="an an-angle-down-l"></i></a>
                                            <div class="megamenu style2">
                                                <div class="row">
                                                    <div class="lvl-1 col-md-3 col-lg-3"><a href="#"
                                                            class="site-nav lvl-1 menu-title">Product Types</a>
                                                        <ul class="subLinks">
                                                            <li class="lvl-2"><a href="product-standard.html"
                                                                    class="site-nav lvl-2">Simple Product</a></li>
                                                            <li class="lvl-2"><a href="product-variable.html"
                                                                    class="site-nav lvl-2">Variable Product</a></li>
                                                            <li class="lvl-2"><a href="product-grouped.html"
                                                                    class="site-nav lvl-2">Grouped Product</a></li>
                                                            <li class="lvl-2"><a
                                                                    href="product-external-affiliate.html"
                                                                    class="site-nav lvl-2">External / Affiliate
                                                                    Product</a></li>
                                                            <li class="lvl-2"><a href="product-outofstock.html"
                                                                    class="site-nav lvl-2">Out Of Stock Product</a>
                                                            </li>
                                                            <li class="lvl-2"><a href="product-layout1.html"
                                                                    class="site-nav lvl-2">New Product</a></li>
                                                            <li class="lvl-2"><a href="product-layout2.html"
                                                                    class="site-nav lvl-2">Sale Product</a></li>
                                                            <li class="lvl-2"><a href="product-layout1.html"
                                                                    class="site-nav lvl-2">Variable Image</a></li>
                                                            <li class="lvl-2"><a href="product-accordian.html"
                                                                    class="site-nav lvl-2">Variable Select</a></li>
                                                            <li class="lvl-2"><a href="prodcut-360-degree-view.html"
                                                                    class="site-nav lvl-2">360 Degree view</a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="lvl-1 col-md-3 col-lg-3"><a href="#"
                                                            class="site-nav lvl-1 menu-title">Product Page</a>
                                                        <ul class="subLinks">
                                                            <li class="lvl-2"><a href="product-layout1.html"
                                                                    class="site-nav lvl-2">Product Layout1</a></li>
                                                            <li class="lvl-2"><a href="product-layout2.html"
                                                                    class="site-nav lvl-2">Product Layout2</a></li>
                                                            <li class="lvl-2"><a href="product-layout3.html"
                                                                    class="site-nav lvl-2">Product Layout3</a></li>
                                                            <li class="lvl-2"><a href="product-layout4.html"
                                                                    class="site-nav lvl-2">Product Layout4</a></li>
                                                            <li class="lvl-2"><a href="product-layout5.html"
                                                                    class="site-nav lvl-2">Product Layout5</a></li>
                                                            <li class="lvl-2"><a href="product-layout6.html"
                                                                    class="site-nav lvl-2">Product Layout6</a></li>
                                                            <li class="lvl-2"><a href="product-layout7.html"
                                                                    class="site-nav lvl-2">Product Layout7</a></li>
                                                            <li class="lvl-2"><a href="product-accordian.html"
                                                                    class="site-nav lvl-2">Product Accordian</a></li>
                                                            <li class="lvl-2"><a href="product-tabs-left.html"
                                                                    class="site-nav lvl-2">Product Tabs Left</a></li>
                                                            <li class="lvl-2"><a href="product-tabs-center.html"
                                                                    class="site-nav lvl-2">Product Tabs Center</a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="lvl-1 col-md-3 col-lg-3"><a href="#"
                                                            class="site-nav lvl-1 menu-title">Top Brands</a>
                                                        <div class="menu-brand-logo">
                                                            <a href="brands-style2.html"><img
                                                                    src="assets/images/logo/brandlogo1.png"
                                                                    alt="image" /></a>
                                                            <a href="brands-style2.html"><img
                                                                    src="assets/images/logo/brandlogo2.png"
                                                                    alt="image" /></a>
                                                            <a href="brands-style2.html"><img
                                                                    src="assets/images/logo/brandlogo3.png"
                                                                    alt="image" /></a>
                                                        </div>
                                                        <div class="menu-brand-logo">
                                                            <a href="brands-style2.html"><img
                                                                    src="assets/images/logo/brandlogo4.png"
                                                                    alt="image" /></a>
                                                            <a href="brands-style2.html"><img
                                                                    src="assets/images/logo/brandlogo5.png"
                                                                    alt="image" /></a>
                                                            <a href="brands-style2.html"><img
                                                                    src="assets/images/logo/brandlogo6.png"
                                                                    alt="image" /></a>
                                                        </div>
                                                    </div>
                                                    <div class="lvl-1 col-md-3 col-lg-3 p-0">
                                                        <a href="shop-left-sidebar.html"><img
                                                                src="assets/images/megamenu/megamenu-banner3.jpg"
                                                                alt="image" /></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="lvl1 parent megamenu"><a href="#">Bộ sưu tập <i
                                                    class="an an-angle-down-l"></i><span
                                                    class="navLbl new">New</span></a>
                                            <div class="megamenu style4">
                                                <div class="row shop-grid-5">
                                                    <div class="lvl-1 col-md-3 col-lg-3 col-xl-2 item"><a
                                                            href="#" class="site-nav lvl-1 menu-title">Vendor
                                                            Pages</a>
                                                        <ul class="subLinks">
                                                            <li><a href="vendor-dashboard.html"
                                                                    class="site-nav">Vendor Dashboard</a></li>
                                                            <li><a href="vendor-profile.html" class="site-nav">Vendor
                                                                    Profile</a></li>
                                                            <li><a href="vendor-uploads.html" class="site-nav">Vendor
                                                                    Uploads</a></li>
                                                            <li><a href="vendor-tracking.html" class="site-nav">Vendor
                                                                    Tracking</a></li>
                                                            <li><a href="vendor-service.html" class="site-nav">Vendor
                                                                    Service</a></li>
                                                            <li><a href="vendor-settings.html"
                                                                    class="site-nav last">Vendor Settings</a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="lvl-1 col-md-3 col-lg-3 col-xl-2 item"><a
                                                            href="#" class="site-nav lvl-1 menu-title">Email
                                                            Template</a>
                                                        <ul class="subLinks">
                                                            <li><a target="_blank"
                                                                    href="email-template/email-order-success1.html"
                                                                    class="site-nav">Order Success 1</a></li>
                                                            <li><a target="_blank"
                                                                    href="email-template/email-order-success2.html"
                                                                    class="site-nav">Order Success 2</a></li>
                                                            <li><a target="_blank"
                                                                    href="email-template/email-invoice-template1.html"
                                                                    class="site-nav">Invoice Template 1</a></li>
                                                            <li><a target="_blank"
                                                                    href="email-template/email-invoice-template2.html"
                                                                    class="site-nav last">Invoice Template 2</a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="lvl-1 col-md-3 col-lg-3 col-xl-2 item"><a
                                                            href="#" class="site-nav lvl-1 menu-title">Email
                                                            Template</a>
                                                        <ul class="subLinks">
                                                            <li class="lvl-2"><a target="_blank"
                                                                    href="email-template/email-forgot-password.html"
                                                                    class="site-nav">Mail Reset password</a></li>
                                                            <li class="lvl-2"><a target="_blank"
                                                                    href="email-template/email-confirmation.html"
                                                                    class="site-nav">Mail Confirmation</a></li>
                                                            <li class="lvl-2"><a target="_blank"
                                                                    href="email-template/email-promotional1.html"
                                                                    class="site-nav">Mail Promotional 1</a></li>
                                                            <li class="lvl-2"><a target="_blank"
                                                                    href="email-template/email-promotional2.html"
                                                                    class="site-nav last">Mail Promotional 2</a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="lvl-1 col-md-3 col-lg-3 col-xl-2 item"><a
                                                            href="#"
                                                            class="site-nav lvl-1 menu-title">Elements</a>
                                                        <ul class="subLinks">
                                                            <li class="lvl-2"><a href="elements-typography.html"
                                                                    class="site-nav lvl-2">Typography</a></li>
                                                            <li class="lvl-2"><a href="elements-buttons.html"
                                                                    class="site-nav lvl-2">Buttons</a></li>
                                                            <li class="lvl-2"><a href="elements-titles.html"
                                                                    class="site-nav lvl-2">Titles</a></li>
                                                            <li class="lvl-2"><a href="elements-banner-styles.html"
                                                                    class="site-nav lvl-2">Banner Styles</a></li>
                                                            <li class="lvl-2"><a href="elements-testimonial.html"
                                                                    class="site-nav lvl-2">Testimonial</a></li>
                                                            <li class="lvl-2"><a href="elements-accordions.html"
                                                                    class="site-nav lvl-2">Accordions</a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="lvl-1 col-md-3 col-lg-3 col-xl-2 item"><a
                                                            href="#"
                                                            class="site-nav lvl-1 menu-title">Elements</a>
                                                        <ul class="subLinks">
                                                            <li class="lvl-2"><a href="elements-icons.html"
                                                                    class="site-nav lvl-2">Icons</a></li>
                                                            <li class="lvl-2"><a href="elements-blog-posts.html"
                                                                    class="site-nav lvl-2">Blog Posts</a></li>
                                                            <li class="lvl-2"><a href="elements-product.html"
                                                                    class="site-nav lvl-2">Product</a></li>
                                                            <li class="lvl-2"><a href="elements-product-tab.html"
                                                                    class="site-nav lvl-2">Product Tab</a></li>
                                                            <li class="lvl-2"><a href="elements-top-info-bar.html"
                                                                    class="site-nav lvl-2">Top Info Bar</a></li>
                                                            <li class="lvl-2"><a href="elements-top-promo-bar.html"
                                                                    class="site-nav lvl-2">Top Promo Bar</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="row clear mt-4">
                                                    <div class="col-md-3 col-lg-3">
                                                        <img src="assets/images/megamenu/megamenu-store.png"
                                                            data-src="assets/images/megamenu/megamenu-store.png"
                                                            alt="image" />
                                                    </div>
                                                    <div class="col-md-3 col-lg-3">
                                                        <img src="assets/images/megamenu/megamenu-elements.png"
                                                            data-src="assets/images/megamenu/megamenu-elements.png"
                                                            alt="image" />
                                                    </div>
                                                    <div class="col-md-3 col-lg-3">
                                                        <img src="assets/images/megamenu/megamenu-pages.png"
                                                            data-src="assets/images/megamenu/megamenu-pages.png"
                                                            alt="image" />
                                                    </div>
                                                    <div class="col-md-3 col-lg-3">
                                                        <img src="assets/images/megamenu/megamenu-fast.png"
                                                            data-src="assets/images/megamenu/megamenu-fast.png"
                                                            alt="image" />
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="lvl1 parent dropdown"><a href="#;">LifeStyle <i
                                                    class="an an-angle-down-l"></i></a>
                                            <ul class="dropdown">
                                                <li><a href="aboutus-style1.html" class="site-nav">About Us <i
                                                            class="an an-angle-right-l"></i></a>
                                                    <ul class="dropdown">
                                                        <li><a href="aboutus-style1.html" class="site-nav">About Us
                                                                Style1</a></li>
                                                        <li><a href="aboutus-style2.html" class="site-nav">About Us
                                                                Style2</a></li>
                                                        <li><a href="aboutus-style3.html" class="site-nav last">About
                                                                Us Style3</a></li>
                                                    </ul>
                                                </li>
                                                <li><a href="contact-style1.html" class="site-nav">Contact Us <i
                                                            class="an an-angle-right-l"></i></a>
                                                    <ul class="dropdown">
                                                        <li><a href="contact-style1.html" class="site-nav">Contact Us
                                                                Style1</a></li>
                                                        <li><a href="contact-style2.html"
                                                                class="site-nav last">Contact Us Style2</a></li>
                                                    </ul>
                                                </li>
                                                <li><a href="lookbook-2columns.html" class="site-nav">Lookbook <i
                                                            class="an an-angle-right-l"></i></a>
                                                    <ul class="dropdown">
                                                        <li><a href="lookbook-2columns.html" class="site-nav">2
                                                                Columns</a></li>
                                                        <li><a href="lookbook-3columns.html" class="site-nav">3
                                                                Columns</a></li>
                                                        <li><a href="lookbook-4columns.html" class="site-nav">4
                                                                Columns</a></li>
                                                        <li><a href="lookbook-5columns.html" class="site-nav">5
                                                                Columns + Fullwidth</a></li>
                                                        <li><a href="lookbook-shop.html"
                                                                class="site-nav last">Lookbook Shop</a></li>
                                                    </ul>
                                                </li>
                                                <li><a href="faqs-style1.html" class="site-nav">FAQs <i
                                                            class="an an-angle-right-l"></i></a>
                                                    <ul class="dropdown">
                                                        <li><a href="faqs-style1.html" class="site-nav">FAQs
                                                                Style1</a></li>
                                                        <li><a href="faqs-style2.html" class="site-nav last">FAQs
                                                                Style2</a></li>
                                                    </ul>
                                                </li>
                                                <li><a href="brands-style1.html" class="site-nav">Brands <i
                                                            class="an an-angle-right-l"></i></a>
                                                    <ul class="dropdown">
                                                        <li><a href="brands-style1.html" class="site-nav">Brands
                                                                Style1</a></li>
                                                        <li><a href="brands-style2.html" class="site-nav last">Brands
                                                                Style2</a></li>
                                                    </ul>
                                                </li>
                                                <li><a href="my-account.html" class="site-nav">My Account <i
                                                            class="an an-angle-right-l"></i></a>
                                                    <ul class="dropdown">
                                                        <li><a href="my-account.html" class="site-nav">My Account</a>
                                                        </li>
                                                        <li><a href="login-sliding-style.html" class="site-nav">Login
                                                                Sliding Slideshow</a></li>
                                                        <li><a href="login.html" class="site-nav">Login</a></li>
                                                        <li><a href="register.html" class="site-nav">Register</a></li>
                                                        <li><a href="forgot-password.html" class="site-nav">Forgot
                                                                Password</a></li>
                                                        <li><a href="change-password.html"
                                                                class="site-nav last">Change Password</a></li>
                                                    </ul>
                                                </li>
                                                <li><a href="#" class="site-nav">Empty Pages <i
                                                            class="an an-angle-right-l"></i></a>
                                                    <ul class="dropdown">
                                                        <li><a href="empty-category.html" class="site-nav">Empty
                                                                Category</a></li>
                                                        <li><a href="empty-cart.html" class="site-nav">Empty Cart</a>
                                                        </li>
                                                        <li><a href="empty-compare.html" class="site-nav">Empty
                                                                Compare</a></li>
                                                        <li><a href="empty-wishlist.html" class="site-nav">Empty
                                                                Wishlist</a></li>
                                                        <li><a href="empty-search.html" class="site-nav last">Empty
                                                                Search</a></li>
                                                    </ul>
                                                </li>
                                                <li><a href="error-404.html" class="site-nav">Error 404 </a></li>
                                                <li><a href="cms-page.html" class="site-nav">CMS Page</a></li>
                                                <li><a href="elements-icons.html" class="site-nav">Icons</a></li>
                                                <li><a href="coming-soon.html" class="site-nav">Coming soon <span
                                                            class="lbl nm_label2">New</span></a></li>
                                            </ul>
                                        </li>
                                        <li class="lvl1 parent dropdown"><a href="#;">Về chúng tôi <i
                                                    class="an an-angle-down-l"></i></a>
                                            <ul class="dropdown">
                                                <li><a href="blog-left-sidebar.html" class="site-nav">Left Sidebar</a>
                                                </li>
                                                <li><a href="blog-right-sidebar.html" class="site-nav">Right
                                                        Sidebar</a></li>
                                                <li><a href="blog-fullwidth.html" class="site-nav">Fullwidth</a></li>
                                                <li><a href="blog-masonry.html" class="site-nav">Masonry Blog
                                                        Style</a></li>
                                                <li><a href="blog-2columns.html" class="site-nav">2 Columns</a></li>
                                                <li><a href="blog-3columns.html" class="site-nav">3 Columns</a></li>
                                                <li><a href="blog-4columns.html" class="site-nav">4 Columns</a></li>
                                                <li><a href="blog-single-post.html" class="site-nav last">Article
                                                        Page</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </nav>
                                <!--End Desktop Menu-->
                            </div>
                        </div>
                    </nav>
                </div>
                <!--End Main Navigation Desktop-->
                <!--Search Popup-->
                <div id="search-popup" class="search-drawer">
                    <div class="container">
                        <span class="closeSearch an an-times-l"></span>
                        <form class="form minisearch" id="header-search" action="{{ asset('/search') }}"
                            method="get">
                            <label class="label"><span>@lang('lang.search')</span></label>
                            <div class="control">
                                <div class="searchField">
                                    <div class="search-category">
                                        <select id="rgsearch-category" name="rgsearch[category]"
                                            data-default="All Categories">
                                            <option value="00" label="All Categories" selected="selected">All
                                                Categories</option>
                                            <optgroup id="rgsearch-shop" label="Shop">
                                                <option value="0">- All</option>
                                                <option value="1">- Men</option>
                                                <option value="2">- Women</option>
                                                <option value="3">- Shoes</option>
                                                <option value="4">- Blouses</option>
                                                <option value="5">- Pullovers</option>
                                                <option value="6">- Bags</option>
                                                <option value="7">- Accessories</option>
                                            </optgroup>
                                        </select>
                                    </div>
                                    <div class="input-box">
                                        <button type="submit" title="@lang('lang.search')" class="action search"
                                            disabled=""><i class="icon an an-search-l"></i></button>
                                        <input type="text" name="search" id="timkiem" value=""
                                            placeholder="Search by keyword or #" class="input-text"
                                            autocomplete="off" maxlength="20">
                                        <ul class="dropdown-menu" id="result" style="display: none;"></ul>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!--End Search Popup-->
            </div>
        </div>
        <!--End Header-->
        <!--Mobile Menu-->
        <div class="mobile-nav-wrapper" role="navigation">
            <div class="closemobileMenu"><i class="icon an an-times-l pull-right"></i> Close Menu</div>
            <ul id="MobileNav" class="mobile-nav">
                <li class="lvl1 parent megamenu"><a href="{{ asset('home') }}">Home <i class="an an-plus-l"></i></a>
                    <ul>
                        <li><a href="#" class="site-nav">Home Styles <i class="an an-plus-l"></i></a>
                            <ul>
                                <li class="lvl-2"><a href="{{ asset('home') }}" class="site-nav">Home 01 -
                                        Default</a></li>
                                <li class="lvl-2"><a href="index-demo2.html" class="site-nav">Home 02 - Minimal</a>
                                </li>
                                <li class="lvl-2"><a href="index-demo3.html" class="site-nav">Home 03 - Colorful</a>
                                </li>
                                <li class="lvl-2"><a href="index-demo4.html" class="site-nav">Home 04 - Modern</a>
                                </li>
                                <li class="lvl-2"><a href="index-demo5.html" class="site-nav">Home 05 - Kids
                                        Clothing</a></li>
                                <li class="lvl-2"><a href="index-demo6.html" class="site-nav">Home 06 - Single
                                        Product</a></li>
                                <li class="lvl-2"><a href="index-demo7.html" class="site-nav">Home 07 - Glamour</a>
                                </li>
                                <li class="lvl-2"><a href="index-demo8.html" class="site-nav">Home 08 - Simple</a>
                                </li>
                                <li class="lvl-2"><a href="index-demo9.html" class="site-nav">Home 09 - Cool <span
                                            class="lbl nm_label1">Hot</span></a></li>
                                <li class="lvl-2"><a href="index-demo10.html" class="site-nav last">Home 10 -
                                        Cosmetic</a></li>
                            </ul>
                        </li>
                        <li><a href="#" class="site-nav">Home Styles <i class="an an-plus-l"></i></a>
                            <ul>
                                <li class="lvl-2"><a href="index-demo11.html" class="site-nav">Home 11 - Pets <span
                                            class="lbl nm_label3">Popular</span></a></li>
                                <li class="lvl-2"><a href="index-demo12.html" class="site-nav">Home 12 - Tools &
                                        Parts</a></li>
                                <li class="lvl-2"><a href="index-demo13.html" class="site-nav">Home 13 - Watches
                                        <span class="lbl nm_label1">Hot</span></a></li>
                                <li class="lvl-2"><a href="index-demo14.html" class="site-nav">Home 14 - Food</a>
                                </li>
                                <li class="lvl-2"><a href="index-demo15.html" class="site-nav">Home 15 -
                                        Christmas</a></li>
                                <li class="lvl-2"><a href="index-demo16.html" class="site-nav">Home 16 - Phone
                                        Case</a></li>
                                <li class="lvl-2"><a href="index-demo17.html" class="site-nav">Home 17 - Jewelry</a>
                                </li>
                                <li class="lvl-2"><a href="index-demo18.html" class="site-nav">Home 18 - Bag <span
                                            class="lbl nm_label3">Popular</span></a></li>
                                <li class="lvl-2"><a href="index-demo19.html" class="site-nav">Home 19 -
                                        Swimwear</a></li>
                                <li class="lvl-2"><a href="index-demo20.html" class="site-nav last">Home 20 -
                                        Furniture <span class="lbl nm_label2">New</span></a></li>
                            </ul>
                        </li>
                        <li><a href="#" class="site-nav">Home Styles <i class="an an-plus-l"></i></a>
                            <ul>
                                <li class="lvl-2"><a href="index-demo21.html" class="site-nav">Home 21 - Party
                                        Supplies</a></li>
                                <li class="lvl-2"><a href="index-demo22.html" class="site-nav">Home 22 - Digital</a>
                                </li>
                                <li class="lvl-2"><a href="index-demo23.html" class="site-nav">Home 23 - Vogue</a>
                                </li>
                                <li class="lvl-2"><a href="index-demo24.html" class="site-nav">Home 24 - Glamour</a>
                                </li>
                                <li class="lvl-2"><a href="index-demo25.html" class="site-nav">Home 25 - Shoes <span
                                            class="lbl nm_label2">New</span></a></li>
                                <li class="lvl-2"><a href="index-demo26.html" class="site-nav">Home 26 - Books <span
                                            class="lbl nm_label2">New</span></a></li>
                                <li class="lvl-2"><a href="index-demo27.html" class="site-nav last">Home 27 - Yoga
                                        <span class="lbl nm_label2">New</span></a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="lvl1 parent megamenu"><a href="#">Shop <i class="an an-plus-l"></i></a>
                    <ul>
                        <li><a href="#" class="site-nav">Category Page <i class="an an-plus-l"></i></a>
                            <ul>
                                <li><a href="category-2columns.html" class="site-nav">2 Columns with style1</a></li>
                                <li><a href="category-3columns.html" class="site-nav">3 Columns with style2</a></li>
                                <li><a href="category-4columns.html" class="site-nav">4 Columns with style3</a></li>
                                <li><a href="category-5columns.html" class="site-nav">5 Columns with style4</a></li>
                                <li><a href="category-6columns.html" class="site-nav">6 Columns with Fullwidth</a>
                                </li>
                                <li><a href="category-7columns.html" class="site-nav">7 Columns</a></li>
                                <li><a href="empty-category.html" class="site-nav last">Category Empty</a></li>
                            </ul>
                        </li>
                        <li><a href="#" class="site-nav">Shop Page <i class="an an-plus-l"></i></a>
                            <ul>
                                <li><a href="shop-left-sidebar.html" class="site-nav">Left Sidebar</a></li>
                                <li><a href="shop-right-sidebar.html" class="site-nav">Right Sidebar</a></li>
                                <li><a href="shop-top-filter.html" class="site-nav">Top Filter</a></li>
                                <li><a href="shop-fullwidth.html" class="site-nav">Fullwidth</a></li>
                                <li><a href="shop-no-sidebar.html" class="site-nav">Without Filter</a></li>
                                <li><a href="shop-listview-sidebar.html" class="site-nav">List View</a></li>
                                <li><a href="shop-listview-drawer.html" class="site-nav">List View Drawer</a></li>
                                <li><a href="shop-category-slideshow.html" class="site-nav">Category Slideshow</a>
                                </li>
                                <li><a href="shop-heading-with-banner.html" class="site-nav last">Headings With
                                        Banner</a></li>
                            </ul>
                        </li>
                        <li><a href="#" class="site-nav">Shop Page <i class="an an-plus-l"></i></a>
                            <ul>
                                <li><a href="shop-sub-collections.html" class="site-nav">Sub Collection List <span
                                            class="lbl nm_label5">Hot</span></a></li>
                                <li><a href="shop-masonry-grid.html" class="site-nav">Shop Masonry Grid</a></li>
                                <li><a href="shop-left-sidebar.html" class="site-nav">Shop Countdown</a></li>
                                <li><a href="shop-hover-info.html" class="site-nav">Shop Hover Info</a></li>
                                <li><a href="shop-right-sidebar.html" class="site-nav">Infinite Scrolling</a></li>
                                <li><a href="shop-fullwidth.html" class="site-nav">Classic Pagination</a></li>
                                <li><a href="shop-swatches-style.html" class="site-nav">Swatches Style</a></li>
                                <li><a href="shop-grid-style.html" class="site-nav">Grid Style</a></li>
                                <li><a href="shop-search-results.html" class="site-nav last">Search Results</a></li>
                            </ul>
                        </li>
                        <li><a href="#" class="site-nav">Shop Other Page <i class="an an-plus-l"></i></a>
                            <ul>
                                <li><a href="my-wishlist.html" class="site-nav">My Wishlist Style1</a></li>
                                <li><a href="my-wishlist-style2.html" class="site-nav">My Wishlist Style2</a></li>
                                <li><a href="compare-style1.html" class="site-nav">Compare Page Style1</a></li>
                                <li><a href="compare-style2.html" class="site-nav">Compare Page Style2</a></li>
                                <li><a href="cart-style1.html" class="site-nav">Cart Page Style1</a></li>
                                <li><a href="cart-style2.html" class="site-nav">Cart Page Style2</a></li>
                                <li><a href="checkout-style1.html" class="site-nav">Checkout Page Style1</a></li>
                                <li><a href="checkout-style2.html" class="site-nav">Checkout Page Style2</a></li>
                                <li><a href="checkout-success.html" class="site-nav last">Checkout Success</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="lvl1 parent megamenu"><a href="#">Product <i class="an an-plus-l"></i></a>
                    <ul>
                        <li><a href="product-standard.html" class="site-nav">Product Types<i
                                    class="an an-plus-l"></i></a>
                            <ul>
                                <li><a href="product-standard.html" class="site-nav">Simple Product</a></li>
                                <li><a href="product-variable.html" class="site-nav">Variable Product</a></li>
                                <li><a href="product-grouped.html" class="site-nav">Grouped Product</a></li>
                                <li><a href="product-external-affiliate.html" class="site-nav">External / Affiliate
                                        Product</a></li>
                                <li><a href="product-outofstock.html" class="site-nav">Out Of Stock Product</a></li>
                                <li><a href="product-layout1.html" class="site-nav">New Product</a></li>
                                <li><a href="product-layout2.html" class="site-nav">Sale Product</a></li>
                                <li><a href="product-layout1.html" class="site-nav">Variable Image</a></li>
                                <li><a href="product-accordian.html" class="site-nav">Variable Select</a></li>
                                <li><a href="prodcut-360-degree-view.html" class="site-nav last">360 Degree view</a>
                                </li>
                            </ul>
                        </li>
                        <li><a href="product-layout1.html" class="site-nav">Product Page Types <i
                                    class="an an-plus-l"></i></a>
                            <ul>
                                <li><a href="product-layout1.html" class="site-nav">Product Layout1</a></li>
                                <li><a href="product-layout2.html" class="site-nav">Product Layout2</a></li>
                                <li><a href="product-layout3.html" class="site-nav">Product Layout3</a></li>
                                <li><a href="product-layout4.html" class="site-nav">Product Layout4</a></li>
                                <li><a href="product-layout5.html" class="site-nav">Product Layout5</a></li>
                                <li><a href="product-layout6.html" class="site-nav">Product Layout6</a></li>
                                <li><a href="product-layout7.html" class="site-nav">Product Layout7</a></li>
                                <li><a href="product-accordian.html" class="site-nav">Product Accordian</a></li>
                                <li><a href="product-tabs-left.html" class="site-nav">Product Tabs Left</a></li>
                                <li><a href="product-tabs-center.html" class="site-nav last">Product Tabs Center</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="lvl1 parent megamenu"><a href="#">Features <i class="an an-plus-l"></i><span
                            class="lbl nm_label1">New</span></a>
                    <ul>
                        <li><a href="#" class="site-nav">Vendor Pages <i class="an an-plus-l"></i></a>
                            <ul>
                                <li><a href="vendor-dashboard.html" class="site-nav">Vendor Dashboard</a></li>
                                <li><a href="vendor-profile.html" class="site-nav">Vendor Profile</a></li>
                                <li><a href="vendor-uploads.html" class="site-nav">Vendor Uploads</a></li>
                                <li><a href="vendor-tracking.html" class="site-nav">Vendor Tracking</a></li>
                                <li><a href="vendor-service.html" class="site-nav">Vendor Service</a></li>
                                <li><a href="vendor-settings.html" class="site-nav last">Vendor Settings</a></li>
                            </ul>
                        </li>
                        <li><a href="#" class="site-nav">Email Template <i class="an an-plus-l"></i></a>
                            <ul>
                                <li><a target="_blank" href="email-template/email-order-success1.html"
                                        class="site-nav">Order Success 1</a></li>
                                <li><a target="_blank" href="email-template/email-order-success2.html"
                                        class="site-nav">Order Success 2</a></li>
                                <li><a target="_blank" href="email-template/email-invoice-template1.html"
                                        class="site-nav">Invoice Template 1</a></li>
                                <li><a target="_blank" href="email-template/email-invoice-template2.html"
                                        class="site-nav last">Invoice Template 2</a></li>
                                <li><a target="_blank" href="email-template/email-forgot-password.html"
                                        class="site-nav">Mail Reset password</a></li>
                                <li><a target="_blank" href="email-template/email-confirmation.html"
                                        class="site-nav">Mail Confirmation</a></li>
                                <li><a target="_blank" href="email-template/email-promotional1.html"
                                        class="site-nav">Mail Promotional 1</a></li>
                                <li><a target="_blank" href="email-template/email-promotional2.html"
                                        class="site-nav last">Mail Promotional 2</a></li>
                            </ul>
                        </li>
                        <li><a href="#" class="site-nav">Elements <i class="an an-plus-l"></i></a>
                            <ul>
                                <li><a href="elements-typography.html" class="site-nav">Typography</a></li>
                                <li><a href="elements-buttons.html" class="site-nav">Buttons</a></li>
                                <li><a href="elements-titles.html" class="site-nav">Titles</a></li>
                                <li><a href="elements-banner-styles.html" class="site-nav">Banner Styles</a></li>
                                <li><a href="elements-testimonial.html" class="site-nav">Testimonial</a></li>
                                <li><a href="elements-accordions.html" class="site-nav">Accordions</a></li>
                                <li><a href="elements-icons.html" class="site-nav">Icons</a></li>
                                <li><a href="elements-blog-posts.html" class="site-nav">Blog Posts</a></li>
                                <li><a href="elements-product.html" class="site-nav">Product</a></li>
                                <li><a href="elements-product-tab.html" class="site-nav">Product Tab</a></li>
                                <li><a href="elements-top-info-bar.html" class="site-nav">Top Info Bar</a></li>
                                <li><a href="elements-top-promo-bar.html" class="site-nav last">Top Promo Bar</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="lvl1 parent megamenu"><a href="#">Pages <i class="an an-plus-l"></i></a>
                    <ul>
                        <li><a href="aboutus-style1.html" class="site-nav">About Us <i
                                    class="an an-plus-l"></i></a>
                            <ul class="dropdown">
                                <li><a href="aboutus-style1.html" class="site-nav">About Us Style1</a></li>
                                <li><a href="aboutus-style2.html" class="site-nav">About Us Style2</a></li>
                                <li><a href="aboutus-style3.html" class="site-nav last">About Us Style3</a></li>
                            </ul>
                        </li>
                        <li><a href="contact-style1.html" class="site-nav">Contact Us <i
                                    class="an an-plus-l"></i></a>
                            <ul class="dropdown">
                                <li><a href="contact-style1.html" class="site-nav">Contact Us Style1</a></li>
                                <li><a href="contact-style2.html" class="site-nav last">Contact Us Style2</a></li>
                            </ul>
                        </li>
                        <li><a href="lookbook-2columns.html" class="site-nav">Lookbook <i
                                    class="an an-plus-l"></i></a>
                            <ul class="dropdown">
                                <li><a href="lookbook-2columns.html" class="site-nav">2 Columns</a></li>
                                <li><a href="lookbook-3columns.html" class="site-nav">3 Columns</a></li>
                                <li><a href="lookbook-4columns.html" class="site-nav">4 Columns</a></li>
                                <li><a href="lookbook-5columns.html" class="site-nav">5 Columns + Fullwidth</a></li>
                                <li><a href="lookbook-shop.html" class="site-nav last">Lookbook Shop</a></li>
                            </ul>
                        </li>
                        <li><a href="faqs-style1.html" class="site-nav">FAQs <i class="an an-plus-l"></i></a>
                            <ul class="dropdown">
                                <li><a href="faqs-style1.html" class="site-nav">FAQs Style1</a></li>
                                <li><a href="faqs-style2.html" class="site-nav last">FAQs Style2</a></li>
                            </ul>
                        </li>
                        <li><a href="brands-style1.html" class="site-nav">Brands <i class="an an-plus-l"></i></a>
                            <ul class="dropdown">
                                <li><a href="brands-style1.html" class="site-nav">Brands Style1</a></li>
                                <li><a href="brands-style2.html" class="site-nav last">Brands Style2</a></li>
                            </ul>
                        </li>
                        <li><a href="my-account.html" class="site-nav">My Account <i class="an an-plus-l"></i></a>
                            <ul class="dropdown">
                                <li><a href="my-account.html" class="site-nav">My Account</a></li>
                                <li><a href="login-sliding-style.html" class="site-nav">Login Sliding Slideshow</a>
                                </li>
                                <li><a href="login.html" class="site-nav">Login</a></li>
                                <li><a href="register.html" class="site-nav">Register</a></li>
                                <li><a href="forgot-password.html" class="site-nav">Forgot Password</a></li>
                                <li><a href="change-password.html" class="site-nav last">Change Password</a></li>
                            </ul>
                        </li>
                        <li><a href="#" class="site-nav">Empty Pages <i class="an an-plus-l"></i></a>
                            <ul class="dropdown">
                                <li><a href="empty-category.html" class="site-nav">Empty Category</a></li>
                                <li><a href="empty-cart.html" class="site-nav">Empty Cart</a></li>
                                <li><a href="empty-compare.html" class="site-nav">Empty Compare</a></li>
                                <li><a href="empty-wishlist.html" class="site-nav">Empty Wishlist</a></li>
                                <li><a href="empty-search.html" class="site-nav last">Empty Search</a></li>
                            </ul>
                        </li>
                        <li><a href="error-404.html" class="site-nav">Error 404 </a></li>
                        <li><a href="cms-page.html" class="site-nav">CMS Page</a></li>
                        <li><a href="elements-icons.html" class="site-nav">Icons</a></li>
                        <li><a href="coming-soon.html" class="site-nav last">Coming soon <span
                                    class="lbl nm_label2">New</span></a></li>
                    </ul>
                </li>
                <li class="lvl1 parent megamenu"><a href="blog-left-sidebar.html">Blog <i
                            class="an an-plus-l"></i></a>
                    <ul>
                        <li><a href="blog-left-sidebar.html" class="site-nav">Left Sidebar</a></li>
                        <li><a href="blog-right-sidebar.html" class="site-nav">Right Sidebar</a></li>
                        <li><a href="blog-fullwidth.html" class="site-nav">Fullwidth</a></li>
                        <li><a href="blog-masonry.html" class="site-nav">Masonry Blog Style</a></li>
                        <li><a href="blog-2columns.html" class="site-nav">2 Columns</a></li>
                        <li><a href="blog-3columns.html" class="site-nav">3 Columns</a></li>
                        <li><a href="blog-4columns.html" class="site-nav">4 Columns</a></li>
                        <li><a href="blog-single-post.html" class="site-nav last">Article Page</a></li>
                    </ul>
                </li>
                <li class="acLink"></li>
                <li class="lvl1 bottom-link"><a href="login.html">Login</a></li>
                <li class="lvl1 bottom-link"><a href="register.html">Signup</a></li>
                <li class="lvl1 bottom-link"><a href="my-wishlist.html">Wishlist</a></li>
                <li class="lvl1 bottom-link"><a href="compare-style1.html">Compare</a></li>
                <li class="help bottom-link"><b>NEED HELP?</b><br>Call: +41 525 523 5687</li>
            </ul>
        </div>
        <!--End Mobile Menu-->

        <!--Body Container-->
        <div id="page-content">
            @yield('content')
        </div>
        <!--End Body Container-->

        <!--Footer-->
        <div class="footer footer-1">
            <div class="footer-top clearfix">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 text-center about-col mb-4">
                            <img src="assets/images/footer-logo.png" alt="Optimal" class="mb-3" />
                            <p>55 Gallaxy Enque, 2568 steet, 23568 NY</p>
                            <p class="mb-0 mb-md-3">Phone: <a href="tel:+011234567890">(+01) 123 456 7890</a> <span
                                    class="mx-1">|</span> Email: <a
                                    href="mailto:info@example.com">info@example.com</a></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-4 col-lg-3 footer-links">
                            <h4 class="h4">Informations</h4>
                            <ul>
                                <li><a href="my-account.html">My Account</a></li>
                                <li><a href="aboutus-style1.html">About us</a></li>
                                <li><a href="login.html">Login</a></li>
                                <li><a href="privacy-policy.html">Privacy policy</a></li>
                                <li><a href="#">Terms &amp; condition</a></li>
                            </ul>
                        </div>
                        <div class="col-12 col-sm-12 col-md-4 col-lg-2 footer-links">
                            <h4 class="h4">Quick Shop</h4>
                            <ul>
                                <li><a href="#">Women</a></li>
                                <li><a href="#">Men</a></li>
                                <li><a href="#">Kids</a></li>
                                <li><a href="#">Sportswear</a></li>
                                <li><a href="#">Sale</a></li>
                            </ul>
                        </div>
                        <div class="col-12 col-sm-12 col-md-4 col-lg-3 footer-links">
                            <h4 class="h4">Customer Services</h4>
                            <ul>
                                <li><a href="#">Request Personal Data</a></li>
                                <li><a href="faqs-style1.html">FAQ's</a></li>
                                <li><a href="contact-style1.html">Contact Us</a></li>
                                <li><a href="#">Orders and Returns</a></li>
                                <li><a href="#">Support Center</a></li>
                            </ul>
                        </div>
                        <div class="col-12 col-sm-12 col-md-12 col-lg-4 newsletter-col">
                            <div class="display-table pt-md-3 pt-lg-0">
                                <div class="display-table-cell footer-newsletter">
                                    <form action="#" method="post">
                                        <label class="h4">NEWSLETTER SIGN UP</label>
                                        <p>Enter Your Email To Receive Daily News And Get 20% Off Coupon For All Items.
                                        </p>
                                        <div class="input-group">
                                            <input type="email"
                                                class="brounded-start input-group__field newsletter-input mb-0"
                                                name="EMAIL" value="" placeholder="Email address"
                                                required>
                                            <span class="input-group__btn">
                                                <button type="submit" class="btn newsletter__submit rounded-end"
                                                    name="commit" id="Subscribe"><i
                                                        class="an an-envelope-l"></i></button>
                                            </span>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <ul class="list-inline social-icons mt-3 pt-1">
                                <li class="list-inline-item"><a href="#" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Facebook"><i class="an an-facebook"
                                            aria-hidden="true"></i></a></li>
                                <li class="list-inline-item"><a href="#" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Twitter"><i class="an an-twitter"
                                            aria-hidden="true"></i></a></li>
                                <li class="list-inline-item"><a href="#" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Pinterest"><i class="an an-pinterest-p"
                                            aria-hidden="true"></i></a></li>
                                <li class="list-inline-item"><a href="#" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Instagram"><i class="an an-instagram"
                                            aria-hidden="true"></i></a></li>
                                <li class="list-inline-item"><a href="#" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="TikTok"><i class="an an-tiktok"
                                            aria-hidden="true"></i></a></li>
                                <li class="list-inline-item"><a href="#" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Whatsapp"><i class="an an-whatsapp"
                                            aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom clearfix">
                <div class="container">
                    <div class="d-flex-center flex-column justify-content-md-between flex-md-row-reverse">
                        <img src="assets/images/payment.png" alt="Paypal Visa Payments" />
                        <div class="copytext text-uppercase">&copy; 2023 Optimal. All Rights Reserved.</div>
                    </div>
                </div>
            </div>
        </div>
        <!--End Footer-->

        <!--Sticky Menubar Mobile-->
        <div class="menubar-mobile d-flex align-items-center justify-content-between d-lg-none">
            <div class="menubar-shop menubar-item">
                <a href="category-4columns.html"><i class="menubar-icon an an-th-large-l"></i><span
                        class="menubar-label">Shop</span></a>
            </div>
            <div class="menubar-account menubar-item">
                <a href="my-account.html"><span class="menubar-icon an an-user-expand"></span><span
                        class="menubar-label">Account</span></a>
            </div>
            <div class="menubar-search menubar-item">
                <a href="{{ asset('home') }}"><span class="menubar-icon an an-home-l"></span><span
                        class="menubar-label">Home</span></a>
            </div>
            <div class="menubar-wish menubar-item">
                <a href="my-wishlist.html">
                    <span class="span-count position-relative text-center"><span
                            class="menubar-icon an an-heart-l"></span><span
                            class="menubar-count counter d-flex-center justify-content-center position-absolute translate-middle rounded-circle">0</span></span>
                    <span class="menubar-label">Wishlist</span>
                </a>
            </div>
            <div class="menubar-cart menubar-item">
                <a href="cart-style1.html" class="cartBtn" data-bs-toggle="modal"
                    data-bs-target="#minicart-drawer">
                    <span class="span-count position-relative text-center"><span
                            class="menubar-icon an an-sq-bag"></span><span
                            class="menubar-count counter d-flex-center justify-content-center position-absolute translate-middle rounded-circle">2</span></span>
                    <span class="menubar-label">Cart</span>
                </a>
            </div>
        </div>
        <!--End Sticky Menubar Mobile-->


        <!--Scoll Top-->
        <span id="site-scroll"><i class="icon an an-chevron-up"></i></span>
        <!--End Scoll Top-->

        <!--MiniCart Drawer-->
        <div class="minicart-right-drawer modal right fade" id="minicart-drawer">
            <div class="modal-dialog">
                <div class="modal-content">
                    @php
                        $total = 0;
                    @endphp
                    @if (Session('cart') == true)
                        <!--MiniCart Content-->
                        <div id="cart-drawer" class="block block-cart">
                            <div class="minicart-header">
                                <a href="javascript:void(0);" class="close-cart" data-bs-dismiss="modal"
                                    aria-label="Close"><i class="an an-times-r" aria-hidden="true"
                                        data-bs-toggle="tooltip" data-bs-placement="left" title="Close"></i></a>
                                <h4 class="fs-6">Your cart (2 Items)</h4>
                            </div>
                            <div class="minicart-content">
                                <ul class="clearfix">
                                    @foreach (Session('cart') as $key => $cart)
                                        @php
                                            $subtotal = $cart['product_price'] * $cart['product_quantity'];
                                            $total += $subtotal;
                                        @endphp
                                        <li class="item d-flex justify-content-center align-items-center">
                                            <a class="product-image" href="">
                                                <img class="blur-up lazyload"
                                                    src="{{ asset('uploads/product/' . $cart['product_image']) }}"
                                                    data-src="{{ asset('uploads/product/' . $cart['product_image']) }}"
                                                    alt="image" title="" width="100" height="120">
                                            </a>
                                            <div class="product-details">
                                                <a class="product-title"
                                                    href="">{{ $cart['product_name'] }}</a>
                                                <div class="variant-cart">Black / XL</div>
                                                <div class="priceRow">
                                                    <div class="product-price">
                                                        <span
                                                            class="money">{{ number_format($cart['product_price'], 0, ',', '.') }}VND</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="qtyDetail text-center">
                                                <div class="wrapQtyBtn">
                                                    <div class="qtyField">
                                                        <a class="qtyBtn minus" href="javascript:void(0);"><i
                                                                class="icon an an-minus-r"
                                                                aria-hidden="true"></i></a>
                                                        <input type="text" name="quantity" value="1"
                                                            class="qty">
                                                        <a class="qtyBtn plus" href="javascript:void(0);"><i
                                                                class="icon an an-plus-l"
                                                                aria-hidden="true"></i></a>
                                                    </div>
                                                </div>
                                                <a href="#" class="edit-i remove"><i
                                                        class="icon an an-edit-l" data-bs-toggle="tooltip"
                                                        data-bs-placement="top" title="Edit"></i></a>
                                                <a href="{{ asset('delete-cart/' . $cart['session_id']) }}"
                                                    class="remove"><i class="an an-times-r"
                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                        title="Remove"></i></a>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="minicart-bottom">
                                <div class="shipinfo text-center mb-3 text-uppercase">
                                    <p class="freeShipMsg"><i class="an an-truck fs-5 me-2 align-middle"></i>SPENT
                                        <b>$199.00</b> MORE FOR FREE SHIPPING
                                    </p>
                                </div>
                                <div class="subtotal">
                                    <span>Total:</span>
                                    <span class="product-price">{{ number_format($total, 0, ',', '.') }}VNĐ</span>
                                </div>
                                <a href="checkout-style1.html"
                                    class="w-100 p-2 my-2 btn btn-outline-primary proceed-to-checkout rounded">Trang thanh toán</a>
                                <a href="{{asset('cart')}}" class="w-100 btn btn-primary cart-btn rounded">Xem giỏ hàng</a>
                            </div>
                        </div>
                        <!--End MiniCart Content-->
                    @else
                        <!--MiniCart Empty-->
                        <div id="cartEmpty" class="block block-cart">
                            <div class="minicart-header d-flex-center justify-content-between w-100">
                                <h4 class="fs-6">Your cart (0 Items)</h4>
                                <a href="javascript:void(0);" class="close-cart" data-bs-dismiss="modal"
                                    aria-label="Close"><i class="an an-times-r" aria-hidden="true"
                                        data-bs-toggle="tooltip" data-bs-placement="left" title="Close"></i></a>
                            </div>
                            <div class="cartEmpty-content mt-4">
                                <i class="icon an an-sq-bag fs-1 text-muted"></i>
                                <p class="my-3">Không có sản phẩm nào trong giỏ hàng</p>
                                <a href="category-4columns.html" class="btn btn-primary cart-btn rounded">Tiếp tục mua sắm</a>
                            </div>
                        </div>
                        <!--End MiniCart Empty-->
                    @endif
                </div>
            </div>
        </div>
        <!--End MiniCart Drawer-->
        <div class="modalOverly"></div>

        <!--Quickview Popup-->
        <div class="loadingBox">
            <div class="an-spin"><i class="icon an an-spinner4"></i></div>
        </div>
        <div id="quickView-modal" class="mfp-with-anim mfp-hide">
            <button title="Close (Esc)" type="button" class="mfp-close">×</button>
            <div class="row">
                <div class="col-12 col-sm-6 col-md-6 col-lg-6 mb-3 mb-md-0">
                    <!--Model thumbnail -->
                    <div id="quickView" class="carousel slide">
                        <!-- Image Slide carousel items -->
                        <div class="carousel-inner">
                            <div class="item carousel-item active" data-bs-slide-number="0">
                                <span id="product_quickview_image"></span>
                            </div>
                        </div>
                        <!-- End Image Slide carousel items -->
                        <!-- Thumbnail image -->
                        <div class="model-thumbnail-img">
                            <!-- Thumbnail slide -->
                            <div class="carousel-indicators list-inline">
                                <div class="list-inline-item active" id="carousel-selector-0" data-bs-slide-to="0"
                                    data-bs-target="#quickView">
                                    <span id="product_quickview_gallery"></span>
                                </div>
                            </div>
                            <!-- End Thumbnail slide -->
                            <!-- Carousel arrow button -->
                            <a class="carousel-control-prev carousel-arrow" href="#quickView"
                                data-bs-target="#quickView" data-bs-slide="prev"><i
                                    class="icon an-3x an an-angle-left"></i><span
                                    class="visually-hidden">Previous</span></a>
                            <a class="carousel-control-next carousel-arrow" href="#quickView"
                                data-bs-target="#quickView" data-bs-slide="next"><i
                                    class="icon an-3x an an-angle-right"></i><span
                                    class="visually-hidden">Next</span></a>
                            <!-- End Carousel arrow button -->
                        </div>
                        <!-- End Thumbnail image -->
                    </div>
                    <!--End Model thumbnail -->
                    <div class="text-center mt-3"><a href="">Sản phẩm chi tiết</a></div>
                </div>
                <div class="col-12 col-sm-6 col-md-6 col-lg-6">
                    <h2 class="product-title">
                        <span id="product_quickview_title"></span>
                    </h2>
                    <div class="product-review d-flex-center mb-2">
                        <div class="rating"><i class="icon an an-star"></i><i class="icon an an-star"></i><i
                                class="icon an an-star"></i><i class="icon an an-star"></i><i
                                class="icon an an-star-o"></i></div>
                        <div class="reviews ms-2"><a href="#"> <span id="product_quickview_comment"></span> đánh giá</a></div>
                    </div>
                    <div class="product-info">
                        <p class="product-vendor">Thương hiệu:<span class="fw-normal" id="product_quickview_category"><a href="#" class="fw-normal"></a></span></p>
                        <p class="product-type">Danh mục:<span class="fw-normal" id="product_quickview_brand"></span></p>
                        <p class="product-sku">SKU:<span class="fw-normal" id="product_quickview_sku"></span></p>
                    </div>
                    <div class="pro-stockLbl my-2">
                        <span class="d-flex-center stockLbl instock"><i class="icon an an-check-cil"></i><span> In
                                stock</span></span>
                        <span class="d-flex-center stockLbl preorder d-none"><i
                                class="icon an an-clock-r"></i><span> Pre-order Now</span></span>
                        <span class="d-flex-center stockLbl outstock d-none"><i class="icon an an-times-cil"></i>
                            <span>Sold out</span></span>
                        <span class="d-flex-center stockLbl lowstock d-none" data-qty="15"><i
                                class="icon an an-exclamation-cir"></i><span> Order now, Only <span
                                    class="items">10</span> left!</span></span>
                    </div>
                    <div class="pricebox">
                        <span class="price old-price"> 
                            <span id="product_quickview_price"></span>
                        </span>
                        <span class="price product-price__sale">$300.00</span>
                    </div>
                    <div class="sort-description">
                        <span id="product_quickview_desc"></span>
                    </div>
                    <form method="post" action="#" id="product_form--option" class="product-form">
                        @csrf
                        <div id="product_quickview_value"></div>
                        <div class="product-options d-flex-wrap">
                            <div class="swatch clearfix swatch-0 option1">
                                <div class="product-form__item">
                                    <label class="label d-flex">Color:<span class="required d-none">*</span> <span
                                            class="slVariant ms-1 fw-bold">Black</span></label>
                                    <ul class="swatches-image swatches d-flex-wrap list-unstyled clearfix">
                                        <li data-value="Black" class="swatch-element color available active">
                                            <label class="rounded swatchLbl small color black"
                                                title="Black"></label>
                                            <span class="tooltip-label top">Black</span>
                                        </li>
                                        <li data-value="Green" class="swatch-element color available">
                                            <label class="rounded swatchLbl small color green"
                                                title="Green"></label>
                                            <span class="tooltip-label top">Green</span>
                                        </li>
                                        <li data-value="Orange" class="swatch-element color available">
                                            <label class="rounded swatchLbl small color orange"
                                                title="Orange"></label>
                                            <span class="tooltip-label top">Orange</span>
                                        </li>
                                        <li data-value="Blue" class="swatch-element color available">
                                            <label class="rounded swatchLbl small color blue"
                                                title="Blue"></label>
                                            <span class="tooltip-label top">Blue</span>
                                        </li>
                                        <li data-value="Red" class="swatch-element color available">
                                            <label class="rounded swatchLbl small color red" title="Red"></label>
                                            <span class="tooltip-label top">Red</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="swatch clearfix swatch-1 option2">
                                <div class="product-form__item">
                                    <label class="label">Size:<span class="required d-none">*</span> <span
                                            class="slVariant ms-1 fw-bold">XS</span></label>
                                    <ul class="swatches-size d-flex-center list-unstyled clearfix swatch-1 option2">
                                        <li data-value="XS" class="swatch-element xs available active">
                                            <label class="swatchLbl rounded medium" title="XS">XS</label>
                                            <span class="tooltip-label">XS</span>
                                        </li>
                                        <li data-value="S" class="swatch-element s available">
                                            <label class="swatchLbl rounded medium" title="S">S</label>
                                            <span class="tooltip-label">S</span>
                                        </li>
                                        <li data-value="M" class="swatch-element m available">
                                            <label class="swatchLbl rounded medium" title="M">M</label>
                                            <span class="tooltip-label">M</span>
                                        </li>
                                        <li data-value="L" class="swatch-element l available">
                                            <label class="swatchLbl rounded medium" title="L">L</label>
                                            <span class="tooltip-label">L</span>
                                        </li>
                                        <li data-value="XL" class="swatch-element xl available">
                                            <label class="swatchLbl rounded medium" title="XL">XL</label>
                                            <span class="tooltip-label">XL</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-action d-flex-wrap w-100 mb-3 clearfix">
                                <div class="quantity">
                                    <div class="qtyField rounded">
                                        <a class="qtyBtn minus" href="javascript:void(0);"><i class="icon an an-minus-r" aria-hidden="true"></i></a>
                                        {{-- <input type="text" name="quantity" value="1" class="product-form__input qty"> --}}
                                        <span id="product_quickview_qty"></span>
                                        <a class="qtyBtn plus" href="javascript:void(0);"><i class="icon an an-plus-l" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                                <div class="add-to-cart ms-3 fl-1">
                                    {{-- <button type="button" class="btn button-cart rounded"><span>Thêm vào giỏ hàng</span></button> --}}
                                    <span id="product_quickview_button"></span>
                                    <span id="beforesend_quickview"></span>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="wishlist-btn d-flex-center">
                        <a class="add-wishlist d-flex-center text-uppercase me-3" href="my-wishlist.html"
                            title="Add to Wishlist"><i class="icon an an-heart-l me-1"></i> <span>Thêm vào danh sánh yêu thích</span></a>
                        <a class="add-compare d-flex-center text-uppercase" href="compare-style1.html"
                            title="Add to Compare"><i class="icon an an-random-r me-2"></i> <span>Thêm vào so sánh</span></a>
                    </div>
                    <!-- Social Sharing -->
                    <div class="social-sharing share-icon d-flex-center mx-0 mt-3">
                        <span class="sharing-lbl me-2">Share :</span>
                        <a href="#" class="d-flex-center btn btn-link btn--share share-facebook"
                            data-bs-toggle="tooltip" data-bs-placement="top" title="Share on Facebook"><i
                                class="icon an an-facebook mx-1"></i><span
                                class="share-title d-none">Facebook</span></a>
                        <a href="#" class="d-flex-center btn btn-link btn--share share-twitter"
                            data-bs-toggle="tooltip" data-bs-placement="top" title="Tweet on Twitter"><i
                                class="icon an an-twitter mx-1"></i><span
                                class="share-title d-none">Tweet</span></a>
                        <a href="#" class="d-flex-center btn btn-link btn--share share-pinterest"
                            data-bs-toggle="tooltip" data-bs-placement="top" title="Pin on Pinterest"><i
                                class="icon an an-pinterest-p mx-1"></i> <span class="share-title d-none">Pin
                                it</span></a>
                        <a href="#" class="d-flex-center btn btn-link btn--share share-linkedin"
                            data-bs-toggle="tooltip" data-bs-placement="top" title="Share on Instagram"><i
                                class="icon an an-instagram mx-1"></i><span
                                class="share-title d-none">Instagram</span></a>
                        <a href="#" class="d-flex-center btn btn-link btn--share share-whatsapp"
                            data-bs-toggle="tooltip" data-bs-placement="top" title="Share on WhatsApp"><i
                                class="icon an an-whatsapp mx-1"></i><span
                                class="share-title d-none">WhatsApp</span></a>
                        <a href="#" class="d-flex-center btn btn-link btn--share share-email"
                            data-bs-toggle="tooltip" data-bs-placement="top" title="Share by Email"><i
                                class="icon an an-envelope-l mx-1"></i><span
                                class="share-title d-none">Email</span></a>
                    </div>
                    <!-- End Social Sharing -->
                </div>
            </div>
        </div>
        <!--End Quickview Popup-->

        <!--Addtocart Added Popup-->
        {{-- <div id="pro-addtocart-popup" class="mfp-with-anim mfp-hide">
            <button title="Close (Esc)" type="button" class="mfp-close">×</button>
            <div class="addtocart-inner text-center clearfix">
                <h4 class="title mb-3 text-success">Added to your shopping cart successfully.</h4>
                <div class="pro-img mb-3">
                    <img class="img-fluid blur-up lazyload" src="assets/images/products/add-to-cart-popup.jpg"
                        data-src="assets/images/products/add-to-cart-popup.jpg"
                        alt="Added to your shopping cart successfully."
                        title="Added to your shopping cart successfully." width="600" height="508" />
                </div>
                <div class="pro-details">
                    <h5 class="pro-name mb-0">Ditsy Floral Dress</h5>
                    <p class="sku my-2">Color: Gray</p>
                    <p class="mb-0 qty-total">1 X $113.88</p>
                    <div class="addcart-total bg-light mt-3 mb-3 p-2">
                        Total: <b class="price">$113.88</b>
                    </div>
                    <div class="button-action">
                        <a href="checkout-style1.html" class="btn btn-primary view-cart mx-1 rounded">Go To
                            Checkout</a>
                        <a href="{{ asset('home') }}" class="btn btn-secondary rounded">Continue Shopping</a>
                    </div>
                </div>
            </div>
        </div> --}}
        <!-- End Addtocart Added Popup-->

        <!--Product Promotion Popup-->
        <div class="product-notification" id="dismiss">
            <span class="close" aria-hidden="true"><i class="an an-times-r"></i></span>
            <div class="media d-flex">
                <a href="product-layout1.html"><img class="mr-2 blur-up lazyload"
                        src="assets/images/products/product-3.jpg" data-src="assets/images/products/product-3.jpg"
                        alt="Trim Button Front Blouse" /></a>
                <div class="media-body">
                    <h5 class="mt-0 mb-1">Someone purchsed a</h5>
                    <p class="pname"><a href="product-layout1.html">Trim Button Front Blouse</a></p>
                    <p class="detail">14 Minutes ago from New York, USA</p>
                </div>
            </div>
        </div>
        <!--End Product Promotion Popup-->

        <!--Newsletter Popup-->
        <div id="newsletter-modal" class="style1 mfp-with-anim mfp-hide">
            <div class="d-flex flex-column">
                <div class="newsltr-img d-none d-sm-none d-md-block"><img class="blur-up lazyload"
                        src="assets/images/newsletter-img.webp" data-src="assets/images/newsletter-img.webp"
                        alt="image" width="550" height="290"></div>
                <div class="newsltr-text text-center">
                    <div class="wraptext">
                        <p><b>GET THE UPDATES ABOUT LATEST TREANDS</b></p>
                        <h2 class="title fw-normal mb-4">20% OFF YOUR FIRST ORDER</h2>
                        <form action="#" method="post" class="mcNewsletter mb-4">
                            <div class="input-group d-flex flex-nowrap">
                                <input type="email" class="rounded-start newsletter__input" name="EMAIL"
                                    value="" placeholder="Email address" required>
                                <span><button type="submit" class="btn mcNsBtn rounded-end"
                                        name="commit"><span>Subscribe</span></button></span>
                            </div>
                        </form>
                        <div class="customCheckbox justify-content-center checkboxlink clearfix mb-3">
                            <input id="dontshow" name="newsPopup" type="checkbox" />
                            <label for="dontshow" class="pt-1">Don't show this popup again</label>
                        </div>
                        <p>Your information will never be shared</p>
                    </div>
                </div>
            </div>
            <button title="Close (Esc)" type="button" class="mfp-close">×</button>
        </div>
        <!--End Newsletter Popup-->


        <!-- Including Jquery -->
        <script src="{{ asset('assets/js/vendor/jquery-min.js') }}"></script>
        <script src="{{ asset('assets/js/vendor/js.cookie.js') }}"></script>
        <!--Including Javascript-->
        <script src="{{ asset('assets/js/plugins.js') }}"></script>
        <script src="{{ asset('assets/js/main.js') }}"></script>
        <script src="{{ asset('frontend/js/simple.money.format.js') }}"></script>
        <script src="{{ asset('frontend/js/sweetalert2.all.min.js') }}"></script>
        <script src="{{ asset('assets/js/vendor/photoswipe.min.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.5/dist/sweetalert2.all.min.js"></script>
        <script
            src="https://www.paypal.com/sdk/js?client-id=AeNIeyAOsi6FMxQM6YFQ0LPCoAffka3SUi9pr8ZvRGoWH-xHE17p6y7bVC_QtJx5Aw5Uk3jIUVH5Yb2v">
        </script>
        <script>
            $(function() {
                var $pswp = $('.pswp')[0],
                    image = [],
                    getItems = function() {
                        var items = [];
                        $('.lightboximages a').each(function() {
                            var $href = $(this).attr('href'),
                                $size = $(this).data('size').split('x'),
                                item = {
                                    src: $href,
                                    w: $size[0],
                                    h: $size[1]
                                };
                            items.push(item);
                        });
                        return items;
                    };
                var items = getItems();

                $.each(items, function(index, value) {
                    image[index] = new Image();
                    image[index].src = value['src'];
                });
                $('.prlightbox').on('click', function(event) {
                    event.preventDefault();

                    var $index = $(".active-thumb").parent().attr('data-slick-index');
                    $index++;
                    $index = $index - 1;

                    var options = {
                        index: $index,
                        bgOpacity: 0.7,
                        showHideOpacity: true
                    };
                    var lightBox = new PhotoSwipe($pswp, PhotoSwipeUI_Default, items, options);
                    lightBox.init();
                });
            });
        </script>
        <script>
            paypal.Buttons({
                createOrder: function(data, actions) {
                    // This function sets up the details of the transaction, including the amount and line item details.
                    return actions.order.create({
                        purchase_units: [{
                            amount: {
                                value: '0.01'
                            }
                        }]
                    });
                }
            }).render('#paypal-button-container');
        </script>
        <script style="text/javascrip">
            $(document).ready(function() {
                $('.send_order').click(function() {
                    const swalWithBootstrapButtons = Swal.mixin({
                        customClass: {
                            confirmButton: 'btn btn-success',
                            cancelButton: 'btn btn-danger'
                        },
                        buttonsStyling: false
                    })

                    swalWithBootstrapButtons.fire({
                        title: 'Xác nhận đơn hàng?',
                        text: "Đơn hàng sẽ không đưuọc hoàn trả khi đặt,Bạn có muốn đặt không?",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Cảm ơn,Mua hàng!',
                        cancelButtonText: 'Không,Ở lại trang!',
                        reverseButtons: true
                    }).then((result) => {
                        if (result.isConfirmed) {
                            var shipping_email = $('.shipping_email').val();
                            var shipping_name = $('.shipping_name').val();
                            var shipping_address = $('.shipping_address').val();
                            var shipping_phone = $('.shipping_phone').val();
                            var shipping_notes = $('.shipping_notes').val();
                            var shipping_method = $('.payment_select').val();
                            var order_coupon = $('.order_coupon').val();
                            var order_fee = $('.order_fee').val();
                            var _token = $('input[name="_token"]').val();

                            $.ajax({
                                url: '/confirm-order',
                                method: 'POST',
                                data: {
                                    _token: _token,
                                    shipping_email: shipping_email,
                                    shipping_name: shipping_name,
                                    shipping_address: shipping_address,
                                    shipping_phone: shipping_phone,
                                    shipping_notes: shipping_notes,
                                    shipping_method: shipping_method,
                                    order_coupon: order_coupon,
                                    order_fee: order_fee
                                },
                                success: function(data) {
                                    swalWithBootstrapButtons.fire(
                                        'Đơn hàng!',
                                        'Đơn hàng của bạn đã được gửi thành công.',
                                        'success'
                                    )
                                    window.location.href = "{{ '/success-order' }}";
                                }
                            });
                        } else if (
                            result.dismiss === Swal.DismissReason.cancel
                        ) {
                            swalWithBootstrapButtons.fire(
                                'Đóng',
                                'Đơn hàng chưa được gửi,làm ơn hoàn tất đặt hàng :)',
                                'error'
                            )
                        }
                    });

                });
            });
        </script>
        <script style="text/javascrip">
            $(document).on('click', '.redirect-cart', function() {
                window.location.href = "{{ '/cart' }}";
            });
        </script>
        <script style="text/javascrip">
            $(document).on('click', '.add-to-cart-quickview', function() {
                var id = $(this).data('id_product');
                var cart_product_id = $('.cart_product_id_' + id).val();
                var cart_product_name = $('.cart_product_name_' + id).val();
                var cart_product_image = $('.cart_product_image_' + id).val();
                var cart_product_price = $('.cart_product_price_' + id).val();
                var cart_product_qty = $('.cart_product_qty_' + id).val();
                var cart_product_quantity = $('.cart_product_quantity_' + id).val();
                var _token = $('input[name="_token"]').val();
                if (parseInt(cart_product_qty) > parseInt(cart_product_quantity)) {
                    alert('Sản phẩm' + ' ' + cart_product_name + ' ' + 'chỉ còn' + ' ' +
                        cart_product_quantity + ' ' + 'sản phẩm');
                } else {
                    $.ajax({
                        url: '/add-cart-ajax',
                        method: 'POST',
                        data: {
                            _token: _token,
                            cart_product_id: cart_product_id,
                            cart_product_name: cart_product_name,
                            cart_product_image: cart_product_image,
                            cart_product_price: cart_product_price,
                            cart_product_qty: cart_product_qty,
                            cart_product_quantity: cart_product_quantity
                        },
                        beforeSend: function() {
                            $('#beforesend_quickview').html(
                                "<p class='text text-primary'>Đang thêm sản phẩm đã thêm vào giỏ hàng</p>"
                            );
                        },
                        success: function(data) {
                            $('#beforesend_quickview').html(
                                "<p class='text text-primary'>Sản phẩm đã thêm vào giỏ hàng</p>");
                            $('#buy_quickview').attr('disabled', true);
                        }
                    });
                }
            })
        </script>
        <script style="text/javascrip">
            $(document).ready(function() {
                $('.add-to-cart').click(function() {
                    var id = $(this).data('id_product');
                    var cart_product_id = $('.cart_product_id_' + id).val();
                    var cart_product_name = $('.cart_product_name_' + id).val();
                    var cart_product_image = $('.cart_product_image_' + id).val();
                    var cart_product_price = $('.cart_product_price_' + id).val();
                    var cart_product_qty = $('.cart_product_qty_' + id).val();
                    var cart_product_quantity = $('.cart_product_quantity_' + id).val();
                    var _token = $('input[name="_token"]').val();
                    if (parseInt(cart_product_qty) > parseInt(cart_product_quantity)) {
                        alert('Sản phẩm' + ' ' + cart_product_name + ' ' + 'chỉ còn' + ' ' +
                            cart_product_quantity + ' ' + 'sản phẩm');
                    } else {
                        $.ajax({
                            url: '/add-cart-ajax',
                            method: 'POST',
                            data: {
                                _token: _token,
                                cart_product_id: cart_product_id,
                                cart_product_name: cart_product_name,
                                cart_product_image: cart_product_image,
                                cart_product_price: cart_product_price,
                                cart_product_qty: cart_product_qty,
                                cart_product_quantity: cart_product_quantity
                            },
                            success: function(data) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Thêm sản phẩm thành công',
                                    showCancelButton: true,
                                    confirmButtonText: 'Đi đến giỏ hàng!',
                                    cancelButtonText: 'Tiếp tục mua sắm!',
                                    timer: 5000, // thời gian chờ là 5000ms (5 giây)
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        window.location.href = "{{ asset('/cart') }}";
                                    }
                                })
                            }
                        });
                    }
                });
            });
        </script>
        <!--Newsletter Popup Cookies-->
        {{-- <script>
            function newsletter_popup() {
                var cookieSignup = "cookieSignup",
                    date = new Date();
                if ($.cookie(cookieSignup) != 'true' && window.location.href.indexOf("challenge#newsletter-modal") <= -1) {
                    setTimeout(function() {
                        $.magnificPopup.open({
                            items: {
                                src: '#newsletter-modal'
                            },
                            type: 'inline',
                            removalDelay: 300,
                            mainClass: 'mfp-zoom-in'
                        });
                    }, 5000);
                }
                $.magnificPopup.instance.close = function() {
                    if ($("#dontshow").prop("checked") == true) {
                        $.cookie(cookieSignup, 'true', {
                            expires: 1,
                            path: '/'
                        });
                    }
                    $.magnificPopup.proto.close.call(this);
                }
            }
            newsletter_popup();
        </script> --}}
        <!--End Newsletter Popup Cookies-->
        <script style="text/javascrip">
            $(document).ready(function() {
                $("#email").blur(function() {
                    var email = $("#email").val();
                    if (IsEmail(email) == false) {
                        $("#sign-up").attr("disabled", true);
                        $("#popover-email").removeClass("hide");
                    } else {
                        $("#popover-email").addClass("hide");
                    }
                });
                $("#password").keyup(function() {
                    var password = $("#password").val();
                    if (checkStrength(password) == false) {
                        $("#sign-up").attr("disabled", true);
                    }
                });
                $("#confirm-password").blur(function() {
                    if ($("#password").val() !== $("#confirm-password").val()) {
                        $("#popover-cpassword").removeClass("hide");
                        $("#sign-up").attr("disabled", true);
                    } else {
                        $("#popover-cpassword").addClass("hide");
                    }
                });
                $("#contact-number").blur(function() {
                    if ($("#contact-number").val().length != 10) {
                        $("#popover-cnumber").removeClass("hide");
                        $("#sign-up").attr("disabled", true);
                    } else {
                        $("#popover-cnumber").addClass("hide");
                        $("#sign-up").attr("disabled", false);
                    }
                });
                $("#sign-up").hover(function() {
                    if ($("#sign-up").prop("disabled")) {
                        $("#sign-up").popover({
                            html: true,
                            trigger: "hover",
                            placement: "below",
                            offset: 20,
                            content: function() {
                                return $("#sign-up-popover").html();
                            }
                        });
                    }
                });

                function IsEmail(email) {
                    var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                    if (!regex.test(email)) {
                        return false;
                    } else {
                        return true;
                    }
                }

                function checkStrength(password) {
                    var strength = 0;

                    //If password contains both lower and uppercase characters, increase strength value.
                    if (password.match(/([a-z].*[A-Z])|([A-Z].*[a-z])/)) {
                        strength += 1;
                        $(".low-upper-case").addClass("text-success");
                        $(".low-upper-case i").removeClass("fa-file-text").addClass("fa-check");
                        $("#popover-password-top").addClass("hide");
                    } else {
                        $(".low-upper-case").removeClass("text-success");
                        $(".low-upper-case i").addClass("fa-file-text").removeClass("fa-check");
                        $("#popover-password-top").removeClass("hide");
                    }

                    //If it has numbers and characters, increase strength value.
                    if (password.match(/([a-zA-Z])/) && password.match(/([0-9])/)) {
                        strength += 1;
                        $(".one-number").addClass("text-success");
                        $(".one-number i").removeClass("fa-file-text").addClass("fa-check");
                        $("#popover-password-top").addClass("hide");
                    } else {
                        $(".one-number").removeClass("text-success");
                        $(".one-number i").addClass("fa-file-text").removeClass("fa-check");
                        $("#popover-password-top").removeClass("hide");
                    }

                    //If it has one special character, increase strength value.
                    if (password.match(/([!,%,&,@,#,$,^,*,?,_,~])/)) {
                        strength += 1;
                        $(".one-special-char").addClass("text-success");
                        $(".one-special-char i").removeClass("fa-file-text").addClass("fa-check");
                        $("#popover-password-top").addClass("hide");
                    } else {
                        $(".one-special-char").removeClass("text-success");
                        $(".one-special-char i").addClass("fa-file-text").removeClass("fa-check");
                        $("#popover-password-top").removeClass("hide");
                    }

                    if (password.length > 7) {
                        strength += 1;
                        $(".eight-character").addClass("text-success");
                        $(".eight-character i").removeClass("fa-file-text").addClass("fa-check");
                        $("#popover-password-top").addClass("hide");
                    } else {
                        $(".eight-character").removeClass("text-success");
                        $(".eight-character i").addClass("fa-file-text").removeClass("fa-check");
                        $("#popover-password-top").removeClass("hide");
                    }

                    // If value is less than 2

                    if (strength < 2) {
                        $("#result").removeClass();
                        $("#password-strength").addClass("progress-bar-danger");

                        $("#result").addClass("text-danger").text("Very Week");
                        $("#password-strength").css("width", "10%");
                    } else if (strength == 2) {
                        $("#result").addClass("good");
                        $("#password-strength").removeClass("progress-bar-danger");
                        $("#password-strength").addClass("progress-bar-warning");
                        $("#result").addClass("text-warning").text("Week");
                        $("#password-strength").css("width", "60%");
                        return "Week";
                    } else if (strength == 4) {
                        $("#result").removeClass();
                        $("#result").addClass("strong");
                        $("#password-strength").removeClass("progress-bar-warning");
                        $("#password-strength").addClass("progress-bar-success");
                        $("#result").addClass("text-success").text("Strength");
                        $("#password-strength").css("width", "100%");

                        return "Strong";
                    }
                }
            });
        </script>

        <script>
            /* Login Form */
            $('.back-to-login').on('click', function(e) {
                $(".user-form-login").toggleClass("login-active");
                $(".user-form-forgot").removeClass("forgot-active");
                $(".user-form-signup,.login-inner").removeClass("signup-active");
                $(".user-registered").removeClass("registered-active");
                $(".use-logined").removeClass("logined-active");
                $(".use-forgoted").removeClass("forgoted-active");
                e.preventDefault();
            });
            $(".forgotpass-link").on('click', function(e) {
                $(".user-form-forgot").toggleClass("forgot-active");
                $(".user-form-login").removeClass("login-active");
                $(".user-form-signup,.login-inner").removeClass("signup-active");
                $(".user-registered").removeClass("registered-active");
                $(".use-logined").removeClass("logined-active");
                $(".use-forgoted").removeClass("forgoted-active");
                e.preventDefault();
            });
            $(".signup-link").on('click', function(e) {
                $(".user-form-signup,.login-inner").toggleClass("signup-active");
                $(".user-form-login").removeClass("login-active");
                $(".user-form-forgot").removeClass("forgot-active");
                $(".user-registered").removeClass("registered-active");
                $(".use-logined").removeClass("logined-active");
                $(".use-forgoted").removeClass("forgoted-active");
                e.preventDefault();
            });
            $(".register-link").on('click', function(e) {
                $(".user-registered").toggleClass("registered-active");
                $(".check").toggleClass("checked");
                $(".use-forgoted .check").removeClass("checked");
                $(".user-form-login").removeClass("login-active");
                $(".user-form-forgot").removeClass("forgot-active");
                $(".user-form-signup,.login-inner").removeClass("signup-active");
                $(".use-logined").removeClass("logined-active");
                $(".use-forgoted").removeClass("forgoted-active");
                e.preventDefault();
            });
            $(".signin-link").on('click', function(e) {
                $(".use-logined").toggleClass("logined-active");
                $(".user-form-login").removeClass("login-active");
                $(".user-form-forgot").removeClass("forgot-active");
                $(".user-registered").removeClass("registered-active");
                $(".use-forgoted").removeClass("forgoted-active");
                e.preventDefault();
            });
            $(".forgoted-link").on('click', function(e) {
                $(".use-forgoted").toggleClass("forgoted-active");
                $(".check").toggleClass("checked");
                $(".user-registered .check").removeClass("checked");
                $(".user-form-login").removeClass("login-active");
                $(".user-form-forgot").removeClass("forgot-active");
                $(".user-registered").removeClass("registered-active");
                e.preventDefault();
            });
        </script>
    </div>
    <!--End Page Wrapper-->
</body>

<!-- Mirrored from template.annimexweb.com/optimal/{{ asset('home') }} by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 14 Jul 2023 20:27:39 GMT -->

</html>
