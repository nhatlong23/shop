@extends('admin.layout')
@section('admin_content')
    <div class="table-agile-info">
        <div class="panel panel-default">
            <div class="panel-heading">
                Liệt kê khách hàng
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
                    @csrf
                    <thead>
                        <tr>
                            <th style="width:20px;">
                                <label class="i-checks m-b-none">
                                    <input type="checkbox"><i></i>
                                </label>
                            </th>
                            <th>Tên khách hàng</th>
                            <th>Khách hàng V.I.P</th>
                            <th>Email khách hàng</th>
                            <th>SĐT</th>
                            <th>Ngày tạo</th>
                            <th>Xác thực email</th>
                            <th>Tình trạng</th>
                            <th>Quản lý</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($customer as $key => $customer)
                                <tr>
                                    <td>
                                        <label class="i-checks m-b-none"><input type="checkbox"
                                                name="post[]"><i></i></label>
                                    </td>
                                    <td>{{ $customer->customer_name }}</td>
                                    <td>
                                        @if ($customer->customer_vip == 1)
                                            <span style="color: red" class="text-ellipsis">V.I.P</span>
                                        @else
                                            <span class="text-ellipsis">Không</span>
                                        @endif
                                    </td>

                                    <td>{{ $customer->customer_email }}</td>
                                    <td>{{ $customer->customer_phone }}</td>
                                    <td>{{ date('d-m-Y', strtotime($customer->created_at)) }}</td>
                                    <td>
                                        <span class="text-ellipsis">
                                            @if($customer->verified_email== false)
                                                <span class="text-ellipsis">Chưa xác thực email</span>
                                            @elseif($customer->verified_email == true)
                                                <span style="color: rgb(188, 55, 55)" class="text-ellipsis">Đã sát thực email</span>
                                            @endif
                                        </span>
                                    </td>
                                    <td>
                                        <span class="text-ellipsis">
                                            @if($customer->customer_status == false)
                                                <span style="color: rgb(0, 0, 0)" class="text-ellipsis">Khoá tài khoản</span>
                                            @elseif($customer->customer_status == true)
                                                <span style="color: red" class="text-ellipsis">Tài khoản hoặt động</span>
                                            @endif
                                        </span>
                                    </td>
                                    <td>
                                        @if ($customer->customer_status == true)
                                            <a onclick="return confirm('Bạn có chắc chắn khóa tài khoản người dùng không?')"
                                            href="{{ route('customer.lock', $customer->customer_id) }}" class="btn btn-danger">Khóa tài khoản</a>
                                        @elseif ($customer->customer_status == false)
                                            <a onclick="return confirm('Bạn có chắc chắn mở tài khoản người dùng không?')"
                                            href="{{ route('customer.unlock' , $customer->customer_id) }}" class="btn btn-success">Mở khóa tài khoản</a>
                                        @endif
                                    </td>
                                    <td></td>
                                </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
