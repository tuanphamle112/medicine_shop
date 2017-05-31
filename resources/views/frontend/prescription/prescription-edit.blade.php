@extends('layouts.master')

@section('title', __('Edit Prescription'))

@section('content')
@php
    $prescription = $data['prescription'];
@endphp
<div class="content position-relative">
    <div class= "row">
        <div class="panel panel-success">
            <div class="panel-heading text-center">
                <div class="row">
                    <div class="col-sm-10">
                        <h3 class="panel-title">{{ __('Edit Prescription') }}</h3>
                    </div>
                    <div class="col-sm-2">
                        <a href="{!! route('frontend.prescription.index') !!}" data-toggle="tooltip" class="btn btn-default" title="{{ __('Cancel') }}">
                            <i class="fa fa-reply"></i>
                        </a>
                        {!! Form::button(__('Save'), ['type' => 'submit', 'form' => 'edit-prescription', 'data-toggle' => 'tooltip', 'class' => 'btn btn-primary', 'title' => __('Save')]) !!}
                    </div>
                </div>
            </div>
            <div class="panel-body">
                {!! Form::open(['route' => ['frontend.prescription.update', $prescription->id], 'id' => 'edit-prescription', 'class' => 'form-horizontal', 'method' => 'put']) !!}

                    <div class="form-group">
                        {!! Form::label('name_prescription', __('Prescription Name'), ['class' => 'col-sm-2 control-label']) !!}
                        <div class="col-sm-9">
                            {!! Form::text('name_prescription', $prescription->name_prescription, ['class' => 'form-control', 'placeholder' => __('Prescription Name'), 'required' => 'true']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('name_doctor', __('Doctor Name'), ['class' => 'col-sm-2 control-label']) !!}
                        <div class="col-sm-4">
                            {!! Form::text('name_doctor', $prescription->name_doctor, ['class' => 'form-control', 'placeholder' => __('Doctor Name')]) !!}
                        </div>
                        {!! Form::label('frequency', __('Frequency'), ['class' => 'col-sm-1 control-label']) !!}
                        <div class="col-sm-4">
                            {!! Form::text('frequency', $prescription->frequency, ['class' => 'form-control', 'placeholder' => __('Frequency')]) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('guide', __('Guide'), ['class' => 'col-sm-2 control-label']) !!}
                        <div class="col-sm-9">
                            {!! Form::textarea('guide', $prescription->guide, ['class' => 'form-control', 'rows' => '6']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('', __('Prescription Items'), ['class' => 'col-sm-2 control-label']) !!}
                        <div class="col-sm-1 text-left">
                            <a href="#" data-toggle="tooltip" class="btn btn-primary" title="{{ __('Add New Item') }}" data-bind="click: addNewItem">
                                <i class="fa fa-plus"></i>
                            </a>
                        </div>
                        <div class="col-sm-8" data-bind="foreach: items">
                            <div class="row well">
                                {!! Form::hidden('medicine_id[]', '',['data-bind' => 'value: medicineId']) !!}
                                {!! Form::hidden('item_id[]', '',['data-bind' => 'value: itemId']) !!}
                                <div class="col-sm-8 position-relative height-35px">
                                    {!! Form::text('name_medicine[]', '', ['class' => 'form-control', 'placeholder' => __('Medicine Name'), 'required' => 'true', 'autocomplete' => 'off', 'data-bind' => 'value: medicineName, event:{keyup: findMedicineKeyup, focus: findMedicineKeyup}']) !!}
                                    <div class="col-sm-12 prescrition-search-item hide">
                                        <ul class="list-group" data-bind="foreach: resultFindMedicines">
                                            <li class="list-group-item" data-bind="text: name, event:{click: $parent.clickSelectedMedicine}">
                                            </li>
                                        </ul>
                                        <ul class="list-group" data-bind="if: resultFindMedicines().length == 0">
                                            <div class="text-center alert-danger cursor-pointer" data-bind="click: closeNotFoundMedicine">
                                                {{ __('Medicine not found! Click to make request for Admin!') }}
                                            </div>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-sm-3"d>
                                    {!! Form::text('amount[]', '', ['class' => 'form-control', 'placeholder' => __('Amount'), 'required' => 'true', 'data-bind' => 'value: amout']) !!}
                                </div>
                                <div class="col-sm-1 pull-left">
                                    <a href="#" data-toggle="tooltip" class="btn btn-danger" data-bind="click: $root.deleteItem" title="{{ __('Delete Item') }}">
                                        <i class="fa fa-trash-o"></i>
                                    </a>
                                </div>
                                <div class="col-sm-12 padding-15px request-new-medicine" data-bind="attr: {style: styleRequest}">
                                    {!! Form::textarea('short_describer[]', '', ['class' => 'form-control', 'placeholder' => __('Short Describer for Medicine to send Admin.'), 'rows' => '3', 'data-bind' => 'value: shortDescriber']) !!}
                                </div>
                                <div data-bind="if: responeAdmin()" class="col-sm-12">
                                    <span class="label label-info">{{ __('Respone By Admin') }}</span>
                                    <span data-bind="text: responeAdmin"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
     <div class="indicator hide">
        <div class="spinner"></div>
    </div>
</div>

@endsection

@section('custom-javascript')
<script src="{!! url('js/frontend/prescrition.js') !!}"></script>
<script>

    var data = {!! json_encode($prescription->getAllItemPrescriptions) !!};
    ko.applyBindings(new AddPrescriptionViewModel().initData(data, '{{ __('Are you delete?')}}'));
</script>
@endsection
