<div>
    {{ HTML::image(Auth::user()->pathImage, null, ['class' => 'comment-ava']) }}
    <strong><a href="#">{{ Auth::user()->name }}</a></strong>
    <br />
    <p>{{ $content }}</p>
</div>
