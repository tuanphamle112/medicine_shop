@extends('frontend.layouts.master')

@section('title', __('Mark Medicine List'))

@section('content')
<section class="site-section site-section-light site-section-top themed-background-dark">
    <div class="container">
        <h1 class="animation-slideDown text-center">
            <strong>{{ __('Mark Medicine List') }}</strong>
        </h1>
    </div>
</section>
<section class="site-content site-section">
    <div class="container">
        <div class="row">
            @php
                $messages = Session::get('flash_frontend_messages', []) 
            @endphp

            @foreach ($messages as $message)
                <div class="alert alert-{{ $message['type'] }} alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4>{{ $message['title'] }}</h4>
                    <p>{{ $message['message'] }}</p>
                </div>
            @endforeach
        </div>
        <div class="row">
            <div class="col-xs-12">
                <div class="row store-items">
                    @foreach ($marks as $mark)

                        @php
                            $medicine = $mark->getMedicine;
                            $imagesCollection = $medicine->getAllImages();
                            $commentCollection = $medicine->getAllComments();
                            $reviewCollection = $medicine->getAllRateMedicines();

                            $image = $imagesCollection->orderBy('is_main', 'desc')->first();
                            $image_show = config('custom.medicine.image_default'); //default Image
                            if ($image) $image_show = $image->path_origin;
                        @endphp

                        <div class="col-md-3 animation-fadeInQuick" data-toggle="animation-appear" data-animation-class="animation-fadeInQuick" data-element-offset="-100">
                            <div class="store-item">
                                <div class="store-item-image">
                                    <a href="{{ route('detail', [$medicine->id, str_slug($medicine->name)]) }}">
                                        <img src="{{ url($image_show) }}" alt="{{ $medicine->name }}" class="img-responsive">
                                    </a>
                                </div>
                                <div class="store-item-info clearfix">
                                    
                                    <a href="{{ route('detail', [$medicine->id, str_slug($medicine->name)]) }}">
                                        <strong>{{ str_limit($medicine->name, 22) }}</strong>
                                    </a><br>
                                    <div class="row">
                                        <ul class="list-inline pull-left margin-top-5px col-sm-9">
                                            <li class="col-sm-12">
                                                <i class="fa fa-calendar"></i>
                                                {{ date_format($mark->created_at, 'F d, Y') }}
                                            </li>
                                            <li class="col-sm-12">
                                                <a href="javascript:void(0)">
                                                    <i class="fa fa-star"></i>
                                                    {{ __(':number reviews', 
                                                        ['number' => $medicine->getAllRateMedicines()->count()]) 
                                                    }}
                                                </a>
                                            </li>
                                            <li class="col-sm-12">
                                                <a href="javascript:void(0)">
                                                    <i class="fa fa-question-circle"></i>
                                                    {{ __(':number Asks-Answers', 
                                                        ['number' => $medicine->getAllComments()->count()]) 
                                                    }}
                                                </a>
                                            </li>
                                        </ul>
                                        <div class="col-sm-3 padding-15px text-right">
                                            {!! Form::open(['route' => ['frontend.mark-medicine.destroy', $mark->id], 'method' => 'DELETE']) !!}
                                                <button type="button" data-toggle="tooltip" class="btn btn-danger"
                                                    onclick="return confirm('{{ __('Are you delete?') }}') ? $(this).parent().submit(): false;"
                                                    title="{{ __('Delete') }}"
                                                >
                                                    <i class="fa fa-trash-o"></i>
                                                </button>
                                            {!! Form::close() !!}
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <!-- Pagination -->
                <div class="text-center">
                    {{ $marks->links() }}
                </div>
                <!-- END Pagination -->
            </div>
        </div>
    </div>
</section>

@endsection

