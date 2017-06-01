<header class="container-fluid"  id="header" >
    <div class=" page-header-container">
        <div class="container">
        <!-- <div class="col-sm-9"> -->
            <div class="row">
                <div class="col-sm-3 col-xs-12">
                    <div class="logo">
                        <a href="/">
                            @if ($frontendInfoWebsite->logo)
                                <img src="{{ url($frontendInfoWebsite->logo) }}" alt="{{ $frontendInfoWebsite->title }}">
                            @endif
                        </a>
                    </div> 
                </div>
                <!-- End logo -->
                <div class="col-sm-6 col-xs-7" id="area-search-header-form">
                    {!! Form::open(['route' => 'frontend.search', 'method' => 'get'], ['class' => 'search-form']) !!}
                        <div class="form-group input-group search-form margin-bottom-0px">
                            {!! Form::text('keyword', '', ['class' => 'form-control z-index-100', 'placeholder' => trans('label.search'), 'autocomplete' => 'off', 'data-bind' => 'event:{keyup: searchHeaderMedicine, focus: searchHeaderMedicine}']) !!}
                            <span class="input-group-btn">
                                {!! Form::button(null, ['class' => 'btn btn-default glyphicon glyphicon-search', 'type' => 'submit']) !!} 
                            </span>
                        </div>
                        <div class="search-form position-relative">
                            <div class="col-sm-12 prescrition-search-item position-absolute hide" id="search-header-medicine-result">
                                <ul class="list-group" data-bind="foreach: searchItems">
                                    <a data-bind="attr:{href: '/detail/' + id + '/' + str_slug(name)}">
                                        <li class="list-group-item">
                                            <span data-bind="text: name"></span>
                                        </li>
                                    </a>
                                </ul>
                                <ul class="list-group" data-bind="if: searchItems().length == 0">
                                    <div class="text-center alert-danger cursor-pointer">
                                        {{ __('Medicine not found!') }}
                                    </div>
                                </ul>
                            </div>
                        </div>
                    {!! Form::close() !!}
                    <div class="hide" id="over-header-full-screen" data-bind="click: closeHeaderMedicineResult"></div>
                </div>
                <div class="col-sm-3 col-xs-5 ">
                    <div class="account">
                        <a href="#" class="acc-btn">
                            @if (Auth::check())
                                @if (Auth::user()->avatar)
                                    <a href="#" class="acc-btn">
                                        <img src="{!! asset(Auth::user()->avatar) !!}" class="user-image">
                                        <span class="hidden-xs">{!! Auth::user()->display_name !!}</span>
                                    </a>
                                @else
                                    <a href="#" class=" acc-btn">
                                        <img src="{!! asset('bower_components/AdminLTE/dist/img/avatar.png') !!}" class="user-image">
                                        <span class="hidden-xs">{!! Auth::user()->display_name !!}</span>
                                    </a>
                                @endif
                            @else
                                <a href="#" class=" acc-btn">
                                    <i class="fa fa-user-circle user-icon" aria-hidden="true"></i>
                                    {{trans('label.account')}}
                                </a>
                            @endif
                        </a>
                        <div id="header-account" class="skip-content skip-active">
                            <div class="links">
                                <ul>
                                    @if (Auth::check())
                                        <li>
                                            <a href="{{ route('frontend.mark-medicine.index') }}" title="{{ trans('label.medical_box') }}">{{ trans('label.medical_box') }}</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('frontend.prescription.index') }}" title="{{ trans('label.prescription') }}" class="top-link-checkout">{{ trans('label.prescription') }}</a>
                                        </li>
                                        @if(Auth::user()->permission == App\User::PERMISSION_ADMIN)
                                            <li>
                                                <a href="{!! url('/admin') !!}" title="{{ trans('label.adminpage') }}">{{ trans('label.adminpage') }}</a>
                                            </li>
                                        @endif
                                        <li>
                                            <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault(); clickLogoutForm('#logout-form', '{{ __('Are you logout?') }}')">{{ __('Logout') }}</a>
                                            {!! Form::open(['route' => 'logout', 'method' => 'post', 'style' => 'display:none', 'id' => 'logout-form']) !!}
                                            {!! Form::close() !!}
                                        </li>
                                    @else
                                        <li>
                                            <a href="{{ route('register') }}" title="{{ trans('label.register') }}" class="top-link-blog">{{ trans('label.register') }}</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('login') }}" title="{{ trans('label.login') }}">{{ trans('label.login') }}</a>
                                        </li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- </div> -->
                    <!-- End search form -->
                </div>
            </div>
        </div>
    </div>
    <div class="top-bar ">
        <div class="max-width">
            <div class="top-bar-wrapper">
                <ul class="main-nav">

                    <li class="has-subm">
                        <a href="{{ route('welcome') }}">{{ trans('label.home') }}</a>
                    </li>
                    @php
                        $parentCategories = App\Category::allParentCategories()->get();
                    @endphp

                    @foreach ($parentCategories as $parentCategory)
                    <li>
                        <a href="{{ route('nav', ['bar' => $parentCategory->link]) }}">{{ $parentCategory->name }}</a>
                    </li>
                    @endforeach

                </ul>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</header>
