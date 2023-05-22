@extends('welcome')
@section('content')
    <section id="cart_items">
        <div class="container">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="{{ URL::to('/') }}">Trang chủ</a></li>
                    <li class="active">Giỏ hàng của bạn</li>
                </ol>
            </div>
            @if (session()->has('message'))
                <div class="alert alert-danger">
                    {!! session()->get('message') !!}
                </div>
            @endif
            <div class="table-responsive cart_info">
                <form method="post" action="{{ URL('update-cart') }}">
                    @csrf
                    <table class="table table-condensed">
                        <thead>
                            <tr class="cart_menu">
                                <td class="image">Image</td>
                                <td class="description">Mô tả</td>
                                <td class="price">Price</td>
                                <td class="quantity">Quantity</td>
                                <td class="total">Total</td>
                                <td></td>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $total = 0;
                            @endphp
                            @if (Session::get('cart') == true)
                                @foreach (Session::get('cart') as $key => $cart)
                                    @php
                                        $subtotal = $cart['product_price'] * $cart['product_qty'];
                                        $total += $subtotal;
                                    @endphp
                                    <tr>
                                        <td class="cart_product">
                                            <img src="{{ asset('uploads/product/' . $cart['product_image']) }}"
                                                width="100" alt="{{ $cart['product_name'] }}">
                                        </td>
                                        <td class="cart_description">
                                            <h4><a href=""></a></h4>
                                            <p>{{ $cart['product_name'] }} </p>
                                        </td>
                                        <td class="cart_price">
                                            <p> {{ number_format($cart['product_price'], 0, ',', '.') }}VND</p>
                                        </td>
                                        <td class="cart_quantity">
                                            <div class="cart_quantity_button">
                                                <input min="1" class="cart_quantity" type="number"
                                                    name="cart_qty[{{ $cart['session_id'] }}]"
                                                    value="{{ $cart['product_qty'] }}">
                                            </div>
                                        </td>
                                        <td class="cart_total">
                                            <p class="cart_total_price">
                                                {{ number_format($subtotal, 0, ',', '.') }}VND
                                            </p>
                                        </td>
                                        <td class="cart_delete">
                                            <a class="cart_quantity_delete"
                                                href="{{ URL('delete-cart/' . $cart['session_id']) }}"><i
                                                    class="fa fa-times"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach

                                <td>
                                    <input class="btn btn-default check_out" type="submit" value="Cập nhật"
                                        name="update_qty">
                                </td>
                                <td>
                                    <a class="btn btn-default check_out" href="{{ URL::to('/delete-all-cart') }}">Xóa tất
                                        cả</a>
                                </td>
                            @endif
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
    </section>
    <!--/#cart_items-->

    <section id="do_action">
        <div class="container">
            <div class="heading">
                <h3>What would you like to do next?</h3>
                <p>Choose if you have a discount code or reward points you want to use or would like to estimate your
                    delivery cost.</p>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="chose_area">
                        <ul class="user_option">
                            <li>
                                <input type="checkbox">
                                <label>Use Coupon Code</label>
                            </li>
                            <li>
                                <input type="checkbox">
                                <label>Use Gift Voucher</label>
                            </li>
                            <li>
                                <input type="checkbox">
                                <label>Estimate Shipping & Taxes</label>
                            </li>
                        </ul>
                        <ul class="user_info">
                            <li class="single_field">
                                <label>Chọn tỉnh thành phố:</label>
                                <select name="city" id="city" class="choose city">
                                    <option>Chọn tỉnh thành phố</option>
                                    <option>
                                        @foreach ($city as $key => $city)
                                    <option value="{{ $city->matp }}">{{ $city->name_tp }}</option>
                                    @endforeach
                                    </option>
                                </select>

                            </li>
                            <li class="single_field">
                                <label>Chọn quận huyện:</label>
                                <select name="province" id="province" class="choose province">
                                    <option>Chọn quận huyện</option>
                                </select>

                            </li>
                            <li class="single_field">
                                <label>Chọn xã phường:</label>
                                <select name="wards" id="wards" class="wards">
                                    <option>Chọn xã phường</option>
                                </select>

                            </li>
                        </ul>
                        <input class="btn btn-default update calculate_delivery" type="button" name="calculate_order"
                            value="Tính phí vận chuyển">
                        {{-- <a class="btn btn-default check_out" href="">Continue</a> --}}
                        <a href="{{ url('unset-fee') }}" class="btn btn-default check_out"> Xóa phí vận chuyển</a>
                    </div>
                </div>
                <td>
                    <div class="col-sm-6">
                        <div class="total_area">
                            <ul>
                                <li>Tổng :<span>{{ number_format($total, 0, ',', '.') }}VND </span></li>
                                <li>Thuế: <span>chưa có </span></li>
                                @if (Session::get('coupon'))
                                    @foreach (Session::get('coupon') as $key => $cou)
                                        @if ($cou['coupon_condition'] == 1)
                                            <li>Mã giảm: <span>-{{ $cou['coupon_number'] }} %
                                                    @php
                                                        $total_coupon = ($total * $cou['coupon_number']) / 100;
                                                        echo ' (' . number_format($total_coupon, 0, ',', '.') . ' VND) ';
                                                    @endphp
                                                </span>
                                            </li>
                                            {{-- @php
                                                $total_coupon = ($total * $cou['coupon_number']) / 100;
                                                $sub_total_coupon = $total - $total_coupon;
                                            @endphp --}}
                                        @elseif($cou['coupon_condition'] == 2)
                                            <li>Mã giảm: <span>-{{ number_format($cou['coupon_number'], 0, ',', '.') }} VND
                                                </span></li>
                                            @php
                                                $total_coupon = $total - $cou['coupon_number'];
                                            @endphp
                                        @endif
                                    @endforeach
                                @endif
                                {{-- </span>
                                    </li> --}}
                                <li>Phí vận chuyển: <span id="load_fee">
                                @if (session::get('cart'))
                                            @if (Session::get('fee'))
                                                {{ number_format(Session::get('fee'), 0, ',', '.') }} VND
                                            @endif
                                    </span>
                                </li>
                                @endif
                                <li>Thành Tiền: <span>
                                        @if (session::get('cart'))
                                            @php
                                                if (Session::get('fee') && !Session::get('coupon')) {

                                                    $total_all = $total - Session::get('fee');
                                                    echo number_format($total_all, 0, ',', '.') . ' VND';

                                                } elseif (Session::get('fee') && Session::get('coupon')) {

                                                    $sub_total_coupon = $total - $total_coupon;
                                                    $total_all_coupon = $sub_total_coupon - Session::get('fee');
                                                    echo number_format($total_all_coupon, 0, ',', '.') . ' VND';

                                                } elseif (!Session::get('fee') && Session::get('coupon')) {

                                                    echo number_format($sub_total_coupon, 0, ',', '.') . ' VND';

                                                } elseif (!Session::get('fee') && !Session::get('coupon')) {
                                                    
                                                    echo number_format($total, 0, ',', '.') . ' VND';
                                                }
                                            @endphp
                                        @endif
                                    </span>
                                </li>

                            </ul>
                            @if (session::get('cart') && session::get('fee'))
                                <form action="{{ URL('check-coupon') }}" method="POST">
                                    @csrf
                                    <input type="text" class="form-control" name="coupon"
                                        placeholder="nhập mã giảm giá">
                                    <input type="submit" class="btn btn-default check_out" value="Tính mã giảm giá"
                                        name="check_coupon">
                                    <a href="{{ url('unset-coupon') }}" class="btn btn-default check_out"> Xóa mã giảm
                                        giá</a>
                                </form>
                                <?php
                                    $customer_id = Session::get('customer_id');
                                    $shipping_id = Session::get('shipping_id');
                                    if($customer_id != NULL && $shipping_id == NULL){
                                    ?>
                                <a class="btn btn-default check_out" href="{{ URL::to('/checkout') }}">Thanh toán</a>
                                <?php
                                        }elseif($customer_id != NULL && $shipping_id != NULL){
                                    ?>
                                <a class="btn btn-default check_out" href="{{ URL::to('/payment') }}">Thanh toán</a>
                                <?php
                                    }else{
                                    ?>
                                <a class="btn btn-default check_out" href="{{ URL::to('/login-checkout') }}">Thanh toán</a>
                                <?php
                                    }
                                    ?>
                            @endif
                            @if (session::get('cart') && !session::get('fee'))
                                <span>Chọn phí vận chuyển để tiếp tục thanh toán</span>
                            @endif
                        </div>
                    </div>
                </td>
            </div>
        </div>
    </section>
    <!--/#do_action-->
@endsection
