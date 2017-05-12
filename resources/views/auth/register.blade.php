@extends('layouts.app')

@section('titlePage', __('Register'))

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{ __('Register') }}</div>
                <div class="panel-body">

                    {!! Form::open(['route' => 'register', 'method' => 'post', 'class' => 'form-horizontal', 'role' => 'form']) !!}
                 
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            {!! Form::label('display_name', __('Display name'),['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::text('display_name','',['class' => 'form-control', 'placeholder' => __('Display Name'), 'autofocus' => '', 'required' => '']) !!}

                                @if ($errors->has('display_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('display_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            {!! Form::label('email', __('E-Mail Address'),['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::email('email','',['class' => 'form-control', 'placeholder' => __('E-Mail Address'), 'required' => '']) !!}

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            {!! Form::label('password', __('Password'),['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::password('password', ['class' => 'form-control', 'required' => '', 'placeholder' => __('Password')]) !!}

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('password_confirmation', __('Confirm Password'),['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::password('password_confirmation', ['class' => 'form-control', 'required' => '', 'placeholder' => __('Confirm Password')]) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                {!! Form::button(__('Register'),['class' => 'btn btn-primary', 'type' => 'submit']) !!}
                            </div>
                        </div>

                    {!! Form::close() !!}
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
