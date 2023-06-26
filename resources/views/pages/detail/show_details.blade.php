@extends('welcome')
@section('content')
    {{-- <div class="col-sm-3">
        @include('pages.include.sidebar')
    </div> --}}
    <!--/sidebar-->
    @foreach ($product_details as $key => $value)
        <div class="product-details">
            <!--product-details-->
            <div>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ asset('home') }}">Trang chủ</a></li>
                        <li class="breadcrumb-item"><a
                                href="{{ asset('category-product/' . $category_slug) }}">{{ $product_category }}</a></li>
                        <li class="breadcrumb-item " aria-current="page">{{ $meta_title }}</li>
                    </ol>
                </nav>
            </div>
            <div class="col-sm-5 wrapper">
                <ul id="imageGallery">
                    @foreach ($gallery as $key => $gallery)
                        <li data-thumb="{{ asset('uploads/gallery/' . $gallery->images) }}"
                            data-src="{{ asset('uploads/gallery/' . $gallery->images) }}">
                            <img alt="{{ $gallery->name }}" width="100%"
                                src="{{ asset('uploads/gallery/' . $gallery->images) }}" />
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="col-sm-7">
                <div class="product-information">
                    <!--/product-information-->
                    <img src="{{ asset('frontend/images/product-details/new.jpg') }}" class="newarrival" alt="" />
                    <h2>{{ $value->product_name }}</h2>
                    <p>Title: {{ $value->product_title }}</p>
                    <img src="{{ asset('frontend/images/product-details/rating.png') }}" alt="" />
                    <form>
                        @csrf
                        <input type="hidden" value="{{ $value->product_id }}"
                            class="cart_product_id_{{ $value->product_id }}">
                        <input type="hidden" value="{{ $value->product_name }}"
                            class="cart_product_name_{{ $value->product_id }}">
                        <input type="hidden" value="{{ $value->product_image }}"
                            class="cart_product_image_{{ $value->product_id }}">
                        <input type="hidden" value="{{ $value->product_price }}"
                            class="cart_product_price_{{ $value->product_id }}">
                        <input type="hidden" value="{{ $value->product_quantity }}"
                            class="cart_product_quantity_{{ $value->product_id }}">
                        <span>
                            <span>{{ number_format($value->product_price) . ' ' . 'VND' }}</span>
                            <label>Quantity:</label>
                            <input name="qty" type="number" min="1"
                                class="cart_product_qty_{{ $value->product_id }}" value="1" />
                            <input name="productid_hidden" type="hidden" value="{{ $value->product_id }}" />
                        </span>
                        <input type="button" value="Thêm giỏ hàng" class="btn btn-primary btn-sm add-to-cart"
                            data-id_product="{{ $value->product_id }}" name="add-to-cart">
                    </form>
                    <p><b>Số lượng Kho: </b>{{ $value->product_quantity }} Sản Phẩm</p>
                    <p><b>Tình Trạng: </b>
                        @if ($value->product_quantity > 1)
                            Còn hàng
                        @else
                            Tạm hết hàng
                        @endif
                    </p>
                    <p>
                    <h3>Màu sắc: Đen</h3>
                    </p>
                    <p>
                        <input type="radio" name="color" id="">
                        <input type="radio" name="color" id="">
                    </p>
                    <p>Size: XL</p>
                    <p><b>Thương Hiệu: </b>{{ $value->brand_name }}</p>
                    <p><b>Danh mục: </b>{{ $value->category_name }}</p>
                    <fieldset>
                        <legend>Tags</legend>
                        <p>
                            <i class="fa fa-tag"></i>
                            @php
                                $tags = $value->product_tag;
                                $tags = explode(',', $tags);
                            @endphp
                            @foreach ($tags as $tag)
                                @if ($tag != null)
                                    <a href="{{ asset('tag/' . Str::slug($tag)) }}" class="tag">{{ $tag }}</a>
                                @endif
                            @endforeach
                        </p>
                    </fieldset>
                    <a href=""><img src="{{ asset('frontend/images/product-details/share.png') }}"
                            class="share img-responsive" alt="" /></a>
                </div>
                <!--/product-information-->
            </div>
        </div>
        <!--/product-details-->
    @endforeach
    <div class="category-tab shop-details-tab">
        <!--category-tab-->
        <div class="col-sm-12">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#details" data-toggle="tab">Mô tả</a></li>
                <li><a href="#companyprofile" data-toggle="tab">Chi tiết sản phẩm</a></li>
                <li><a href="#tag" data-toggle="tab">Tag</a></li>
                <li><a href="#reviews" data-toggle="tab">Đánh giá ({{ $comment }})</a></li>
            </ul>
        </div>
        <div class="tab-content">
            <div class="tab-pane fade active in" id="details">
                <p>{!! $value->product_content !!}</p>
            </div>

            <div class="tab-pane fade" id="companyprofile">
                <p>{!! $value->product_desc !!}</p>
            </div>
            <div class="tab-pane fade" id="tag">
                <div class="col-sm-3">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="images/home/gallery1.jpg" alt="" />
                                <h2>$56</h2>
                                <p>Easy Polo Black Edition</p>
                                <button type="button" class="btn btn-default add-to-cart"><i
                                        class="fa fa-shopping-cart"></i>Add to cart</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade " id="reviews">
                <div class="col-sm-12">
                    <ul>
                        <li><a href=""><i class="fa fa-user"></i>EUGEN</a></li>
                        <li><a href=""><i class="fa fa-clock-o"></i>12:41 PM</a></li>
                        <li><a href=""><i class="fa fa-calendar-o"></i>31 DEC 2014</a></li>
                    </ul>
                    {{-- @if ($comment->status = 1) --}}
                    <form>
                        @csrf
                        <input type="hidden" name="comment_product_id" value="{{ $value->product_id }}"
                            class="comment_product_id">
                        <div class="card">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div id="comment_load"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <br>
                    {{-- @endif --}}
                    <p><b>Viết đánh giá của bạn:</b></p>
                    <form action="#">
                        <span>
                            <input class="comment_name" style="width:100%; margin-left: 0;border-radius: 20px;"
                                type="text" placeholder="Nhập tên" />
                        </span>
                        <textarea style="border-radius: 20px;" name="comment" class="comment_content" placeholder="Nhập nội dung"></textarea>
                        <div id="notify_comment"></div>
                        <div>
                            <b>Rating: </b>
                            <ul class="list-inline rating" title="Average rating"
                                style="display: contents; font-weight: bold;">
                                @for ($count = 1; $count <= 5; $count++)
                                    @php
                                        if ($count <= $rating) {
                                            $color = 'color:#ffcc00;';
                                        } else {
                                            $color = 'color:#ccc;';
                                        }
                                    @endphp
                                    <li title="Đánh giá sao" id="{{ $value->product_id }}-{{ $count }}"
                                        data-index="{{ $count }}" data-product_id="{{ $value->product_id }}"
                                        data-rating="{{ $rating }}" class="rating"
                                        style="cursor: pointer; {{ $color }} font-size: 30px">
                                        &#9733;
                                    </li>
                                @endfor
                                <li>({{ $rating }}đ/ {{ $reviews }}lượt)</li>
                            </ul>
                        </div>
                        <button type="button" class="btn btn-default pull-right send-comment">
                            Gửi bình luận
                        </button>
                    </form>
                </div>
            </div>

        </div>
    </div>
    <!--/category-tab-->

    <div class="recommended_items">
        <!--recommended_items-->
        <h2 class="title text-center">Sản phẩm liên quan</h2>
        <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <?php $i = 0; ?>
                @foreach ($related->chunk(3) as $chunk)
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

                                                    <input type="button" value="Thêm giỏ hàng"
                                                        class="btn btn-primary btn-sm add-to-cart"
                                                        data-id_product="{{ $lienquan->product_id }}" name="add-to-cart">
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
@endsection
