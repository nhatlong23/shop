@extends('admin.layout')
@section('admin_content')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Thêm Slider
                </header>
                <?php
                $message = Session::get('message');
                if ($message) {
                    echo $message;
                    Session::put('message', null);
                }
                ?>
                <div class="panel-body">
                    <div class="position-center">
                        <form role="form" action="{{ URL::to('insert-slider') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên Slider</label>
                                <input type="text" name="slider_name"
                                    class="form-control" placeholder="Tên Slider" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Hình Ảnh</label>
                                <input type="file" name="slider_image" class="form-control" id="exampleInputEmail1"
                                    required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Mô tả Slider</label>
                                <textarea style="resize: none" rows="8" class="form-control" name="slider_desc" id="exampleInputPassword1"
                                    placeholder="Mô tả slider"> </textarea>
                            </div>
                            <div class="form-group">
                                <label for="">HIển thị</label>
                                <select name="slider_status" class="form-control input-sm m-bot15">
                                    <option value="0">Ẩn Slider</option>
                                    <option value="1">Hiển thị Slider</option>
                                </select>
                            </div>
                            <button type="submit" name="add_slider" class="btn btn-info">Thêm Slider</button>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
