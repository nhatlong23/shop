@extends('welcome')
@section('content')
    @include('pages.include.slider')
    <div class="col-sm-3">
        @include('pages.include.sidebar')
    </div>
    <style type="text/css">
        .quickview {
            background: #F5F5ED;
            border: 0 none;
            border radius: 0;
            color: #696763;
            font-family: 'Roboto', sans-serif;
            font-size: 15px;
            margin-bottom: 25px;
        }

        .quickview:hover {
            background: #FE980F;
            color: #fff;
        }

        .quickview:focus {
            background: #FE980F;
            color: #fff;
        }

        @media screen and (min-width: 780px) {
            .modal-dialog {
                width: 700px;
            }

            .modal-sm {
                width: 350px;
            }
        }

        @media screen and (min-width: 992px) {
            .modal-dialog {
                width: 900px;
            }

            .modal-sm {
                width: 450px;
            }

            .modal-lg {
                width: 1000px;
            }
        }
    </style>
    <!--/sidebar-->
    <div class="col-sm-9 padding-right">
        <div class="features_items">
            <!--features_items-->
            <h2 class="title text-center">Sản phẩm mới nhất</h2>
            @foreach ($newProducts as $key => $product)
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
                                    <button type="button" class="btn btn-default add-to-cart" name="add-to-cart"
                                        data-id_product="{{ $product->product_id }}">Thêm giỏ hàng</button>
                                    <input type="button" data-toggle="modal" data-target="#quickview" value="Xem Nhanh"
                                        class="btn btn-default quickview" data-id_product="{{ $product->product_id }}"
                                        name="add-to-cart">
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
                                    <style type="text/css">
                                        h5.modal-title.product_quickview_title {
                                            text-align: center;
                                            font-size: 25px;
                                            color: brown;
                                        }

                                        p.quickview {
                                            font-size: 14px;
                                            color: brown;
                                        }

                                        span#product_quickview_content img {
                                            width: 100%;
                                        }
                                    </style>
                                    <h2 class="quickview">
                                        <span id="product_quickview_title"></span>
                                    </h2>
                                    <p>Mã ID: <span id="product_quickview_id"></span></p>
                                    <p style="color: #FE980F; font-size: 20px; font-weight: bold;">Giá sản phẩm: <span
                                            id="product_quickview_price"></span></p>
                                    <span>
                                        <label for="">Số lượng:</label>
                                        <div id="product_quickview_qty" ></div>
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
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#tshirt" data-toggle="tab">T-Shirt</a></li>
                    <li><a href="#blazers" data-toggle="tab">Blazers</a></li>
                    <li><a href="#sunglass" data-toggle="tab">Sunglass</a></li>
                    <li><a href="#kids" data-toggle="tab">Kids</a></li>
                    <li><a href="#poloshirt" data-toggle="tab">Polo shirt</a></li>
                </ul>
            </div>
            <div class="tab-content">
                <div class="tab-pane fade active in" id="tshirt">
                    <div class="col-sm-3">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="images/home/gallery1.jpg" alt="" />
                                    <h2>$56</h2>
                                    <p>Easy Polo Black Edition</p>
                                    <a href="#" class="btn btn-default add-to-cart"><i
                                            class="fa fa-shopping-cart"></i>Add to cart</a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="blazers">
                    <div class="col-sm-3">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="images/home/gallery4.jpg" alt="" />
                                    <h2>$56</h2>
                                    <p>Easy Polo Black Edition</p>
                                    <a href="#" class="btn btn-default add-to-cart"><i
                                            class="fa fa-shopping-cart"></i>Add to cart</a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="sunglass">
                    <div class="col-sm-3">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="images/home/gallery3.jpg" alt="" />
                                    <h2>$56</h2>
                                    <p>Easy Polo Black Edition</p>
                                    <a href="#" class="btn btn-default add-to-cart"><i
                                            class="fa fa-shopping-cart"></i>Add to cart</a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="kids">
                    <div class="col-sm-3">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="images/home/gallery1.jpg" alt="" />
                                    <h2>$56</h2>
                                    <p>Easy Polo Black Edition</p>
                                    <a href="#" class="btn btn-default add-to-cart"><i
                                            class="fa fa-shopping-cart"></i>Add to cart</a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="poloshirt">
                    <div class="col-sm-3">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="images/home/gallery2.jpg" alt="" />
                                    <h2>$56</h2>
                                    <p>Easy Polo Black Edition</p>
                                    <a href="#" class="btn btn-default add-to-cart"><i
                                            class="fa fa-shopping-cart"></i>Add to cart</a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/category-tab-->
        <div class="recommended_items">
            <!--recommended_items-->
            <h2 class="title text-center">recommended items</h2>

            <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="item active">
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img src="images/home/recommend1.jpg" alt="" />
                                        <h2>$56</h2>
                                        <p>Easy Polo Black Edition</p>
                                        <a href="#" class="btn btn-default add-to-cart"><i
                                                class="fa fa-shopping-cart"></i>Add to cart</a>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img src="images/home/recommend2.jpg" alt="" />
                                        <h2>$56</h2>
                                        <p>Easy Polo Black Edition</p>
                                        <a href="#" class="btn btn-default add-to-cart"><i
                                                class="fa fa-shopping-cart"></i>Add to cart</a>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img src="images/home/recommend3.jpg" alt="" />
                                        <h2>$56</h2>
                                        <p>Easy Polo Black Edition</p>
                                        <a href="#" class="btn btn-default add-to-cart"><i
                                                class="fa fa-shopping-cart"></i>Add to cart</a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img src="images/home/recommend1.jpg" alt="" />
                                        <h2>$56</h2>
                                        <p>Easy Polo Black Edition</p>
                                        <a href="#" class="btn btn-default add-to-cart"><i
                                                class="fa fa-shopping-cart"></i>Add to cart</a>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img src="images/home/recommend2.jpg" alt="" />
                                        <h2>$56</h2>
                                        <p>Easy Polo Black Edition</p>
                                        <a href="#" class="btn btn-default add-to-cart"><i
                                                class="fa fa-shopping-cart"></i>Add to cart</a>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img src="images/home/recommend3.jpg" alt="" />
                                        <h2>$56</h2>
                                        <p>Easy Polo Black Edition</p>
                                        <a href="#" class="btn btn-default add-to-cart"><i
                                                class="fa fa-shopping-cart"></i>Add to cart</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
