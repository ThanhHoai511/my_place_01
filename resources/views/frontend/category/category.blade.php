@extends('frontend.master')
@section('main')
<div class="block">
    <h3>@if ($cate_name) {{ $cate_name->name }} @if ($cate_name->type_concept) {{ $cate_name->type_concept }} @endif @endif</h3>
    <div id="place" class="tabcontent" style="display: block;">
        @if ($places)
            @foreach ($places as $place)
                <div class="row">
                    <div class="col-md-8">
                        <a href="{{ route('showplace', $place->id) }}"><h3>{{ $place->name }}</h3></a>
                        <p>{{ $place->add }}</p>
                    </div>
                    <div class="col-md-4">
                        {{ HTML::image($place->image_place, null, ['class' => 'show-img']) }}
                    </div>
                </div>
                <hr>
            @endforeach
        @endif
        @if (count($places) < 1)
            <h4>No result</h4>
        @endif
    </div>
</div>
@stop
