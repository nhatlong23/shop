@extends('admin.layout')
@section('admin_content')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Thông tin website
                </header>
                <?php
                $message = Session::get('message');
                if ($message) {
                    echo $message;
                    Session::put('message', null);
                }
                ?>
                <div class="panel-body">
                    @foreach ($update_info as $info)
                        {{-- @foreach ($update_info as $key => update) --}}
                            <div class="position-center">
                                <form role="form" action="{{ URL::to('update-info/' . $info->info_id) }}" method="post"
                                    enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label for="">Tiêu đề wedsite</label>
                                        <input type="text" name="info_title" class="form-control"
                                            value="{{ $info->info_title }}" placeholder="Tiêu đề wedsite" required
                                            autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Mô tả website</label>
                                        <input type="text" data-validation="number" name="info_desc" class="form-control"
                                            value="{{ $info->info_desc }}" placeholder="Mô tả website" required
                                            autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Logo Wedsite</label>
                                        <input type="file" name="info_logo" class="form-control" required>
                                        <img src="{{ URL::to('uploads/info/' . $info->info_logo) }}" height="100"
                                            width="100">
                                    </div>
                                    <button type="submit" name="update_info" class="btn btn-info">Cập nhật</button>
                                </form>
                            </div>
                        {{-- @endforeach --}}
                    @endforeach
                </div>
            </section>
        </div>
    </div>
@endsection
