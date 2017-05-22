<div class= "wrap-cateitem">
    <div class= "overlay-container">
        <div class= "cateitem-image">
            <a href= "#" class= "cateitem-link">
                <span class= "zooming-img" style= "background-image: url(&quot;/images/{{ $item->images }}&quot;);"></span>
            </a>
        </div>
        <div class= "cateitem-labeling">
            <div class= "row">
                <div class= "col-sm-6">
                    <div class= "cateitem-name">
                        <h2>
                            <a href="#">{{ $item->name }}</a>
                        </h2>
                    </div>
                </div>
                <div class= "col-sm-6">
                    <div class= "cateitem-price-container">
                        <h2 class= "cateitem-price">
                            <a href="#">{{ $item->price }}<small>{{ trans('label.dong') }}</small> </a>
                        </h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class= "cateitem-buttons">
        <a href= "#" class= "detail-link">
            <i class="fa fa-book" aria-hidden="true"></i>
            <span>{{ trans('label.detail') }}</span>
        </a>
    </div>
    <a href= "#" class= "add-to-links">
        <i class= "fa fa-plus" aria-hidden= "true"></i>
        <span>{{ trans('label.add_to_box') }}</span>
    </a>
</div>
