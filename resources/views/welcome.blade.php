<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
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

    <link rel="shortcut icon" href="{{ asset('uploads/logo/' . $info->info_logo) }}" type="image/x-icon" />
    <title>{{ $meta_title }}</title>
    <link href="{{ asset('frontend/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/prettyPhoto.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/price-range.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/responsive.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/style.css') }}" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="{{ asset('frontend/css/lightslider.css') }}" />
    <link type="text/css" rel="stylesheet" href="{{ asset('frontend/css/lightslider.min.css') }}" />
    <link type="text/css" rel="stylesheet" href="{{ asset('frontend/css/lightgallery.min.css') }}" />
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" type="text/css"
        href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.5/dist/sweetalert2.min.css">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,400italic,500,700,100" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,800,300,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Abel" rel="stylesheet">

    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head>
<!--/head-->

<body>
    <header id="header">
        <!--header-->
        <div class="header_top">
            <!--header_top-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="contactinfo">
                            <ul class="nav nav-pills">
                                <li><a href="#"><i class="fa fa-phone"></i> {{ $info->info_phone }}</a></li>
                                <li><a href="#"><i class="fa fa-envelope"></i> {{ $info->info_email }}</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="social-icons pull-right">
                            <ul class="nav navbar-nav">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                {{-- <li><a href="#"><i class="fa fa-dribbble"></i></a></li> --}}
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/header_top-->

        <div class="header-middle">
            <!--header-middle-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="logo pull-left">
                            <a href="{{ asset('home') }}"><img src="uploads/logo/{{ $info->info_logo }}"
                                    style="width: 100px;" alt="{{ $info->info_logo }}" /></a>
                        </div>
                        <div class="btn-group pull-right">
                            <div class="btn-group">
                                <button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
                                    @lang('lang.language')
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a href="{{asset('lang/vi')}}">Tiếng việt</a></li>
                                    <li><a href="{{asset('lang/en')}}">Tiếng Anh</a></li>
                                    <li><a href="{{asset('lang/cn')}}">Tiếng Trung</a></li>
                                </ul>
                            </div>

                            <div class="btn-group">
                                <button type="button" class="btn btn-default dropdown-toggle usa"
                                    data-toggle="dropdown">
                                    DOLLAR
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Canadian Dollar</a></li>
                                    <li><a href="#">Pound</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="shop-menu pull-right">
                            <ul class="nav navbar-nav">
                                <li>
                                    <a href=""><i class="fa fa-user"></i> @lang('lang.account')</a>
                                </li>
                                @php
                                    $customer_id = Session('customer_id');
                                    $shipping_id = Session('shipping_id');
                                    $name = session('customer_name');
                                @endphp
                                @if ($customer_id != null && $shipping_id == null)
                                    <li>
                                        <a href="{{ asset('checkout') }}"><i class="fa fa-crosshairs"></i> @lang('lang.pay')</a>
                                    </li>
                                @else
                                    <li>
                                        <a href="{{ asset('login-checkout') }}"><i class="fa fa-crosshairs"></i> @lang('lang.pay')</a>
                                    </li>
                                @endif
                                <li>
                                    <a href="#"><i class="fa fa-star"></i> @lang('lang.wishlist')</a>
                                </li>
                                <li>
                                    <a href="{{ asset('cart') }}"><i class="fa fa-shopping-cart"></i> @lang('lang.cart')</a>
                                </li>
                                @if ($customer_id != null)
                                    <li>
                                        <a href="{{ asset('history') }}"><i class="fa fa-lock"></i> @lang('lang.order_history')</a>
                                    </li>
                                    <li>
                                        <a href="{{ asset('logout-checkout') }}"><i class="fa fa-lock"></i> @lang('lang.logout')({{ $name }})</a>
                                    </li>
                                @else
                                    <li>
                                        <a href="{{ asset('login-checkout') }}"><i class="fa fa-lock"></i> @lang('lang.login')</a>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <!--/header-middle-->

        <div class="header-bottom">
            <!--header-bottom-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-8">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse"
                                data-target=".navbar-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <div class="mainmenu pull-left">
                            <ul class="nav navbar-nav collapse navbar-collapse">
                                <li><a href="{{ asset('home') }}" class="active">@lang('lang.home')</a></li>
                                <li class="dropdown"><a href="#">@lang('lang.product')<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="shop.html">Products</a></li>
                                        <li><a href="product-details.html">Product Details</a></li>
                                        <li><a href="checkout.html">Checkout</a></li>
                                        <li><a href="{{ asset('cart') }}">Cart</a></li>
                                        <li><a href="login.html">Login</a></li>
                                    </ul>
                                </li>
                                <li><a href="{{ asset('blog') }}">@lang('lang.blog')</a></li>
                                <li><a href="{{ asset('cart') }}">@lang('lang.cart')</a></li>
                                <li><a href="{{ asset('lien-he') }}">@lang('lang.contact')</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <form method="GET" action="{{ asset('/search') }}">
                            <div class="search_box pull-right">
                                <input type="text" name="search" id="timkiem" placeholder="@lang('lang.search')"
                                    autocomplete="off" maxlength="20" />
                                <button class="btn btn-default btn-sm">@lang('lang.search')</button>
                            </div>
                            <ul class="dropdown-menu" id="result" style="display: none;"></ul>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--/header-bottom-->
    </header>
    <!--/header-->

    <section>
        <div class="container">
            <div class="row">
                @yield('content')
            </div>
        </div>
    </section>
    {{-- container --}}

    <footer id="footer">
        <!--Footer-->
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-sm-2">
                        <div class="companyinfo">
                            <h2><span>e</span>-shopper</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,sed do eiusmod tempor</p>
                        </div>
                    </div>
                    <div class="col-sm-7">
                        <div class="col-sm-3">
                            <div class="video-gallery text-center">
                                <a href="#">
                                    <div class="iframe-img">
                                        <img src="images/home/iframe1.png" alt="" />
                                    </div>
                                    <div class="overlay-icon">
                                        <i class="fa fa-play-circle-o"></i>
                                    </div>
                                </a>
                                <p>Circle of Hands</p>
                                <h2>24 DEC 2014</h2>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="video-gallery text-center">
                                <a href="#">
                                    <div class="iframe-img">
                                        <img src="images/home/iframe2.png" alt="" />
                                    </div>
                                    <div class="overlay-icon">
                                        <i class="fa fa-play-circle-o"></i>
                                    </div>
                                </a>
                                <p>Circle of Hands</p>
                                <h2>24 DEC 2014</h2>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="video-gallery text-center">
                                <a href="#">
                                    <div class="iframe-img">
                                        <img src="images/home/iframe3.png" alt="" />
                                    </div>
                                    <div class="overlay-icon">
                                        <i class="fa fa-play-circle-o"></i>
                                    </div>
                                </a>
                                <p>Circle of Hands</p>
                                <h2>24 DEC 2014</h2>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="video-gallery text-center">
                                <a href="#">
                                    <div class="iframe-img">
                                        <img src="images/home/iframe4.png" alt="" />
                                    </div>
                                    <div class="overlay-icon">
                                        <i class="fa fa-play-circle-o"></i>
                                    </div>
                                </a>
                                <p>Circle of Hands</p>
                                <h2>24 DEC 2014</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="address">
                            <img src="images/home/map.png" alt="" />
                            <p>505 S Atlantic Ave Virginia Beach, VA(Virginia)</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer-widget">
            <div class="container">
                <div class="row">
                    <div class="col-sm-2">
                        <div class="single-widget">
                            <h2>Service</h2>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="#">Online Help</a></li>
                                <li><a href="#">Contact Us</a></li>
                                <li><a href="#">Order Status</a></li>
                                <li><a href="#">Change Location</a></li>
                                <li><a href="#">FAQ’s</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="single-widget">
                            <h2>Quock Shop</h2>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="#">T-Shirt</a></li>
                                <li><a href="#">Mens</a></li>
                                <li><a href="#">Womens</a></li>
                                <li><a href="#">Gift Cards</a></li>
                                <li><a href="#">Shoes</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="single-widget">
                            <h2>Policies</h2>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="#">Terms of Use</a></li>
                                <li><a href="#">Privecy Policy</a></li>
                                <li><a href="#">Refund Policy</a></li>
                                <li><a href="#">Billing System</a></li>
                                <li><a href="#">Ticket System</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="single-widget">
                            <h2>About Shopper</h2>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="#">Company Information</a></li>
                                <li><a href="#">Careers</a></li>
                                <li><a href="#">Store Location</a></li>
                                <li><a href="#">Affillate Program</a></li>
                                <li><a href="#">Copyright</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-3 col-sm-offset-1">
                        <div class="single-widget">
                            <h2>About Shopper</h2>
                            <form action="#" class="searchform">
                                <input type="text" placeholder="Your email address" />
                                <button type="submit" class="btn btn-default"><i
                                        class="fa fa-arrow-circle-o-right"></i></button>
                                <p>Get the most recent updates from <br />our site and be updated your self...</p>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <p class="pull-left">Copyright © 2013 E-SHOPPER Inc. All rights reserved.</p>
                    <p class="pull-right">Designed by <span><a target="_blank"
                                href="http://www.themeum.com">Themeum</a></span></p>
                </div>
            </div>
        </div>

    </footer>
    <!--/Footer-->



    <script src="{{ asset('frontend/js/jquery.js') }}"></script>
    <script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.scrollUp.min.js') }}"></script>
    <script src="{{ asset('frontend/js/price-range.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.prettyPhoto.js') }}"></script>
    <script src="{{ asset('frontend/js/main.js') }}"></script>
    <script src="{{ asset('frontend/js/sweetalert2.all.min.js') }}"></script>
    <script src="{{ asset('frontend/js/lightslider.js') }}"></script>
    <script src="{{ asset('frontend/js/lightgallery-all.min.js') }}"></script>
    <script src="{{ asset('frontend/js/lightslider.min.js') }}"></script>
    {{-- <script src="{{ asset('backend/js/jquery-3.6.0.min.js') }}"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.5/dist/sweetalert2.all.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script src="{{ asset('frontend/js/simple.money.format.js') }}"></script>
    <script src="https://www.paypal.com/sdk/js?client-id=AeNIeyAOsi6FMxQM6YFQ0LPCoAffka3SUi9pr8ZvRGoWH-xHE17p6y7bVC_QtJx5Aw5Uk3jIUVH5Yb2v"> // Required. Replace YOUR_CLIENT_ID with your sandbox client ID.</script>
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

    <script style="text/javascrip">
        $(function() {
            $("#slider-range").slider({
                orientation: "horizontal",
                range: true,
                min: {{ $min_price }},
                max: {{ $max_price }},
                step: 100,
                values: [{{ $min_price }}, {{ $max_price }}],
                slide: function(event, ui) {
                    $("#amount_start").val(ui.values[0] + "VND").simpleMoneyFormat();
                    $("#amount_end").val(ui.values[1] + "VND").simpleMoneyFormat();
                    $("#start_price").val(ui.values[0]);
                    $("#end_price").val(ui.values[1]);
                },
            });
            $("#amount_start").val($("#slider-range").slider("values", 0) + "VND").simpleMoneyFormat();
            $("#amount_end").val($("#slider-range").slider("values", 1) + "VND").simpleMoneyFormat();
        });
    </script>
</body>

</html>
