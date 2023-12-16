@extends('welcome')
@section('content')
    @if (Session('cart'))
        <!--Body Container-->
        <div id="page-content">
            <!--Collection Banner-->
            <div class="collection-header">
                <div class="collection-hero">
                    <div class="collection-hero__image"></div>
                    <div class="collection-hero__title-wrapper container">
                        <h1 class="collection-hero__title">Giỏ hàng</h1>
                        <div class="breadcrumbs text-uppercase mt-1 mt-lg-2"><a href="{{ asset('home') }}"
                                title="Back to the home page">Trang chủ</a><span>|</span><span class="fw-bold">Giỏ hàng</span>
                        </div>
                    </div>
                </div>
            </div>
            <!--End Collection Banner-->

            <!--Main Content-->
            <div class="container">
                <!--Cart Page-->
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 main-col">
                        <div class="alert alert-success py-2 rounded-1 alert-dismissible fade show cart-alert"
                            role="alert">
                            <i class="align-middle icon an an-truck icon-large me-2"></i><strong class="text-uppercase">Chúc
                                mừng!</strong> Bạn đã có miễn phí vận chuyển!
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>

                        <form action="{{ asset('update-cart') }}" method="post" class="cart style1">
                            @csrf
                            <table>
                                <thead class="cart__row cart__header small--hide">
                                    <tr>
                                        <th class="action">&nbsp;</th>
                                        <th colspan="2" class="text-start">Sản phẩm</th>
                                        <th class="text-center">Giá tiền</th>
                                        <th class="text-center">Số lượng</th>
                                        <th class="text-center">Tổng tiền</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $total = 0;
                                    @endphp
                                    @if (Session('cart'))
                                        @foreach (Session('cart') as $key => $cart)
                                            @php
                                                $subtotal = $cart['product_price'] * $cart['product_qty'];
                                                $total += $subtotal;
                                            @endphp
                                            <tr class="cart__row border-bottom line1 cart-flex border-top">
                                                <td class="cart-delete text-center small--hide"><a
                                                        href="{{ asset('delete-cart/' . $cart['session_id']) }}"
                                                        class="btn btn--secondary cart__remove remove-icon position-static"
                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                        title="Xóa sản phẩm"><i class="icon an an-times-r"></i></a></td>
                                                <td class="cart__image-wrapper cart-flex-item">
                                                    <a href=""><img class="cart__image blur-up lazyload"
                                                            data-src="{{ asset('uploads/product/' . $cart['product_image']) }}"
                                                            src="{{ asset('uploads/product/' . $cart['product_image']) }}"
                                                            alt="{{ $cart['product_name'] }}" width="80" /></a>
                                                </td>
                                                <td class="cart__meta small--text-left cart-flex-item">
                                                    <div class="list-view-item__title">
                                                        <a href="">{{ $cart['product_name'] }}</a>
                                                    </div>
                                                    <div class="cart__meta-text">
                                                        Color: Black<br>Size: Small<br>Qty: {{ $cart['product_qty'] }}
                                                    </div>
                                                    <div class="cart-price d-md-none">
                                                        <span
                                                            class="money fw-500">{{ number_format($subtotal, 0, ',', '.') }}VND</span>
                                                    </div>
                                                </td>
                                                <td class="cart__price-wrapper cart-flex-item text-center small--hide">
                                                    <span
                                                        class="money">{{ number_format($cart['product_price'], 0, ',', '.') }}VND</span>
                                                </td>
                                                <td class="cart__update-wrapper cart-flex-item text-end text-md-center">
                                                    <div
                                                        class="cart__qty d-flex justify-content-end justify-content-md-center">
                                                        <div class="qtyField">
                                                            <a class="qtyBtn minus" href="javascript:void(0);"><i
                                                                    class="icon an an-minus-r"></i></a>
                                                            <input class="cart__qty-input qty" type="number"
                                                                name="cart_qty[{{ $cart['session_id'] }}]"
                                                                value="{{ $cart['product_qty'] }}" pattern="[0-9]*"
                                                                min="1" />
                                                            <a class="qtyBtn plus" href="javascript:void(0);"><i
                                                                    class="icon an an-plus-r"></i></a>
                                                        </div>
                                                    </div>
                                                    <a href="#" title="Remove"
                                                        class="removeMb d-md-none d-inline-block text-decoration-underline mt-2 me-3">Remove</a>
                                                </td>
                                                <td class="cart-price cart-flex-item text-center small--hide">
                                                    <span
                                                        class="money fw-500">{{ number_format($subtotal, 0, ',', '.') }}VND</span>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="3" class="text-start pt-3">
                                            <a href="{{ asset('/') }}"
                                                class="btn btn--link d-inline-flex align-items-center btn--small p-0 cart-continue">
                                                <i class="me-1 icon an an-angle-left-l"></i>
                                                <span class="text-decoration-underline">Tiếp tục mua sắm</span>
                                            </a>
                                        </td>
                                        <td colspan="3" class="text-end pt-3">
                                            <a href="{{ asset('/delete-all-cart') }}">
                                                <button type="submit" name="clear"
                                                    class="btn btn--link d-inline-flex align-items-center btn--small small--hide">
                                                    <i class="me-1 icon an an-times-r"></i>
                                                    <span class="ms-1 text-decoration-underline">Xóa giỏ hàng</span>
                                                </button>
                                            </a>
                                            <button type="submit" name="update_qty"
                                                class="btn btn--small d-inline-flex align-items-center rounded cart-continue ml-2">
                                                <i class="me-1 icon an an-sync-ar d-none"></i>Cập nhật giỏ hàng
                                            </button>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </form>
                    </div>
                </div>

                <div class="row mt-2">
                    <div class="col-12 col-sm-12 col-md-6 col-lg-4 mb-4 cart-col">
                        <h5>Mã giảm giá</h5>
                        <form action="{{ asset('check-coupon') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="address_zip">Nhập mã phiếu giảm giá của bạn nếu bạn có.</label>
                                <input type="text" name="coupon" />
                            </div>
                            <div class="actionRow">
                                <input type="submit" class="btn btn--small rounded" value="Tính mã giảm giá"
                                    name="check_coupon" />
                                @if (Session('coupon'))
                                    <button type=""
                                        class="btn btn--link d-inline-flex align-items-center btn--small small--hide">
                                        <td class="cart-delete text-center small--hide">
                                            <a href="{{ asset('unset-coupon') }}"
                                                class="btn btn--secondary cart__remove remove-icon position-static"
                                                data-bs-toggle="tooltip" data-bs-placement="top" title="Xóa mã giảm giá">
                                                <i class="icon an an-times-r"></i>
                                            </a>
                                        </td>
                                        <span class="ms-1 text-decoration-underline">
                                            @foreach (Session('coupon') as $key => $cou)
                                                {{ $cou['coupon_code'] }}
                                            @endforeach
                                        </span>
                                    </button>
                                @endif
                            </div>
                        </form>
                        {{-- <div class="cart-note mt-4">
                        <div class="form-group mb-0">
                            <h5>Add a note to your order</h5>
                            <textarea name="note" id="cart-note" class="form-control cart-note__input" rows="4" required=""></textarea>
                        </div>
                    </div> --}}
                    </div>
                    <div class="col-12 col-sm-12 col-md-6 col-lg-4 mb-4 cart-col">
                        <h5>Tính phí vận chuyển và thuế</h5>
                        <form class="estimate-form" action="#" method="post">
                            <div class="form-group">
                                <label for="Thành phô">Thành phố</label>
                                <select class="choose city" id="city" name="city" data-default="">
                                    <option value="0" label="Chọn thành phố ... " selected="selected">Chọn tỉnh
                                        thành
                                        phố...</option>
                                    <option>
                                        @foreach ($city as $key => $city)
                                    <option value="{{ $city->matp }}">{{ $city->name_tp }}</option>
    @endforeach
    </option>
    </select>
    </div>
    <div class="form-group">
        <label for="Quận huyện">Quận huyện</label>
        <select name="province" id="province" class="choose province">
            <option>Chọn quận huyện</option>
        </select>
    </div>
    <div class="form-group">
        <label for="Xã phường">Chọn xã phường:</label>
        <select name="wards" id="wards" class="wards">
            <option>Chọn xã phường</option>
        </select>
    </div>
    <div class="form-group">
        <label for="address_zip">Postal/Zip Code</label>
        <input type="text" id="address_zip" name="address[zip]" />
    </div>
    <div class="actionRow">
        {{-- <input type="button" class="btn btn--small rounded get-rates" value="Calculate shipping" /> --}}
        <input class="btn btn--small rounded get-rates update calculate_delivery" type="button" name="calculate_order"
            value="Tính phí vận chuyển">
        <a href="{{ asset('unset-fee') }}" class="btn btn--small rounded check_out"> Xóa phí vận
            chuyển</a>
    </div>
    </form>
    </div>
    <div class="col-12 col-sm-12 col-md-12 col-lg-4 cart__footer">
        <div class="solid-border">
            <div class="row border-bottom pb-2">
                <span class="col-6 col-sm-6 cart__subtotal-title">Tổng tiền</span>
                <span class="col-6 col-sm-6 text-right"><span
                        class="money">{{ number_format($total, 0, ',', '.') }}VND</span></span>
            </div>
            <div class="row border-bottom pb-2 pt-2">
                <span class="col-6 col-sm-6 cart__subtotal-title">Thuế</span>
                <span class="col-6 col-sm-6 text-right">$10.00</span>
            </div>
            <div class="row border-bottom pb-2 pt-2">
                <span class="col-6 col-sm-6 cart__subtotal-title">Giảm giá</span>
                @if (Session('coupon'))
                    @foreach (Session('coupon') as $key => $cou)
                        @if ($cou['coupon_condition'] == 1)
                            <span class="col-6 col-sm-6 text-right">-{{ $cou['coupon_number'] }} %
                                @php
                                    $total_coupon = ($total * $cou['coupon_number']) / 100;
                                    echo ' (' . number_format($total_coupon, 0, ',', '.') . ' VND) ';
                                @endphp
                            </span>
                        @elseif($cou['coupon_condition'] == 2)
                            <span
                                class="col-6 col-sm-6 text-right">-{{ number_format($cou['coupon_number'], 0, ',', '.') }}
                                VND</span>
                            @php
                                $total_coupon = $total - $cou['coupon_number'];
                            @endphp
                        @endif
                    @endforeach
                @else
                    <span class="col-6 col-sm-6 text-right">0 VNĐ</span>
                @endif
            </div>
            <div class="row border-bottom pb-2 pt-2">
                <span class="col-6 col-sm-6 cart__subtotal-title">Phí vận chuyển</span>
                <span class="col-6 col-sm-6 text-right" id="load_fee">
                    @php
                        $fee = session('fee');
                        if (session('cart')) {
                            if ($fee) {
                                echo number_format($fee, 0, ',', '.') . ' VND';
                            } else {
                                $fee = 15000;
                                session(['fee' => $fee]);
                                echo number_format($fee, 0, ',', '.') . ' VND';
                            }
                        }
                    @endphp
                </span>
            </div>
            <div class="row border-bottom pb-2 pt-2">
                <span class="col-6 col-sm-6 cart__subtotal-title"><strong>Thành tiền</strong></span>
                <span class="col-6 col-sm-6 cart__subtotal-title cart__subtotal text-right">
                    <span class="money">
                        @if (session('cart'))
                            @php
                                if (Session('fee') && !Session('coupon')) {
                                    $total_all = $total + Session('fee');
                                    echo number_format($total_all, 0, ',', '.') . ' VND';
                                } elseif (Session('fee') && Session('coupon')) {
                                    if ($cou['coupon_condition'] == 1) {
                                        $total_coupon = ($total * $cou['coupon_number']) / 100;
                                        $total_all_coupon = $total - $total_coupon + Session('fee');
                                        echo number_format($total_all_coupon, 0, ',', '.') . ' VND';
                                    } elseif ($cou['coupon_condition'] == 2) {
                                        $total_coupon = $total - $cou['coupon_number'];
                                        $total_all_coupon = $total_coupon + Session('fee');
                                        echo number_format($total_all_coupon, 0, ',', '.') . ' VND';
                                    }
                                } elseif (!Session('fee') && Session('coupon')) {
                                    echo number_format($total, 0, ',', '.') . ' VND';
                                } elseif (!Session('fee') && !Session('coupon')) {
                                    echo number_format($total, 0, ',', '.') . ' VND';
                                }
                            @endphp
                        @endif
                    </span>
                </span>
            </div>
            <p class="cart__shipping m-0">Phí vận chuyển &amp; thuế đưuọc tính khi thanh toán</p>
            <p class="cart__shipping pt-0 m-0 fst-normal freeShipclaim"><i
                    class="me-1 align-middle icon an an-truck-l"></i><b>Đủ điều kiện</b> miễn phí vận chuyển
            </p>
            <div class="customCheckbox cart_tearm">
                <input type="checkbox" value="allen-vela" id="cart_tearm">
                <label for="cart_tearm">Tôi đồng ý với các điều khoản và điều kiện</label>
            </div>
            @if (Session('cart'))
                @php
                    $customer_id = Session('customer_id');
                    $shipping_id = Session('shipping_id');
                @endphp
                @if ($customer_id != null && $shipping_id == null)
                    <a href="{{ asset('checkout') }}" id="cartCheckout"
                        class="btn btn--small-wide rounded mt-4 checkout">Tiến hành thanh toán</a>
                @else
                    <a href="{{ asset('login-checkout') }}" id="cartCheckout"
                        class="btn btn--small-wide rounded mt-4 checkout">Tiến hành đăng nhập</a>
                @endif
            @endif
            <div class="paymnet-img"><img src="{{ asset('assets/images/payment-img.jpg') }}" alt="Payment" /></div>
            <p class="mt-2"><a href="#">Thanh toán với nhiều địa chỉ</a></p>
        </div>
    </div>
    </div>
    <!--End Cart Page-->
    </div>
    <!--End Main Content-->
    </div>
    <!--End Body Container-->
