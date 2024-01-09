@extends('welcome')
@section('content')
    <div class="table-agile-info">
        <div class="panel panel-default">
            <div class="panel-heading">
                Xem chi tiết đơn hàng đã đặt
            </div>
            <div class="table-responsive">
                <?php
                $message = Session::get('message');
                if ($message) {
                    echo $message;
                    Session::put('message', null);
                }
                ?>
                <table class="table table-striped b-t b-light">
                    <thead>
                        <tr>
                            <th>Tên Khách Hàng</th>
                            <th>SĐT</th>
                            <th>Email</th>
                            <th>Ngày tạo</th>
                            <th style="width:30px;"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $customer->customer_name }}</td>
                            <td>{{ $customer->customer_phone }}</td>
                            <td>{{ $customer->customer_email }}</td>
                            <td>{{ $customer->created_at }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <footer class="panel-footer">
                <div class="row">

                    <div class="col-sm-5 text-center">
                        <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
                    </div>
                    <div class="col-sm-7 text-right text-center-xs">
                        <ul class="pagination pagination-sm m-t-none m-b-none">
                            <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
                            <li><a href="">1</a></li>
                            <li><a href="">2</a></li>
                            <li><a href="">3</a></li>
                            <li><a href="">4</a></li>
                            <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
                        </ul>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <br>
    <div class="table-agile-info">
        <div class="panel panel-default">
            <div class="panel-heading">
                Thông tin vận chuyển hàng
            </div>
            <div class="table-responsive">
                <?php
                $message = Session::get('message');
                if ($message) {
                    echo $message;
                    Session::put('message', null);
                }
                ?>
                <table class="table table-striped b-t b-light">
                    <thead>
                        <tr>
                            <th>Tên Người Vận Chuyển</th>
                            <th>Địa chỉ</th>
                            <th>SĐT</th>
                            <th>Email</th>
                            <th>Ghi chú</th>
                            <th>Hình thức thanh toán</th>
                            <th>Ngày tạo</th>
                            <th style="width:30px;"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $shipping->shipping_name }}</td>
                            <td>{{ $shipping->shipping_address }}</td>
                            <td>{{ $shipping->shipping_phone }}</td>
                            <td>{{ $shipping->shipping_email }}</td>
                            <td>{{ $shipping->shipping_notes }}</td>
                            <td>
                                @if ($shipping->shipping_method == 0)
                                    Chuyển khoản
                                @else
                                    Tiền mặt
                                @endif
                            </td>
                            <td>{{ $shipping->created_at }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <footer class="panel-footer">
                <div class="row">

                    <div class="col-sm-5 text-center">
                        <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
                    </div>
                    <div class="col-sm-7 text-right text-center-xs">
                        <ul class="pagination pagination-sm m-t-none m-b-none">
                            <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
                            <li><a href="">1</a></li>
                            <li><a href="">2</a></li>
                            <li><a href="">3</a></li>
                            <li><a href="">4</a></li>
                            <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
                        </ul>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <br><br>
    {{-- Chi tiet hoa don --}}
    <div class="table-agile-info">
        <div class="panel panel-default">
            <div class="panel-heading">
                Liêt kê chi tiết đơn hàng
            </div>
            <div class="row w3-res-tb">
                </div>
                <div class="col-sm-3">
                    <div class="input-group">
                        <input type="text" class="input-sm form-control" placeholder="Search">
                        <span class="input-group-btn">
                            <button class="btn btn-sm btn-default" type="button">Go!</button>
                        </span>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <?php
                $message = Session::get('message');
                if ($message) {
                    echo $message;
                    Session::put('message', null);
                }
                ?>
                <table class="table table-striped b-t b-light">
                    <thead>
                        <tr>
                            <th style="width:20px;">
                                <label class="i-checks m-b-none">
                                    <input type="checkbox"><i></i>
                                </label>
                            </th>
                            <th>Tên Sản Phẩm</th>
                            <th>Số lượng đặt</th>
                            {{-- <th>Số lượng</th> --}}
                            <th>Mã giảm giá</th>
                            <th>Phí Ship</th>
                            <th>Giá sản phẩm</th>
                            <th>Tổng tiền</th>
                            <th style="width:30px;"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $total = 0;
                        @endphp
                        @foreach ($order_details as $key => $details)
                            @php
                                $subtotal = $details->product_price * $details->product_sales_quantity;
                                $total += $subtotal;
                            @endphp
                            <tr class="color_qty_{{ $details->product_id }}">
                                <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label>
                                </td>
                                <td>{{ $details->product_name }}</td>
                                <td>
                                    <input disabled type="number" class="order_qty_{{ $details->product_id }}" min="1"
                                        value="{{ $details->product_sales_quantity }}" name="product_sales_quantity">
                                    <input type="hidden" name="order_qty_storage"
                                        class="order_qty_storage_{{ $details->product_id }}"
                                        value="{{ $details->product->product_quantity }}">
                                    <input type="hidden" name="order_code" class="order_code"
                                        value="{{ $details->order_code }}">
                                    <input type="hidden" name="order_product_id" class="order_product_id"
                                        value="{{ $details->product_id }}">
                                </td>
                                {{-- <td>
                                    {{ $details->product->product_quantity }}
                                </td> --}}
                                <td>
                                    @if ($details->product_coupon != '0')
                                        {{ $details->product_coupon }}
                                    @else
                                        Không có mã
                                    @endif
                                </td>
                                <td>{{ $details->product_feeship }}</td>
                                <td>
                                    <p>{{ number_format($details->product_price, 0, ',', '.') . ' ' . 'VNĐ' }}</p>
                                </td>
                                <td>
                                    <p>
                                        {{ number_format($subtotal, 0, ',', '.') . ' ' . 'VNĐ' }}
                                    </p>
                                </td>
                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="2">
                                @php
                                    $total_coupon = 0;
                                @endphp

                                @if ($coupon_condition == 1)
                                    @php
                                        $total_after_coupon = ($total * $coupon_number) / 100;
                                        echo 'Tổng giảm:' . number_format($total_after_coupon, 0, ',', '.') . ' ' . 'VNĐ' . ' (' . $coupon_number . '%' . ')' . '<br>';
                                        $total_coupon = $total - $total_after_coupon + $details->product_feeship;
                                    @endphp
                                @else
                                    @php
                                        echo 'Tổng giảm:' . number_format($coupon_number, 0, ',', '.') . ' ' . 'VNĐ' . '<br>';
                                        $total_coupon = $total - $coupon_number + $details->product_feeship;
                                    @endphp
                                @endif
                                Phí Ship: {{ number_format($details->product_feeship, 0, ',', '.') . ' ' . 'VNĐ' }} <br>
                                Tổng tiền: {{ number_format($total_coupon, 0, ',', '.') . ' ' . 'VNĐ' }}
                            </td>
                        </tr>
                    </tbody>
                </table>
                <a target="_blank" href="{{ url('print-order/' . $details->order_code) }}">In Đơn Hàng</a>
            </div>
            <footer class="panel-footer">
                <div class="row">

                    <div class="col-sm-5 text-center">
                        <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
                    </div>
                    <div class="col-sm-7 text-right text-center-xs">
                        <ul class="pagination pagination-sm m-t-none m-b-none">
                            <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
                            <li><a href="">1</a></li>
                            <li><a href="">2</a></li>
                            <li><a href="">3</a></li>
                            <li><a href="">4</a></li>
                            <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
                        </ul>
                    </div>
                </div>
            </footer>
        </div>
    </div>
@endsection
