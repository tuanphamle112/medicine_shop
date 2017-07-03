@extends('frontend.layouts.master')
@section('custom-css')
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/template_medicio/cubeportfolio.min.css') }}">
    <link href="{{ asset('/css/template_medicio/animate.css') }}" rel="stylesheet" />
    <link href="{{ asset('/css/template_medicio/style.css') }}" rel="stylesheet">
    <link id="t-colors" href="{{ asset('/css/template_medicio/default.css') }}" rel="stylesheet">
@endsection

@section('title', $frontendInfoWebsite->title)

@section('content')
<body id="page-top" data-spy="scroll" data-target=".navbar-custom">

    <div id="wrapper">

        <!-- Section: intro -->
        <section id="intro" class="intro">
            <div class="intro-content">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="wow fadeInDown" data-wow-offset="0" data-wow-delay="0.1s">
                                <h2 class="h-ultra">{{ __('Framgia Medicines') }}</h2>
                            </div>
                            <div class="wow fadeInUp" data-wow-offset="0" data-wow-delay="0.1s">
                                <h4 class="h-light">{{ __('Provide best quality healthcare for you') }}</h4>
                            </div>
                            <div class="well well-trans">
                                <div class="wow fadeInRight" data-wow-delay="0.1s">

                                    <ul class="lead-list">
                                        <li>
                                            <span class="fa fa-check fa-2x icon-success"></span>
                                            <span class="list">
                                                <strong>{{ __('Easy way to know about your health condition') }}</strong>
                                                <br />{{ __("Don't have to go so far, we have a thousand doctors") }} 
                                            </span>
                                        </li>
                                        <li>
                                            <span class="fa fa-check fa-2x icon-success"></span>
                                            <span class="list">
                                                <strong>{{ __('Choose your favourite doctor') }}</strong><br/> {{ __('Doctors with at least five years experience') }}
                                            </span>
                                        </li>
                                        <li>
                                            <span class="fa fa-check fa-2x icon-success"></span>
                                            <span class="list">
                                                <strong>{{ __('Asking whatever you want') }}</strong>
                                                <br />{{ __("Just asking whatever you want, we'll give response as soon as posible") }}
                                            </span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.2s">
                                <img src="/images/template_medicio/img/dummy/img-1.png" class="img-responsive" alt="" />
                            </div>
                        </div>                  
                    </div>      
                </div>
            </div>      
        </section>

        <!-- /Section: intro -->

        <!-- Section: boxes -->
        <section id="boxes" class="home-section paddingtop-80">

            <div class="container">
                <div class="row">
                    <div class="col-sm-3 col-md-3">
                        <div class="wow fadeInUp" data-wow-delay="0.2s">
                            <div class="box text-center">

                                <i class="fa fa-user-md fa-3x circled bg-skin"></i>
                                <h4 class="h-bold">{{ __('Help by specialist') }}</h4>
                                <p>
                                    {{ __('Easy way to know about your heath condition, you can make a request to docdors about your heath . Contact to him and talk about your illness.') }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3 col-md-3">
                        <div class="wow fadeInUp" data-wow-delay="0.2s">
                            <div class="box text-center">

                                <i class="fa fa-list-alt fa-3x circled bg-skin"></i>
                                <h4 class="h-bold">{{ __('waiting for response') }}</h4>
                                <p>
                                    {{ __('After make a request,our doctors will reply and give suggestion') }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3 col-md-3">
                        <div class="wow fadeInUp" data-wow-delay="0.2s">
                            <div class="box text-center">
                                <i class="fa fa-hospital-o fa-3x circled bg-skin"></i>
                                <h4 class="h-bold">{{ __('Get the prescription') }}</h4>
                                <p>
                                    {{ __("You'll recieve a prescription after doctors know about your heath condition") }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3 col-md-3">
                        <div class="wow fadeInUp" data-wow-delay="0.2s">
                            <div class="box text-center">

                                <i class="fa fa-check fa-3x circled bg-skin"></i>
                                <h4 class="h-bold">{{ __('Enjoy it') }}</h4>
                                <p>
                                   {{ __("Now, you have to go NOwhere, stay at home and we'll bring it to you. ") }} <strong>{{ __('Get well soon!') }}</strong>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>
        <!-- /Section: boxes -->
        <section id="callaction" class="home-section paddingtop-40">    
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="callaction bg-gray">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="wow fadeInUp" data-wow-delay="0.1s">
                                        <div class="cta-text">
                                            <h3>{{ __('So what can we do?') }}</h3>
                                            <p>{{ __("Here's 'the things' that we can do") }} </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>  
        <!-- Section: services -->
        <section id="service" class="home-section nopadding paddingtop-60">

            <div class="container">

                <div class="row">
                    <div class="col-sm-6 col-md-6">
                        <div class="wow fadeInUp" data-wow-delay="0.2s">
                            <img src="/images/template_medicio/img/dummy/img-1.jpg" class="img-responsive" alt="" />
                        </div>
                    </div>
                    <div class="col-sm-3 col-md-3">

                        <div class="wow fadeInRight" data-wow-delay="0.1s">
                            <div class="service-box">
                                <div class="service-icon">
                                    <span class="fa fa-stethoscope fa-3x"></span> 
                                </div>
                                <div class="service-desc">
                                    <h5 class="h-light">{{ __('Medical checkup') }}</h5>
                                    <p>{{ __('Make a request and tell some doctor about your illness') }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="wow fadeInRight" data-wow-delay="0.2s">
                            <div class="service-box">
                                <div class="service-icon">
                                    <span class="fa fa-shopping-cart fa-3x"></span> 
                                </div>
                                <div class="service-desc">
                                    <h5 class="h-light">{{ __('Get online medicines') }}</h5>
                                    <p>{{ __('Some medicines that able to buy by make an order way') }}y</p>
                                </div>
                            </div>
                        </div>
                        <div class="wow fadeInRight" data-wow-delay="0.3s">
                            <div class="service-box">
                                <div class="service-icon">
                                    <span class="fa fa-user-md fa-3x"></span> 
                                </div>
                                <div class="service-desc">
                                    <h5 class="h-light">{{ __('Informations ') }}</h5>
                                    <p>{{ __('Check out doctors, or other users profile by just one click') }}</p>
                                </div>
                            </div>
                        </div>


                    </div>
                    <div class="col-sm-3 col-md-3">
                        <div class="wow fadeInRight" data-wow-delay="0.1s">
                            <div class="service-box">
                                <div class="service-icon">
                                    <span class="fa fa-truck fa-3x"></span> 
                                </div>
                                <div class="service-desc">
                                    <h5 class="h-light">{{ __('Order') }}</h5>
                                    <p>{{ __('Order directly medicines able to buy.') }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="wow fadeInRight" data-wow-delay="0.2s">
                            <div class="service-box">
                                <div class="service-icon">
                                    <span class="fa fa-medkit fa-3x"></span> 
                                </div>
                                <div class="service-desc">
                                    <h5 class="h-light">{{ __('Medical box') }}</h5>
                                    <p>{{ __('Easy way to mark some medicines in case of need.') }}</p>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>      
            </div>
        </section>
        <!-- /Section: services -->

        <!-- Section: team -->
        <section id="doctor" class="home-section bg-gray paddingbot-60">
            <div class="container marginbot-50">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="wow fadeInDown" data-wow-delay="0.1s">
                            <div class="section-heading text-center">
                                <h2 class="h-bold">{{ __('Doctors') }}</h2>
                                <p>{{ __('Doctors with high trust') }}</p>
                            </div>
                        </div>
                        <div class="divider-short"></div>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-lg-12">

                        <div id="filters-container" class="cbp-l-filters-alignLeft">
                            <div data-filter="*" class="cbp-filter-item-active cbp-filter-item">{{ __('All') }} (<div class="cbp-filter-counter"></div>)</div>
                            @php
                                $check = [];
                            @endphp
                            @foreach($doctor_list as $value_doctor_list)
                                @if( !empty($value_doctor_list->specialize))
                                    @if(in_array($value_doctor_list->specialize, $check))
                                        @continue;
                                    @else
                                        @php
                                            $check[] = $value_doctor_list->specialize ;
                                        @endphp
                                    @endif
                                    
                                    <div data-filter=".{{ str_slug($value_doctor_list->specialize) }}" class="cbp-filter-item">{{ $value_doctor_list->specialize }}(<div class="cbp-filter-counter"></div>)</div>
                                @else
                                    @continue;
                                @endif
                            @endforeach
                        </div>

                        <div id="grid-container" class="cbp-l-grid-team">
                            <ul>
                            @foreach($doctor_list as $value_doctor_list)
                           
                                @if(empty($value_doctor_list->specialize))
                                    @continue;
                                @else
                                    <li class="cbp-item {{ str_slug($value_doctor_list->specialize) }}">
                                        <a href="{{ route('frontend.user.different.profiles',[$value_doctor_list->id, str_slug($value_doctor_list->display_name)]) }}" class="cbp-caption">
                                            <div class="cbp-caption-defaultWrap">
                                                <img src="{{ App\Helpers\Helper::getLinkUserAvatar($value_doctor_list->avatar) }}" alt="" width="100%">
                                            </div>
                                            <div class="cbp-caption-activeWrap">
                                                <div class="cbp-l-caption-alignCenter">
                                                    <div class="cbp-l-caption-body">
                                                        <div class="cbp-l-caption-text">{{ __('VIEW PROFILE') }}</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="{{ route('frontend.user.different.profiles', [$value_doctor_list->id, str_slug($value_doctor_list->display_name)]) }}" class="cbp-l-grid-team-name">{{ $value_doctor_list->display_name }}</a>
                                        <div class="cbp-l-grid-team-position">{{ $value_doctor_list->specialize }}</div>
                                    </li>
                                @endif
                            @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </section>
        <!-- /Section: team -->
        <!-- Section: testimonial -->
        <section id="testimonial" class="home-section parallax" data-stellar-background-ratio="0.5">

            <div class="carousel-reviews broun-block">
                <div class="container">
                    <div class="row">
                        <div id="carousel-reviews" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                <div class="item active">
                                    <div class="col-md-4 col-sm-6">
                                        <div class="block-text rel zmin">
                                            <a title="" href="#">Emergency Contraception</a>
                                            <div class="mark">My rating: <span class="rating-input"><span data-value="0" class="glyphicon glyphicon-star"></span><span data-value="1" class="glyphicon glyphicon-star"></span><span data-value="2" class="glyphicon glyphicon-star"></span><span data-value="3" class="glyphicon glyphicon-star"></span><span data-value="4" class="glyphicon glyphicon-star-empty"></span><span data-value="5" class="glyphicon glyphicon-star-empty"></span>  </span></div>
                                            <p>Ne eam errem semper. Laudem detracto phaedrum cu vim, pri cu errem fierent fabellas. Quis magna in ius, pro vidit nonumy te, nostrud ...</p>
                                            <ins class="ab zmin sprite sprite-i-triangle"></ins>
                                        </div>
                                        <div class="person-text rel text-light">                    
                                            <img src="/images/template_medicio/img/testimonials/1.jpg" alt="" class="person img-circle" />
                                            <a title="" href="#">Anna</a>
                                            <span>Chicago, Illinois</span>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-6 hidden-xs">
                                        <div class="block-text rel zmin">
                                            <a title="" href="#">Orthopedic Surgery</a>
                                            <div class="mark">My rating: <span class="rating-input"><span data-value="0" class="glyphicon glyphicon-star"></span><span data-value="1" class="glyphicon glyphicon-star"></span><span data-value="2" class="glyphicon glyphicon-star-empty"></span><span data-value="3" class="glyphicon glyphicon-star-empty"></span><span data-value="4" class="glyphicon glyphicon-star-empty"></span><span data-value="5" class="glyphicon glyphicon-star-empty"></span>  </span></div>
                                            <p>Ne eam errem semper. Laudem detracto phaedrum cu vim, pri cu errem fierent fabellas. Quis magna in ius, pro vidit nonumy te, nostrud ...</p>
                                            <ins class="ab zmin sprite sprite-i-triangle"></ins>
                                        </div>
                                        <div class="person-text rel text-light">
                                            <img src="/images/template_medicio/img/testimonials/2.jpg" alt="" class="person img-circle" />
                                            <a title="" href="#">Matthew G</a>
                                            <span>San Antonio, Texas</span>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-6 hidden-sm hidden-xs">
                                        <div class="block-text rel zmin">
                                            <a title="" href="#">Medical consultation</a>
                                            <div class="mark">My rating: <span class="rating-input"><span data-value="0" class="glyphicon glyphicon-star"></span><span data-value="1" class="glyphicon glyphicon-star"></span><span data-value="2" class="glyphicon glyphicon-star"></span><span data-value="3" class="glyphicon glyphicon-star"></span><span data-value="4" class="glyphicon glyphicon-star"></span><span data-value="5" class="glyphicon glyphicon-star"></span>  </span></div>
                                            <p>Ne eam errem semper. Laudem detracto phaedrum cu vim, pri cu errem fierent fabellas. Quis magna in ius, pro vidit nonumy te, nostrud ...</p>
                                            <ins class="ab zmin sprite sprite-i-triangle"></ins>
                                        </div>
                                        <div class="person-text rel text-light">
                                            <img src="/images/template_medicio/img/testimonials/3.jpg" alt="" class="person img-circle" />
                                            <a title="" href="#">Scarlet Smith</a>
                                            <span>Dallas, Texas</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="col-md-4 col-sm-6">
                                        <div class="block-text rel zmin">
                                            <a title="" href="#">Birth control pills</a>
                                            <div class="mark">My rating: <span class="rating-input"><span data-value="0" class="glyphicon glyphicon-star"></span><span data-value="1" class="glyphicon glyphicon-star"></span><span data-value="2" class="glyphicon glyphicon-star"></span><span data-value="3" class="glyphicon glyphicon-star"></span><span data-value="4" class="glyphicon glyphicon-star-empty"></span><span data-value="5" class="glyphicon glyphicon-star-empty"></span>  </span></div>
                                            <p>Ne eam errem semper. Laudem detracto phaedrum cu vim, pri cu errem fierent fabellas. Quis magna in ius, pro vidit nonumy te, nostrud ...</p>
                                            <ins class="ab zmin sprite sprite-i-triangle"></ins>
                                        </div>
                                        <div class="person-text rel text-light">
                                            <img src="/images/template_medicio/img/testimonials/4.jpg" alt="" class="person img-circle" />
                                            <a title="" href="#">Lucas Thompson</a>
                                            <span>Austin, Texas</span>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-6 hidden-xs">
                                        <div class="block-text rel zmin">
                                            <a title="" href="#">Radiology</a>
                                            <div class="mark">My rating: <span class="rating-input"><span data-value="0" class="glyphicon glyphicon-star"></span><span data-value="1" class="glyphicon glyphicon-star"></span><span data-value="2" class="glyphicon glyphicon-star-empty"></span><span data-value="3" class="glyphicon glyphicon-star-empty"></span><span data-value="4" class="glyphicon glyphicon-star-empty"></span><span data-value="5" class="glyphicon glyphicon-star-empty"></span>  </span></div>
                                            <p>Ne eam errem semper. Laudem detracto phaedrum cu vim, pri cu errem fierent fabellas. Quis magna in ius, pro vidit nonumy te, nostrud ...</p>
                                            <ins class="ab zmin sprite sprite-i-triangle"></ins>
                                        </div>
                                        <div class="person-text rel text-light">
                                            <img src="/images/template_medicio/img/testimonials/5.jpg" alt="" class="person img-circle" />
                                            <a title="" href="#">Ella Mentree</a>
                                            <span>Fort Worth, Texas</span>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-6 hidden-sm hidden-xs">
                                        <div class="block-text rel zmin">
                                            <a title="" href="#">Cervical Lesions</a>
                                            <div class="mark">My rating: <span class="rating-input"><span data-value="0" class="glyphicon glyphicon-star"></span><span data-value="1" class="glyphicon glyphicon-star"></span><span data-value="2" class="glyphicon glyphicon-star"></span><span data-value="3" class="glyphicon glyphicon-star"></span><span data-value="4" class="glyphicon glyphicon-star"></span><span data-value="5" class="glyphicon glyphicon-star"></span>  </span></div>
                                            <p>Ne eam errem semper. Laudem detracto phaedrum cu vim, pri cu errem fierent fabellas. Quis magna in ius, pro vidit nonumy te, nostrud ...</p>
                                            <ins class="ab zmin sprite sprite-i-triangle"></ins>
                                        </div>
                                        <div class="person-text rel text-light">
                                            <img src="/images/template_medicio/img/testimonials/6.jpg" alt="" class="person img-circle" />
                                            <a title="" href="#">Suzanne Adam</a>
                                            <span>Detroit, Michigan</span>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <a class="left carousel-control" href="#carousel-reviews" role="button" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left"></span>
                            </a>
                            <a class="right carousel-control" href="#carousel-reviews" role="button" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right"></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /Section: testimonial -->
        <section id="partner" class="home-section paddingbot-60">   
        </section>  
    </div>  
</body>

@endsection
<script src="/js/template_medicio/jquery-1.10.2.js"></script>

@section('frontend-js')
@include('frontend.layouts.library.footer-js')
@stop
@section('custom-javascript')
    <script src="/js/template_medicio/wow.min.js"></script>
    <script src="/js/template_medicio/jquery.appear.js"></script>
    <script src="/js/template_medicio/stellar.js"></script>
    <script src="/js/template_medicio/jquery.cubeportfolio.min.js"></script>
    <script src="/js/template_medicio/owl.carousel.min.js"></script>
    <script src="/js/template_medicio/nivo-lightbox.min.js"></script>
    <script src="/js/template_medicio/custom.js"></script>
    <script src="/js/template_medicio/jquery.easing.min.js"></script>
    <script src="/js/template_medicio/jquery.scrollTo.js"></script>
@endsection
