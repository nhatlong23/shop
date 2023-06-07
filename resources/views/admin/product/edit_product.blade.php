@extends('admin.layout')
@section('admin_content')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Cập nhật sản phẩm
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
                        <form role="form" action="{{ URL::to('update-product/' . $edit_product->product_id) }}"
                            method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên Sản Phẩm</label>
                                <input type="text" name="product_name" class="form-control"id="slug"
                                    value="{{ $edit_product->product_name }}" onkeyup="ChangeToSlug()"
                                    placeholder="Tên sản phẩm" required autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Slug</label>
                                <input type="text" name="slug" class="form-control" id="convert_slug"
                                    value="{{ $edit_product->slug }}" placeholder="slug" required autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Giá sản phẩm</label>
                                <input type="text" name="product_price" class="form-control" id="exampleInputEmail1"
                                    value="{{ $edit_product->product_price }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Số lượng sản phẩm</label>
                                <input type="text" name="product_quantity" class="form-control" id="exampleInputEmail1"
                                    value="{{ $edit_product->product_quantity }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Title sản phẩm</label>
                                <textarea id="editor_title" style="resize: none" rows="8" class="form-control" name="product_title">{{ $edit_product->product_title }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Hình ảnh sản phẩm</label>
                                <input type="file" name="product_image" class="form-control" id="exampleInputEmail1">
                                <img src="{{ URL::to('uploads/product/' . $edit_product->product_image) }}" height="100"
                                    width="100">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Mô tả sản phẩm</label>
                                <textarea id="editor_desc" style="resize: none" rows="8" class="form-control" name="product_desc">{{ $edit_product->product_desc }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Nội dung sản phẩm</label>
                                <textarea id="editor_content" style="resize: none" rows="8" class="form-control" name="product_content">{{ $edit_product->product_content }} </textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Danh mục sản phẩm</label>
                                <select name="product_cate" class="form-control input-sm m-bot15">
                                    @foreach ($cate_product as $key => $cate)
                                        @if ($cate->category_id == $edit_product->category_id)
                                            <option selected value="{{ $cate->category_id }}">{{ $cate->category_name }}
                                            </option>
                                        @else
                                            <option value="{{ $cate->category_id }}">{{ $cate->category_name }}
                                            </option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Thương hiệu sản phẩm</label>
                                <select name="product_brand" class="form-control input-sm m-bot15">
                                    @foreach ($brand_product as $key => $brand)
                                        @if ($cate->category_id == $edit_product->category_id)
                                            <option selected value="{{ $brand->brand_id }}">{{ $brand->brand_name }}
                                            </option>
                                        @else
                                            <option value="{{ $brand->brand_id }}">{{ $brand->brand_name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Hiển thị</label>
                                <select name="product_status" class="form-control input-sm m-bot15">
                                    <option value="1">Hiển thị</option>
                                    <option value="0">Ẩn</option>
                                </select>
                            </div>
                            <button type="submit" name="add_product" class="btn btn-info">Cập nhật</button>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
