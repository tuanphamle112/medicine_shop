@extends('frontend.layouts.master')

@section('title', $frontendInfoWebsite->title)

@section('content')
   
    <div id="home-carousel" class="carousel carousel-home slide">
        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            <div class="active item">
                <section class="site-section site-section-light site-section-top themed-background-default">
                    <div class="container">
                        <p class="text-center bgimg animation-fadeIn">
                            <img src="images/guy.png" alt="Promo Image 1">
                            <img src="images/20-per-off-default.png" alt="Promo Image 1">
                        </p>
                    </div>
                </section>
            </div>
            <div class="item">
                <div class="media-container">
                    <section class="site-section site-section-light site-section-top">
                        <div class="container text-center bgimg2">
                            <h1 class="animation-slideDown"><strong>{{ __('Welcome to our Medicines Online Store!') }}</strong></h1>
                            <h2 class="h3 animation-slideUp hidden-xs">{{ __('Explore over 5.000 medicines and over 2000 doctors!') }}</h2>
                        </div>
                    </section>
                    <!-- For best results use an image with a resolution of 2560x279 pixels -->
                     <img src="images/store_home.jpg" alt="" class="media-image animation-pulseSlow">
                </div>
                
            </div>
            
        </div>
        <!-- END Wrapper for slides -->

        <!-- Controls -->
        <a class="left carousel-control" href="#home-carousel" data-slide="prev">
            <span>
                <i class="fa fa-chevron-left"></i>
            </span>
        </a>
        <a class="right carousel-control" href="#home-carousel" data-slide="next">
            <span>
                <i class="fa fa-chevron-right"></i>
            </span>
        </a>
        <!-- END Controls -->
    </div>
    <section class="site-section site-section-light site-section-top themed-background-dark">
        <div class="container">
            <h1 class="text-center animation-slideDown"><i class="fa fa-cogs"></i> <strong>{{ __('How it works') }}</strong></h1>
            <h2 class="h3 text-center animation-slideUp">{{ __('We can help you ') }}<strong>{{ __('feel better') }}</strong>!</h2>
        </div>
    </section>
    <!-- Step 1 Header -->
    <section class="site-content site-section site-section-light themed-background">
        <div class="container">
            <div class="site-block visibility-none" data-toggle="animation-appear" data-animation-class="animation-fadeInQuick" data-element-offset="-100">
                <h1 class="site-heading"><i class="fa fa-arrow-right"></i> <strong> {{ __('Step One') }}</strong></h1>
            </div>
        </div>
    </section>
    <!-- END Step 1 Header -->

    <!-- Step 1 -->
    <section class="site-content site-section site-slide-content">
        <div class="container">
            <div class="row visibility-none " data-toggle="animation-appear" data-animation-class="animation-fadeInQuick" data-element-offset="-100">
                <div class="col-sm-6 site-block">
                    <img src="images/searching.png" alt="Promo #1" class="img-responsive img1">
                </div>
                <div class="col-sm-6 col-md-5 col-md-offset-1 site-block">
                    <h3 class="h2 site-heading site-heading-promo"><strong>{{ __('Searching information') }}</strong></h3>
                    <p class="promo-content">{{ __("At first, find all you need and mark them all, with us, you don't have to remember anything, just click on your pills...") }}</p>
                </div>
            </div>
        </div>
    </section>
    <!-- END Step 1 -->

    <!-- Step 2 Header -->
    <section class="site-content site-section site-section-light themed-background">
        <div class="container">
            <div class="site-block visibility-none" data-toggle="animation-appear" data-animation-class="animation-fadeInQuick" data-element-offset="-100">
                <h1 class="site-heading"><i class="fa fa-arrow-right"></i> <strong> {{ __('Step Two') }}</strong></h1>
            </div>
        </div>
    </section>
    <!-- END Step 2 Header -->

    <!-- Step 2 -->
    <section class="site-content site-section site-slide-content">
        <div class="container">
            <div class="row visibility-none margin-left" data-toggle="animation-appear" data-animation-class="animation-fadeInQuick" data-element-offset="-100">
                <div class="col-sm-6 col-md-5 site-block">
                    <h3 class="h2 site-heading site-heading-promo"><strong>{{ __('Make prescription') }}</strong></h3>
                    <p class="promo-content"> {{ __('After choose pills part, you just need to make your own prescription from your pills box or searching and mark them') }}
                    </p>
                </div>
                <div class="col-sm-6 col-md-offset-1 site-block">
                <img src="images/write2.png" alt="Promo #2" class="img-responsive img2">
                </div>
            </div>
        </div>
    </section>
    <!-- END Step 2 -->

    <!-- Step 3 Header -->
    <section class="site-content site-section site-section-light themed-background">
        <div class="container">
            <div class="site-block visibility-none" data-toggle="animation-appear" data-animation-class="animation-fadeInQuick" data-element-offset="-100">
                <h1 class="site-heading"><i class="fa fa-arrow-right"></i> <strong> {{ __('Step Three') }}</strong></h1>
            </div>
        </div>
    </section>
    <!-- END Step 3 Header -->

    <!-- Step 3 -->
    <section class="site-content site-section site-slide-content">
        <div class="container">
            <div class="row visibility-none margin-left" data-toggle="animation-appear" data-animation-class="animation-fadeInQuick" data-element-offset="-100">
                <div class="col-sm-6 col-md-5 site-block">
                    <h3 class="h2 site-heading site-heading-promo"><strong>{{ __('Bring to doctor') }}</strong></h3>
                    <p class="promo-content">
                    {{ __("Bring your prescription to some doctor and get pills by it. By this way, you are your own 'health keeper'") }}
                    </p>
                </div>
                <div class="col-sm-6 col-md-offset-1 site-block">
                    <img src="images/enjoy.png" alt="Promo #4" class="img-responsive img3">
                </div>
            </div>
        </div>
    </section>
    <!-- END Step 3 -->

    @endsection

    @section('title', $frontendInfoWebsite->title)
