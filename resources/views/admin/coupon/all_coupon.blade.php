@extends('admin.layout')
@section('admin_content')
    <div class="table-agile-info">
        <div class="panel panel-default">
            <div class="panel-heading">
                Liệt kê mã giảm giá
            </div>
            <div class="table-responsive">
                <?php
                $message = Session::get('message');
                if ($message) {
                    echo $message;
                    Session::put('message', null);
                }
                ?>

                <table class="table table-striped b-t b-light" id="myTable">
                    <thead>
                        <tr>
                            <th style="width:20px;">
                                <label class="i-checks m-b-none">
                                    <input type="checkbox"><i></i>
                                </label>
                            </th>
                            <th>Tên mã giảm giá</th>
                            <th>Mã giảm giá</th>
                            <th>Số lượng</th>
                            <th>Điều kiện giảm giá</th>
                            <th>Số lượng giảm giá</th>
                            <th>Ngày bắt đầu</th>
                            <th>Ngày kết thúc</th>
                            <th>Hết hạn</th>
                            <th>Tình trạng</th>
                            <th>Ngày Tạo</th>
                            <th>Gửi mã giảm giá</th>
                            <th>Sửa</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($coupon as $key => $cou)
                            <tr>
                                <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label>
                                </td>
                                <td>{{ $cou->coupon_name }}</td>
                                <td>{{ $cou->coupon_code }}</td>
                                <td>{{ $cou->coupon_time }}</td>
                                <td>
                                    <span class="text-ellipsis">
                                        <?php
                                        if ($cou->coupon_condition == 1) {
                                        ?>
                                        Giảm theo %
                                        <?php
                                        } else {
                                        ?>
                                        Giảm theo tiền
                                        <?php
                                        }
                                        ?>
                                    </span>
                                </td>
                                <td>
                                    <span class="text-ellipsis">
                                        <?php
                                        if ($cou->coupon_condition == 1) {
                                        ?>
                                        Giảm {{ $cou->coupon_number }} %
                                        <?php
                                        } else {
                                        ?>
                                        Giảm {{ number_format($cou->coupon_number), ',', '.' }} VNĐ
                                        <?php
                                        }
                                        ?>
                                    </span>
                                </td>
                                <td>{{ date('d-m-Y', strtotime($cou->coupon_start)) }}</td>
                                <td>{{ date('d-m-Y', strtotime($cou->coupon_end)) }}</td>
                                <td>
                                    @if ($cou->coupon_end > $today)
                                        <span>Còn hạn</span>
                                    @else
                                        <span style="color: red;">Hết hạn</span>
                                    @endif
                                </td>
                                <td>
                                    <span class="text-ellipsis">
                                        @if ($cou->coupon_status == 1)
                                            Còn hạn
                                        @else
                                            <span style="color: red;">Đã khóa</span>
                                        @endif
                                    </span>
                                </td>
                                <td>{{ date('d-m-Y', strtotime($cou->created_at)) }}</td>
                                <td>
                                    <p style="margin-bottom: 5px;">
                                        <a href="{{ route('send-coupon-vip', [
                                            'coupon_time' => $cou->coupon_time,
                                            'coupon_condition' => $cou->coupon_condition,
                                            'coupon_number' => $cou->coupon_number,
                                            'coupon_code' => $cou->coupon_code,
                                        ]) }}" class="btn btn-danger">Gửi đến khách V.I.P</a>
                                    </p>
                                    <p><a href="{{ asset('/send-coupon') }}" class="btn btn-default">Gửi đến khách Thường</a></p>
                                </td>
                                <td>
                                    <a onclick="return confirm('Are you sure to delete')"
                                        href="{{ URL::to('delete-coupon/' . $cou->coupon_id) }}"
                                        class="active styling-edit" ui-toggle-class="">
                                        <i class="fa fa-times text-danger text"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
