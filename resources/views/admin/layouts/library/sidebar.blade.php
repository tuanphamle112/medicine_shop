<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                @if (Auth::user()->avatar)
                    <img src="{!! asset(Auth::user()->avatar) !!}" class="user-image">
                @else
                    <img src="{!! asset('bower_components/AdminLTE/dist/img/avatar.png') !!}" class="user-image">
                @endif
            </div>
            <div class="pull-left info">
                <p>{!! Auth::user()->display_name !!}</p>
                <a href="#"><i class="fa fa-circle text-success"></i>{{ __('Online') }}</a>
            </div>
        </div>
    
        <ul class="sidebar-menu">
            <li class="header" style=" text-transform: uppercase">
                {{ __('Main Navigation') }}
            </li>
            <li class="treeview">
                <a href="{{ route('users.index') }}">
                    <i class="fa fa-book"></i>
                    <span> {{ __('List Users') }}  </span>
                </a>
            </li>
            <li class="treeview">
                <a href="{{ route('category.index') }}">
                    <i class="fa fa-book"></i>
                    <span> {{ __('Category') }}  </span>
                </a>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-book"></i>
                    <span>{{ __('Parent Menu 2') }}</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="">
                            <i class="fa fa-play"></i>
                            <span>{{ __('Submenu') }}</span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
