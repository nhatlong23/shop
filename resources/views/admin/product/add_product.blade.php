@extends('admin.layout')
@section('admin_content')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Thêm sản phẩm
                </header>
                <?php
                $message = Session::get('message');
                if ($message) {
                    echo $message;
                    Session::put('message', null);
                }
                ?>
                @if ($errors->any())
                    <div class="alert alert-danger" role="alert">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="panel-body">
                    <div class="position-center">
                        <form role="form" action="{{ URL::to('/save-product') }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">SKU: </label>
                                <input type="text" data-validation="length" data-validation="min10" name="product_sku" class="form-control money"
                                    placeholder="Nhập SKU: " required autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên Sản Phẩm</label>
                                <input type="text" name="product_name" class="form-control"id="slug"
                                    onkeyup="ChangeToSlug()" placeholder="Tên sản phẩm" required autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Slug</label>
                                <input type="text" name="slug" class="form-control" id="convert_slug"
                                    placeholder="slug" required autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Giá bán</label>
                                <input type="text" data-validation="length" data-validation="min5" name="product_price" class="form-control money"
                                    placeholder="Giá sản phẩm" required autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Giá gốc</label>
                                <input type="text" data-validation="length" name="product_cost" class="form-control money1"
                                    placeholder="Giá gốc" required autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Giá giảm giá</label>
                                <input type="text" data-validation="length" name="product_sale" class="form-control money1"
                                    placeholder="Giá giảm giá" required autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Số lượng sản phẩm</label>
                                <input type="text" data-validation="number" name="product_quantity" class="form-control"
                                    placeholder="Số lượng sản phẩm" required autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tiêu đề</label>
                                <input type="text" name="product_title" class="form-control" placeholder="title sản phẩm"
                                    required autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tag</label>
                                <input type="text" name="product_tag" data-role="tagsinput" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Hình Ảnh</label>
                                <input type="file" name="product_image" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tài liệu</label>
                                <input type="file" name="product_file" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Mô tả</label>
                                <textarea id="editor_desc" style="resize: none" rows="8" class="form-control" name="product_desc"
                                    placeholder="Mô tả sản phẩm" required autocomplete="off"> </textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Nội dung sản phẩm</label>
                                <textarea id="editor_content" style="resize: none" rows="8" class="form-control" name="product_content"
                                    placeholder="Nội dung sản phẩm" required autocomplete="off"> </textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Danh mục</label>
                                <select name="product_cate" class="form-control input-sm m-bot15">
                                    @foreach ($cate_product as $key => $cate)
                                        <option value="{{ $cate->category_id }}">{{ $cate->category_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Thương hiệu</label>
                                <select name="product_brand" class="form-control input-sm m-bot15">
                                    @foreach ($brand_product as $key => $brand)
                                        <option value="{{ $brand->brand_id }}">{{ $brand->brand_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Hiển thị</label>
                                <select name="product_status" class="form-control input-sm m-bot15">
                                    <option value="0">Ẩn</option>
                                    <option value="1">Hiển thị</option>
                                </select>
                            </div>
                            <button type="submit" name="add_product" class="btn btn-info">Thêm</button>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
