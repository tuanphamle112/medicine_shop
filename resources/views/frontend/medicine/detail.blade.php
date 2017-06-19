@extends('frontend.layouts.master')

@section('title', $medicine->name)

@section('content')
    <section class="site-section site-section-detail site-section-light site-section-top themed-background-dark">
        <div class="container text-center">
            <h1 class="animation-slideDown"><strong>{{ __('Antibiotics') }}</strong></h1>
            <h3 class="animation-slideDown"><strong> {{ __('Destroy or slow down the growth of bacteria') }}</strong></h3>
        </div>
    </section>

    <!-- Product View -->
    <section class="site-content site-section">
        <div class="container">
            <div class="row">
                <!-- Sidebar -->
                <div class="col-md-4 col-lg-3">
                    <aside class="sidebar site-block">
                        <!-- Store Menu -->
                        <!-- Store Menu functionality is initialized in js/app.js -->
                        <div class="sidebar-block">
                            <ul class="store-menu">
                            @php
                                // dd($frontendAllParentCategories);
                            @endphp
                            @foreach($frontendAllParentCategories as $frontendAllParentCategory)
                                @if($loop->first)
                                    <li class="open">
                                @else
                                    <li>
                                @endif
                                    <a href="javascript:void(0)" class="submenu"><i class="fa fa-angle-right"></i> {{ $frontendAllParentCategory->name }}</a>
                                    <ul>
                                        @foreach($frontendAllParentCategory->getSubCategories as $getSubCategory)
                                        <li><a href="{{ route('sub_Nav', [$frontendAllParentCategory->link, $getSubCategory->link]) }}">{{ $getSubCategory->name }}</a></li>
                                        @endforeach
                                    </ul>
                                </li>
                            @endforeach
                                <li class="open">
                                    {{-- This class show what open onload page --}}
                                </li>
                            </ul>
                        </div>
                        <!-- END Store Menu -->

                    </aside>
                </div>
                <!-- END Sidebar -->

                <!-- Product Details -->
                <div class="col-md-8 col-lg-9">
                    <div class="row" data-toggle="lightbox-gallery">
                        <!-- Images -->
                        <div class="col-sm-6 push-bit">
                            @if(empty($medicine->getAllImages->first()))
                                <a href="javascript:void(0)" class="gallery-link"><img src="{{ asset("/images/no-image-available.jpg") }}" alt="" class="img-responsive push-bit"></a>
                                <div class="row push-bit">
                                    <div class="col-xs-4">
                                        <a href="javascript:void(0)" class="gallery-link"><img src="{{ asset('/images/no-image-available.jpg') }}" alt="" class="img-responsive"></a>
                                    </div>
                                </div>
                            @else
                                @foreach($medicine->getAllImages as $getAllImagesValue)
                                        @if($loop->index==0)
                                        <a href="{{ asset($getAllImagesValue->path_origin) }}" class="gallery-link"><img src="{{ asset($getAllImagesValue->path_origin) }}" alt="" class="img-responsive push-bit"></a>
                                            @if($loop->count <= 1)
                                                <div class="row push-bit">
                                                <div class="col-xs-4">
                                                    <a href="javascript:void(0)" class="gallery-link"><img src="{{ asset('/images/no-image-available.jpg') }}" alt="" class="img-responsive"></a>
                                                </div>
                                            @endif
                                        @else
                                            @if($loop->index == 1)
                                            <div class="row push-bit">
                                                <div class="col-xs-4">
                                                    <a href="{{ asset($getAllImagesValue->path_origin) }}" class="gallery-link"><img src="{{ asset($getAllImagesValue->path_origin) }}" alt="" class="img-responsive"></a>
                                                </div>
                                            @else
                                                <div class="col-xs-4">
                                                    <a href="{{ asset($getAllImagesValue->path_origin) }}" class="gallery-link"><img src="{{ asset($getAllImagesValue->path_origin) }}" alt="" class="img-responsive"></a>
                                                </div>
                                            
                                            @endif
                                        @endif
                                @endforeach
                            @endif
                            </div>
                        </div>
                        <!-- END Images -->

                        <!-- Info -->
                        <div class="col-sm-6 push-bit">
                            <div class="clearfix">
                                    <div class="product-name">
                                        <span class= "h1">{{ $medicine->name }}</span>
                                    </div>
                                    <div class="pull-right">
                                        <span class="h2">
                                            <strong>{{ App\Helpers\Helper::formatPrice($medicine->price) }}</strong>
                                        </span>
                                    </div>
                                    <span class="h4">
                                        <small>Status: </small>
                                        @if($medicine->quantity > 0)
                                            <strong class="text-success h4-left">IN STOCK</strong><br>
                                        @else
                                            <strong class="text-success h4-left">OUT O STOCK</strong><br>
                                        @endif
                                    </span>
                            </div>
                            <hr>
                                <p>abc</p>
                            <hr>
                            @if (Auth::check()) 
                                <div class="add-to-box border-heart add-medicine-to-box" title="{{ __('Add to box') }}" medicine_id="{{ $medicine->id }}">
                            @else
                                <div class="add-to-box border-heart" data-toggle="modal" data-target="#showNotLogin" title="{{ __('Add to box') }}">
                            @endif
                                <span class="span-heart">
                                    @if(empty($check_marked))
                                        <i class="fa fa-heart-o" aria-hidden="true"></i>
                                    @else
                                        <i class="fa fa-heart" aria-hidden="true"></i>
                                    @endif
                                </span>
                            </div>
                        </div>
                        <!-- Modal -->
                        <div class="modal fade" id="showNotLogin" role="dialog">
                            <div class="modal-dialog">
                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">{{ __('Notification') }}</h4>
                                    </div>
                                    <div class="modal-body">
                                        <p>
                                            {{ __('You have to login to mark medicines!') }}
                                        </p>
                                        <a href="{{route('login')}}">{{ __('Login') }}</a>
                                        <span>{{ __('or') }}</span>
                                        <a href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">{{ __('Close') }}</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- END Info -->

                        <!-- More Info Tabs -->
                        <div class="col-xs-12 site-block">
                            <ul class="nav nav-tabs push-bit" data-toggle="tabs">
                                <li class="active"><a href="#product-specs">{{ __('Details') }}</a></li>
                                <li><a href="#product-description">{{ __('Questions - answers') }}</a></li>
                                <li><a href="#product-reviews">{{ __('Reviews') }}</a></li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="product-specs">
                                    {!! $medicine->detail !!}
                                </div>
                                <div class="tab-pane" id="product-description">
                                    {{-- Comment and reply --}}
                                    <div class="comments-container">
                                        <ul id="comments-list" class="comments-list">
                                            <li>
                                                <div class="comment-main-level">
                                                    <!-- Avatar -->
                                                    <div class="comment-avatar"><img src="/searching.png" alt=""></div>
                                                    <!-- Contenedor del Comentario -->
                                                    <div class="comment-box">
                                                        <div class="comment-head">
                                                            <h6 class="comment-name by-author"><a href="http://creaticode.com/blog">Agustin Ortiz</a></h6>
                                                            <span>20 {{ __('minutes ago') }}</span>
                                                            <i class="fa fa-reply"></i>
                                                            <i class="fa fa-heart"></i>
                                                        </div>
                                                        <div class="comment-content">
                                                            This is a comment of some  doctor
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Respuestas de los comentarios -->
                                                <ul class="comments-list reply-list">
                                                    <li>
                                                        <!-- Avatar -->
                                                        <div class="comment-avatar"><img src="/enjoy.png" alt=""></div>
                                                        <!-- Contenedor del Comentario -->
                                                        <div class="comment-box">
                                                            <div class="comment-head">
                                                                <h6 class="comment-name"><a href="http://creaticode.com/blog">TPL</a></h6>
                                                                <span>15 {{ __('minutes ago') }}</span>
                                                                <i class="fa fa-reply"></i>
                                                                <i class="fa fa-heart"></i>
                                                            </div>
                                                            <div class="comment-content">
                                                                This is a reply comment :>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                    {{-- End comment and reply --}}
                                </div>
                                <div class="tab-pane" id="product-reviews">
                                    <ul class="media-list push">
                                        <li class="media">
                                            <a href="javascript:void(0)" class="pull-left">
                                                <img src="/medicines/1.jpeg" alt="Avatar" class="img-circle">
                                            </a>
                                            <div class="media-body">
                                                <div class="text-warning pull-right">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <a href="javascript:void(0)"><strong>Customer</strong></a><br>
                                                <span class="text-muted"><small><em>2 {{ __('hours ago') }}</em></small></span>
                                                <p>Uvuvwevwevwe Onyetenyevwe Ugwemuhwem Osas</p>
                                            </div>
                                        </li>
                                        
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- END More Info Tabs -->
                    </div>
                </div>
                <!-- END Product Details -->
            </div>
        </div>
    </section>
<!-- END Product View -->
@endsection

<script src="{!! url('js/frontend/medicine-comment.js') !!}"></script>
<script>
    // ko.applyBindings(
    //     new CommentViewModel().initData('{{ $medicine->id }}'),
    //     document.getElementById('area-comment-medicine')
    // );
</script>
