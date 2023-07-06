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
            <style>

            </style>
            <div class="row">
                <div class="col-sm-4 col-sm-offset-1">
                    <div class="login-form">
                        <!--login form-->
                        <h2>Điền mật khẩu mới</h2>
                        @php
                            $token = $_GET['token'];
                            $email = $_GET['email'];
                        @endphp
                        <form action="{{ URL::to('reset-new-password') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="email" value="{{ $email }}">
                            <input type="hidden" name="token" value="{{ $token }}">
                            <!-- Password input-->
                            <div class="form-group">
                                <label class="col-md-12 control-label" for="passwordinput">Mật khẩu 
                                    <span id="popover-password-top" class="hide pull-right block-help">
                                        <i class="fa fa-info-circle text-danger" aria-hidden="true"></i> 
                                        Nhập một mật khẩu mạnh
                                    </span>
                                </label>
                                <div class="col-md-12">
                                    <input id="password" name="password_account" type="password" placeholder="Nhập mật khẩu mới"
                                        class="form-control input-md" data-placement="bottom" data-toggle="popover"
                                        data-container="body" type="button" data-html="true">
                                    <div id="popover-password">
                                        <p>Mật khẩu mạnh: <span id="result"> </span></p>
                                        <div class="progress">
                                            <div id="password-strength" class="progress-bar progress-bar-success"
                                                role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"
                                                style="width:0%">
                                            </div>
                                        </div>
                                        <ul class="list-unstyled">
                                            <li class=""><span class="low-upper-case"><i class="fa fa-file-text"
                                                        aria-hidden="true"></i></span>&nbsp; 1 chữ thường &amp; 1 chữ hoa
                                            </li>
                                            <li class=""><span class="one-number"><i class="fa fa-file-text"
                                                        aria-hidden="true"></i></span> &nbsp;1 số  (0-9)</li>
                                            <li class=""><span class="one-special-char"><i class="fa fa-file-text"
                                                        aria-hidden="true"></i></span> &nbsp;1 Ký tự đặc biệt (!@#$%^&*).
                                            </li>
                                            <li class=""><span class="eight-character"><i class="fa fa-file-text"
                                                        aria-hidden="true"></i></span>&nbsp; Ít nhất 8 ký tự</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- Password input-->
                            <div class="form-group">
                                <label class="col-md-12 control-label" for="passwordinput">Xác nhận mật khẩu 
                                    <span id="popover-cpassword" class="hide pull-right block-help">
                                        <i class="fa fa-info-circle text-danger" aria-hidden="true"></i> 
                                        Mật khẩu không khớp
                                    </span>
                                </label>
                                <div class="col-md-12">
                                    <input id="confirm-password" name="confirm-password" type="password" placeholder=""
                                        class="form-control input-md">
                                </div>
                            </div>
                            <button type="submit" style="border-radius: 5px; margin: 15px;" class="btn btn-default">Đổi mật khẩu</button>
                        </form>
                    </div>
                    <!--/login form-->
                </div>
            </div>
        </div>
    </section>
    <!--/form-->
@endsection
