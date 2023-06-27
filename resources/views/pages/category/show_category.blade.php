@extends('welcome')
@section('content')
    <section id="advertisement">
        <div class="container">
            <img src="{{ asset('frontend/images/shop/advertisement.jpg') }}" alt="" />
        </div>
    </section>
    <div class="col-sm-3">
        @include('pages.include.sidebar')
    </div>
    <div class="features_items">
        <!--features_items-->

        @foreach ($category_name as $key => $name)
            <h2 class="title text-center">{{ $name->category_name }}</h2>
        @endforeach

        <div class="row">
            <div class="col-md-4">
                <label for="amount">Sắp xếp theo</label>
                <form>
                    @php
                        $url = Request::url();
                        $sort_by = request()->input('sort_by');
                    @endphp
                    @csrf
                    <select name="sort" id="sort" class="from-control">
                        <option value="{{ $url }}?sort_by=none" {{ $sort_by == 'none' ? 'selected' : '' }}>
                            ---Lọc---</option>
                        <option value="{{ $url }}?sort_by=tang_dan" {{ $sort_by == 'tang_dan' ? 'selected' : '' }}>
                            ---Giá tăng dần---</option>
                        <option value="{{ $url }}?sort_by=giam_dan" {{ $sort_by == 'giam_dan' ? 'selected' : '' }}>
                            ---Giá giảm dần---</option>
                        <option value="{{ $url }}?sort_by=kytu_az" {{ $sort_by == 'kytu_az' ? 'selected' : '' }}>
                            ---A đến Z---</option>
                        <option value="{{ $url }}?sort_by=kytu_za" {{ $sort_by == 'kytu_za' ? 'selected' : '' }}>
                            ---Z đến A---</option>
                    </select>
                </form>
            </div>
            <div class="col-md-4">
                <label for="amount">Lọc giá theo</label>
                <form>
                    @csrf
                    <div class="price-range-slider">
                        <div id="slider-range" class="range-bar"></div>
                        <div>
                            <p class="range-value"> <input type="text" id="amount_start" readonly
                                    style="border: 0; font-weight:bold"></p>
                            <p class="range-value"> <input type="text" id="amount_end" readonly
                                    style="border: 0; font-weight:bold"></p>
                        </div>
                        <input type="hidden" name="start_price" id="start_price">
                        <input type="hidden" name="end_price" id="end_price">
                        <input type="submit" name="filter_price" value="Lọc giá" class="btn btn-default">
                    </div>
                </form>
            </div>
        </div>

        @foreach ($category_by_slug as $key => $product)
            <a href="{{ asset('detail-product/' . $product->slug) }}">
                <div class="col-sm-4">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <form>
                                    @csrf
                                    <input type="hidden" value="{{ $product->product_id }}"
                                        class="cart_product_id_{{ $product->product_id }}">
                                    <input type="hidden" value="{{ $product->product_name }}"
                                        class="cart_product_name_{{ $product->product_id }}">
                                    <input type="hidden" value="{{ $product->product_image }}"
                                        class="cart_product_image_{{ $product->product_id }}">
                                    <input type="hidden" value="{{ $product->product_price }}"
                                        class="cart_product_price_{{ $product->product_id }}">
                                    <input type="hidden" value="1"
                                        class="cart_product_qty_{{ $product->product_id }}">
                                    <input type="hidden" value="{{ $product->product_quantity }}"
                                        class="cart_product_quantity_{{ $product->product_id }}">

                                    <a href="{{ asset('detail-product/' . $product->slug) }}">
                                        <img src="{{ asset('uploads/product/' . $product->product_image) }}"
                                            alt="" />
                                        <h2>{{ number_format($product->product_price) . ' ' . 'VND' }}</h2>
                                        <p>{{ $product->product_name }}</p>
                                    </a>
                                    <input type="button" value="Thêm giỏ hàng" class="btn btn-default add-to-cart"
                                        data-id_product="{{ $product->product_id }}" name="add-to-cart">
                                </form>

                            </div>
                        </div>
                        <div class="choose">
                            <ul class="nav nav-pills nav-justified">
                                <li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                                <li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </a>
        @endforeach
    </div>
@endsection
