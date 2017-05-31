@extends('layouts.master')

@section('title', __('Prescription List'))

@section('content')
<div class="content position-relative" id="area-prescription-list">

    @php
        $messages = Session::get('flash_frontend_messages', []) 
    @endphp

    @foreach ($messages as $message)
        <div class="alert alert-{{ $message['type'] }} alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4>{{ $message['title'] }}</h4>
            <p>{{ $message['message'] }}</p>
        </div>
    @endforeach

    <div class= "row">
        <div class="panel panel-success">
            <div class="panel-heading text-center">
                <div class="row">
                    <div class="col-sm-11">
                        <h3 class="panel-title">{{ __('Mark Medicine List') }}</h3>
                    </div>
                    <div class="col-sm-1">
                        <a href="{{ route('frontend.prescription.addnew') }}" class="btn btn-primary" data-toggle="tooltip" title="{{ __('Add New Prescription') }}">
                            <i class="fa fa-plus"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="panel-body">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr class="warning">
                            <th>{{ __('ID #') }}</th>
                            <th>{{ __('Medicine Name') }}</th>
                            <th>{{ __('Created At') }}</th>
                            <th class="text-center">{{ __('Action') }}</th>
                        </tr>
                    </thead>
                    @foreach ($marks as $mark)
                        <tbody>
                            <tr>
                                <td>{{ $mark->id }}</td>
                                <td>
                                    <a href="{{ url('/detail/' . $mark->id . '/' . str_slug($mark->getMedicine->name)) }}" title="{{ $mark->getMedicine->name }}">
                                        {{ $mark->getMedicine->name }}
                                    </a>
                                </td>
                                <td>{{ $mark->created_at }}</td>
                                <td class="text-center">
                                    {!! Form::open(['route' => ['frontend.mark-medicine.destroy', $mark->id], 'method' => 'DELETE']) !!}
                                        <button type="button" data-toggle="tooltip" class="btn btn-danger"
                                            onclick="return confirm('{{ __('Are you delete?') }}') ? $(this).parent().submit(): false;"
                                            title="{{ __('Delete') }}"
                                        >
                                            <i class="fa fa-trash-o"></i>
                                        </button>
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        </tbody>
                    @endforeach

                    @if (count($marks) == 0)
                        <tbody>
                            <tr>
                                <td colspan="4" class="text-center">
                                    {{ __('No Mark Medicine') }}
                                </td>
                            </tr>
                        </tbody>
                    @endif
                </table>
                {{ $marks->links() }}
            </div>
        </div>
    </div>
</div>

@endsection

