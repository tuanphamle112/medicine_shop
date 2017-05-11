@extends('layouts.app')

@section('titlePage', __('Login'))

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{ __('Login') }}</div>
                <div class="panel-body">
                
                    {!! Form::open(['route' => 'login', 'method' => 'post', 'class' => 'form-horizontal', 'role' => 'form']) !!}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            {!! Form::label('email', __('E-Mail Address'), ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::email('email','',['class' => 'form-control', 'required' => '', 'autofocus' => '', 'placeholder' => __('E-Mail Address')]) !!}
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            {!! Form::label('password', __('Password'), ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::password('password',['class' => 'form-control', 'required' => '', 'placeholder' => __('Password')]) !!}
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="">
                                    {!! Form::checkbox('remember') !!}
                                    {!! Form::label('remember', __('Remember Me')) !!}
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                {!! Form::button(__('Login'),['class' => 'btn btn-primary', 'type' => 'submit']) !!}
                                <a class="btn btn-link" href="{{ route('password.request') }}">{{ __('Forgot Your Password?') }}</a>
                            </div>
                        </div>

                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
