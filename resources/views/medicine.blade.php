@extends('layouts.master')
@section('subMedicine', $medicine->name)
@section('subnav-bar')
    @include('layouts.subnav-bar')
@endsection
@section('content')
    <div class= "row">
        @foreach($items as $item)
            <div class= "col-sm-3">
                @include('item')
            </div>
        @endforeach
    </div>
@endsection
