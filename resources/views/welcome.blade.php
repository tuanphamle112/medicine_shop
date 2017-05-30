@extends('layouts.master')
@section('title', $frontendInfoWebsite->title)
@section('content')
    <div class="content2">
        <div class="slide banner banner1">
            <div class="max-width">
                <div class="white-text">
                    <h2>{{ trans('label.good_pills') }} <br> {{ trans('label.good_heath') }} <br>& {{ trans('label.wdf_life') }}</h2>
                </div>
            </div>
        </div>
        @include('layouts.slide')
        <div class= "row how-it-work">
            <div class="col-sm-12 text-align-center">
                <div class="wrap-how-it-work container">
                    <h2>{{ trans('label.how_it_works') }}</h2>
                    <div>
                        <div class="row">
                            <div class="col-sm-4">
                                <img src="/slide_images/searching.png" alt="" class="searching-info">
                                <h3>{{ trans('label.searching_information') }}</h3>
                                <p class="searching-info-text">
                                    {{ trans('label.home_text1') }}
                                </p>
                            </div>
                            <div class="col-sm-4">
                                <img src="/slide_images/write2.png" alt="" class="searching-info">
                                <h3>{{ trans('label.make_prescription') }}</h3>
                                <p class="searching-info-text">
                                    {{ trans('label.home_text2') }}
                                </p>
                            </div>
                            <div class="col-sm-4">
                                <img src="/slide_images/enjoy.png" alt="" class="searching-info">
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
