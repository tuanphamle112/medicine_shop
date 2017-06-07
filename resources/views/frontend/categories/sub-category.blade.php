@extends('frontend.layouts.master')

@section('title', $selectSubCate->name)

@section('subnav-bar')
    <div class="col-xs-12 col-sm-12">
        <div class="subm-2">
            <div class="subm-2-page">
                <div class="subm-cat-full">
                    <ul class="menulist">
                        @foreach ($subCategories as $subCategory)
                            <li>
                                <a href="{!! action('Frontend\MedicinesListController@showSubCategory', [
                                        $parentCategory->link,
                                        $subCategory->link,
                                    ]) !!}"
                                    class="{{ $selectSubCate->link === $subCategory->link ? 'active' : '' }}"
                                >
                                    {{ $subCategory->name }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>  
@endsection

@section('content')
    <div class="content">
        <div class= "row">
            @foreach($items as $item)
                <div class= "col-sm-3">
                    @include('frontend.components.item')
                </div>
            @endforeach
            <div class="col-sm-12 text-center">
                {{ $items->links() }}
            </div>
        </div>
        @if (Auth::check())
            <div class="modal fade" id="add-to-box3" role="dialog">
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
            <div class="modal fade" id="add-to-box3" role="dialog">
                <div class="modal-dialog">
                  <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">{{ trans('label.notification') }}</h4>
                        </div>
                        <div class="modal-body">
                            <span>{{ trans('label.you_have_to') }} <a href="{{ route('login') }}"> {{ trans('label.login') }}</a> {{ trans('label.to_add_to_box') }}</span>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">{{ __('Close') }}</button>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection
