@extends('frontend.layouts.master')
@if(isset($userProfiles))
@section('title', $userProfiles->display_name)
@else
@section('title', __('My profiles'))
@endif
@section('content')
<div class="media-container media2">
    <!-- For best results use an image with a resolution of 2560x279 pixels -->
    <div class="container banner-title">
        <h1 class="text-center animation-slideDown">
            <strong>
                @if (Auth::check())
                {{ __('Hello '). Auth::user()->display_name }}
                @else
                {{ __('Hello ') }}
                @endif
            </strong></h1>
            <h2 class="h3 text-center animation-slideUp">
                @if (isset($userProfiles))
                {{ __("Here's ").$userProfiles->display_name.__(" profiles ") }}
                @else
                {{ __("Let's check your profiles!") }}
                @endif
            </h2>
        </div>
        <img src="/images/mountain.jpg" alt="Image" class="media-image animation-pulseSlow">
    </div>

    <div class="wrap-user-sitecontent">
        <section class="site-content site-section site-slide-content site-userprofile">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 toppad" >
                        <div class="wrap-panel">
                            <div class="panel panel-info">
                                <div class="panel-heading">
                                    <h3 class="panel-title">
                                        @if (isset($userProfiles))
                                        {{ $userProfiles->display_name }}
                                        @else
                                        {{ Auth::user()->display_name }}
                                        @endif
                                    </h3>
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-3 col-lg-3 img-padding-circle" align="center"> 
                                            <img alt="User Pic" 
                                            @if (isset($userProfiles))
                                            src="{!! App\Helpers\Helper::getLinkUserAvatar($userProfiles->avatar) !!}"
                                            @else
                                            src="{!! App\Helpers\Helper::getLinkUserAvatar(Auth::user()->avatar) !!}"
                                            @endif
                                            class="img-circle img-responsive" width="300px" height="300px"> 
                                            @if (!isset($userProfiles))
                                            <div class="edit-icon">
                                                <a href="javascript:void(0)" data-toggle="modal" data-target="#modalAvatar">
                                                    <i class="fa fa-pencil" aria-hidden="true"></i> {{ __('Edit') }}
                                                </a>
                                            </div>
                                            @endif
                                        </div>
                                        <div class=" col-md-9 col-lg-9 "> 
                                            <table class="table table-striped table-user-information">
                                                <tbody>
                                                    @if (count($errors) > 0)
                                                    <div class="alert alert-danger">
                                                        <ul>
                                                            @foreach ($errors->all() as $error)
                                                            <li>{{ $error }}</li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                    @endif
                                                    <tr class="tr-hover-edit1 tr-hover-edit">
                                                        <th> {{ __('Personal information') }} :</th>
                                                        @if (!isset($userProfiles))
                                                        <td>
                                                            <div class=" edit1 float-right " data-toggle="modal" data-target="#per-info">
                                                                <span class="span-edit">
                                                                    <i class="fa fa-pencil" aria-hidden="true"></i>  
                                                                </span>
                                                            </div>
                                                        </td>
                                                        @endif
                                                    </tr>
                                                    @if (isset($userProfiles))
                                                    <tr>
                                                        <td>{{ __('Name') }} :</td>
                                                        <td>{{ $userProfiles->display_name }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>{{ __('Type User') }} :</td>
                                                        <td>{{ $option['permission'][$userProfiles->permission] }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>{{ __('Gender') }} :</td>
                                                        <td>{{ $option['gender'][$userProfiles->gender] }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>{{ __('Date of birth') }} :</td>
                                                        <td> {{ $userProfiles->birthday }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>{{ __('E-Mail Address') }} : </td>
                                                        <td>{{ $userProfiles->email }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>{{ __('Password') }}</td>
                                                        <td>
                                                            <span>{{ __('*********') }}</span>
                                                            @if (!isset($userProfiles))
                                                            <span class="span-edit-password">
                                                                <a href="javascript:void(0)" data-toggle="modal" data-target="#change-password">{{ __('Edit') }}</a>
                                                            </span>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>{{ __('Phone') }} :</td>
                                                        <td>{{ $userProfiles->phone }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>{{ __('Address') }} :</td>
                                                        <td>{{ $userProfiles->address }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>{{ __('Short Describe') }}</td>
                                                        <td> {{ $userProfiles->about_you }} </td>
                                                    </tr>
                                                    <br>
                                                    @if($userProfiles->permission == App\Eloquent\User::PERMISSION_DOCTER)
                                                    <tr class="tr-hover-edit2 tr-hover-edit">
                                                        <th> {{ __('Specialize information') }} :</th>
                                                    </tr>
                                                    <tr>
                                                        <td>{{ __('Position') }} :</td>
                                                        <td>{{ $userProfiles->position }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>{{ __('Specialize') }} :</td>
                                                        <td>{{ $userProfiles->specialize }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>{{ __('Certificate') }} :</td>
                                                        <td>{{ $userProfiles->certificate }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>{{ __('Experience') }} :</td>
                                                        <td>{{ $userProfiles->experience }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>{{ __('Workplace') }} : </td>
                                                        <td> {{ $userProfiles->workplace }}</td>
                                                    </tr>
                                                    @endif
                                                    {{-- ---> Another user profiles --}}
                                                    @else
                                                    <tr>
                                                        <td>{{ __('Name') }} :</td>
                                                        <td>{{ Auth::user()->display_name }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>{{ __('Type User') }} :</td>
                                                        <td>{{ $option['permission'][Auth::user()->permission] }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>{{ __('Gender') }} :</td>
                                                        <td>{{ $option['gender'][Auth::user()->gender] }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>{{ __('Date of birth') }} :</td>
                                                        <td> {{ Auth::user()->birthday }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>{{ __('E-Mail Address') }} : </td>
                                                        <td>{{ Auth::user()->email }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>{{ __('Password') }}</td>
                                                        <td>
                                                            <span>{{ __('*********') }}</span>
                                                            <span class="span-edit-password">
                                                                <a href="javascript:void(0)" data-toggle="modal" data-target="#change-password">{{ __('Edit') }}</a>
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>{{ __('Phone') }} :</td>
                                                        <td>{{ Auth::user()->phone }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>{{ __('Address') }} :</td>
                                                        <td>{{ Auth::user()->address }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>{{ __('Short Describe') }}</td>
                                                        <td> {{ Auth::user()->about_you }} </td>
                                                    </tr>
                                                    <br>
                                                    @if(Auth::user()->permission == App\Eloquent\User::PERMISSION_DOCTER)
                                                    <tr class="tr-hover-edit2 tr-hover-edit">
                                                        <th> {{ __('Specialize information') }} :</th>
                                                    </tr>
                                                    <tr>
                                                        <td>{{ __('Position') }} :</td>
                                                        <td>{{ Auth::user()->position }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>{{ __('Specialize') }} :</td>
                                                        <td>{{ Auth::user()->specialize }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>{{ __('Certificate') }} :</td>
                                                        <td>{{ Auth::user()->certificate }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>{{ __('Experience') }} :</td>
                                                        <td>{{ Auth::user()->experience }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>{{ __('Workplace') }} : </td>
                                                        <td> {{ Auth::user()->workplace }}</td>
                                                    </tr>
                                                    
                                                    @endif
                                                    @endif
                                                    
                                                </tbody>
                                            </table>
                                        </div> 
                                    </div>
                                </div>
                                <!-- Modal personal -->
                                @if (Auth::check())
                                <div class="modal fade" id="per-info" role="dialog">
                                    <div class="modal-dialog">
                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">
                                                    {{ __('Edit personal information') }}
                                                </h4>
                                            </div>
                                            <div class="modal-body form-edit-user">
                                                {!! Form::open(['route' => 'frontend.user.edit.personal']) 
                                                !!}
                                                {{-- personal edit --}}
                                                <div class="form-group col-md-6 col-xs-12">
                                                    {{ Form::label('display_name', __('Name')) }}
                                                    {{ Form::text('display_name', Auth::user()->display_name, array('class' => 'form-control display_name')) }}
                                                </div>
                                                <div class="form-group col-md-6 col-xs-12">
                                                    {{ Form::label('gender', __('Gender')) }}
                                                    {{ Form::select('gender', $option['gender'], Auth::user()->gender, array('class' => 'form-control')) }}
                                                </div>
                                                <div class="form-group col-md-6 col-xs-12">
                                                    {{ Form::label('date_of_birth', __('Date of birth :')) }}
                                                    {{ Form::date('birthday', Auth::user()->birthday, array('class' => 'form-control date_of_birth')) }}
                                                </div>
                                                <div class="form-group col-md-6 col-xs-12">
                                                    {{ Form::label('phone', __('Phone')) }}
                                                    {{ Form::text('phone', Auth::user()->phone, array('class' => 'form-control phone')) }}
                                                </div>
                                                <div class="form-group col-md-6 col-xs-12">
                                                    {{ Form::label('address', __('Address')) }}
                                                    {{ Form::text('address', Auth::user()->address, array('class' => 'form-control address')) }}
                                                </div>
                                                <div class="form-group col-md-12 col-xs-12">
                                                    {{ Form::label('about_you', __('Short describe')) }}
                                                    {{ Form::textarea('about_you', Auth::user()->about_you, array('class' => 'form-control describe')) }}
                                                </div>
                                                {{ Form::hidden('user_id', Auth::user()->id, array('id' => 'user_id_hidden')) }}
                                                
                                                {{-- end personal edit --}}
                                                {{-- specialize edit --}}
                                                @if (Auth::user()->permission == App\Eloquent\User::PERMISSION_DOCTER)
                                                <div class="form-group col-md-6 col-xs-12">
                                                    {{ Form::label('position', __('Position')) }}
                                                    {{ Form::text('position', Auth::user()->position, array('class' => 'form-control position')) }}
                                                </div>
                                                <div class="form-group col-md-6 col-xs-12">
                                                    {{ Form::label('specialize', __('Specialize')) }}
                                                    {{ Form::text('specialize', Auth::user()->specialize, array('class' => 'form-control specialize')) }}
                                                </div>
                                                <div class="form-group col-md-6 col-xs-12">
                                                    {{ Form::label('certificate', __('Certificate')) }}
                                                    {{ Form::text('certificate', Auth::user()->certificate, array('class' => 'form-control certificate')) }}
                                                </div>
                                                <div class="form-group col-md-6 col-xs-12">
                                                    {{ Form::label('experience', __('Experience')) }}
                                                    {{ Form::text('experience', Auth::user()->experience, array('class' => 'form-control experience')) }}
                                                </div>
                                                <div class="form-group col-md-6 col-xs-12">
                                                    {{ Form::label('workplace', __('Workplace')) }}
                                                    {{ Form::text('workplace', Auth::user()->workplace, array('class' => 'form-control workplace')) }}
                                                </div>
                                                @endif

                                                {{ Form::hidden('user_id', Auth::user()->id, array('id' => 'user_id_hidden')) }}
                                                {{ Form::submit('Submit', array('class' => 'btn btn-success user-submit-personal-info','data-toggle'=> 'modal', 'data-target' => '#per-user-edit')) }}
                                                {{-- end specialize edit --}}
                                                {{ Form::close() }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                <!-- Modal avatar -->
                                @if (Auth::check())
                                <div class="modal fade" id="modalAvatar" role="dialog">
                                    <div class="modal-dialog">
                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">
                                                    {{ __('Update avatar') }}
                                                </h4>
                                            </div>
                                            <div class="modal-body upload-avatar-form">
                                                <div class="wrap-upload">
                                                    <div class="row">
                                                        <a href="javascript:void(0)" id="attachfile">
                                                            <div class="col-md-12 col-sm-12 col-sx-12 button-upload-avatar" >
                                                                <i class="fa fa-plus" aria-hidden="true"></i>
                                                                <span>{{ __('Upload Image') }}</span>
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <div class="row">
                                                        <div class="wrap-image-upload">
                                                            <div class="col-md-3 col-lg-3">
                                                            </div>
                                                            <div class="col-md-6 col-lg-6 img-padding-circle image-upload" align="center"> 
                                                                <img alt="User Pic" id= "image_target" src="{!! App\Helpers\Helper::getLinkUserAvatar(Auth::user()->avatar) !!}" class="img-circle img-responsive" width="300px" height="300px"> 
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="wrap-upload-note">
                                                        <span><b>{{ __('Note') }} : </b>{{ __("Image's size recomment: greater 350px width and height ") }} </span>

                                                    </div>
                                                    <div class="form-upload-avatar">
                                                       {{ Form::open(array('route' => 'show_upload_avatar', 'files'=>'true')) }}
                                                       {{ Form::file('image_upload', array('id' => 'edit_photo')) }} 
                                                       {{ Form::submit('Save', array('id' => 'submit_photo', 'class' => 'btn btn-success')) }} 
                                                       {{ Form::close() }}
                                                   </div>
                                               </div>
                                           </div>
                                       </div>
                                   </div>
                               </div>
                               @endif
                               <!-- Modal change password -->
                               <div class="modal fade" id="change-password" role="dialog">
                                <div class="modal-dialog">
                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">
                                                {{ __('Change password') }}
                                            </h4>
                                        </div>
                                        <div class="modal-body">
                                            <p class="change-password-notification text-center"></p>
                                            <div class="form-group">
                                                {{ Form::label('old_password', __('Old password')) }}
                                                {{ Form::password('old_password', array('class' => 'form-control data-old-password', 'placeholder' => 'Old password')) }}
                                                <span class="text-danger noti-old-password"></span>
                                            </div>
                                            
                                            <div class="form-group">
                                                {{ Form::label('new_password', __('New password')) }}
                                                {{ Form::password('new_password', array('class' => 'form-control data-new-password', 'placeholder' => 'New password')) }}
                                                <span class="text-danger noti-new-password"></span>
                                            </div>
                                            <div class="form-group">
                                                {{ Form::label('confirm-password', __('Confirm password')) }}
                                                {{ Form::password('confirm_password', array('class' => 'form-control data-confirm-password', 'placeholder' => 'Confirm password')) }}
                                                <span class="text-danger noti-confirm-password"></span>
                                            </div>
                                            <button class="btn btn-success user-change-password">{{ __('Change') }}</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
