@foreach ($reviewInformation as $valueReview)
<li class="media">
    
        @if ($valueReview->getUser)
            <a href="{{ route('frontend.user.different.profiles', [$valueReview->getUser->id, str_slug($valueReview->getUser->display_name)]) }}" class="pull-left">
            <img src="{{ App\Helpers\Helper::getLinkUserAvatar($valueReview->getUser->avatar) }}" alt="{{ __('Avatar') }}" class="img-circle">
        @else
            <a href="javascript:void(0)" class="pull-left">
            <img src="{{ App\Helpers\Helper::getLinkUserAvatar('') }}" alt="{{ __('Avatar') }}" class="img-circle">
        @endif
    </a>
    <div class="media-body">
        <div class="text-warning pull-right">
            <input name="star-main" class="detail-rating rating rating-loading" data-min="0" data-max="5" data-step="1" data-readonly="true" data-size="xs" data-show-clear="false" data-show-caption="false" value="{{ $valueReview->point_rate }}">
        </div>
        <span class="title-review"> {{ $valueReview->title }} </span><br>
        @if(empty($valueReview->user_id))
            <em>
                <span class="review-according">
                    {{ __('According to an ') }}
                    <a href="javascript:void(0)">{{ __('unregister user') }}</a>
                </span>
            </em><br>
        @else
            <em>
                <span class="review-according">
                    {{ __('According to ') }}
                    <a target="_blank" href="{{ route('frontend.user.different.profiles', [$valueReview->getUser->id, str_slug($valueReview->getUser->display_name)]) }}">
                        <strong class="username-review">{{ $valueReview->getUser->display_name }}</strong>
                    </a>
                </span>
            </em><br>
        @endif

        <span class="text-muted pull-right"><small><em>{{ $valueReview->created_at }} </em></small></span>
        <p>{{ $valueReview->content }}</p>
    </div>
</li>
@endforeach
