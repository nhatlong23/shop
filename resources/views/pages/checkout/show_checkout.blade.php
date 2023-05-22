@extends('welcome')
@section('content')
    <section id="cart_items">
        <div class="container">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="{{ URL::to('/home') }}">Trang chủ</a></li>
                    <li class="active">Giỏ hàng của bạn</li>
                </ol>
            </div>
            <!--/breadcrums-->

            <div class="register-req">
                <p>Vui lòng sử dụng Đăng ký và Thanh toán để dễ dàng truy cập vào lịch sử đặt hàng của bạn hoặc sử dụng
                    Thanh toán với tư cách Khách</p>
            </div>
            <!--/register-req-->

            <div class="review-payment">
                <h2>Xem lại và thanh toán</h2>
            </div>
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
                                                    name="cart_qty[{{ $cart['session_id'] }}]" size="1"
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
                                <tr>
                                    <td colspan="4">&nbsp;</td>
                                    <td colspan="2">
                                        <table class="table table-condensed total-result">
                                            <tr>
                                                <td>Tổng:</td>
                                                <td>
                                                    <span>
                                                        {{ number_format($total, 0, ',', '.') }}.VNĐ
                                                    </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Thuế:</td>
                                                <td>Chưa làm chức năng này</td>
                                            </tr>
                                            <tr>
                                                <td>Mã giảm giá:</td>
                                                <td>
                                                    <span>
                                                        @if (Session::get('coupon'))
                                                            @foreach (Session::get('coupon') as $key => $cou)
                                                                @if ($cou['coupon_condition'] == 1)
                                                                    <li><span>-{{ $cou['coupon_number'] }} %
                                                                            @php
                                                                                $total_coupon = ($total * $cou['coupon_number']) / 100;
                                                                                echo ' (' . number_format($total_coupon, 0, ',', '.') . ' VND) ';
                                                                            @endphp
                                                                        </span>
                                                                    </li>
                                                                    @php
                                                                        $total_coupon = ($total * $cou['coupon_number']) / 100;
                                                                        $sub_total_coupon = $total - $total_coupon;
                                                                    @endphp
                                                                @elseif($cou['coupon_condition'] == 2)
                                                                    <li>
                                                                        <span>-{{ number_format($cou['coupon_number'], 0, ',', '.') }}
                                                                            VND
                                                                        </span>
                                                                    </li>
                                                                    @php
                                                                        $total_coupon = $total - $cou['coupon_number'];
                                                                    @endphp
                                                                @endif
                                                            @endforeach
                                                        @endif
                                                    </span>
                                                </td>
                                            </tr>
                                            <tr class="shipping-cost">
                                                <td>Phí Vận chuyến:</td>
                                                <td>
                                                    <span id="load_fee">
                                                        @if (session::get('cart'))
                                                            @if (Session::get('fee'))
                                                                {{ number_format(Session::get('fee'), 0, ',', '.') }} VND
                                                            @endif
                                                        @endif
                                                    </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Tổng:</td>
                                                <td>
                                                    <span>
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
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </form>
            </div>
            {{-- <form method="post"> --}}
            {{-- @csrf --}}
            <div class="shopper-informations">
                <div class="row">
                    <div class="col-sm-10 clearfix">
                        <div class="bill-to">
                            <p>Thông tin gửi hàng</p>
                            <div class="form-one">
                                <form method="post">
                                    @csrf
                                    <input type="email" name="shipping_email" class="shipping_email" placeholder="Email*">
                                    <input type="text" name="shipping_name" class="shipping_name"
                                        placeholder="Họ và tên">
                                    <input type="text" name="shipping_address" class="shipping_address"
                                        placeholder="Địa chỉ">
                                    <input type="text" name="shipping_phone" class="shipping_phone" placeholder="Phone">
                                    <textarea name="shipping_notes" class="shipping_notes" placeholder="Ghi chú về đơn đặt hàng của bạn" rows="16"></textarea>
                                    @if (session::get('fee'))
                                        <input type="hidden" name="order_fee" class="order_fee"
                                            value="{{ session::get('fee') }}">
                                    @else
                                        <input type="hidden" name="order_fee" class="order_fee" value="10000">
                                    @endif

                                    @if (session::get('coupon'))
                                        @foreach (session::get('coupon') as $key => $cou)
                                            <input type="hidden" name="order_coupon" class="order_coupon"
                                                value="{{ $cou['coupon_code'] }}">
                                        @endforeach
                                    @else
                                        <input type="hidden" name="order_coupon" class="order_coupon" value="0">
                                    @endif
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div>
                <div class="from-group">
                    <label for="">Chọn hình thức thanh toán</label>
                    <select name="payment_select" class="from-control input-sm m-bot13 payment_select">
                        <option value="0">Qua chuyển khoản</option>
                        <option value="1">Qua tiền mặt</option>
                    </select>
                </div>
            </div>
            <input class="btn btn-primary btn-sm send_order" type="button" name="send_order" value="Xác nhận đơn hàng">
        </div>
        {{-- </form> --}}
    </section>
    <!--/#cart_items-->
@endsection
