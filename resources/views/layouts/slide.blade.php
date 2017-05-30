<div class="container container1">
    <div class="feaHeader">
        <h3>{{ trans('label.featured_categories') }}</h3>
        <div class="pull-right"><a href="/non-prescriptions" class="btn btn-blue">{{ trans('label.view_all') }}</a></div>
    </div>
    <div class="row">
        <div id="cate_list">
            <div class="col-md-12">
                <div class="featured-product"> 
                    <!-- product display carousel -->
                    <div class="list_carousel1 ">
                        <div class="caroufredsel_wrapper">
                            <div class="caroufredsel_wrapper">

                                <ul id="topsell_ulList" class="carousel-product" >
                                    @foreach ($categories as $category)
                                        @php
                                        $parent_category = App\Category::parentCate($category->parent_id);
                                        @endphp
                                    <li>
                                        <a id="hrefUrl1" href="{{ $parent_category->link }}/{{ $category->link }}">
                                            <img src="{{ $category->cate_img }}" width="170" height="150">
                                            <span>{{ $category->name }}</span>
                                            <div class="fp_mask"></div>
                                        </a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        {{-- <a href="#" class="prev1" id="prev1" style="display: block;">
                            <span class="fa  fa-angle-left fa-2x"></span>
                        </a>
                        <a href="#" class="next1 text-right" id="next1" style="display: block;">
                            <span class="fa  fa-angle-right fa-2x"></span>
                        </a>  --}}
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
