@extends('admin.layout')
@section('admin_content')
    <div class="table-agile-info">
        <div class="panel panel-default">
            <div class="panel-heading">
                LIỆT KÊ THƯƠNG HIỆU SẢN PHẨM
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
                            <th>Tên danh mục</th>
                            <th>Slug</th>
                            <th>Ngày Tạo</th>
                            <th>Ngày Cập Nhật </th>
                            <th>Hiển thị</th>
                            <th>Sửa</th>
                            <th style="width:30px;"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($all_brand_product as $key => $brand_pro)
                            <tr>
                                <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label>
                                </td>
                                <td>{{ $brand_pro->brand_name }}</td>
                                <td>{{ substr($brand_pro->slug,0,5 ) }}</td>
                                <td>{{ date('d-m-Y', strtotime($brand_pro->created_at)); }}</td>
                                <td>{{ $brand_pro->updated_at }}</td>
                                <td>
                                    <span class="text-ellipsis">
                                        <?php
                                        if ($brand_pro->brand_status == 0) {
                                        ?>
                                            <a href="{{ URL::to('unactive-brand-product/' . $brand_pro->brand_id) }}"><span
                                            class="fa-thumb-styling fa fa-thumbs-down"></span></a>
                                        <?php
                                        } else {
                                        ?>
                                            <a href="{{ URL::to('active-brand-product/' . $brand_pro->brand_id) }}"><span
                                            class="fa-thumb-styling fa fa-thumbs-up"></span></a>
                                        <?php
                                        }
                                        ?>
                                    </span>
                                </td>
                                <td>
                                    <a href="{{ URL::to('edit-brand-product/' . $brand_pro->brand_id) }}"
                                        class="active styling-edit" ui-toggle-class="">
                                        <i class="fa fa-pencil-square-o text-success text-active"></i>
                                    </a>
                                    <a onclick="return confirm('Are you sure to delete')"
                                        href="{{ URL::to('delete-brand-product/' . $brand_pro->brand_id) }}"
                                        class="active styling-edit" ui-toggle-class="">
                                        <i class="fa fa-times text-danger text"></i>
                                    </a>
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
