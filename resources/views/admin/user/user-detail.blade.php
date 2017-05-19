@extends('admin.layouts.admin-layout')

@section('pageAdminTitle', __('Detail user :name', ['name' => $user->display_name]))

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>{{ __('Detail user :name', ['name' => $user->display_name]) }}</h1>
    <ol class="breadcrumb">
        <li><a href="{!! url('admin') !!}"><i class="fa fa-dashboard"></i>{{ __('Home') }}</a></li>
        <li class="active">{{ __('Detail user :name', ['name' => $user->display_name]) }}</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <div class="col-md-10">
                    </div>
                    <div class="col-md-2 text-right">
                        <a href="{{ route('users.edit', [$user->id]) }}" data-toggle="tooltip" class="btn btn-primary" data-original-title="{{ __('Edit') }}">
                            <i class="fa fa-pencil"></i>
                        </a>
                        <a href="{!! url('admin/users') !!}" data-toggle="tooltip" class="btn btn-default" data-original-title="{{ __('Cancel') }}">
                            <i class="fa fa-reply"></i>
                        </a>
                    </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                    @if ($user->avatar)
                        <div class="col-sm-4">
                            <img src="{{ url($user->avatar) }}" alt="{{ $user->display_name }}" class="img-responsive" style="border-radius: 30%">
                        </div>
                        <div class="col-sm-8">
                    @else
                        <div class="col-sm-12">
                    @endif
                        <div class="panel panel-info">
                            <!-- Default panel contents -->
                            <div class="panel-heading">
                                <i class="fa  fa-user"></i>
                                <span>{{ $user->display_name }}</span>
                                <span class="label label-warning">
                                    {{ App\User::getPermissionOption()[$user->permission] }}
                                </span>
                            </div>
                            <div class="panel-body">
                                <!-- List group -->
                                <ul class="list-group">
                                    <li class="list-group-item">
                                        <span class="label label-info">{{ __('Email') }}</span>
                                        <span>{{ $user->email }}</span>
                                    </li>
                                    @if ($user->phone)
                                        <li class="list-group-item">
                                            <span class="label label-info">{{ __('Phone') }}</span>
                                            <span>{{ $user->phone }}</span>
                                        </li>
                                    @endif
                                    @if ($user->address)
                                        <li class="list-group-item">
                                            <span class="label label-info">{{ __('Address') }}</span>
                                            <span>{{ $user->address }}</span>
                                        </li>
                                    @endif
                              </ul>
                            </div>
                        </div>
                    </div>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div><!-- /.col -->
    </div><!-- /.row -->
</section><!-- /.content -->
@endsection
