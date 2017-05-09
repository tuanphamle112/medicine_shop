<div class="row v-x2-padding footer">
    <footer class="col-md-12">
        <div class="col-xs-12 col-sm-4 col-md-4">
            <a href="/home.php" class="brand">
                <!-- Start footer -->
                {{ trans('label.logo') }}
            </a>
            <ul class="social">
                <li>
                    <a href="#" target="_blank">
                        <i class="fa fa-facebook"></i>
                    </a>
                </li>               
                <li>
                    <a href="#" target="_blank">
                        <i class="fa fa-twitter"></i>
                    </a>
                </li>                               
                <li>
                    <a href="#" target="_blank">
                        <i class="fa fa-instagram"></i>
                    </a>
                </li>                           
            </ul>
        </div>
        <!-- End social -->
        <div class="col-xs-12 col-sm-3 col-md-3">
            <h2 class="sub-header">{{ trans('label.nav') }}</h2>
            <ul class="no-margin navigation">
                <li>
                    <a href="/">{{ trans('label.home') }}</a>
                </li>
                <li>
                    <a href="#">{{ trans('label.store') }}</a>
                </li>
                <li>
                    <a href="#">{{ trans('label.functional_foods') }}</a>
                </li>
                <li>
                    <a href="#">{{ trans('label.tco_beauty') }}</a>
                </li>

                <li>
                    <a href="#">{{ trans('label.tips') }}</a>
                </li>
            </ul>
        </div>
        <!-- End nav -->
        <div class="col-xs-12 col-sm-5 col-md-5 quick-contact-us">
            <h2 class="sub-header">{{ trans('label.contact') }}</h2>
            <div class="form-group">
                {!! Form::open(['route' => 'welcome']) !!}
                    <table class="">
                        <tbody>
                            <tr>
                                <td>
                                   {!! Form::text('firstname', $value = null, $attributes = ['class' => 'firstname', "placeholder" => trans('label.name')]) !!}
                                </td>
                                <td>
                                    {!! Form::email('email', $value = null,  ['class' => 'email', "placeholder" => trans('label.email')]) !!}
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2" rowspan="2">
                                    {!! Form::textarea('message', $value = null, ['class' => 'message', "placeholder" => trans('label.comment')]) !!}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <input type="submit" class="submit-button" value="{{ trans('label.submit') }}">
                {!! Form::close() !!}
            </div>
        </div>
    </footer>
</div>
