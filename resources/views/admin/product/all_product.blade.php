@extends('admin.layout')
@section('admin_content')
    <div class="table-agile-info">
        <div class="panel panel-default">
            <div class="panel-heading">
                LIỆT KÊ SẢN PHẨM
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
                            <th>Tên Sản Phẩm</th>
                            <th>Slug</th>
                            <th>Tag</th>
                            <th>Giá</th>
                            <th>Title</th>
                            <th>Hình Ảnh</th>
                            <th>Gallery</th>
                            <th>Số lượng</th>
                            <th>Danh Mục</th>
                            <th>Thương hiệu</th>
                            <th>Ngày Tạo</th>
                            <th>Ngày Cập Nhật</th>
                            <th>Hiển thị</th>
                            <th>Action</th>
                            <th style="width:30px;"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($all_product as $key => $product)
                            <tr>
                                <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label>
                                </td>
                                <td>{{ $product->product_name }}</td>
                                <td>{{ substr($product->slug, 0, 5) }}</td>
                                <td>{{ substr($product->product_tag, 0, 5) }}</td>
                                <td>{{ $product->product_price }}</td>
                                <td>{{ $product->product_title }}</td>
                                <td> <img src="uploads/product/{{ $product->product_image }}" height="100" width="100">
                                </td>
                                <td>
                                    <a href="{{ route('gallery.show', $product->product_id) }}">Thêm thư viện ảnh</a>
                                </td>
                                <td>{{ $product->product_quantity }}</td>
                                <td>{{ $product->category->category_name }}</td>
                                <td>{{ $product->brand->brand_name }}</td>
                                <td>{{ date('d-m-Y', strtotime($product->created_at)) }}</td>
                                <td>{{ $product->updated_at }}</td>
                                <td>
                                    <?php
                                    if ($product->product_status == 0) {
                                    ?>
                                    <a href="{{ URL::to('unactive-product/' . $product->product_id) }}"><span
                                            class="fa-thumb-styling fa fa-thumbs-down"></span></a>
                                    <?php
                                    } else {
                                    ?>
                                    <a href="{{ URL::to('active-product/' . $product->product_id) }}"><span
                                            class="fa-thumb-styling fa fa-thumbs-up"></span></a>
                                    <?php
                                    }
                                    ?>
                                </td>
                                <td>
                                    <a href="{{ URL::to('edit-product/' . $product->product_id) }}"
                                        class="active styling-edit" ui-toggle-class="">
                                        <i class="fa fa-pencil-square-o text-success text-active"></i>
                                    </a>
                                    <a onclick="return confirm('Are you sure to delete')"
                                        href="{{ URL::to('delete-product/' . $product->product_id) }}"
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
