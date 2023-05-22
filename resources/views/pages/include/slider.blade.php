    <!--slider-->
    <section id="slider">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
                            <li data-target="#slider-carousel" data-slide-to="1"></li>
                        </ol>
                        <div class="carousel-inner">
                            @php
                                $i = 0;
                            @endphp
                            @foreach ($slider as $key => $slider)
                                @php
                                    $i++;
                                @endphp
                                <div class="item {{ $i == 1 ? 'active' : '' }}">
                                    <div class="col-sm-12">
                                        <img alt="{{ $slider->slider_desc }}"
                                            src="uploads/slider/{{ $slider->slider_image }}" height="100"
                                            width="800x" class="img img-responsive" />
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                            <i class="fa fa-angle-left"></i>
                        </a>
                        <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/slider-->
