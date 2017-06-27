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
                            @else
                            @foreach($medicine->getAllImages as $getAllImagesValue)
                            @if($loop->index==0)
                            <a href="{{ asset($getAllImagesValue->path_origin) }}" class="gallery-link"><img src="{{ asset($getAllImagesValue->path_origin) }}" alt="" class="img-responsive push-bit"></a>
                            @if($loop->count <= 1)
                            <div class="row push-bit">
                                
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
                            @if(!empty($medicine->getAllImages->first()))
                            </div>
                            @endif
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
                                        <strong class="text-success h4-left">{{ __('IN STOCK') }}</strong><br>
                                        @else
                                        <strong class="text-success h4-left">{{ __('OUT O STOCK') }}</strong><br>
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
                                            <div class="row">
                                                <div class="col-sm-12 col-xs-12">
                                                    <div class="wrap-rating-info ">
                                                        <div class="row">
                                                            <div class="col-sm-6 col-xs-6 rating-header">
                                                                <h3>{{ str_slug($medicine->name). __(' rating') }}</h3>
                                                            </div>
                                                            <div class="col-sm-6 col-xs-6">
                                                                <div class="right-showform-review">
                                                                   <button class="btn btn-success rating-button">
                                                                       {{ __('Rating & Review') }}
                                                                   </button>
                                                               </div>
                                                           </div>
                                                       </div>
                                                       @for ($i=0; $i <5 ; $i++)
                                                            @php
                                                                $tmp = array_filter($countStar);
                                                                if(empty($tmp)) {
                                                                      $starPercent[] = 0;  
                                                                }
                                                                else {
                                                                    $starPercent[] = ($countStar[$i]/$medicine->total_rate) * 100;
                                                                }
                                                            @endphp
                                                        @endfor
                                                       <div class="row">
                                                        <div class="col-sm-9 col-xs-12">
                                                            <div class="left-rating">
                                                                <div class="row wrap-avg-rating">
                                                                    <div class="col-sm-6 col-xs-6">
                                                                        <div class="star-input-rating">
                                                                            <input id="star-main" name="star-main" class="rating rating-loading" data-min="0" data-max="5" data-step="1" value="{{ $medicine->avg_rate }}">
                                                                            <span class="rating-info">
                                                                                @if(empty($tmp))
                                                                                    <em>0</em>
                                                                                @else
                                                                                    <em>{{ App\Helpers\Helper::numberFloatFormat($medicine->avg_rate) }}</em>
                                                                                @endif
                                                                                {{ __('per 5') }}
                                                                            </span><br>
                                                                            <span class="rating-number-text"> {{ $medicine->total_rate . __(' ratings and reviews') }}</span>
                                                                        </div>
                                                                    </div>
                                                                    
                                                                    <div class="col-sm-6 col-xs-6">
                                                                        <div class="bar-div-rating">
                                                                            <span class="rating-bar-label">
                                                                                {{ __('5 stars') }}
                                                                            </span>
                                                                            <div class="progress">
                                                                                <div class="progress-bar" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="200" style="width:
                                                                                {{ $starPercent[4] }}%"
                                                                                >
                                                                                </div>
                                                                            </div>
                                                                            <span class="rating-bar-count">{{ $countStar[4] }}</span>
                                                                        </div>
                                                                        <div class="bar-div-rating">
                                                                            <span class="rating-bar-label">
                                                                                {{ __('4 stars') }}
                                                                            </span>
                                                                            <div class="progress">
                                                                                <div class="progress-bar" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="200" style="width:{{ $starPercent[3] }}%">
                                                                                </div>
                                                                            </div>
                                                                            <span class="rating-bar-count">{{ $countStar[3] }}</span>
                                                                        </div>
                                                                        <div class="bar-div-rating">
                                                                            <span class="rating-bar-label">
                                                                                {{ __('3 stars') }}
                                                                            </span>
                                                                            <div class="progress">
                                                                                <div class="progress-bar" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="200" style="width:{{ $starPercent[2] }}%">
                                                                                </div>
                                                                            </div>
                                                                            <span class="rating-bar-count">{{ $countStar[2] }}</span>
                                                                        </div>
                                                                        <div class="bar-div-rating">
                                                                            <span class="rating-bar-label">
                                                                                {{ __('2 stars') }}
                                                                            </span>
                                                                            <div class="progress">
                                                                                <div class="progress-bar" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="200" style="width:{{ $starPercent[1] }}%">
                                                                                </div>
                                                                            </div>
                                                                            <span class="rating-bar-count">{{ $countStar[1] }}</span>
                                                                        </div>
                                                                        <div class="bar-div-rating">
                                                                            <span class="rating-bar-label">
                                                                                {{ __('1 stars') }}
                                                                            </span>
                                                                            <div class="progress">
                                                                                <div class="progress-bar" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="200" style="width:{{ $starPercent[0] }}%">
                                                                                </div>
                                                                            </div>
                                                                            <span class="rating-bar-count">{{ $countStar[0] }}</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-3">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row col-sm-12 col-xs-12">
                                                    <div class="wrap-form-rating-review">
                                                        <h3>{{ __('Your rating and review about this medicines') }}</h3>
                                                        <div class="row wrap-form">
                                                            <div class="col-sm-8 col-xs-12">
                                                                <div class="form-rating">
                                                                    <p>{{ __('Let us know your feeling about this!') }}</p>
                                                                    <label for="rating" class="rating-title">{{ __('Rate this medicines') }}</label>
                                                                </div>
                                                                <div class="form-reviews">
                                                                    {!! Form::open(array('method' => 'post', 'route' => array('avg', $medicine->id))) 
                                                                    !!}

                                                                    @if (!empty($check_rated->id))
                                                                        {{ Form::text('star-main', $check_rated->point_rate, array('class' => 'rating rating-loading', 'id' => 'star-main2', 'data-min' => '0', 'data-max' => '5', 'data-step' => '1')) }}
                                                                        <div class="form-group">
                                                                            {{ Form::label('review-title', __('Title'), array('class' => 'rating-title')) }}
                                                                            {{ Form::text('review-title', $check_rated->title, array('class' => 'form-control review-title ', 'placeholder' => 'Your title')) }}
                                                                        </div>
                                                                        <div class="form-group">
                                                                            {{ Form::label('review-content', __('Review'), array('class' => 'rating-title')) }}
                                                                            {{ Form::textarea('review-content', $check_rated->content,  array('class' => 'form-control review-content', 'placeholder' => 'Your review...')) }}
                                                                        </div>
                                                                        {{ Form::submit('Send', array('class' => 'btn btn-success rating-send-form')) }}
                                                                    @else
                                                                        {{ Form::text('star-main', '', array('class' => 'rating rating-loading', 'id' => 'star-main2', 'data-min' => '0', 'data-max' => '5', 'data-step' => '1')) }}
                                                                        <span class="rating-star-hint">
                                                                            {{ __('Click here to start rating') }}
                                                                        </span>
                                                                        <div class="div-overlap div-overlap-active div-overlap-none-active"></div>
                                                                        <div class="form-group">
                                                                            {{ Form::label('review-title', __('Title'), array('class' => 'rating-title')) }}
                                                                            {{ Form::text('review-title', '', array('class' => 'form-control review-title ', 'placeholder' => 'Your title')) }}
                                                                        </div>
                                                                        <div class="form-group">
                                                                            {{ Form::label('review-content', __('Review'), array('class' => 'rating-title')) }}
                                                                            {{ Form::textarea('review-content', '',  array('class' => 'form-control review-content', 'placeholder' => 'Your review...')) }}
                                                                        </div>
                                                                        {{ Form::submit('Send', array('class' => 'btn btn-success rating-send-form')) }}
                                                                    @endif
                                                                    {{ Form::close() }}
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-3 ">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div id="frontend-area-review" class="position-relative">
                                            <ul class="media-list push">
                                                @foreach ($reviewInformation as $valueReview)
                                                <li class="media">
                                                    <a href="javascript:void(0)" class="pull-left">
                                                        @if ( isset($valueReview->getUser->avatar))
                                                            <img src="{{ asset($valueReview->getUser->avatar) }}" alt="Avatar" class="img-circle">
                                                        @else
                                                            <img src="{{ asset('/images/no-avatar.png') }}" alt="Avatar" class="img-circle">
                                                        @endif
                                                    </a>
                                                    <div class="media-body">
                                                        <div class="text-warning pull-right">
                                                            <input name="star-main" id="star-main4" class="rating rating-loading" data-min="0" data-max="5" data-step="1" data-readonly="true" data-size="xs" data-show-clear="false" data-show-caption="false" value="{{ $valueReview->point_rate }}">
                                                        </div>
                                                        <span class="title-review"> {{ $valueReview->title }} </span><br>
                                                        @if( empty($valueReview->user_id))
                                                            <em><span class="review-according">{{ __('According to an ') }}<a href="javascript:void(0)">{{ __('unregister user') }}</a></span></em><br>
                                                        @else
                                                            <em><span class="review-according"><small>{{ __('According to ') }}</span><a href="javascript:void(0)"><strong class="username-review">{{ $valueReview->getUser->display_name }}</strong></a></em><br>
                                                        @endif
                                                        
                                                        <span class="text-muted pull-right"><small><em>{{ $valueReview->created_at }} </em></small></span>
                                                        <p>{{ $valueReview->content }}</p>
                                                    </div>
                                                </li>
                                                @endforeach
                                            </ul>
                                            <div class="indicator hide" id="frontend-review-indicator">
                                                <div class="spinner"></div>
                                            </div>
                                        </div>
                                        <div id="frontend-review-paginate">
                                            {{ $reviewInformation->links() }}
                                        </div>
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
        @section('custom-javascript')
        <script src="{!! url('js/frontend/pagination.js') !!}"> </script>
        @endsection