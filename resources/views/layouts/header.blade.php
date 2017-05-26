@php
    if(Auth::user())
    $permission = App\User::find(Auth::user()->id);
@endphp
<header class="container-fluid"  id="header" >
    <div class=" page-header-container">
        <div class="container">
            <div class="row">
                <div class="col-sm-3 col-xs-12">
                    <div class="logo">
                        <a href="/">{{ trans('label.logo') }}</a>
                    </div> 
                </div>
                <!-- End logo -->
                <div class="col-sm-6 col-xs-7">
                    {!! Form::open(['url' => asset('#'),'method' => 'post'], $attributes = ['class' => 'search-form']) !!}
                    <div class="form-group input-group search-form">
                        {!! Form::text('firstname', $value = null, $attributes = ['class' => 'form-control', "placeholder" => trans('label.search')]) !!}
                        <span class="input-group-btn">
                            {!! Form::button(null, array('class' => 'btn btn-default glyphicon glyphicon-search')) !!} 
                        </span>
                    </div>
                    {!! Form::close() !!}
                </div>
                <div class="col-sm-3 col-xs-5 ">
                    <div class="account">
                        @if ( Auth::user())
                            @if (Auth::user()->avatar)
                                <a href="#" class=" acc-btn">
                                    <img src="{!! asset(Auth::user()->avatar) !!}" class="user-image">
                                    <span class="hidden-xs">{!! Auth::user()->display_name !!}</span>
                                </a>
                            @else
                                <a href="#" class=" acc-btn">
                                    <img src="{!! asset('bower_components/AdminLTE/dist/img/avatar.png') !!}" class="user-image">
                                    <span class="hidden-xs">{!! Auth::user()->display_name !!}</span>
                                </a>
                            @endif
                            <div id="header-account" class="skip-content skip-active">
                                <div class="links">
                                    <ul>
                                        <li>
                                            <a href="#" title="{{ trans('label.medical_box') }}">{{ trans('label.medical_box') }}</a>
                                        </li>
                                        <li>
                                            <a href="#" title="{{ trans('label.per_info') }}" class="">{{ trans('label.per_info') }}</a>
                                        </li>
                                        <li>
                                            <a href="#" title="{{ trans('label.prescription') }}" class="top-link-checkout">{{ trans('label.prescription') }}</a>
                                        </li>
                                        <li>
                                            <a href="#" title="{{ trans('label.notification') }}">{{ trans('label.notification') }}</a>
                                        </li>
                                        @if($permission->permission == App\User::PERMISSION_ADMIN)
                                            <li>
                                                <a href="{!! url('/admin') !!}" title="{{ trans('label.adminpage') }}">{{ trans('label.adminpage') }}</a>
                                            </li>
                                        @endif
                                        <li>
                                            {!! Form::open(['url' => url('logout'), 'method' => 'post']) !!}
	                                            <button type="submit" data-toggle="tooltip" class="btn btn-success"
	                                            onclick="return confirm('{{ trans('Are you logout?') }}') ? $(this).parent().submit(): false;"
	                                            data-original-title="{{ trans('Logout') }}">
	                                            {{ trans('Logout') }}
	                                            </button>
                                        	{!! Form::close() !!}
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        @else
	                        <a href="#" class=" acc-btn">
	                            <i class="fa fa-user-circle user-icon" aria-hidden="true"></i>
	                            {{trans('label.account')}}
	                        </a>
	                        <div id="header-account" class="skip-content skip-active">
	                            <div class="links">
	                                <ul>
	                                    <li>
	                                        <a href="#" title="{{ trans('label.medical_box') }}">{{ trans('label.medical_box') }}</a>
	                                    </li>
	                                    <li>
	                                        <a href="#" title="{{ trans('label.prescription') }}" class="top-link-checkout">{{ trans('label.prescription') }}</a>
	                                    </li>
	                                    <li>
	                                        <a href="#" title="{{ trans('label.notification') }}">{{ trans('label.notification') }}</a>
	                                    </li>
	                                    <li>
	                                        <a href="{{ route('register') }}" title="{{ trans('label.register') }}" class="top-link-blog">{{ trans('label.register') }}</a>
	                                    </li>
	                                    <li>
	                                        <a href="{{ route('login') }}" title="{{ trans('label.login') }}">{{ trans('label.login') }}</a>
	                                    </li>
	                                </ul>
	                            </div>
	                        </div>
                        @endif
                    </div>
                </div>
                <!-- </div> -->
                <!-- End search form -->
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
                    <li>
                        <a href="{{ route('nav', ['bar' => 'thuoc']) }}">{{ trans('label.medical') }}</a>
                    </li>
                    <li>
                        <a href="{{ route('nav', ['bar' => 'tpchucnang']) }}">{{ trans('label.functional_foods') }}</a>
                    </li>
                    <li>
                        <a href="{{ route('nav', ['bar' => 'lamdep']) }}">{{ trans('label.tco_beauty') }}</a>
                    </li>
                    <li>
                        <a href="{{ route('nav', ['bar' => 'machnho']) }}">{{ trans('label.tips') }}</a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</header>
