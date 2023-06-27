<div class="left-sidebar">
    <h2>Danh Mục</h2>
    <div class="panel-group category-products" id="accordian">
        <!--category-productsr-->
        @php
            $hasChildren = false;
        @endphp
        @foreach ($category as $key => $cate)
            <div class="panel panel-default">
                @if ($cate->category_parent == 0)
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a href="{{ asset('category-product/' . $cate->slug) }}">
                                @php
                                    $hasChildren = false;
                                @endphp
                                @foreach ($category as $key => $subcate)
                                    @if ($subcate->category_parent == $cate->category_id)
                                        @php
                                            $hasChildren = true;
                                        @endphp
                                    @break
                                @endif
                            @endforeach
                            @if ($hasChildren)
                                <span data-toggle="collapse" data-parent="#accordian" href="#{{ $cate->slug }}"
                                    class="badge pull-right">
                                    <i class="fa fa-plus"></i>
                                </span>
                            @endif
                            {{ $cate->category_name }}
                        </a>
                    </h4>
                </div>
                <div id="{{ $cate->slug }}" class="panel-collapse collapse">
                    <div class="panel-body">
                        <ul>
                            @foreach ($category as $key => $subcate)
                                @if ($subcate->category_parent == $cate->category_id)
                                    <li><a href="{{ asset('category-product/' . $subcate->slug) }}">{{ $subcate->category_name }}
                                        </a></li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif
        </div>
    @endforeach
</div>
<!--/category-products-->

<div class="brands_products">
    <!--brands_products-->
    <h2>Thương Hiệu</h2>
    <div class="brands-name">
        <ul class="nav nav-pills nav-stacked">
            @foreach ($brand as $key => $brand)
                <ul class="nav nav-pills nav-stacked">
                    <li><a href="{{ asset('brand-product/' . $brand->slug) }}"> <span
                                class="pull-right">(50)</span>{{ $brand->brand_name }}</a></li>
                </ul>
            @endforeach
        </ul>
    </div>
</div>
<!--/brands_products-->

<div class="brands_products">
    <h2>Yêu thích</h2>
    <div class="brands-name">
        <div id="row_wishlist" class="row" ></div>
    </div>
</div>
{{-- wistlist --}}

<div class="shipping text-center">
        <!--shipping-->
        <img src="{{ asset('fontend/images/home/shipping.jpg') }}" alt="" />
    </div>
    <!--/shipping-->

</div>
