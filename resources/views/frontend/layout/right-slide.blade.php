<div class="col-md-3 col-md-offset-7" id="right-menu">
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        @foreach($topPlaces as $topPlace)
        <a href="{{ route('showplace', $topPlace->id) }}">
            <div>
                {{ HTML::image($topPlace->ImagePlace, null, ['class' => 'slide-img']) }}
            </div>
        </a>
        @endforeach
    </div>
</div>
