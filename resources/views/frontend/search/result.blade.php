@extends('frontend.layouts.master')

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

                @include('frontend.components.item')
                
                @if (count($items) == 0)
                    <div class="text-center v-x2-padding">
                        {{ __('No Item') }}
                    </div>
                @endif
            </div>
        </div>
    </div>
    <div class="text-center">
        {{ $items->appends(['keyword' => $keyword])->links() }}
    </div>
</div>
@endsection
