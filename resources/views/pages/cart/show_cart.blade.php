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
            <div class="table-responsive cart_info">
                <?php
                $content = Cart::content();
                // echo '<pre>';
                // print_r($content);
                // echo '</pre>';
                ?>
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
                        @foreach ($content as $v_content)
                            <tr>
                                <td class="cart_product">
                                    <a href=""><img
                                            src="{{ URL::to('uploads/product/' . $v_content->options->image) }}"
                                            width="100" alt=""></a>
                                </td>
                                <td class="cart_description">
                                    <h4><a href="">{{ $v_content->name }}</a></h4>
                                    <p>Tile: {{ $v_content->product_title }}</p>
                                </td>
                                <td class="cart_price">
                                    <p>{{ number_format($v_content->price) . ' ' . 'VNĐ' }}</p>
                                </td>
                                <td class="cart_quantity">
                                    <div class="cart_quantity_button">
                                        <form method="post" onsubmit="return validateForm()" name="myForm"
                                            action="{{ URL::to('update-cart-quantity') }}">
                                            {{ csrf_field() }}
                                            <input min="0" class="cart_quantity_input" type="text"
                                                name="cart_quantity" value="{{ $v_content->qty }}" size="1">
                                            <input class="cart_quantity_input" type="hidden" name="rowId_cart"
                                                value="{{ $v_content->rowId }}">

                                            <input class="cart_quantity_input" type="submit" value="Cập nhật"
                                                name="update_qty" value="{{ $v_content->id }}">
                                        </form>
                                    </div>
                                </td>
                                <td class="cart_total">
                                    <p class="cart_total_price">
                                        <?php
                                        $subtotal = $v_content->price * $v_content->qty;
                                        echo number_format($subtotal) . ' ' . 'VNĐ';
                                        ?>
                                    </p>
                                </td>
                                <td class="cart_delete">
                                    <a class="cart_quantity_delete"
                                        href="{{ URL::to('delete-to-cart/' . $v_content->rowId) }}"><i
                                            class="fa fa-times"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
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
                                <label>Country:</label>
                                <select>
                                    <option>United States</option>
                                    <option>Bangladesh</option>
                                    <option>UK</option>
                                    <option>India</option>
                                    <option>Pakistan</option>
                                    <option>Ucrane</option>
                                    <option>Canada</option>
                                    <option>Dubai</option>
                                </select>

                            </li>
                            <li class="single_field">
                                <label>Region / State:</label>
                                <select>
                                    <option>Select</option>
                                    <option>Dhaka</option>
                                    <option>London</option>
                                    <option>Dillih</option>
                                    <option>Lahore</option>
                                    <option>Alaska</option>
                                    <option>Canada</option>
                                    <option>Dubai</option>
                                </select>

                            </li>
                            <li class="single_field zip-field">
                                <label>Zip Code:</label>
                                <input type="text">
                            </li>
                        </ul>
                        <a class="btn btn-default update" href="">Get Quotes</a>
                        <a class="btn btn-default check_out" href="">Continue</a>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="total_area">
                        <ul>
                            <li>Tổng <span>{{ Cart::subtotal(0, ',', '.') . ' ' . 'VNĐ' }}</span></li>
                            <li>Thuế <span>{{ Cart::tax(0, ',', '.') . ' ' . 'VNĐ' }}</span></li>
                            <li>Phí vận chuyển <span>Free</span></li>
                            <li>Thành Tiền <span>{{ Cart::total(0, ',', '.') . ' ' . 'VNĐ' }}</span></li>
                        </ul>
                        <a class="btn btn-default update" href="">Update</a>

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

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/#do_action-->
@endsection
