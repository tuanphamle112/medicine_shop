<header>
    <div class="container">
        <!-- Site Logo -->
        <a href="{{ route('welcome') }}" class="site-logo">
            <i class="gi gi-flash"></i> <strong>{{ __('Framgia') }}</strong>{{ __('Medicines') }}
        </a>
        <!-- End Site Logo -->
        <!-- Site Navigation -->
        <nav>
            <!-- Menu Toggle -->
            <!-- Toggles menu on small screens -->
            <a href="javascript:void(0)" class="btn btn-default site-menu-toggle visible-xs visible-sm">
                <i class="fa fa-bars"></i>
            </a>
            <!-- END Menu Toggle -->

            <!-- Main Menu -->
            <ul class="site-nav">
                <!-- Toggles menu on small screens -->
                <li class="visible-xs visible-sm">
                    <a href="javascript:void(0)" class="site-menu-toggle text-center">
                        <i class="fa fa-times"></i>
                    </a>
                </li>
                <!-- END Menu Toggle -->
                <li>
                    <a href="{{ route('welcome') }}" class="site-nav-sub">{{ __('Home') }}</a>
                </li>
                <li>
                    <a href="javascript:void(0)" class="site-nav-sub"><i class="fa fa-angle-down site-nav-arrow"></i>{{ __('Categories') }}</a>
                    <ul>
                        @foreach ($frontendAllParentCategories as $parentCategory)
                            <li>
                                <a href="{{ route('nav', ['bar' => $parentCategory->link]) }}">{{ $parentCategory->name }}</a>
                            </li>
                        @endforeach
                    </ul>
                </li>
                <li>
                    <a href="">{{ __('Contact') }}</a>
                </li>
                <li>
                    <a href="">{{ __('About') }}</a>
                </li>
                @if (!Auth::check())
                    <li>
                        <a href="{{ route('login') }}" class="btn btn-primary">{{ __('Log In') }}</a>
                    </li>
                    <li>
                        <a href="{{ route('register') }}" class="btn btn-success">{{ __('Sign up') }}</a>
                    </li>
                @else
                    <li>
                        <a href="javascript:void(0)" class="account">
                            @if (Auth::user()->avatar)
                                <img src="{!! asset(Auth::user()->avatar) !!}" class="user-image">
                            @else
                                <img src="{!! asset('bower_components/AdminLTE/dist/img/avatar.png') !!}" class="user-image">
                            @endif
                            <span class="hidden-xs">{!! Auth::user()->display_name !!}</span>
                        </a>
                        <ul>
                            <li>
                                <a href="{{ route('frontend.mark-medicine.index') }}" title="{{ trans('label.medical_box') }}">{{ trans('label.medical_box') }}</a>
                            </li>
                            <li>
                                <a href="{{ route('frontend.prescription.index') }}" title="{{ trans('label.prescription') }}" class="top-link-checkout">{{ trans('label.prescription') }}</a>
                            </li>
                            @if(Auth::user()->permission == App\Eloquent\User::PERMISSION_ADMIN)
                                <li>
                                    <a href="{!! url('admin') !!}" title="{{ trans('label.adminpage') }}">{{ trans('label.adminpage') }}</a>
                                </li>
                            @endif
                            <li>
                                <a href="{{ route('logout') }}"
                                onclick="event.preventDefault(); clickLogoutForm('#logout-form', '{{ __('Are you logout?') }}')">{{ __('Logout') }}</a>
                                {!! Form::open(['route' => 'logout', 'method' => 'post', 'style' => 'display:none', 'id' => 'logout-form']) !!}
                                {!! Form::close() !!}
                            </li>
                        </ul>
                    </li>
                @endif
            </ul>
            <!-- END Main Menu -->
        </nav>
        <!-- END Site Navigation -->
    </div>
</header>
