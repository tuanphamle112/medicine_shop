@extends('layouts.master')
@section('subMedicine', $subMedicine->name)
@section('subnav-bar')
    @include('layouts.subnav-bar')
@endsection
@section('content')
    <div class="content">
        <div class= "row">
            @foreach($items as $item)
                <div class= "col-sm-3">
                    @include('item')
                </div>
            @endforeach
        </div>
    </div>
@endsection
