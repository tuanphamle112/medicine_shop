@foreach($items as $item)

<div class="col-md-4 visibility-none" data-toggle="animation-appear" data-animation-class="animation-fadeInQuick" data-element-offset="-100">
    <div class="store-item wrap-cateitem">
        <div class="store-item-rating text-warning">
            <input id="star-main" name="star-main" class="rating rating-loading" data-min="0" data-max="5" data-step="1" readonly="true" data-show-clear="false" data-size="sm" data-show-caption="false" value="{{ $item->avg_rate }}">
        </div>
        <div class="store-item-image">
            <a href="{{ route('detail', [$item->id, str_slug($item->name)]) }}">
            @if(empty($item->getAllImages->first()))
                <img src="{{ asset("/images/no-image-available.jpg") }}" alt="" class="img-responsive">
            @else
                <img src="{{ asset($item->getAllImages->first()->path_origin) }}" alt="" class="img-responsive">
            @endif
            </a>
            
        </div>
        <div class="store-item-info clearfix">
            <span class="store-item-price themed-color-dark pull-right">{{ App\Helpers\Helper::formatPrice($item->price) }}</span>
            <a href="{{ route('detail', [$item->id, str_slug($item->name)]) }}"><strong>{{ $item->name }}</strong></a><br>
            <small><i class="fa fa-shopping-cart text-muted"></i> <a href="javascript:void(0)" class="text-muted">{{ __('Add to cart') }}</a></small>
        </div>
    </div>
</div>
@endforeach
