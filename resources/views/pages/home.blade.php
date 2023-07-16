@extends('welcome')
@section('content')
    @include('pages.include.slider')
    <div class="col-sm-3">
        @include('pages.include.sidebar')
    </div>
    <!--/sidebar-->
    <div class="col-sm-9 padding-right">
        <div class="features_items">
            <!--features_items-->
            <h2 class="title text-center">@lang('lang.latest_product')</h2>
            @foreach ($newProducts as $key => $product)
                <div class="col-sm-4">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <form>
                                    @csrf
                                    <input type="hidden" value="{{ $product->product_id }}"
                                        class="cart_product_id_{{ $product->product_id }}">
                                    <input type="hidden" id="wistlist_productname{{ $product->product_id }}"
                                        value="{{ $product->product_name }}"
                                        class="cart_product_name_{{ $product->product_id }}">
                                    <input type="hidden" value="{{ $product->product_image }}"
                                        class="cart_product_image_{{ $product->product_id }}">
                                    <input type="hidden" id="wistlist_productprice{{ $product->product_id }}"
                                        value="{{ $product->product_price }}"
                                        class="cart_product_price_{{ $product->product_id }}">
                                    <input type="hidden" value="1"
                                        class="cart_product_qty_{{ $product->product_id }}">
                                    <input type="hidden" value="{{ $product->product_quantity }}"
                                        class="cart_product_quantity_{{ $product->product_id }}">
                                    <a id="wistlist_producturl{{ $product->product_id }}"
                                        href="{{ asset('detail-product/' . $product->slug) }}">
                                        <img id="wistlist_productimage{{ $product->product_id }}"
                                            src="{{ asset('uploads/product/' . $product->product_image) }}"
                                            alt="" />
                                        <h2>{{ number_format($product->product_price) . ' ' . 'VND' }}</h2>
                                        <p>{{ $product->product_name }}</p>
                                    </a>
                                    <button type="button" class="btn btn-default add-to-cart" name="add-to-cart"
                                        data-id_product="{{ $product->product_id }}">@lang('lang.add_to_cart')</button>
                                    <input type="button" data-toggle="modal" data-target="#quickview" value="@lang('lang.quick_view')"
                                        class="btn btn-default quickview" data-id_product="{{ $product->product_id }}"
                                        name="add-to-cart">
                                </form>
                            </div>
                        </div>
                        <div class="choose">
                            <ul class="nav nav-pills nav-justified">
                                <li>
                                    <a><i class="fa fa-plus-square"></i>
                                        <button class="button_wishlist" id="{{ $product->product_id }}"
                                            onclick="add_wishlist(this.id);">
                                            <span>@lang('lang.wishlist')</span>
                                        </button>
                                    </a>
                                </li>
                                <li><a href="#"><i class="fa fa-plus-square"></i>@lang('lang.compare')</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <!--features_items-->

        <!-- Modal -->
        <div class="modal fade" id="quickview" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title product_quickview_title" id="quickview">
                            <span id="product_quickview_title"></span>
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-5">
                                <span id="product_quickview_image"></span>
                                {{-- <span id="product_quickview_gallery"></span> --}}
                            </div>
                            <form>
                                @csrf
                                <div id="product_quickview_value"></div>
                                <div class="col-md-7">
                                    <h2 class="quickview">
                                        <span id="product_quickview_title"></span>
                                    </h2>
                                    <p>Mã ID: <span id="product_quickview_id"></span></p>
                                    <p style="color: #FE980F; font-size: 20px; font-weight: bold;">Giá sản phẩm: <span
                                            id="product_quickview_price"></span></p>
                                    <span>
                                        <label for="">Số lượng:</label>
                                        <div id="product_quickview_qty"></div>
                                    </span>
                                    <br>
                                    <h4 style="color: #brown; font-size: 20px; font-weight: bold;">Mô tả sản phẩm:</h4>
                                    <p> <span id="product_quickview_desc"></span></p>

                                    <div id="product_quickview_button"></div>
                                    <div id="beforesend_quickview"></div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                        <button type="button" class="btn btn-secondary">
                            <a href="{{ asset('detail-product/' . $product->slug) }}"> Đi đến sản phẩm chi tiết</a>
                        </button>
                        <button type="button" class="btn btn-default redirect-cart">Đi đến giỏ hàng</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="category-tab">
            <!--category-tab-->
            <div class="col-sm-12">
                <ul class="nav nav-tabs" id="myTab">
                    @foreach ($category_tabs as $key => $tab)
                        <li class="tabs_product {{ $loop->first ? 'active' : '' }}" data-id="{{ $tab->category_id }}">
                            <a href="#{{ $tab->category_name }}" data-toggle="tab">{{ $tab->category_name }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="tab-content">
                <div class="tab-pane fade active in" id="{{ $tab->category_name }}">
                    <div id="tabs_product"></div>
                </div>
            </div>
        </div>
        <!--/category-tab-->
        <div class="recommended_items">
            <!--recommended_items-->
            <h2 class="title text-center">@lang('lang.product_recommendation')</h2>
            <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <?php $i = 0; ?>
                    @foreach ($recommended->chunk(3) as $chunk)
                        <div class="item {{ $i == 0 ? 'active' : '' }}">
                            <div class="row">
                                @foreach ($chunk as $lienquan)
                                    <div class="col-md-4 col-sm-6 col-xs-12">
                                        <div class="product-image-wrapper">
                                            <div class="single-products">
                                                <div class="productinfo text-center">
                                                    <form>
                                                        @csrf
                                                        <a href="{{ asset('detail-product/' . $lienquan->slug) }}">
                                                            <img src="{{ asset('uploads/product/' . $lienquan->product_image) }}"
                                                                alt="" />
                                                            <h2>{{ number_format($lienquan->product_price) . ' ' . 'VND' }}
                                                            </h2>
                                                            <p>{{ $lienquan->product_name }}</p>
                                                        </a>
                                                        <input type="hidden" value="{{ $lienquan->product_id }}"
                                                            class="cart_product_id_{{ $lienquan->product_id }}">
                                                        <input type="hidden" value="{{ $lienquan->product_name }}"
                                                            class="cart_product_name_{{ $lienquan->product_id }}">
                                                        <input type="hidden" value="{{ $lienquan->product_image }}"
                                                            class="cart_product_image_{{ $lienquan->product_id }}">
                                                        <input type="hidden" value="{{ $lienquan->product_price }}"
                                                            class="cart_product_price_{{ $lienquan->product_id }}">
                                                        <input type="hidden" value="{{ $lienquan->product_quantity }}"
                                                            class="cart_product_quantity_{{ $lienquan->product_id }}">
                                                        <input type="hidden" value="1"
                                                            class="cart_product_qty_{{ $lienquan->product_id }}">

                                                        <input type="button" value="@lang('lang.add_to_cart')"
                                                            class="btn btn-primary btn-sm add-to-cart"
                                                            data-id_product="{{ $lienquan->product_id }}"
                                                            name="add-to-cart">
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <?php $i++; ?>
                    @endforeach
                </div>
                <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                    <i class="fa fa-angle-left"></i>
                </a>
                <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                    <i class="fa fa-angle-right"></i>
                </a>
            </div>
        </div>

        <!--/recommended_items-->
    </div>
@endsection
