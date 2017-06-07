@extends('frontend.layouts.master')

@section('title', $frontendInfoWebsite->title)

@section('content')
    <div class="content2">
        <div class="slide banner banner1">
            <div class="max-width">
                <div class="white-text">
                    <h2>{{ trans('label.good_pills') }} <br> {{ trans('label.good_heath') }} <br>&#38; {{ trans('label.wdf_life') }}</h2>
                </div>
            </div>
        </div>

        <!-- Slider Sub Categories -->
        <div class="container container1">
            <div class="feaHeader">
                <h3>{{ trans('label.featured_categories') }}</h3>
                <div class="pull-right"><a href="{{ route('frontend.prescription.index') }}" class="btn btn-blue">{{ trans('label.view_all') }}</a></div>
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
                                            @foreach ($subCategories as $subCategory)
                                            <li>
                                                <a href="{!! action('Frontend\MedicinesListController@showSubCategory', [
                                                        $subCategory->getParentFromSubCategory->link,
                                                        $subCategory->link,
                                                    ]) !!}"
                                                    id="hrefUrl1"
                                                >
                                                    <img src="{{ $subCategory->image }}" width="170" height="150">
                                                    <span>{{ $subCategory->name }}</span>
                                                    <div class="fp_mask"></div>
                                                </a>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <!-- End Slider Sub Categories -->


        <div class= "row how-it-work">
            <div class="col-sm-12 text-align-center">
                <div class="wrap-how-it-work container">
                    <h2>{{ trans('label.how_it_works') }}</h2>
                    <div>
                        <div class="row">
                            <div class="col-sm-4">
                                <img src="{!! asset('slide_images/searching.png') !!}" alt="" class="searching-info">
                                <h3>{{ trans('label.searching_information') }}</h3>
                                <p class="searching-info-text">
                                    {{ trans('label.home_text1') }}
                                </p>
                            </div>
                            <div class="col-sm-4">
                                <img src="{!! asset('slide_images/write2.png') !!}" alt="" class="searching-info">
                                <h3>{{ trans('label.make_prescription') }}</h3>
                                <p class="searching-info-text">
                                    {{ trans('label.home_text2') }}
                                </p>
                            </div>
                            <div class="col-sm-4">
                                <img src="{!! asset('slide_images/enjoy.png') !!}" alt="" class="searching-info">
                                <h3>{{ trans('label.bring_to_doctor') }}</h3>
                                <p class="searching-info-text">
                                    {{ trans('label.home_text3') }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('title', $frontendInfoWebsite->title)
