@extends('frontend.layouts.master')

@section('title', $parentCategory->name)

@section('content')
    
    <!-- Media Container -->
    <div class="media-container media2">
        <!-- For best results use an image with a resolution of 2560x279 pixels -->
        <div class="container banner-title">
            <h1 class="text-center animation-slideDown"><strong>{{ __('Our Work') }}</strong></h1>
            <h2 class="h3 text-center animation-slideUp">{{ __('We will be happy to work together and bring your ideas to life!') }}</h2>
        </div>
        <img src="/mountain.jpg" alt="Image" class="media-image animation-pulseSlow">
    </div>
    <!-- END Media Container -->
    <section class="site-content site-section">
        <div class="container">
            <div class="site-block">
                <form action="ecom_search_results.html" method="post">
                    <div class="input-group input-group-lg">
                        <input type="text" id="ecom-search" name="ecom-search" class="form-control text-center" placeholder="Search Store..">
                        <div class="input-group-btn">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                </form>
            </div>

            {{-- Slide products --}}
            <h2 class="site-heading"><strong>{{ __('Newest') }}</strong> {{ __('Medicines') }}</h2>
            <hr>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div id="Carousel" class="carousel slide">

                            <ol class="carousel-indicators">
                                <li data-target="#Carousel" data-slide-to="0" class="active"></li>
                                <li data-target="#Carousel" data-slide-to="1"></li>
                                <li data-target="#Carousel" data-slide-to="2"></li>
                            </ol>

                            <!-- Carousel items -->
                            <div class="carousel-inner">

                                <div class="item active">
                                    <div class="row">
                                      <div class="col-md-3"><a href="#" class="thumbnail"><img src="http://placehold.it/250x250" alt="Image" style="max-width:100%;"></a></div>
                                      <div class="col-md-3"><a href="#" class="thumbnail"><img src="http://placehold.it/250x250" alt="Image" style="max-width:100%;"></a></div>
                                      <div class="col-md-3"><a href="#" class="thumbnail"><img src="http://placehold.it/250x250" alt="Image" style="max-width:100%;"></a></div>
                                      <div class="col-md-3"><a href="#" class="thumbnail"><img src="http://placehold.it/250x250" alt="Image" style="max-width:100%;"></a></div>
                                  </div><!--.row-->
                              </div><!--.item-->

                              <div class="item">
                                <div class="row">
                                    <div class="col-sm-3 portfolio-item animation-fadeInQuick" data-category="design">
                                        <a href="portfolio_single.html">
                                            <img src="/medicines/2.jpeg" alt="Image" class="img-responsive-slider" >
                                            <span class="portfolio-item-info"><strong>Product #1</strong></span>
                                        </a>
                                    </div>
                                    <div class="col-sm-3 portfolio-item animation-fadeInQuick" data-category="design">
                                        <a href="portfolio_single.html">
                                            <img src="/medicines/2.jpeg" alt="Image" class="img-responsive-slider" >
                                            <span class="portfolio-item-info"><strong>Product #1</strong></span>
                                        </a>
                                    </div>
                                    <div class="col-md-3"><a href="#" class="thumbnail"><img src="http://placehold.it/250x250" alt="Image" style="max-width:100%;"></a></div>
                                    <div class="col-md-3"><a href="#" class="thumbnail"><img src="http://placehold.it/250x250" alt="Image" style="max-width:100%;"></a></div>
                                </div><!--.row-->
                            </div><!--.item-->

                            <div class="item">
                                <div class="row">
                                    <div class="col-sm-3 portfolio-item animation-fadeInQuick" data-category="design">
                                        <a href="portfolio_single.html">
                                            <img src="/medicines/2.jpeg" alt="Image" class="img-responsive-slider" >
                                            <span class="portfolio-item-info"><strong>Product #1</strong></span>
                                        </a>
                                    </div>
                                    <div class="col-sm-3 portfolio-item animation-fadeInQuick" data-category="design">
                                        <a href="portfolio_single.html">
                                            <img src="/medicines/2.jpeg" alt="Image" class="img-responsive-slider" >
                                            <span class="portfolio-item-info"><strong>Product #1</strong></span>
                                        </a>
                                    </div>
                                    <div class="col-sm-3 portfolio-item animation-fadeInQuick" data-category="design">
                                        <a href="portfolio_single.html">
                                            <img src="/medicines/2.jpeg" alt="Image" class="img-responsive-slider" >
                                            <span class="portfolio-item-info"><strong>Product #1</strong></span>
                                        </a>
                                    </div>
                                    <div class="col-sm-3 portfolio-item animation-fadeInQuick" data-category="design">
                                        <a href="portfolio_single.html">
                                            <img src="/medicines/2.jpeg" alt="Image" class="img-responsive-slider" >
                                            <span class="portfolio-item-info"><strong>Product #1</strong></span>
                                        </a>
                                    </div>
                                </div><!--.row-->
                            </div><!--.item-->

                        </div><!--.carousel-inner-->
                    </div><!--.Carousel-->

                </div>
            </div>
        </div><!--.container-->
        {{-- End slide --}}
        <div class="site-block text-center">
            <div class="btn-group portfolio-filter">
                <a href="javascript:void(0)" class="btn btn-primary active" data-category="all">{{ __('All') }}</a>
                <a href="javascript:void(0)" class="btn btn-primary" data-category="design">Submenu1</a>
                <a href="javascript:void(0)" class="btn btn-primary" data-category="development">Submenu2</a>
                <a href="javascript:void(0)" class="btn btn-primary" data-category="logo">Submenu3</a>
            </div>
        </div>

        <!-- END Portfolio Filter Links -->

        <!-- Portfolio Items -->
        <!-- Add the category value for each item in its data-category attribute (for the filter functionality) -->
        <div class="row portfolio">
            @include('frontend.components.item')
        </div>
        <!-- END Portfolio Items -->
    </div>
</section>
@endsection
