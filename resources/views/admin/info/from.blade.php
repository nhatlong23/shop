@extends('admin.layout')
@section('admin_content')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Thông tin website
                </header>
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
                        <form role="form" action="{{ route('info.update', $info->info_id) }}" method="post"
                            enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="form-group">
                                <label for="">Tiêu đề wedsite</label>
                                <input type="text" name="info_title" class="form-control" value="{{ $info->info_title }}"
                                    placeholder="Tiêu đề wedsite" required autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Mô tả website</label>
                                <input type="text" data-validation="number" name="info_desc" class="form-control"
                                    value="{{ $info->info_desc }}" placeholder="Mô tả website" required autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Logo Wedsite</label>
                                <input type="file" name="info_logo" class="form-control" required>
                                <img src="{{ asset('uploads/logo/' . $info->info_logo) }}" width="150">
                            </div>
                            <button type="submit" class="btn btn-info">Cập nhật</button>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
