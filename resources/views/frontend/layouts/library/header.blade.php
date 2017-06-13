
<header>
    <div class="container">
        <!-- Site Logo -->
        <a href="/" class="site-logo">
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
                <li class="active">
                    <a href="/" class="site-nav-sub"><i class="fa fa-angle-down site-nav-arrow"></i>{{ __('Home') }}</a>
                </li>
                <li>
                    <a href="javascript:void(0)" class="site-nav-sub"><i class="fa fa-angle-down site-nav-arrow"></i>{{ __('Categories') }}</a>
                    <ul>
                        <li>
                            <a href="/antibious">Antibious</a>
                        </li>
                        <li>
                            <a href="blog_post.html">Bla bla</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="contact.html">{{ __('Contact') }}</a>
                </li>
                <li>
                    <a href="about.html">{{ __('About') }}</a>
                </li>
                <li>
                    <a href="login.html" class="btn btn-primary">{{ __('Log In') }}</a>
                </li>
                <li>
                    <a href="signup.html" class="btn btn-success">{{ __('Sign up') }}</a>
                </li>
            </ul>
            <!-- END Main Menu -->
        </nav>
        <!-- END Site Navigation -->
    </div>
</header>
