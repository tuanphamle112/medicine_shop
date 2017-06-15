@extends('frontend.layouts.master')

@section('title', $selectSubCate->name)

@section('content')

<!-- Media Container -->
<div class="media-container media2">
    <!-- For best results use an image with a resolution of 2560x279 pixels -->
    <div class="container banner-title">
        <h1 class="text-center animation-slideDown"><strong>{{ __('Our Work') }}</strong></h1>
        <h2 class="h3 text-center animation-slideUp">{{ __('We will be happy to work together and bring your ideas to life!') }}</h2>
    </div>
    <img src="/images/mountain.jpg" alt="Image" class="media-image animation-pulseSlow">
</div>
<!-- END Media Container -->
<section class="site-content site-section">
    @include('frontend.components.site-block-submenu')

    <div class="row portfolio">
        <div class="container-fluid">
            @include('frontend.components.item')
        </div>
        
    </div>

    <h2 class="site-heading"><strong>{{ __('Newest') }}</strong> {{ __('Medicines') }}</h2>
    <hr>
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
                        @foreach($SlideInCategoriesArrChunk[0] as $idValue)
                        @php 
                        $itemSlide = App\Eloquent\Medicine::GetAllFieldById($idValue);
                        $imageItemSlide = $itemSlide->getAllImages()->first();
                        @endphp
                        <div class="col-sm-3 portfolio-item animation-fadeInQuick" data-category="design">
                            <a href="{{ asset('detail'.'/'.$itemSlide->id.'/'.str_slug($itemSlide->name)) }}">
                                <img src="{{ asset($imageItemSlide->path_origin) }}" alt="Image" class="img-responsive-slider" >
                                <span class="portfolio-item-info"><strong>{{ $itemSlide->name }}</strong></span>
                            </a>
                        </div>
                        @endforeach
                    </div><!--.row-->
                    <div class="item">
                        @foreach($SlideInCategoriesArrChunk[1] as $idValue2)
                        @php 
                        $itemSlide2 = App\Eloquent\Medicine::GetAllFieldById($idValue2)->with('getAllImages')->first();
                        $imageItemSlide = $itemSlide2->getAllImages()->first();
                        @endphp
                        <div class="col-sm-3 portfolio-item animation-fadeInQuick" data-category="design">
                            <a href="{{ asset('detail'.'/'.$itemSlide2->id.'/'.str_slug($itemSlide2->name)) }}">
                                <img src="{{ asset($itemSlide2->getAllImages->first()->path_origin) }}" alt="Image" class="img-responsive-slider" >
                                <span class="portfolio-item-info"><strong>{{ $itemSlide2->name }}</strong></span>
                            </a>
                        </div>
                        @endforeach
                    </div><!--.row-->
                            {{-- <div class="item">
                                @foreach($ItemSlideInCategories as $ItemSlide)
                                <div class="col-sm-3 portfolio-item animation-fadeInQuick" data-category="design">
                                    <a href="portfolio_single.html">
                                        <img src="/medicines/2.jpeg" alt="Image" class="img-responsive-slider" >
                                        <span class="portfolio-item-info"><strong>{{ $ItemSlide->name }}</strong></span>
                                    </a>
                                </div>
                                @endforeach
                            </div><!--.row--> --}}
                        </div><!--.item-->
                    </div><!--.carousel-inner-->
                </div><!--.Carousel-->
            </div>
            {{-- End slide --}}
        </div>
    </section>
    @endsection