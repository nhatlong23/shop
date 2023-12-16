@extends('welcome')
@section('content')
    <!--Home Slider-->
    <section class="slideshow slideshow-wrapper">
        @include('pages.include.slider')
    </section>
    <!--End Home Slider-->

    <!--Banner Masonary-->
    <section class="collection-banners style1 d-none d-md-block d-lg-block">
        <div class="container">
            <div class="grid-masonary banner-grid grid-mr-20">
                <div class="grid-sizer col-md-4 col-lg-4"></div>
                <div class="row">
                    <div class="col-12 col-sm-6 col-md-4 col-lg-4 banner-item cl-item">
                        <div class="collection-grid-item">
                            <a href="shop-left-sidebar.html">
                                <div class="img">
                                    <img class="blur-up lazyload" data-src="assets/images/collection/demo1-banner1.webp"
                                        src="assets/images/collection/demo1-banner1.webp" alt="SUMMER" title="SUMMER"
                                        width="450" height="450" />
                                </div>
                                <div class="details center white-text">
                                    <div class="inner">
                                        <h3 class="title fs-3 mb-1">SUMMER</h3>
                                        <p>AHEAD OF THE TREND</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-4 col-lg-4 banner-item cl-item">
                        <div class="collection-grid-item">
                            <a href="shop-left-sidebar.html">
                                <div class="img">
                                    <img class="blur-up lazyload" data-src="assets/images/collection/demo1-banner2.webp"
                                        src="assets/images/collection/demo1-banner2.webp" alt="BOTTOM &amp; JEANS"
                                        title="BOTTOM &amp; JEANS" width="450" height="450" />
                                </div>
                                <div class="details center white-overlay rounded">
                                    <div class="inner">
                                        <h3 class="title mb-1">BOTTOM &amp; JEANS</h3>
                                        <p>CHILL TO THE MAX</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-4 col-lg-4 banner-item cl-item">
                        <div class="collection-grid-item">
                            <a href="shop-left-sidebar.html">
                                <div class="img">
                                    <img class="blur-up lazyload" data-src="assets/images/collection/demo1-banner3.webp"
                                        src="assets/images/collection/demo1-banner3.webp" alt="ACCESSORIES"
                                        title="ACCESSORIES" width="450" height="450" />
                                </div>
                                <div class="details center white-text">
                                    <div class="inner">
                                        <h3 class="title fs-3 mb-1">ACCESSORIES</h3>
                                        <p>BE THE MOST YOU</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End Banner Masonary-->

    <!--Best Seller-->
    <section class="section product-slider">
        <div class="container">
            <div class="row">
                <div class="col-12 section-header style1">
                    <div class="section-header-left">
                        <h2>BEST SELLER</h2>
                        <p>TOP SALE IN THIS WEEK</p>
                    </div>
                </div>
            </div>
            <form>
                @csrf
                <div class="grid-products">
                    <div class="row">
                        @foreach ($newProducts as $key => $product)
                            <input type="hidden" value="{{ $product->product_id }}"
                                class="cart_product_id_{{ $product->product_id }}">
                            <input type="hidden" id="wistlist_productname{{ $product->product_id }}"
                                value="{{ $product->product_name }}" class="cart_product_name_{{ $product->product_id }}">
                            <input type="hidden" value="{{ $product->product_image }}"
                                class="cart_product_image_{{ $product->product_id }}">
                            <input type="hidden" id="wistlist_productprice{{ $product->product_id }}"
                                value="{{ $product->product_price }}" class="cart_product_price_{{ $product->product_id }}">
                            <input type="hidden" value="1" class="cart_product_qty_{{ $product->product_id }}">
                            <input type="hidden" value="{{ $product->product_quantity }}"
                                class="cart_product_quantity_{{ $product->product_id }}">
                            <div class="item col-lg-3 col-md-4 col-6">
                                <!--Start Product Image-->
                                <div class="product-image">
                                    <!--Start Product Image-->
                                    <a href="{{ asset('detail-product/' . $product->slug) }}" class="product-img">
                                        <!--Image-->
                                        <img class="primary blur-up lazyload"
                                            data-src="{{ asset('uploads/product/' . $product->product_image) }}"
                                            src="{{ asset('uploads/product/' . $product->product_image) }}" alt="image" title=""
                                            width="800" height="960">
                                        <!--End image-->
                                        <!--Hover image-->
                                        <img class="hover blur-up lazyload"
                                            data-src="assets/images/products/product-6-1.jpg"
                                            src="assets/images/products/product-6-1.jpg" alt="image" title=""
                                            width="800" height="960">
                                        <!--End hover image-->
                                    </a>
                                    <!--end product image-->

                                    <!--Product Button-->
                                    <div class="button-set-top position-absolute style1">
                                        <!--Wishlist Button-->
                                        <a class="btn-icon wishlist add-to-wishlist rounded" href="my-wishlist.html">
                                            <i class="icon an an-heart-l"></i>
                                            <span class="tooltip-label">Add To Wishlist</span>
                                        </a>
                                        <!--End Wishlist Button-->
                                        <!--Quick View Button-->
                                        <a href="javascript:void(0)" title="Quick View"
                                            class="btn-icon quick-view-popup quick-view quickview rounded" data-toggle="modal"
                                            data-target="#content_quickview"
                                            data-id_product="{{ $product->product_id }}">
                                            <i class="icon an an-search-l"></i>
                                            <span class="tooltip-label">Quick View</span>
                                        </a>
                                        <!--End Quick View Button-->
                                        <!--Compare Button-->
                                        <a class="btn-icon compare add-to-compare rounded" href="compare-style2.html"
                                            title="Add to Compare">
                                            <i class="icon an an-sync-ar"></i>
                                            <span class="tooltip-label">Add to Compare</span>
                                        </a>
                                        <!--End Compare Button-->
                                    </div>
                                    <div class="button-set-bottom position-absolute style1">
                                        <!--Cart Button-->
                                        {{-- <a class="btn-icon btn btn-addto-cart pro-addtocart-popup rounded"
                                            href="#pro-addtocart-popup">
                                            <i class="icon an an-cart-l"></i> <span>Add To Cart</span>
                                        </a> --}}
                                        <button type="button" class="btn-icon btn btn-addto-cart rounded add-to-cart" name="add-to-cart"
                                            data-id_product="{{ $product->product_id }}">@lang('lang.add_to_cart')
                                        </button>
                                        <!--End Cart Button-->
                                    </div>
                                    <!--End Product Button-->
                                </div>
                                <!--End Product Image-->
                                <!--Start Product Details-->
                                <div class="product-details text-center">
                                    <!--Product Name-->
                                    <div class="product-name text-uppercase">
                                        <a href="{{ asset('detail-product/' . $product->slug) }}">{{ $product->product_name }}</a>
                                    </div>
                                    <!--End Product Name-->
                                    <!--Product Price-->
                                    <div class="product-price">
                                        <span class="price">{{ number_format($product->product_price) . ' ' . 'VND' }}</span>
                                    </div>
                                    <!--End Product Price-->
                                    <!--Product Review-->
                                    <div class="product-review">
                                        <i class="an an-star"></i>
                                        <i class="an an-star"></i>
                                        <i class="an an-star"></i>
                                        <i class="an an-star"></i>
                                        <i class="an an-star-o"></i>
                                    </div>
                                    <!--End Product Review-->
                                    <!--Color Variant -->
                                    <ul class="swatches">
                                        <li class="swatch small rounded navy"><span class="tooltip-label">Navy</span></li>
                                        <li class="swatch small rounded green"><span class="tooltip-label">Green</span>
                                        </li>
                                        <li class="swatch small rounded gray"><span class="tooltip-label">Gray</span></li>
                                        <li class="swatch small rounded aqua"><span class="tooltip-label">Aqua</span></li>
                                        <li class="swatch small rounded orange"><span class="tooltip-label">Orange</span>
                                        </li>
                                    </ul>
                                    <!--End Variant-->
                                </div>
                                <!--End Product Details-->
                            </div>
                        @endforeach
                    </div>
                    <div class="row">
                        <div class="col-12 text-center mt-3">
                            <a href="shop-left-sidebar.html" class="btn-primary btn-lg rounded">Shop All</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <!--End Best Seller-->

    <!--Testimonial Slider-->
    <section class="section testimonial-slider style1">
        <div class="container">
            <div class="row">
                <div class="col-12 section-header style1">
                    <div class="section-header-left">
                        <h2>Testimonials</h2>
                    </div>
                </div>
            </div>
            <div class="quote-wraper">
                <!--Testimonial Slider Items-->
                <div class="quotes-slider">
                    <div class="quotes-slide">
                        <blockquote class="quotes-slider__text text-center">
                            <div class="testimonial-image"><img class="blur-up lazyload"
                                    data-src="assets/images/testimonial-photo2.jpg"
                                    src="assets/images/testimonial-photo2.jpg" alt="Shetty Jamie" title="Shetty Jamie" />
                            </div>
                            <div class="rte-setting">
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
                                    has been the industry's standard dummy text ever since the 1500s.</p>
                            </div>
                            <div class="product-review">
                                <i class="an an-star"></i>
                                <i class="an an-star"></i>
                                <i class="an an-star"></i>
                                <i class="an an-star"></i>
                                <i class="an an-star"></i>
                            </div>
                            <p class="authour">Shetty Jamie,</p>
                            <p class="cmp-name">Kollision</p>
                        </blockquote>
                    </div>
                    <div class="quotes-slide">
                        <blockquote class="quotes-slider__text text-center">
                            <div class="testimonial-image"><img class="blur-up lazyload"
                                    data-src="assets/images/testimonial-photo3.jpg"
                                    src="assets/images/testimonial-photo3.jpg" alt="Sara Colinton"
                                    title="Sara Colinton" /></div>
                            <div class="rte-setting">
                                <p>Letraset sheets containing Lorem Ipsum passages, and more recently with desktop
                                    publishing software PageMaker including versions readable content page.</p>
                            </div>
                            <div class="product-review">
                                <i class="an an-star"></i>
                                <i class="an an-star"></i>
                                <i class="an an-star"></i>
                                <i class="an an-star"></i>
                                <i class="an an-star"></i>
                            </div>
                            <p class="authour">Sara Colinton,</p>
                            <p class="cmp-name">Pel</p>
                        </blockquote>
                    </div>
                    <div class="quotes-slide">
                        <blockquote class="quotes-slider__text text-center">
                            <div class="testimonial-image"><img class="blur-up lazyload"
                                    data-src="assets/images/testimonial-photo4.jpg"
                                    src="assets/images/testimonial-photo4.jpg" alt="Hamlet Tuong" title="Hamlet Tuong" />
                            </div>
                            <div class="rte-setting">
                                <p>Scrambled it to make a type specimen book. It has survived not only five centuries, but
                                    also the leap into electronic of remaining essentially 1960s.</p>
                            </div>
                            <div class="product-review">
                                <i class="an an-star"></i>
                                <i class="an an-star"></i>
                                <i class="an an-star"></i>
                                <i class="an an-star"></i>
                                <i class="an an-star gray-star"></i>
                            </div>
                            <p class="authour">Hamlet Tuong,</p>
                            <p class="cmp-name">OPL</p>
                        </blockquote>
                    </div>
                    <div class="quotes-slide">
                        <blockquote class="quotes-slider__text text-center">
                            <div class="testimonial-image"><img class="blur-up lazyload"
                                    data-src="assets/images/testimonial-photo1.jpg"
                                    src="assets/images/testimonial-photo1.jpg" alt="Shetty Jamie" title="Shetty Jamie" />
                            </div>
                            <div class="rte-setting">
                                <p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those
                                    interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum.</p>
                            </div>
                            <div class="product-review">
                                <i class="an an-star"></i>
                                <i class="an an-star"></i>
                                <i class="an an-star"></i>
                                <i class="an an-star"></i>
                                <i class="an an-star gray-star"></i>
                            </div>
                            <p class="authour">Happy Customer,</p>
                            <p class="cmp-name">CPL</p>
                        </blockquote>
                    </div>
                </div>
                <!--Testimonial Slider Items-->
            </div>
        </div>
    </section>
    <!--End Testimonial Slider-->

    <!--Store Feature-->
    <section class="store-features pb-0">
        <div class="container">
            <div class="row store-info">
                <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-3 my-sm-3">
                    <a class="d-flex clr-none" href="#">
                        <i class="an an-truck-l"></i>
                        <div class="detail">
                            <h5 class="fs-6 text-uppercase mb-1">Free Shipping &amp; Return</h5>
                            <p class="sub-text">Free shipping on all US orders</p>
                        </div>
                    </a>
                </div>
                <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-3 my-sm-3">
                    <a class="d-flex clr-none" href="#">
                        <i class="an an-dollar-sign-l"></i>
                        <div class="detail">
                            <h5 class="fs-6 text-uppercase mb-1">Money Guarantee</h5>
                            <p class="sub-text">30 days money back guarantee</p>
                        </div>
                    </a>
                </div>
                <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-3 my-sm-3">
                    <a class="d-flex clr-none" href="#">
                        <i class="an an-credit-card-l"></i>
                        <div class="detail">
                            <h5 class="fs-6 text-uppercase mb-1">Online Support</h5>
                            <p class="sub-text">We support online 24/7 on day</p>
                        </div>
                    </a>
                </div>
                <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-1 my-sm-3">
                    <a class="d-flex clr-none" href="#">
                        <i class="an an-award"></i>
                        <div class="detail">
                            <h5 class="fs-6 text-uppercase mb-1">Payment Security</h5>
                            <p class="sub-text">More than 8 different secure</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!--End Store Feature-->

    <!--Spring Summer Product Slider-->
    <section class="section product-slider">
        <div class="container">
            <div class="row">
                <div class="section-header text-uppercase col-12">
                    <h2>Spring Summer</h2>
                    <p>Shop The Latest</p>
                </div>
            </div>
            <div class="productSlider grid-products">
                <div class="item">
                    <!--Start Product Image-->
                    <div class="product-image">
                        <!--Start Product Image-->
                        <a href="product-layout1.html" class="product-img">
                            <!--Image-->
                            <img class="primary blur-up lazyload" data-src="assets/images/products/product-1.jpg"
                                src="assets/images/products/product-1.jpg" alt="image" title="" width="800"
                                height="960">
                            <!--End image-->
                            <!--Hover image-->
                            <img class="hover blur-up lazyload" data-src="assets/images/products/product-1-1.jpg"
                                src="assets/images/products/product-1-1.jpg" alt="image" title=""
                                width="800" height="960">
                            <!--End hover image-->
                        </a>
                        <!--end product image-->

                        <!--Countdown Timer-->
                        <div class="saleTime desktop" data-countdown="2029/03/01"></div>
                        <!--End Countdown Timer-->

                        <!--Product Button-->
                        <div class="button-set-top position-absolute style1">
                            <!--Wishlist Button-->
                            <a class="btn-icon wishlist add-to-wishlist rounded" href="my-wishlist.html">
                                <i class="icon an an-heart-l"></i>
                                <span class="tooltip-label">Add To Wishlist</span>
                            </a>
                            <!--End Wishlist Button-->
                            <!--Quick View Button-->
                            <a href="javascript:void(0)" title="Quick View"
                                class="btn-icon quick-view-popup quick-view rounded" data-toggle="modal"
                                data-target="#content_quickview">
                                <i class="icon an an-search-l"></i>
                                <span class="tooltip-label">Quick View</span>
                            </a>
                            <!--End Quick View Button-->
                            <!--Compare Button-->
                            <a class="btn-icon compare add-to-compare rounded" href="compare-style2.html"
                                title="Add to Compare">
                                <i class="icon an an-sync-ar"></i>
                                <span class="tooltip-label">Add to Compare</span>
                            </a>
                            <!--End Compare Button-->
                        </div>
                        <div class="button-set-bottom position-absolute style1">
                            <!--Cart Button-->
                            <a class="btn-icon btn btn-addto-cart pro-addtocart-popup rounded"
                                href="#pro-addtocart-popup">
                                <i class="icon an an-cart-l"></i> <span>Add To Cart</span>
                            </a>
                            <!--End Cart Button-->
                        </div>
                        <!--End Product Button-->
                    </div>
                    <!--End Product Image-->
                    <!--Start Product Details-->
                    <div class="product-details text-center">
                        <!--Product Name-->
                        <div class="product-name text-uppercase">
                            <a href="product-layout1.html">Floral Crop Top</a>
                        </div>
                        <!--End Product Name-->
                        <!--Product Price-->
                        <div class="product-price">
                            <span class="old-price">$199.00</span>
                            <span class="price">$219.00</span>
                        </div>
                        <!--End Product Price-->
                        <!--Product Review-->
                        <div class="product-review"><i class="an an-star"></i><i class="an an-star"></i><i
                                class="an an-star"></i><i class="an an-star"></i><i class="an an-star-o"></i></div>
                        <!--End Product Review-->
                        <!--Color Variant -->
                        <ul class="swatches">
                            <li class="swatch small rounded navy"><span class="tooltip-label">Navy</span></li>
                            <li class="swatch small rounded green"><span class="tooltip-label">Green</span></li>
                            <li class="swatch small rounded gray"><span class="tooltip-label">Gray</span></li>
                            <li class="swatch small rounded aqua"><span class="tooltip-label">Aqua</span></li>
                            <li class="swatch small rounded orange"><span class="tooltip-label">Orange</span></li>
                        </ul>
                        <!--End Variant-->
                    </div>
                    <!--End Product Details-->
                </div>
                <div class="item">
                    <!--Start Product Image-->
                    <div class="product-image">
                        <!--Start Product Image-->
                        <a href="product-layout1.html" class="product-img">
                            <!--Image-->
                            <img class="primary blur-up lazyload" data-src="assets/images/products/product-2.jpg"
                                src="assets/images/products/product-2.jpg" alt="image" title="" width="800"
                                height="960">
                            <!--End image-->
                            <!--Hover image-->
                            <img class="hover blur-up lazyload" data-src="assets/images/products/product-2-1.jpg"
                                src="assets/images/products/product-2-1.jpg" alt="image" title=""
                                width="800" height="960">
                            <!--End hover image-->
                            <!-- product label -->
                            <div class="product-labels"><span class="lbl on-sale rounded">Sale</span></div>
                            <!-- End product label -->
                        </a>
                        <!--End Product Image-->

                        <!--Product Button-->
                        <div class="button-set-top position-absolute style1">
                            <!--Wishlist Button-->
                            <a class="btn-icon wishlist add-to-wishlist rounded" href="my-wishlist.html">
                                <i class="icon an an-heart-l"></i>
                                <span class="tooltip-label">Add To Wishlist</span>
                            </a>
                            <!--End Wishlist Button-->
                            <!--Quick View Button-->
                            <a href="javascript:void(0)" title="Quick View"
                                class="btn-icon quick-view-popup quick-view rounded" data-toggle="modal"
                                data-target="#content_quickview">
                                <i class="icon an an-search-l"></i>
                                <span class="tooltip-label">Quick View</span>
                            </a>
                            <!--End Quick View Button-->
                            <!--Compare Button-->
                            <a class="btn-icon compare add-to-compare rounded" href="compare-style2.html"
                                title="Add to Compare">
                                <i class="icon an an-sync-ar"></i>
                                <span class="tooltip-label">Add to Compare</span>
                            </a>
                            <!--End Compare Button-->
                        </div>
                        <div class="button-set-bottom position-absolute style1">
                            <!--Cart Button-->
                            <a class="btn-icon btn btn-addto-cart pro-quickshop-popup rounded" href="#pro-quickshop2"
                                data-bs-toggle="offcanvas" data-bs-target="#pro-quickshop2"
                                aria-controls="pro-quickshop2">
                                <i class="icon an an-cart-l"></i> <span>Quick Shop</span>
                            </a>
                            <!--End Cart Button-->
                        </div>
                        <!--End Product Button-->

                        <!-- Product Quickshop Form -->
                        <div class="quickshop-content d-flex-center" data-bs-scroll="true" data-bs-backdrop="false"
                            tabindex="-1" id="pro-quickshop2">
                            <button type="button" class="btn-close text-reset ms-auto position-absolute top-0 end-0 m-1"
                                data-bs-dismiss="offcanvas" aria-label="Close"></button>
                            <div
                                class="offcanvas-body quickshop-variant h-100 d-flex align-items-start align-items-sm-center">
                                <form method="post" action="#" id="product_form_1053"
                                    class="product-form align-items-center text-center hidedropdown"
                                    accept-charset="UTF-8" enctype="multipart/form-data">
                                    <!-- Product Price -->
                                    <div class="product-single__price lh-1 mb-3 mt-0 mx-auto">
                                        <span class="visually-hidden">Regular price</span>
                                        <span class="product-price__sale--single">
                                            <span class="product-price-old-price d-none">$200.00</span><span
                                                class="product-price__price product-price__sale0">$199.00</span>
                                        </span>
                                    </div>
                                    <!-- End Product Price -->
                                    <!-- Swatches Color -->
                                    <div class="swatches-image swatch clearfix mb-3 swatch-0 option1"
                                        data-option-index="0">
                                        <div class="product-form__item">
                                            <label class="label d-flex justify-content-center">Color:<span
                                                    class="required d-none">*</span><span
                                                    class="slVariant ms-1 fw-bold">Yellow</span></label>
                                            <ul class="swatches d-flex-justify-center list-unstyled m-0 clearfix">
                                                <li data-value="Black"
                                                    class="swatch-element rounded-0 color black available active">
                                                    <label class="swatchLbl rounded-0 color small black"
                                                        title="Black"></label>
                                                    <span class="tooltip-label top">Black</span>
                                                </li>
                                                <li data-value="Peach"
                                                    class="swatch-element rounded-0 color pink available">
                                                    <label class="swatchLbl rounded-0 color small pink"
                                                        title="Pink"></label>
                                                    <span class="tooltip-label top">Pink</span>
                                                </li>
                                                <li data-value="White"
                                                    class="swatch-element rounded-0 color gray available">
                                                    <label class="swatchLbl rounded-0 color small gray"
                                                        title="gray"></label>
                                                    <span class="tooltip-label top">Gray</span>
                                                </li>
                                                <li data-value="Yellow"
                                                    class="swatch-element rounded-0 color yellow soldout">
                                                    <label class="swatchLbl rounded-0 color small yellow"
                                                        title="Yellow"></label>
                                                    <span class="tooltip-label top">Yellow</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- End Swatches Color -->
                                    <!-- Swatches Size -->
                                    <div class="swatch clearfix mb-3 swatch-1 option2" data-option-index="1">
                                        <div class="product-form__item">
                                            <label class="label d-flex justify-content-center">Size:<span
                                                    class="required d-none">*</span><span
                                                    class="slVariant ms-1 fw-bold">S</span></label>
                                            <ul class="swatches-size d-flex-justify-center list-unstyled m-0 clearfix">
                                                <li data-value="S" class="swatch-element s available active">
                                                    <label class="swatchLbl rounded-0 medium"
                                                        title="S">S</label><span class="tooltip-label">S</span>
                                                </li>
                                                <li data-value="M" class="swatch-element m available">
                                                    <label class="swatchLbl rounded-0 medium"
                                                        title="M">M</label><span class="tooltip-label">M</span>
                                                </li>
                                                <li data-value="L" class="swatch-element l available">
                                                    <label class="swatchLbl rounded-0 medium"
                                                        title="L">L</label><span class="tooltip-label">L</span>
                                                </li>
                                                <li data-value="XL" class="swatch-element xl available">
                                                    <label class="swatchLbl rounded-0 medium"
                                                        title="XL">XL</label><span class="tooltip-label">XL</span>
                                                </li>
                                                <li data-value="XS" class="swatch-element xs soldout">
                                                    <label class="swatchLbl rounded-0 medium"
                                                        title="XS">XS</label><span class="tooltip-label">XS</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- End Swatches Size -->
                                    <!-- Product Action -->
                                    <div class="product-form-submit mx-auto">
                                        <button type="submit" name="add"
                                            class="btn rounded product-form__cart-submit btn-small px-3"><span>Add to
                                                cart</span></button>
                                        <button type="submit" name="add"
                                            class="btn rounded product-form__sold-out btn-small px-3 d-none"
                                            disabled="disabled">Sold out</button>
                                        <button type="button" name="buy"
                                            class="btn rounded btn-outline-primary proceed-to-checkout btn-small px-3 d-none">Buy
                                            it now</button>
                                    </div>
                                    <!-- End Product Action -->
                                </form>
                            </div>
                        </div>
                        <!-- End Product Quickshop Form -->
                    </div>
                    <!--End Product Image-->
                    <!--Start Product Details-->
                    <div class="product-details text-center">
                        <!--Product Name-->
                        <div class="product-name text-uppercase">
                            <a href="product-layout1.html">Floral Crop Top</a>
                        </div>
                        <!--End Product Name-->
                        <!--Product Price-->
                        <div class="product-price">
                            <span class="price">$199.00</span>
                        </div>
                        <!--End Product Price-->
                        <!--Product Review-->
                        <div class="product-review">
                            <i class="an an-star"></i>
                            <i class="an an-star"></i>
                            <i class="an an-star"></i>
                            <i class="an an-star"></i>
                            <i class="an an-star"></i>
                        </div>
                        <!--End Product Review-->
                        <!--Color Variant-->
                        <ul class="swatches">
                            <li class="swatch small rounded black"><span class="tooltip-label">Black</span></li>
                            <li class="swatch small rounded navy"><span class="tooltip-label">Navy</span></li>
                            <li class="swatch small rounded purple"><span class="tooltip-label">Purple</span></li>
                        </ul>
                        <!--End Variant-->
                    </div>
                    <!--End Product Details-->
                </div>
                <div class="item">
                    <!--Start Product Image-->
                    <div class="product-image">
                        <!--Start Product Image-->
                        <a href="product-layout1.html" class="product-img">
                            <!--Image-->
                            <img class="primary blur-up lazyload" data-src="assets/images/products/product-3.jpg"
                                src="assets/images/products/product-3.jpg" alt="image" title="" width="800"
                                height="960">
                            <!--End image-->
                            <!--Hover image-->
                            <img class="hover blur-up lazyload" data-src="assets/images/products/product-3-1.jpg"
                                src="assets/images/products/product-3-1.jpg" alt="image" title=""
                                width="800" height="960">
                            <!--End hover image-->
                        </a>
                        <!--End Product Image-->
                        <!--Product label-->
                        <div class="product-labels"><span class="lbl pr-label1 rounded">New</span></div>
                        <!--Product label-->

                        <!--Product Button-->
                        <div class="button-set-top position-absolute style1">
                            <!--Wishlist Button-->
                            <a class="btn-icon wishlist add-to-wishlist rounded" href="my-wishlist.html">
                                <i class="icon an an-heart-l"></i>
                                <span class="tooltip-label">Add To Wishlist</span>
                            </a>
                            <!--End Wishlist Button-->
                            <!--Quick View Button-->
                            <a href="javascript:void(0)" title="Quick View"
                                class="btn-icon quick-view-popup quick-view rounded" data-toggle="modal"
                                data-target="#content_quickview">
                                <i class="icon an an-search-l"></i>
                                <span class="tooltip-label">Quick View</span>
                            </a>
                            <!--End Quick View Button-->
                            <!--Compare Button-->
                            <a class="btn-icon compare add-to-compare rounded" href="compare-style2.html"
                                title="Add to Compare">
                                <i class="icon an an-sync-ar"></i>
                                <span class="tooltip-label">Add to Compare</span>
                            </a>
                            <!--End Compare Button-->
                        </div>
                        <div class="button-set-bottom position-absolute style1">
                            <!--Cart Button-->
                            <a class="btn-icon btn btn-addto-cart pro-addtocart-popup rounded"
                                href="#pro-addtocart-popup">
                                <i class="icon an an-cart-l"></i> <span>Add To Cart</span>
                            </a>
                            <!--End Cart Button-->
                        </div>
                        <!--End Product Button-->
                    </div>
                    <!--End Product Image-->
                    <!--Start Product Details-->
                    <div class="product-details text-center">
                        <!--Product Name-->
                        <div class="product-name text-uppercase">
                            <a href="product-layout1.html">Ditsy Floral Dress</a>
                        </div>
                        <!--End Product Name-->
                        <!--Product Price-->
                        <div class="product-price">
                            <span class="price">$99.00</span>
                        </div>
                        <!--End Product Price-->
                        <!--Product Review-->
                        <div class="product-review">
                            <i class="an an-star"></i>
                            <i class="an an-star"></i>
                            <i class="an an-star"></i>
                            <i class="an an-star"></i>
                            <i class="an an-star-o"></i>
                        </div>
                        <!--End Product Review-->
                        <!--Color Variant-->
                        <ul class="swatches">
                            <li class="swatch small rounded red"><span class="tooltip-label">red</span></li>
                            <li class="swatch small rounded orange"><span class="tooltip-label">orange</span></li>
                            <li class="swatch small rounded yellow"><span class="tooltip-label">yellow</span></li>
                        </ul>
                        <!--End Variant-->
                    </div>
                    <!--End Product Details-->
                </div>
                <div class="item">
                    <!--Start Product Image-->
                    <div class="product-image">
                        <!--Start Product Image-->
                        <a href="product-outofstock.html" class="product-img">
                            <!--Image-->
                            <img class="primary blur-up lazyload" data-src="assets/images/products/product-4.jpg"
                                src="assets/images/products/product-4.jpg" alt="image" title="" width="800"
                                height="960">
                            <!--End image-->
                            <!--Hover image-->
                            <img class="hover blur-up lazyload" data-src="assets/images/products/product-4-1.jpg"
                                src="assets/images/products/product-4-1.jpg" alt="image" title=""
                                width="800" height="960">
                            <!--End hover image-->
                            <span class="sold-out"><span class="rounded">Sold out</span></span>
                        </a>
                        <!--End Product Image-->
                    </div>
                    <!--End Product Image-->
                    <!--Start Product Details-->
                    <div class="product-details text-center">
                        <!--Product Name-->
                        <div class="product-name text-uppercase">
                            <a href="product-outofstock.html">Trim Button Front Blouse</a>
                        </div>
                        <!--End Product Name-->
                        <!--Product Price-->
                        <div class="product-price">
                            <span class="price">$199.00</span>
                        </div>
                        <!--End Product Price-->
                        <!--Product Review-->
                        <div class="product-review">
                            <i class="an an-star"></i>
                            <i class="an an-star"></i>
                            <i class="an an-star-o"></i>
                            <i class="an an-star-o"></i>
                            <i class="an an-star-o"></i>
                        </div>
                        <!--End Product Review-->
                        <!--Color Variant-->
                        <ul class="swatches">
                            <li class="swatch small rounded black"><span class="tooltip-label">black</span></li>
                            <li class="swatch small rounded navy"><span class="tooltip-label">navy</span></li>
                            <li class="swatch small rounded darkgreen"><span class="tooltip-label">darkgreen</span></li>
                        </ul>
                        <!--End Variant-->
                    </div>
                    <!--End Product Details-->
                </div>
                <div class="item">
                    <!--Start Product Image-->
                    <div class="product-image">
                        <!--Start Product Image-->
                        <a href="product-layout1.html" class="product-img">
                            <!--Image-->
                            <img class="primary blur-up lazyload" data-src="assets/images/products/product-5.jpg"
                                src="assets/images/products/product-5.jpg" alt="image" title="" width="800"
                                height="960">
                            <!--End image-->
                            <!--Hover image-->
                            <img class="hover blur-up lazyload" data-src="assets/images/products/product-5-1.jpg"
                                src="assets/images/products/product-5-1.jpg" alt="image" title=""
                                width="800" height="960">
                            <!--End hover image-->
                        </a>
                        <!--End Product Image-->

                        <!--Product Button-->
                        <div class="button-set-top position-absolute style1">
                            <!--Wishlist Button-->
                            <a class="btn-icon wishlist add-to-wishlist rounded" href="my-wishlist.html">
                                <i class="icon an an-heart-l"></i>
                                <span class="tooltip-label">Add To Wishlist</span>
                            </a>
                            <!--End Wishlist Button-->
                            <!--Quick View Button-->
                            <a href="javascript:void(0)" title="Quick View"
                                class="btn-icon quick-view-popup quick-view rounded" data-toggle="modal"
                                data-target="#content_quickview">
                                <i class="icon an an-search-l"></i>
                                <span class="tooltip-label">Quick View</span>
                            </a>
                            <!--End Quick View Button-->
                            <!--Compare Button-->
                            <a class="btn-icon compare add-to-compare rounded" href="compare-style2.html"
                                title="Add to Compare">
                                <i class="icon an an-sync-ar"></i>
                                <span class="tooltip-label">Add to Compare</span>
                            </a>
                            <!--End Compare Button-->
                        </div>
                        <div class="button-set-bottom position-absolute style1">
                            <!--Cart Button-->
                            <a class="btn-icon btn btn-addto-cart pro-addtocart-popup rounded"
                                href="#pro-addtocart-popup">
                                <i class="icon an an-cart-l"></i> <span>Add To Cart</span>
                            </a>
                            <!--End Cart Button-->
                        </div>
                        <!--End Product Button-->
                    </div>
                    <!--End Product Image-->
                    <!--Start Product Details-->
                    <div class="product-details text-center">
                        <!--Product Name-->
                        <div class="product-name text-uppercase">
                            <a href="product-layout1.html">Bodysuit Black</a>
                        </div>
                        <!--End Product Name-->
                        <!--Product Price-->
                        <div class="product-price">
                            <span class="price">$149.00</span>
                        </div>
                        <!--End Product Price-->
                        <!--Product Review-->
                        <div class="product-review">
                            <i class="an an-star"></i>
                            <i class="an an-star"></i>
                            <i class="an an-star"></i>
                            <i class="an an-star"></i>
                            <i class="an an-star-o"></i>
                        </div>
                        <!--End Product Review-->
                        <!--Color Variant-->
                        <ul class="swatches">
                            <li class="swatch small rounded black"><span class="tooltip-label">black</span></li>
                            <li class="swatch small rounded maroon"><span class="tooltip-label">maroon</span></li>
                        </ul>
                        <!--End Variant-->
                    </div>
                    <!--End Product Details-->
                </div>
            </div>
        </div>
    </section>
    <!--End Spring Summer Product Slider-->

    <!--Banner Masonary-->
    <section class="collection-banners style1 mt-0">
        <div class="container">
            <div class="grid-masonary banner-grid">
                <div class="grid-sizer col-12 col-sm-12 col-md-6 col-lg-6"></div>
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 banner-item">
                        <div class="collection-grid-item">
                            <a href="shop-left-sidebar.html">
                                <div class="img">
                                    <img class="blur-up lazyload" data-src="assets/images/collection/demo1-banner4.webp"
                                        src="assets/images/collection/demo1-banner4.webp" alt="STREETSTYLE"
                                        title="STREETSTYLE" width="800" height="518" />
                                </div>
                                <div class="details center w-50 white-overlay rounded">
                                    <div class="inner">
                                        <p class="mb-0">NEW COLLECTION</p>
                                        <h3 class="title mt-1 fs-3 redText">STREETSTYLE</h3>
                                        <span class="btn-primary rounded mt-3">Shop now</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 banner-item">
                        <div class="collection-grid-item">
                            <a href="shop-left-sidebar.html">
                                <div class="img">
                                    <img class="blur-up lazyload" data-src="assets/images/collection/demo1-banner5.webp"
                                        src="assets/images/collection/demo1-banner5.webp" alt="BOTTOM &amp; JEANS"
                                        title="BOTTOM &amp; JEANS" width="800" height="518" />
                                </div>
                                <div class="details center w-70 white-text rounded middle">
                                    <div class="inner">
                                        <p class="mb-0 fs-5">SUMMER SALE OFFERS</p>
                                        <h3 class="title large-title mb-2 mt-1">70% OFF</h3>
                                        <p class="btn--link text-center fs-6">Shop the collection</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End Banner Masonary-->

    <!--Blog Post-->
    <section class="section home-blog-post">
        <div class="container">
            <div class="section-header">
                <h2>Fresh From Our Blog</h2>
                <p>TOP NEWS STORIES OF THE DAY</p>
            </div>
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="blog-post-slider">
                        <div class="blogpost-item">
                            <a href="blog-single-post.html" class="post-thumb">
                                <img class="blur-up lazyload" src="assets/images/blog/post-1.jpg"
                                    data-src="assets/images/blog/post-1.jpg" width="380" height="205"
                                    alt="image" title="" />
                            </a>
                            <div class="post-detail">
                                <h3 class="post-title mb-3"><a href="blog-single-post.html">Unique Designs, Unique
                                        You</a></h3>
                                <ul class="publish-detail d-flex-center mb-3">
                                    <li class="d-flex align-items-center"><i class="an an-calendar me-2"></i> <span
                                            class="article__date">March 06, 2021</span></li>
                                    <li class="d-flex align-items-center"><i class="an an-comments-l me-2"></i> <a
                                            href="#;" class="article-link">1 comment</a></li>
                                </ul>
                                <p class="exceprt">There are many variations of passages of Lorem Ipsum available, but the
                                    majority have suffered alteration in some form, by injected humour, or rand...</p>
                                <a href="blog-single-post.html" class="btn-small">Read more</a>
                            </div>
                        </div>
                        <div class="blogpost-item">
                            <a href="blog-single-post.html" class="post-thumb">
                                <img class="blur-up lazyload" src="assets/images/blog/post-2.jpg"
                                    data-src="assets/images/blog/post-2.jpg" width="380" height="205"
                                    alt="image" title="" />
                            </a>
                            <div class="post-detail">
                                <h3 class="post-title mb-3"><a href="blog-single-post.html">Intelligent beautiful HTML
                                        template</a></h3>
                                <ul class="publish-detail d-flex-center mb-3">
                                    <li class="d-flex align-items-center"><i class="an an-calendar me-2"></i> <span
                                            class="article__date">March 25, 2021</span></li>
                                    <li class="d-flex align-items-center"><i class="an an-comments-l me-2"></i> <a
                                            href="#;" class="article-link">10 comment</a></li>
                                </ul>
                                <p class="exceprt">There are many variations of passages of Lorem Ipsum available, but the
                                    majority have suffered alteration in some form, by injected humour, or rand...</p>
                                <a href="blog-single-post.html" class="btn-small">Read more</a>
                            </div>
                        </div>
                        <div class="blogpost-item">
                            <a href="blog-single-post.html" class="post-thumb">
                                <img class="blur-up lazyload" src="assets/images/blog/post-3.jpg"
                                    data-src="assets/images/blog/post-3.jpg" width="380" height="205"
                                    alt="image" title="" />
                            </a>
                            <div class="post-detail">
                                <h3 class="post-title mb-3"><a href="blog-single-post.html">Creative, flexible and
                                        affordable</a></h3>
                                <ul class="publish-detail d-flex-center mb-3">
                                    <li class="d-flex align-items-center"><i class="an an-calendar me-2"></i> <span
                                            class="article__date">January 25, 2021</span></li>
                                    <li class="d-flex align-items-center"><i class="an an-comments-l me-2"></i> <a
                                            href="#;" class="article-link">0 comment</a></li>
                                </ul>
                                <p class="exceprt">There are many variations of passages of Lorem Ipsum available, but the
                                    majority have suffered alteration in some form, by injected humour, or rand...</p>
                                <a href="blog-single-post.html" class="btn-small">Read more</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End Blog Post-->

    <!--Brand Logo Slider-->
    <section class="section logo-section pt-2">
        <div class="container">
            <div class="section-header d-none">
                <h2>Our Brands</h2>
                <p>Lorem ipsum dolor sit amet</p>
            </div>
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="logo-bar">
                        <div class="logo-bar__item">
                            <a href="brands-style2.html"><img class="blur-up lazyload"
                                    data-src="assets/images/logo/brandlogo1.png" src="assets/images/logo/brandlogo1.png"
                                    alt="brand" title="" /></a>
                        </div>
                        <div class="logo-bar__item">
                            <a href="brands-style2.html"><img class="blur-up lazyload"
                                    data-src="assets/images/logo/brandlogo2.png" src="assets/images/logo/brandlogo2.png"
                                    alt="brand" title="" /></a>
                        </div>
                        <div class="logo-bar__item">
                            <a href="brands-style2.html"><img class="blur-up lazyload"
                                    data-src="assets/images/logo/brandlogo3.png" src="assets/images/logo/brandlogo3.png"
                                    alt="brand" title="" /></a>
                        </div>
                        <div class="logo-bar__item">
                            <a href="brands-style2.html"><img class="blur-up lazyload"
                                    data-src="assets/images/logo/brandlogo4.png" src="assets/images/logo/brandlogo4.png"
                                    alt="brand" title="" /></a>
                        </div>
                        <div class="logo-bar__item">
                            <a href="brands-style2.html"><img class="blur-up lazyload"
                                    data-src="assets/images/logo/brandlogo5.png" src="assets/images/logo/brandlogo5.png"
                                    alt="brand" title="" /></a>
                        </div>
                        <div class="logo-bar__item">
                            <a href="brands-style2.html"><img class="blur-up lazyload"
                                    data-src="assets/images/logo/brandlogo6.png" src="assets/images/logo/brandlogo6.png"
                                    alt="brand" title="" /></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End Brand Logo Slider-->
@endsection
