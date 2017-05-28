@extends('layouts.master')

@section('title', __('Prescription List'))

@section('content')
<div class="content position-relative">
    <div class= "row">
        <div class="panel panel-success">
            <div class="panel-heading text-center">
                <div class="row">
                    <div class="col-sm-11">
                        <h3 class="panel-title">{{ __('Prescription List') }}</h3>
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
                            <th class="text-center">{{ __('Prescription Name') }}</th>
                            <th>{{ __('Doctor Name') }}</th>
                            <th>{{ __('Frequency') }}</th>
                            <th>{{ __('Created At') }}</th>
                            <th>{{ __('Updated At') }}</th>
                            <th class="text-center">{{ __('Action') }}</th>
                        </tr>
                    </thead>
                    <tbody data-bind="foreach: prescriptionDataArray">
                        <tr>
                            <td>
                                <span data-bind="text: id"></span>
                            </td>
                            <td>
                                <span data-bind="text: name_prescription"></span>
                            </td>
                            <td>
                                <span data-bind="text: name_doctor"></span>
                            </td>
                            <td>
                                <span data-bind="text: frequency"></span>
                            </td>
                            <td>
                                <span data-bind="text: created_at"></span>
                            </td>
                            <td>
                                <span data-bind="text: updated_at"></span>
                            </td>
                            <td class="text-center">
                                <span class="text-right" data-toggle="modal" data-target="#showDetailPrescription" data-bind="click: $root.viewDetailPrescription">
                                    <a href="#" class="btn btn-primary" data-toggle="tooltip" title="{{ __('View Detail') }}">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                </span>
                                <span class="text-right">
                                    <a href="#" data-toggle="tooltip" class="btn btn-primary" data-toggle="tooltip" title="{{ __('Edit') }}" data-bind="attr:{href: '/prescription/' + id + '/edit'}">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                </span>
                            </td>
                        </tr>
                    </tbody>
                    <tbody data-bind="if: prescriptionDataArray().length === 0">
                        <tr>
                            <td colspan="7" class="text-center">
                                {{ __('No Prescription') }}
                            </td>
                        </tr>
                    </tbody>
                </table>
                <ul class="pager">
                    <li data-bind="if: currentPage() > 1">
                        <a href="#" data-bind="click: prePage"><i class="fa  fa-angle-double-left"></i></a>
                    </li>
                    <li data-bind="if: currentPage() < totalPage()">
                        <a href="#" data-bind="click: nextPage"><i class="fa  fa-angle-double-right"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
     <div class="indicator hide">
        <div class="spinner"></div>
    </div>
</div>

<!-- ko if: (prescriptionDetail()) -->
    <div class="modal fade" id="showDetailPrescription" tabindex="-1" role="dialog" aria-labelledby="detailPrescriptionLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title text-center" id="detailPrescriptionLabel">{{ __('Detail Prescription') }}</h4>
                </div>
                <div class="modal-body">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <h3 class="panel-title" data-bind="">
                                <span class="label label-info">{{ __('Prescription Name') }}</span>
                                <span data-bind="text: prescriptionDetail().name_prescription"></span>
                            </h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <span class="label label-info">{{ __('Doctor Name') }}</span>
                                    <span data-bind="text: prescriptionDetail().name_doctor"></span>
                                </div>
                                <div class="col-sm-6">
                                    <span class="label label-info">{{ __('Frequency') }}</span>
                                    <span data-bind="text: prescriptionDetail().frequency"></span>
                                </div>
                            </div>
                            <div class="row padding-15px">
                                <div class="col-sm-12">
                                    <table class="table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <td colspan="7" class="text-center success">
                                                    {{ __('Items List') }}
                                                </td>
                                            </tr>
                                            <tr class="info">
                                                <th>{{ __('ID #') }}</th>
                                                <th>{{ __('Medicine Name') }}</th>
                                                <th>{{ __('Amout') }}</th>
                                                <th>{{ __('Created At') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody data-bind="foreach: prescriptionDetail().get_all_item_prescriptions">
                                            <tr>
                                                <td>
                                                    <span data-bind="text: id"></span>
                                                </td>
                                                <td>
                                                    <span data-bind="text: name_medicine"></span>
                                                </td>
                                                <td>
                                                    <span data-bind="text: amount"></span>
                                                </td>
                                                <td>
                                                    <span data-bind="text: created_at"></span>
                                                </td>
                                            </tr>
                                        </tbody>
                                        
                                        <tbody data-bind="if: prescriptionDetail().get_all_item_prescriptions.length === 0">
                                            <tr>
                                                <td colspan="4" class="text-center">
                                                    {{ __('No Item') }}
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="panel-footer" data-bind="text: prescriptionDetail().guide"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- /ko -->
@endsection

@section('custom-javascript')
<script src="{!! url('js/frontend/prescrition.js') !!}"></script>
<script>
    ko.applyBindings(new PrescriptionViewModel().initData());
</script>
@endsection