@else
    <!--Body Container-->
    <div id="page-content">
        <!--Collection Banner-->
        <div class="collection-header">
            <div class="collection-hero">
                <div class="collection-hero__image"></div>
                <div class="collection-hero__title-wrapper container">
                    <h1 class="collection-hero__title">Giỏ hàng trống</h1>
                    <div class="breadcrumbs text-uppercase mt-1 mt-lg-2"><a href="{{ asset('home') }}"
                            title="Back to the home page">Home</a><span>|</span><span class="fw-bold">Cart Empty</span>
                    </div>
                </div>
            </div>
        </div>
        <!--End Collection Banner-->

        <!--Container-->
        <div class="container">
            <!--Category Empty-->
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 text-center pt-5 pb-5">
                    <p><img src="{{ asset('assets/images/sad-icon.png') }}" alt="" /></p>
                    <h2 class="mt-4"><strong>Xin Lỗi,</strong> Giỏ hàng của bạn đang trống!</h2>
                    <p class="mb-3 pb-1">Bạn không có sản phẩm nào trong giỏ hàng của bạn.</p>
                    <p><a href="{{ asset('home') }}" class="btn btn-outline-primary rounded mb-2 me-2">Trở về</a><a
                            href="{{ asset('home') }}" class="btn rounded mb-2 text-capitalize">Tiếp tục mua sắm</a></p>
                </div>
            </div>
            <!--End Category Empty-->
        </div>
        <!--End Container-->
    </div>
    <!--End Body Container-->
    @endif
@endsection
