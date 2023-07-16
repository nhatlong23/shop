@extends('welcome')
@section('content')
    <section id="form">
        <!--form-->
        <div class="container">
            <?php
            $message = Session::get('message');
            if ($message) {
                echo $message;
                Session::put('message', null);
            }
            ?>
            @if ($errors->any())
                <div class="alert alert-danger" role="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="row">
                <div class="col-sm-4 col-sm-offset-1">
                    <div class="login-form">
                        <!--login form-->
                        <h2>Đăng nhập</h2>
                        <form action="{{ asset('login-customer/') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="text" name="email_account" placeholder="Email" />
                            <input type="password" name="password_account" placeholder="password" />
                            <span>
                                <input type="checkbox" class="checkbox">
                                Ghi nhớ đăng nhập
                            </span>
                            <span>
                                <a href="{{ asset('forgot-password') }}">Đổi mật khẩu</a>
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
                        <form action="{{ asset('add-customer') }}" method="post" autocomplete="off">
                            @csrf
                            <input type="text" name="customer_name" placeholder="Họ và Tên" />
                            <input type="email" name="customer_email" placeholder="Nhập địa chỉ email" />
                            <input type="text" name="customer_phone" placeholder="Nhập SĐT" />
                            <input class=" @error('customer_password') is-invalid @enderror" type="password"
                                id="customer_password" name="customer_password" placeholder="Password"
                                autocomplete="current-password"/>
                            <input type="password" class="@error('customer_password') is-invalid @enderror"
                                id="customer_password_confirmation" name="customer_password_confirmation" placeholder="Nhập lại password">
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
