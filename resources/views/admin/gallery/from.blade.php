@extends('admin.layout')
@section('admin_content')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Thêm thư viện ảnh
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
                <form method="post" enctype="multipart/form-data" action="{{ route('gallery.update', $product_id) }}">
                    @method('PUT')
                    @csrf
                    <div class="row">
                        <div class="col-md-3" align="right">

                        </div>
                        <div class="col-md-6">
                            <input type="file" class="from-control" name="file[]" accept="image/*" multiple id="file">
                            <span id="error_gallery"></span>
                        </div>
                        <div class="col-md-3">
                            <input type="submit" name="upload" name="upload" value="Tải ảnh" class="btn btn-success">
                        </div>
                    </div>
                </form>

                <div class="panel-body">
                    <input type="hidden" value="{{ $product_id }}" name="product_id" class="product_id">
                    <form>
                        @csrf
                        <div id="gallery_load">

                        </div>
                    </form>
                </div>
            </section>
        </div>
    </div>
@endsection
