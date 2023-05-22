@extends('admin.layout')
@section('admin_content')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Thêm thương hiệu sản phẩm
                </header>
                <?php
                $message = Session::get('message');
                if ($message) {
                    echo $message;
                    Session::put('message', null);
                }
                ?>
                {{-- @if ($errors->any())
                    <div class="alert alert-danger" role="alert">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif --}}
                <div class="panel-body">
                    <div class="position-center">
                        <form role="form" action="{{ URL::to('save-brand-product') }}" method="post">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên thương hiệu</label>
                                <input type="text" name="brand_product_name" id="slug" onkeyup="ChangeToSlug()"
                                    class="form-control" placeholder="Tên thương hiệu" autocomplete="off">
                            </div>
                            @error('brand_product_name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="form-group">
                                <label for="exampleInputEmail1">Slug</label>
                                <input type="text" name="brand_slug" class="form-control" id="convert_slug"
                                    placeholder="Slug" autocomplete="off">
                            </div>
                            @error('brand_slug')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="form-group">
                                <label for="exampleInputPassword1">Mô tả thương hiệu</label>
                                <textarea style="resize: none" rows="8" class="form-control" name="brand_product_desc" id="exampleInputPassword1"
                                    placeholder="Mô tả danh mục"> </textarea>
                            </div>
                            @error('brand_product_desc')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="form-group">
                                <select name="brand_product_status" class="form-control input-sm m-bot15">
                                    <option value="0">Ẩn</option>
                                    <option value="1">Hiển thị</option>
                                </select>
                            </div>
                            <button type="submit" name="add_category_product" class="btn btn-info">Thêm thương
                                hiệu</button>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
