@php
// dd($items);
$image = App\Image::where('medicine_id', $item->id)->orderBy('is_main', 'desc')->first();
$image_show = '';
if ($image) $image_show = $image->path_origin;
$mdc_name = str_slug($item->name);
// var_dump(,'name'=>$mdc_name);die;
@endphp
<div class= "wrap-cateitem">
    <div class= "overlay-container">
        <div class= "cateitem-image">
            <a href= "{{ route('detail', ['id' => $item->id,'name'=>$mdc_name]) }}" class= "cateitem-link">
                <img src="{{ url($image_show) }}" alt="{{ url($item->name) }}">
                {{-- <span class= "zooming-img" style= "background-image: url(&quot;{{ url($image_show) }}&quot;);"></span> --}}
            </a>
        </div>
        <div class= "cateitem-labeling">
            <div class= "row">
                <div class= "col-sm-12">
                    <div class= "cateitem-name">
                        <h2>
                            <a href="{{ route('detail', [$item->id, $mdc_name]) }}">{{ $item->name }}</a>
                        </h2>
                    </div>
                </div>
                <div class= "row">
                    <div class= "col-sm-12">
                        <div class= "cateitem-price-container">
                            <h2 class= "cateitem-price">
                                <a href="#">{{ $item->price }}<small>{{ trans('label.dong') }}</small> </a>
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class= "cateitem-buttons">
        <a href= "{{ route('detail', ['id' => $item->id, 'name'=>$mdc_name]) }}" class= "detail-link">
            <i class="fa fa-book" aria-hidden="true"></i>
            <span>{{ trans('label.add_to_box') }}</span>
        </a>
    </div>
</div>
