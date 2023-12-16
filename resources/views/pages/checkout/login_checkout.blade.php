@extends('welcome')
@section('content')
<!--Body Container-->
<div id="page-content">   
    <!--Collection Banner-->
    <div class="collection-header">
        <div class="collection-hero">
            <div class="collection-hero__image"></div>
            <div class="collection-hero__title-wrapper container">
                <h1 class="collection-hero__title">Đăng nhập</h1>
                <div class="breadcrumbs text-uppercase mt-1 mt-lg-2"><a href="{{ asset('home') }}" title="Back to the home page">Trang chủ</a><span>|</span><span class="fw-bold">Đăng nhập</span></div>
            </div>
        </div>
    </div>
    <!--End Collection Banner-->
    <?php
    $message = Session::get('message');
    if ($message) {
        echo $message;
        Session::put('message', null);
    }
    ?>
    <!--Container-->
    <div class="container">
        <!--Main Content-->
        <div class="mainlogin-sliding my-5 py-0 py-lg-4">
            <div class="row">
                <div class="col-12 col-sm-10 col-md-10 col-lg-10 col-xl-10 mx-auto">
                    <div class="row g-0 form-slider">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-6">
                            <!--Home slider-->
                            <div class="slideshow slideshow-wrapper">
                                <div class="home-slideshow">
                                    <div class="slide">
                                        <div class="blur-up lazyload bg-size ratio ratio-16x9">
                                            <img class="bg-img blur-up lazyload" data-src="assets/images/slideshow/demo15-banner1.jpg" src="assets/images/slideshow/demo15-banner1.jpg" alt="image" title="" />
                                            <div class="container">
                                                <div class="slideshow-content slideshow-overlay middle d-flex justify-content-center align-items-center">
                                                    <div class="slideshow-content-in text-center h-auto">
                                                        <div class="wrap-caption animation style1 col-11 col-sm-8 p-4">
                                                            <h3>Welcome to Optimal</h3>
                                                            <p>Optimal Multipurpose Template that will give you and your customers a smooth shopping experience which can be used for various kinds of stores such as fashion.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="slide">
                                        <div class="blur-up lazyload bg-size ratio ratio-16x9">
                                            <img class="bg-img blur-up lazyload" data-src="assets/images/parallax/demo12-banner1.jpg" src="assets/images/parallax/demo12-banner1.jpg" alt="image" title="" />                 
                                            <div class="container">
                                                <div class="slideshow-content slideshow-overlay middle d-flex justify-content-center align-items-center">
                                                    <div class="slideshow-content-in text-center h-auto">
                                                        <div class="wrap-caption animation style1 col-11 col-sm-8 p-4">
                                                            <h3>Welcome to Optimal</h3>
                                                            <p>Creative, flexible, Infinite Possibilities and High Performance Html template to make your business shine! Suitable for multipurpose stores.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--End Home slider-->
                        </div>
                        <div class="col-12 col-sm-12 col-md-12 col-lg-6">
                            <!-- Login Wrapper -->
                            <div class="login-wrapper">
                                <!-- Login Inner -->
                                <div class="login-inner">
                                    <!-- Login Logo -->
                                    <a href="index.html" class="logo d-inline-block mb-4"><img src="assets/images/logo.svg" alt="logo" /></a>
                                    <!-- End Login Logo -->
                                    <!-- User Form -->
                                    <div class="user-loginforms">
                                        <!-- Login Form -->
                                        <form id="form-login" class="text-left user-form-login login-active" action="{{ asset('login-customer') }}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <h4>Đăng nhập vào tài khoản của bạn</h4>
                                            <div class="form-row">
                                                <div class="form-group w-100">
                                                    <input class="form-control" type="text" placeholder="Email Address" name="email_account" />
                                                </div>
                                                <div class="form-group w-100">
                                                    <input class="form-control" type="password" placeholder="Password" name="password_account" />
                                                </div>
                                                <div class="form-group w-100 submit d-flex-center justify-content-between">
                                                    <button type="submit" class="btn btn-secondary rounded">Đăng nhập</button>
                                                    <a href="javascript:void(0);" class="btn-link fw-500 forgotpass-link">Quên mật khẩu?</a>
                                                </div>
                                                <div class="form-group w-100 text-center">
                                                    Chưa đăng kí?<a href="javascript:void(0);" class="fw-500 ms-1 btn-link signup-link">Đăng kí tài khoản mới</a>
                                                </div>
                                            </div>
                                        </form> 
                                        <!-- End Login Form -->
                                        <!-- Forgot Password Form -->
                                        <form id="form-forgot-password" class="text-left user-form-forgot" action="{{ asset('reset-password') }}" method="post">
                                            @csrf
                                            <h4>Quên mật khẩu?</h4>
                                            <p>Nhập email bạn đang sử dụng cho tài khoản của mình.</p>
                                            <div class="form-row">
                                                <div class="form-group w-100">
                                                    <input class="form-control" type="text" id="email" placeholder="Email Address" name="email" />
                                                </div>
                                                <div class="form-group w-100">
                                                    <input class="btn btn-primary rounded w-100" value="Đặt lại mật khẩu" type="submit" name="recover-submit" id="">
                                                    {{-- <button type="submit" class="btn btn-primary rounded w-100 forgoted-link">Đặt lại mật khẩu</button> --}}
                                                </div>
                                                <input type="hidden" class="" name="token" id="token" value="">
                                                <div class="form-group w-100 text-center pt-3">
                                                    Go back to<a href="javascript:void(0);" class="fw-500 ms-1 btn-link back-to-login">Đăng nhập</a>
                                                </div>
                                            </div>
                                        </form> 
                                        <!-- End Forgot Password Form -->
                                        <!-- Sign Up Form -->
                                        <form id="form-signup" class="text-left user-form-signup" action="{{ asset('add-customer') }}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <h4>Đăng kí tài khoản</h4>
                                            <div class="form-row">
                                                <div class="form-group w-100">
                                                    <input class="form-control" type="text" placeholder="Username" name="customer_name" required />
                                                </div>
                                                <div class="form-group w-100">
                                                    <input class="form-control" type="text" placeholder="Email Address" name="customer_email" required />
                                                </div>
                                                <div class="form-group w-100">
                                                    <input class="form-control" type="text" placeholder="Phone" name="customer_phone" required />
                                                </div>
                                                <div class="form-group w-100">
                                                    <input class="form-control" type="password" placeholder="Password" name="customer_password" required />
                                                </div>
                                                <div class="form-group w-100">
                                                    <input class="form-control @error('customer_password') is-invalid @enderror" id="customer_password_confirmation" name="customer_password_confirmation" type="password" placeholder="Confirm password" required />
                                                </div>
                                                <div class="form-group w-100">
                                                    <div class="customCheckbox cart_tearm">
                                                        <input type="checkbox" class="form-check-input" id="agree" value="" />
                                                        <label for="agree">Tôi đồng ý với các Điều khoản và Điều kiện</label>
                                                    </div>
                                                </div>
                                                <div class="form-group w-100">
                                                    <button type="submit" class="btn btn-primary rounded w-100">Đăng kí</button>
                                                </div>
                                                <div class="form-group w-100 text-center pt-1">
                                                    Bạn đã có tài khoản?<a href="javascript:void(0);" class="fw-500 ms-1 btn-link back-to-login">Đăng nhập</a>
                                                </div>
                                            </div>
                                        </form> 
                                        <!-- End Sign Up Form -->
                                        {{-- <!-- Registered -->
                                        <div class="user-registered">
                                            <svg class="check" width="150" height="150" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 60 60"><path fill="#ffffff" d="M40.61,23.03L26.67,36.97L13.495,23.788c-1.146-1.147-1.359-2.936-0.504-4.314 c3.894-6.28,11.169-10.243,19.283-9.348c9.258,1.021,16.694,8.542,17.622,17.81c1.232,12.295-8.683,22.607-20.849,22.042 c-9.9-0.46-18.128-8.344-18.972-18.218c-0.292-3.416,0.276-6.673,1.51-9.578" /></svg>
                                            <p class="successtext"><span class="fw-500">Cảm ơn bạn đã đăng kí!</span> <br>Vui lòng check email để kích hoặt tài khoản.</p>
                                            <div class="form-group w-100 text-center pt-3">
                                                Go back to<a href="javascript:void(0);" class="fw-500 ms-1 btn-link back-to-login">Sign In</a>
                                            </div>
                                        </div>
                                        <!-- End Registered -->
                                        <!-- Logined -->
                                        <div class="use-logined">
                                            <img class="profile-photo rounded-circle" src="assets/images/blog/recent-commnet.jpg" alt="profile" width="100" />
                                            <h3 class="welcome text-capitalize mt-3 my-2">Xin chào, Chris</h3>
                                            <p class="successtext"><span class="fw-500">Login Successful!</span> <br>You have successfully signed into your account.</p>
                                            Go back to<a href="javascript:void(0);" class="fw-500 ms-1 btn-link back-to-login">Sign In</a>
                                        </div>
                                        <!-- End Logined -->
                                        <!-- Forgoted -->
                                        <div class="use-forgoted">
                                            <svg class="check" width="150" height="150" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 60 60"><path fill="#ffffff" d="M40.61,23.03L26.67,36.97L13.495,23.788c-1.146-1.147-1.359-2.936-0.504-4.314 c3.894-6.28,11.169-10.243,19.283-9.348c9.258,1.021,16.694,8.542,17.622,17.81c1.232,12.295-8.683,22.607-20.849,22.042 c-9.9-0.46-18.128-8.344-18.972-18.218c-0.292-3.416,0.276-6.673,1.51-9.578" /></svg>
                                            <p class="successtext"><span class="fw-500">Check your mailbox</span> <br>We've sent password reset instructions to your email address.</p>
                                            <div class="form-group w-100 text-center pt-3">
                                                Go back to<a href="javascript:void(0);" class="fw-500 ms-1 btn-link back-to-login">Sign In</a>
                                            </div>
                                        </div>
                                        <!-- End Forgoted --> --}}
                                    </div>
                                    <!-- End User Form -->
                                    <!-- Social Bottom -->
                                    <div class="socialbottom mt-4">
                                        <h4 class="login-social mb-2 pb-1">Đăng nhập bằng tài khoản truyền thông xã hội</h4>
                                        <div class="btn-social d-flex">
                                            <button class="btn btn-facebook btn-block text-uppercase col" type="submit"><i class="icon an an-facebook"></i> <span class="d-none d-sm-flex">Facebook</span></button>
                                            <button class="btn btn-google btn-block text-uppercase col" type="submit"><i class="icon an an-google"></i> <span class="d-none d-sm-flex">Google</span></button>
                                            <button class="btn btn-twitter btn-block text-uppercase col" type="submit"><i class="icon an an-twitter"></i> <span class="d-none d-sm-flex">Twitter</span></button>
                                        </div>
                                    </div>
                                    <!-- End Social Bottom -->
                                </div>
                                <!-- End Login Inner -->
                            </div>
                            <!-- End Login Wrapper -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--End Main Content-->
    </div>
    <!--End Container-->
</div>
<!--End Body Container-->
@endsection
