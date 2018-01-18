@extends('frontend.master')
@section('main')
<div class="block">
    <h3>Search result for: {{ $key }}</h3>
    <div class="tab">
        <button class="tablinks" onclick="openCity(event, 'place')">{{ count($places) }} {{ trans('place') }}</button>
        <button class="tablinks" onclick="openCity(event, 'people')">{{ count($users) }} {{ trans('people') }}</button>
        <button class="tablinks" onclick="openCity(event, 'review')">{{ count($reviews) }} {{ trans('review') }}</button>
    </div>
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
            @if (count($places) < 1)
                <h4>No result</h4>
            @endif
        @endif
    </div>
    <div id="people" class="tabcontent">
        @if ($users)
            @foreach ($users as $user)
                @if (isset($user->name))
                    <div class="row">
                        <div class="col-md-8">
                            <a href="{{ route('mywall', $user->id) }}"><h3>{{ $user->name }}</h3></a>
                            <p>{{ $user->email }}</p>
                        </div>
                        <div class="col-md-4">
                            {{ HTML::image($user->path_image, null, ['class' => 'show-img']) }}
                        </div>
                    </div>
                    <hr>
                @endif
            @endforeach
            @if (count($users) < 1)
                <h4>No result</h4>
            @endif
        @endif
    </div>
    <div id="review" class="tabcontent">
        @if ($reviews)
            @foreach ($reviews as $review)
                <div class="row">
                    <div class="col-md-8">
                        <a href="{{ route('reviews.show', $review->id) }}"><h3>{{ $review->submary }}</h3></a>
                        <p><a href="{{ route('mywall', $review->user->id) }}">{{ $review->user->name }}</a> <b>{{ trans('messages.at') }}</b> <a href="{{ route('showplace', $review->place->id) }}">{{ $review->place->name }}</a> </p>
                    </div>
                    <div class="col-md-4">
                        {{ HTML::image($review->image_review, null, ['class' => 'show-img']) }}
                    </div>
                </div>
                <hr>
            @endforeach
            @if (count($reviews) < 1)
                <h4>No result</h4>
            @endif
        @endif
    </div>
</div>
@stop
@section('script')
<script>
function openCity(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    } 
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}
</script>
@endsection
