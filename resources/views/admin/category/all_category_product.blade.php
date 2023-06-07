@extends('admin.layout')
@section('admin_content')
    <div class="table-agile-info">
        <div class="panel panel-default">
            <div class="panel-heading">
                Liệt kê danh mục sản phẩm
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
                            <th>Thuộc danh mục</th>
                            <th>Slug</th>
                            <th>Ngày Tạo</th>
                            <th>Ngày Cập Nhật </th>
                            <th>Hiển thị</th>
                            <th>Sửa</th>
                            <th style="width:30px;"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($all_category_product as $key => $cate_pro)
                            <tr>
                                <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label>
                                </td>
                                <td>{{ $cate_pro->category_name }}</td>
                                <td>
                                    @if ($cate_pro->category_parent == 0)
                                        <span class="text-ellipsis">Danh mục cha</span>
                                    @else
                                        @foreach ($paren as $key => $parent)
                                            @if ($parent->category_id == $cate_pro->category_parent)
                                                <span style="color: red" class="text-ellipsis">{{ $parent->category_name }}</span>
                                            @endif
                                        @endforeach
                                    @endif
                                </td>
                                <td>{{ substr($cate_pro->slug, 0, 5) }}</td>
                                <td>{{ date('d-m-Y', strtotime($cate_pro->created_at)) }}</td>
                                <td>{{ $cate_pro->updated_at }}</td>
                                <td>
                                    <span class="text-ellipsis">
                                        <?php
                                        if ($cate_pro->category_status == 0) {
                                        ?>
                                            <a href="{{ URL::to('unactive-category-product/' . $cate_pro->category_id) }}"><span
                                            class="fa-thumb-styling fa fa-thumbs-down"></span></a>
                                        <?php
                                        } else {
                                        ?>
                                            <a href="{{ URL::to('active-category-product/' . $cate_pro->category_id) }}"><span
                                            class="fa-thumb-styling fa fa-thumbs-up"></span></a>
                                        <?php
                                        }
                                        ?>
                                    </span>
                                </td>
                                <td>
                                    <a href="{{ URL::to('edit-category-product/' . $cate_pro->category_id) }}"
                                        class="active styling-edit" ui-toggle-class="">
                                        <i class="fa fa-pencil-square-o text-success text-active"></i>
                                    </a>
                                    <a onclick="return confirm('Are you sure to delete')"
                                        href="{{ URL::to('delete-category-product/' . $cate_pro->category_id) }}"
                                        class="active styling-edit" ui-toggle-class="">
                                        <i class="fa fa-times text-danger text"></i>
                                    </a>
                                </td>
                                <td></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <form action="{{ url('import-csv') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="file" name="file" accept=".xlsx">
                    <input type="submit" value="Import CSV" name="import_csv" class="btn btn-warning">
                </form>
                <form action="{{ url('export-csv') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="file" name="file" accept=".xlsx">
                    <input type="submit" value="Export CSV" name="export_csv" class="btn btn-success">
                </form>
            </div>
        </div>
    </div>
@endsection
