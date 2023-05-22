@extends('admin.layout')
@section('admin_content')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Thêm danh mã giảm giá sản phẩm
                </header>
                <div class="panel-body">
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
                    <div class="position-center">
                        <form role="form" action="{{ URL::to('add-coupon-code') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label>Tên mã giảm giá</label>
                                <input type="text" name="coupon_name" class="form-control"
                                    placeholder="Nhập tên mã giảm giá">
                            </div>
                            <div class="form-group">
                                <label>Mã giảm giá</label>
                                <input type="text" name="coupon_code" class="form-control" placeholder="Nhập mã"
                                    autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label>Số lượng mã</label>
                                <input type="text" min="1" name="coupon_time" class="form-control"
                                    placeholder="Số lượng mã" autocomplete="off">

                            </div>
                            <div class="form-group">
                                <label>Tính năng mã</label>
                                <select name="coupon_condition" class="form-control input-sm m-bot15">
                                    <option value="0">-----Chọn-----</option>
                                    <option value="1">Giảm theo %</option>
                                    <option value="2">Giảm theo tiền</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Nhập số % hoặc tiền giảm</label>
                                <input type="text" name="coupon_number" class="form-control"
                                    placeholder="Nhập số % hoặc tiền giảm" autocomplete="off">
                            </div>
                            
                            <button type="submit" name="add_coupon" class="btn btn-info">Thêm mã</button>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
