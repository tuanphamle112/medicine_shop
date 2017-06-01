@extends('layouts.master')

@section('title', __('Search Medicine'))

@section('content')
 <div class="panel panel-success">
    <div class="panel-heading">
        <div class="row">
            <div class="col-sm-12 text-center padding-15px">
                <h3 class="panel-title">
                    {{ __('Search results for keywords:') }}
                    {{ ' "' . $keyword . '"' }}
                </h3>
            </div>
        </div>
    </div>
    <div class="panel-body">
        <div class="content">
            <div class= "row">
                @foreach($items as $item)
                    <div class= "col-sm-3">
                        @include('item')
                    </div>
                @endforeach

                @if (count($items) == 0)
                    <div class="text-center v-x2-padding">
                        {{ __('No Item') }}
                    </div>
                @endif
            </div>
        </div>
    </div>
    <div class="text-center">
        {{ $items->links() }}
    </div>
</div>
@endsection
