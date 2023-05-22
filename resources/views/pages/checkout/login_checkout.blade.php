@extends('welcome')
@section('content')
    <section id="form">
        <!--form-->
        <div class="container">
            <div class="row">
                <div class="col-sm-4 col-sm-offset-1">
                    <div class="login-form">
                        <!--login form-->
                        <h2>Đăng nhập</h2>
                        <form action="{{ URL::to('login-customer/') }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <input type="text" name="email_account" placeholder="Email" />
                            <input type="password" name="password_account" placeholder="password" />
                            <span>
                                <input type="checkbox" class="checkbox">
                                Ghi nhớ đăng nhập
                            </span>
                            <button type="submit" class="btn btn-default">Đăng nhập</button>
                        </form>
                    </div>
                    <!--/login form-->
                </div>
                <div class="col-sm-1">
                    <h2 class="or">OR</h2>
                </div>
                <div class="col-sm-4">
                    <div class="signup-form">
                        <!--sign up form-->
                        <h2>Đăng kí</h2>
                        <form action="{{ URL::to('add-customer') }}" method="post">
                            {{ csrf_field() }}
                            <input type="text" name="customer_name" placeholder="Họ và Tên" />
                            <input type="email" name="customer_email" placeholder="Email Address" />
                            <input type="password"  id="password1" oninput="checkPasswordsMatch()" name="customer_password" placeholder="Password" />
                            <input type="password" id="password2" oninput="checkPasswordsMatch()" placeholder="Nhập lại password">
                            <input type="text" name="customer_phone" placeholder="Phone" />
                            <button type="submit" class="btn btn-default">Đăng kí</button>
                        </form>
                    </div>
                    <!--/sign up form-->
                </div>
            </div>
        </div>
    </section>
    <!--/form-->
@endsection
