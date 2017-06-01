<div class="row v-x2-padding footer">
    <footer class="col-md-12">
        <div class="col-xs-12 col-sm-4 col-md-4">
            @php
                $social = json_decode($frontendInfoWebsite->link_communications, true);
            @endphp
            <ul class="social">
                @if (isset($social['facebook']))
                    <li>
                        <a href="{{ $social['facebook'] }}" target="_blank">
                            <i class="fa fa-facebook"></i>
                        </a>
                    </li>
                @endif
                @if (isset($social['twitter']))
                    <li>
                        <a href="{{ $social['twitter'] }}" target="_blank">
                            <i class="fa fa-twitter"></i>
                        </a>
                    </li>
                @endif
                @if (isset($social['instagram']))
                    <li>
                        <a href="{{ $social['instagram'] }}" target="_blank">
                            <i class="fa fa-instagram"></i>
                        </a>
                    </li>
                @endif
            </ul>
        </div>
        <!-- End social -->
        <div class="col-xs-12 col-sm-3 col-md-3">
            <h2 class="sub-header">{{ trans('label.nav') }}</h2>
            <ul class="no-margin navigation">
                <li>
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
        </div>
        <!-- End nav -->
        <div class="col-xs-12 col-sm-5 col-md-5 quick-contact-us">
            <h2 class="sub-header">{{ trans('label.contact') }}</h2>
            <div class="form-group">
                {!! Form::open(['route' => 'frontend.sendemail']) !!}
                    <table class="">
                        <tbody>
                            <tr>
                                <td>
                                   {!! Form::text('firstname', $value = null, $attributes = ['class' => 'firstname', 'placeholder' => trans('label.name'), 'required' => 'true']) !!}
                                </td>
                                <td>
                                    {!! Form::email('email', $value = null,  ['class' => 'email', 'placeholder' => trans('label.email'), 'required' => 'true']) !!}
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2" rowspan="2">
                                    {!! Form::textarea('message', $value = null, ['class' => 'message', 'placeholder' => trans('label.comment'), 'required' => 'true']) !!}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <input type="submit" class="submit-button" value="{{ trans('label.submit') }}">
                {!! Form::close() !!}
            </div>
        </div>

        <!-- Button trigger modal -->
        <button type="button" id="contact-button-show-thanks" class="hide" data-toggle="modal" data-target="#content-thanks-contact">
        </button>

        <!-- Modal -->
        <div class="modal fade" id="content-thanks-contact" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">{{ __('Thank you for your feedback!') }}</h4>
                    </div>
                </div>
            </div>
        </div>

    </footer>
</div>
@php
    $sentEmail = Session::get('sent_email_contact', '');
@endphp


@section('custom-javascript')
    @if ($sentEmail)
        <script>
            $('#contact-button-show-thanks').click();
        </script>
    @endif
@endsection

