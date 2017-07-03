<footer class="site-footer site-section">
    <div class="container">
        <!-- Footer Links -->
        <div class="row">
            <div class="col-sm-6 col-md-6 left">
                <h4 class="footer-heading">{{ __('Follow us') }}</h4>
                <ul class="footer-nav footer-nav-social list-inline">
                    <li><a href="javascript:void(0)"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="javascript:void(0)"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="javascript:void(0)"><i class="fa fa-google-plus"></i></a></li>
                    <li><a href="javascript:void(0)"><i class="fa fa-dribbble"></i></a></li>
                    <li><a href="javascript:void(0)"><i class="fa fa-rss"></i></a></li>
                </ul>
            </div>
            <div class="col-sm-6 col-md-6 left">
                <h4 class="footer-heading">2014 - {{ date('Y') }} &copy; 
                <a href="{{ url('') }}">{{ __('Framgia Medicines') }}</a></h4>
                <ul class="footer-nav list-inline">
                    <li>
                        {{ __('Provide best quality healthcare for you') }}
                    </li>
                </ul>
            </div>
        </div>
        <!-- END Footer Links -->
    </div>
</footer>
