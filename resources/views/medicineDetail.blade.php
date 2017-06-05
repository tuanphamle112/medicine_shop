@extends('layouts.master')

@section('title', $showD->name)

@section('content')
<div class="content prod-details">
    <div class="col-main">
        <div class="product-view">
            <div class="product-essential">
                <div id="product_addtocart_form">
                    <div class="product-img-box">
                        <div class="product-image product-image-zoom">
                            <div class="product-image-gallery">
                                <img id="image-main" class="gallery-image visible" src="/{{ $imageD->path_origin }}" alt="{{ $showD->name }}" title="{{ $showD->name }}">
                            </div>
                        </div>
                    </div>
                    <div class="product-shop">
                        <div class=" col-sm-12 product-name">
                            <span class="h1">{{ $showD->name }}</span>
                        </div>
                        <div class="col-sm-6 price-info">
                            <div class="price-box">
                                <span class="regular-price" id="product-price-1117">
                                    <span class="price">{{ $showD->price}}</span> 
                                </span>
                            </div>
                        </div>
                        <div class="col-sm-6 extra-info">
                            <p class="availability in-stock">
                                <span class="label">{{ trans('label.status') }}</span>
                                <span class="value">
                                    @if ($showD->quantity <=0)
                                        {{ trans('label.out_of_stock') }}
                                    @else
                                        {{ trans('label.available') }}
                                    @endif
                                </span>
                            </p>
                        </div>
                        <div class=" col-sm-12 short-description">
                            <div class="std"><p>{{ $showD->short_describer }}</p></div>
                        </div>

                        <div class="col-sm-6 add-to-cart-wrapper">
                            <div class="add-to-box1">
                                <div class="add-to-cart">
                                    <div class="qty-wrapper">
                                        @if ($showD->quantity)
                                            <label for="qty">{{ trans('label.quantity') }}</label>
                                            <span>{{ $showD->quantity }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            @if (Auth::check())
                            <button medicine_id="{{ $id }}" user_id="{{ Auth()->user()->id }}" class="btn btn-success add-to-box2" data-toggle="modal" data-target="#add-to-box">
                                {{ trans('label.add_to_box') }}
                            </button>
                            <div class="modal fade" id="add-to-box" role="dialog">
                                <div class="modal-dialog">
                                  <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">{{ trans('label.notification') }}</h4>
                                        </div>
                                        <div class="modal-body">
                                            <p></p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">{{ __('Close') }}</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @else
                                <button class="btn btn-success add-to-box2" data-toggle="modal" data-target="#add-to-box-not-login">
                                    {{ trans('label.add_to_box') }}
                                </button>
                                <div class="modal fade" id="add-to-box-not-login" role="dialog">
                                    <div class="modal-dialog">
                                      <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">{{ trans('label.notification') }}</h4>
                                            </div>
                                            <div class="modal-body">
                                                <span>{{ trans('label.you_have_to') }} <a href="/login"> {{ trans('label.login') }}</a> {{ trans('label.to_add_to_box') }}</span>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">{{ __('Close') }}</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="row">
                                    <div class="wrap-rating">
                                        <span class="label col-sm-2">{{ trans('label.total_rating') }}</span>
                                        <div class="wrap-star col-sm-6">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <input type="hidden" id="star-main" name="star-main" min="1" max="5" step="0.1" value="{{ $showD->avg_rate }}" class="rating">
                                                </div>
                                                <div class="col-sm-3">
                                                    <span> {{ $showD->total_rate }} {{ __('vote') }}</span>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <!-- <div class="container"> -->
                                        <div class="col-sm-3">
                                            <a href="#" class="rating-link col-sm-12" data-toggle="modal" data-target="#myModal">{{ trans('label.your_rating') }}</a>
                                            <!-- Trigger the modal with a button -->

                                            <!-- Modal -->
                                            <div class="modal fade" id="myModal" role="dialog">
                                                <div class="modal-dialog">
                                                  <!-- Modal content-->
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            <h4 class="modal-title">{{ trans('label.rating') }}</h4>
                                                        </div>
                                                        @if (Auth::check())
                                                            <div class="modal-body">
                                                                @if (!empty($check_rated->id))
                                                                    {!! Form::open(['route' => [ 'edit_rating', $id ], 'method' => 'post']) !!}

                                                                        {{ Form::label('star-reliable', 'Reliable:') }}
                                                                        {!! Form::text('input-name1', '', ['class' => 'rating','id'=> 'input-reliable', 'min' => '1','max' => '5', 'step' => '1', 'data-size' => 'lg', 'data-rtl' => 'false']) !!}

                                                                        {{ Form::label('star-quality', 'Quality:') }}
                                                                        {!! Form::text('input-name2', '', ['class' => 'rating','id'=> 'input-quality', 'min' => '1','max' => '5', 'step' => '1', 'data-size' => 'lg', 'data-rtl' => 'false']) !!}
                                                                        
                                                                        {!! Form::hidden('reliable', '', ['id' => 'hidden-reliable']) !!}
                                                                        {!! Form::hidden('quality', '', ['id' => 'hidden-quality']) !!}

                                                                        {{ Form::label('last-rating', 'The last total rating:') }}
                                                                            <span class="label label-info">{{ $check_rated->point_rate }}</span><br>
                                                                        {!! Form::submit('Re-rate', ['class' => 'btn btn-danger re-rate']) !!}
                                                                    {{ Form::close() }}
                                                                @else
                                                                    {!! Form::open(['route' => ['avg', $id ], 'method' => 'post']) !!}

                                                                        {{ Form::label('star-reliable', 'Reliable:') }}
                                                                        {!! Form::text('input-name1', '', ['class' => 'rating','id'=> 'input-reliable', 'min' => '1','max' => '5', 'step' => '1', 'data-size' => 'lg', 'data-rtl' => 'false']) !!}

                                                                        {{ Form::label('star-quality', 'Quality:') }}
                                                                        {!! Form::text('input-name2', '', ['class' => 'rating','id'=> 'input-quality', 'min' => '1','max' => '5', 'step' => '1', 'data-size' => 'lg', 'data-rtl' => 'false']) !!}
                                                                        {!! Form::hidden('reliable', '', ['id' => 'hidden-reliable']) !!}
                                                                        {!! Form::hidden('quality', '', ['id' => 'hidden-quality']) !!}
                                                                        
                                                                        {!! Form::submit('Rate it', ['class' => 'btn btn-success']) !!}
                                                                    {{ Form::close() }}
                                                                @endif
                                                            </div>
                                                        @else
                                                            <div class="modal-body">
                                                               <span>{{ trans('label.you_have_to') }} <a href="/login"> {{ trans('label.login') }}</a> {{ trans('label.to_rating') }}</span>
                                                            </div>
                                                        @endif
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="clearer"></div>
                </div>
            </div>

            <div class="wrap-detail-medicine">
                <div class="overlap-detail">
                    <div class="container">
                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#home">{{ trans('label.detail') }}</a></li>
                            <li><a data-toggle="tab" href="#menu2">{{ trans('label.information') }}</a></li>
                        </ul>

                        <div class="tab-content">
                            <div id="home" class="tab-pane fade in active">
                                <h3>{{ trans('label.detail') }}</h3>
                                <p>{!! $showD->detail !!}</p>
                            </div>
                            <div id="menu2" class="tab-pane fade">
                                <h3>{{ trans('label.information') }}</h3>
                                <p>{!! $showD->short_describer !!}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Comment -->
            <div class="wrap-comment-medicine" id="area-comment-medicine">
                <div class="overlap-comment">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-8">
                                <h3>{{ trans('label.write_comment') }}</h3>
                            </div><!-- /col-sm-12 -->
                        </div><!-- /row -->
                        @if (!Auth::check())
                            <div class="row">
                                <div class="col-sm-8">
                                    <div class="alert alert-warning" role="alert">
                                        <p>{{ __('You are not logged in. Please login to comment!') }}</p>
                                        <a href="{{route('login')}}">{{ __('Login') }}</a>
                                        <span>{{ __('or') }}</span>
                                        <a href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="row">
                                <div class="col-sm-8">
                                    {!! Form::textarea('', '', ['rows' => '6', 'class' => 'form-control', 'placeholder' => '...', 'id' => 'comment-content-textarea']) !!}
                                </div><!-- /col-sm-12 -->
                            </div><!-- /row -->
                            <div class="row">
                                <div class="col-sm-8 text-right padding-15px">
                                    {!! Form::button(__('Send'), ['data-toggle' => 'tooltip', 'class' => 'btn btn-primary', 'title' => __('Send'), 'data-bind' => 'click: sendComment']) !!}
                                </div><!-- /col-sm-12 -->
                            </div><!-- /row -->
                        @endif
                        <div class="col-sm-8 position-relative">
                            <div data-bind="foreach: commentDataArray">
                                <div class="row">
                                    <div class="col-sm-1">
                                        <!-- ko if: get_user.avatar-->
                                            <div class="thumbnail">
                                                <img class="img-responsive user-photo" data-bind="attr:{src: '/' + get_user.avatar}">
                                            </div><!-- /thumbnail -->
                                        <!-- /ko -->
                                        <!-- ko ifnot: get_user.avatar-->
                                            <div class="thumbnail">
                                                <img class="img-responsive user-photo" src="/images/no-avatar.png">
                                            </div><!-- /thumbnail -->
                                        <!-- /ko -->
                                    </div><!-- /col-sm-1 -->

                                    <div class="col-sm-11">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <strong data-bind="text: get_user.display_name"></strong>
                                                <span class="text-muted" data-bind="text: created_at"></span>
                                            </div>
                                            <div class="panel-body" data-bind="text: content">
                                            </div><!-- /panel-body -->
                                            <div class="panel-body" data-bind="if: $parent.currentUserId() == user_id">
                                                <div class="col-sm-12 text-left">
                                                    <a href="{{ route('frontend.prescription.addnew') }}" class="btn btn-primary" data-toggle="tooltip" title="{{ __('Edit') }}">
                                                        <i class="fa fa-pencil"></i>
                                                    </a>
                                                    <a href="#" data-toggle="tooltip" class="btn btn-danger" data-bin="click: $root.deleteItem" title="{{ __('Delete') }}">
                                                        <i class="fa fa-trash-o"></i>
                                                    </a>
                                                </div><!-- /col-sm-12 -->
                                            </div><!-- /panel-body -->
                                            <div class="panel-body" data-bind="if: showEditComment()">
                                                {!! Form::textarea('', '', ['rows' => '3', 'class' => 'form-control', 'placeholder' => '...', 'id' => 'comment-content-textarea']) !!}
                                                <div class="col-sm-12 text-right padding-15px">
                                                    {!! Form::button(__('Save'), ['data-toggle' => 'tooltip', 'class' => 'btn btn-primary', 'title' => __('Save'), 'data-bin' => 'click: saveComment']) !!}
                                                </div><!-- /col-sm-12 -->
                                            </div><!-- /panel-body -->

                                        </div><!-- /panel panel-default -->
                                    </div><!-- /col-sm-5 -->
                                </div><!-- /row -->
                            </div>

                            <ul class="pager">
                                <li data-bind="if: currentPage() > 1">
                                    <a href="#" data-bind="click: prePage"><i class="fa  fa-angle-double-left"></i></a>
                                </li>
                                <li data-bind="if: currentPage() < totalPage()">
                                    <a href="#" data-bind="click: nextPage"><i class="fa  fa-angle-double-right"></i></a>
                                </li>
                            </ul>

                            <div class="indicator hide" id="comment-indicator">
                                <div class="spinner"></div>
                            </div>
                        </div>
                    </div><!-- /container -->
                </div>

                <!-- Button trigger modal -->
                <button type="button" id="comment-button-show-emty" class="hide" data-toggle="modal" data-target="#myModal1">
                </button>

                <!-- Modal -->
                <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">{{ __('Please enter text to comment!') }}</h4>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- End Comment -->

        </div>
    </div>
</div>
@endsection

@section('custom-javascript')
<script src="{!! url('js/frontend/medicine-comment.js') !!}"></script>
<script>
    ko.applyBindings(
        new CommentViewModel().initData('{{ $showD->id }}'),
        document.getElementById('area-comment-medicine')
    );
</script>
@endsection
