@extends('admin.layouts.admin-layout')

@section('pageAdminTitle', __('Edit Medicine :name', ['name' => $medicine->name]))

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>{{ __('Edit Medicine :name', ['name' => $medicine->name]) }}</h1>
    <ol class="breadcrumb">
        <li><a href="{!! url('admin') !!}"><i class="fa fa-dashboard"></i>{{ __('Home') }}</a></li>
        <li class="active">{{ __('Edit Medicine :name', ['name' => $medicine->name]) }}</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <div class="col-md-10">
                        <h3 class="box-title">{{ __('Edit Medicine :name', ['name' => $medicine->name]) }}</h3>
                    </div>
                    <div class="col-md-2 text-right">
                        {!! Form::button(__('Save'), ['type' => 'submit', 'form' => 'edit-medicine', 'data-toggle' => 'tooltip', 'class' => 'btn btn-primary', 'data-original-title' => __('Save')]) !!}

                        <a href="{!! route('medicine.index') !!}" data-toggle="tooltip" class="btn btn-default" data-original-title="{{ __('Cancel') }}">
                            <i class="fa fa-reply"></i>
                        </a>
                    </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                    {!! Form::open(['route' => ['medicine.update', $medicine->id], 'id' => 'edit-medicine', 'class' => 'form-horizontal', 'method' => 'PUT', 'files' => 'true']) !!}

                        <div class="form-group">
                            <div class="col-sm-6">
                                {!! Form::label('name', __('Medicine Name'), ['class' => 'col-sm-2 control-label']) !!}

                                <div class="col-sm-10">
                                    {!! Form::text('name', $medicine->name, ['class' => 'form-control', 'placeholder' => __('Medicine Name')]) !!}
                                    <span style="color:red">{!! $errors->first('name') !!}</span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                {!! Form::label('symptom', __('Symptom'), ['class' => 'col-sm-2 control-label']) !!}
                                <div class="col-sm-10">
                                    {!! Form::text('symptom', $medicine->symptom, ['class' => 'form-control', 'placeholder' => __('Symptom')]) !!}
                                    <span style="color:red">{!! $errors->first('symptom') !!}</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-6">
                                {!! Form::label('short_describer', __('Short Describer'), ['class' => 'col-sm-2 control-label']) !!}
                                <div class="col-sm-10">
                                    {!! Form::textarea('short_describer', $medicine->short_describer, ['class' => 'form-control', 'placeholder' => __('Short Describer'), 'rows' => '5']) !!}
                                    <span style="color:red">{!! $errors->first('short_describer') !!}</span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                {!! Form::label('categories', __('Categories'), ['class' => 'col-sm-2 control-label']) !!}
                                <div class="col-sm-10">
                                    <?php $allCategories = new App\Category; ?>
                                    {{ Form::select('categories[]', $allCategories->getAllOptionCategories(), $data['selectCategories'], ['multiple' => true, 'class' => 'form-control categories'])}}
                                    <span style="color:red">{!! $errors->first('categories') !!}</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                {!! Form::label('images', __('Images'), ['class' => 'col-sm-1 control-label']) !!}
                                <div class="col-sm-11">
                                    {!! Form::file('images[]', ['class' => 'form-control', 'multiple' => true]) !!}
                                    <span style="color:red">{!! $errors->first('images.*') !!}</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-1"></div>
                            @foreach ($data['images'] as $image)
                                <div class="col-sm-2">
                                    <img src="{{ url($image->path_origin) }}" class="img-thumbnail" alt="{{ $medicine->name }}" style="max-height: 200px;">
                                    <div class="col-sm-12 text-center checkbox">
                                        <label>
                                            {!! Form::checkbox('image_delete[]', $image->id) !!}
                                            {{ __('Delete') }}
                                        </label>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                {!! Form::label('detail', __('Detail'), ['class' => 'col-sm-1 control-label']) !!}
                                <div class="col-sm-11">
                                    {!! Form::textarea('detail', $medicine->detail, ['class' => 'form-control', 'placeholder' => __('Detail')]) !!}
                                    <span style="color:red">{!! $errors->first('detail') !!}</span>
                                </div>
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div><!-- /.col -->
    </div><!-- /.row -->
</section><!-- /.content -->
@endsection

@section('javascript')
<script type="text/javascript">
    $('.categories').select2();
    CKEDITOR.replace('detail');
</script>
@endsection
