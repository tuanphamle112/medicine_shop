@extends('admin.layouts.admin-layout')

@section('pageAdminTitle', __('Comments'))

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        {{ __('Comments') }}
        <small>{{ __('List') }}</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{!! url('admin') !!}"><i class="fa fa-dashboard"></i>{{ __('Home') }}</a></li>
        <li class="active">{{ __('Comments') }}</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <div class="col-md-10">
                        <h3 class="box-title">{{ __('Comments') }}</h3>
                    </div>
                    <div class="col-md-2 text-right">
                        <a href="" data-toggle="tooltip" title="" class="btn btn-default" data-original-title="{{ __('Rebuild') }}"><i class="fa fa-refresh"></i></a>
                    </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <table id="user_list_table" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>{{ __('ID #') }}</th>
                            <th>{{ __('Content') }}</th>
                            <th>{{ __('User') }}</th>
                            <th>{{ __('Medicine') }}</th>
                            <th>{{ __('Created At') }}</th>
                            <th>{{ __('Updated At') }}</th>
                            <th>{{ __('Status') }}</th>
                            <th>{{ __('Action') }}</th>
                        </tr>
                        </thead>
                        <tbody>

                        @php
                            $comments = $data['comments']
                        @endphp

                        @foreach ($comments as $comment)
                            <tr>
                                <td>
                                    <span>{{ $comment->id }}</span>
                                </td>
                                <td>
                                    <span>{!! str_limit($comment->content, 120) !!}</span>
                                </td>
                                <td>
                                    <span>{{ $comment->getUser->display_name }}</span>
                                </td>
                                <td>
                                    <span>{{ $comment->getMedicine->name }}</span>
                                </td>
                                <td>
                                    <span>{{ $comment->created_at }}</span>
                                </td>
                                <td>
                                    <span>{{ $comment->updated_at }}</span>
                                </td>
                                <td class="text-center">
                                    @if ($comment->status === App\Eloquent\Comment::STATUS_ENABLE)
                                        <div class="btn btn-primary text-center">
                                            <i class="fa fa-eye"></i>
                                            <span>{{ __('Enable') }}</span>
                                        </div>
                                    @else
                                        <div class="btn btn-danger text-center">
                                            <i class="fa fa-ban"></i>
                                            <span>{{ __('Disable') }}</span>
                                        </div>
                                    @endif
                                </td>
                                <td class="text-right">
                                    {!! Form::open(['route' =>['comment.destroy', $comment->id], 'method' => 'DELETE']) !!}
                                        <span class="text-right">
                                            <a href="{{ route('comment.edit', [$comment->id]) }}" data-toggle="tooltip" class="btn btn-primary" data-original-title="{{ __('Edit') }}">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                        </span>
                                        <button type="button" data-toggle="tooltip" class="btn btn-danger"
                                            onclick="return confirm('{{ __('Are you delete?') }}') ? $(this).parent().submit(): false;"
                                            data-original-title="{{ __('Delete') }}"
                                        >
                                            <i class="fa fa-trash-o"></i>
                                        </button>
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{ $comments->links() }}
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div><!-- /.col -->
    </div><!-- /.row -->
</section><!-- /.content -->
@endsection
