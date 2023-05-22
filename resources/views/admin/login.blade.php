<!DOCTYPE html>

<head>
    <title>Visitors an Admin Panel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

    <link rel="stylesheet" href="{{ asset('backend/css/bootstrap.min.css') }}">
    <link href="{{ asset('backend/css/style.css') }}" rel='stylesheet' type='text/css' />
    <link href="{{ asset('backend/css/style-responsive.css') }}" rel="stylesheet" />
    <link
        href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic'
        rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="{{ asset('backend/css/font.css') }}" type="text/css" />
    <link href="{{ asset('backend/css/font-awesome.css') }}" rel="stylesheet">
    <script src="{{ asset('backend/js/jquery2.0.3.min.js') }}"></script>
</head>

<body>
    <div class="log-w3">
        <div class="w3layouts-main">
            <h2>Sign In Now</h2>
            <form action="{{ URL::to('admin-dashboard') }}" method="post">
                {{ csrf_field() }}
                <?php
                $message = Session::get('message');
                if ($message) {
                    echo $message;
                    Session::put('message', null);
                }
                
                ?>
                <input type="email" class="ggg" name="admin_email" placeholder="Nhập email" required="">
                <input type="password" class="ggg" name="admin_password" placeholder="Nhập password" required="">
                <span><input type="checkbox" />Remember Me</span>
                <h6><a href="#">Forgot Password?</a></h6>
                <div class="clearfix"></div>
                <input type="submit" value="Sign In" name="login">
                <a href="{{ URL::to('login-facebook') }}">Login Facebook</a>
                <a>|</a>
                <a href="{{ URL::to('login-google') }}">Login Google</a>
                <a>|</a>
                <a href="{{ URL::to('login-auth') }}">Đăng nhập Auth</a>
                {{-- <div class="g-recaptcha" data-sitekey="{{ env('CAPTCHA_KEY') }}"></div>
                <br />
                @if ($errors->has('g-recaptcha-response'))
                    <span class="invalid-feedback" style="display:block">
                        <strong>
                            {{ $errors->first('g-recaptcha-response') }}
                        </strong>
                    </span>
                @endif --}}
            </form>

            <p>Don't Have an Account ?<a href="{{('register-auth')}}">Đăng kí Auth</a></p>
        </div>
    </div>
    <script src="{{ asset('backend/js/bootstrap.js') }}"></script>
    <script src="{{ asset('backend/js/jquery.dcjqaccordion.2.7.js') }}"></script>
    <script src="{{ asset('backend/js/scripts.js') }}"></script>
    <script src="{{ asset('backend/js/jquery.slimscroll.js') }}"></script>
    <script src="{{ asset('backend/js/jquery.nicescroll.js') }}"></script>
    <!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
    <script src="{{ asset('backend/js/jquery.scrollTo.js') }}"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

</body>

</html>
