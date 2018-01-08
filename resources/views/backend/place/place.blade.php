@extends('backend.master')
@section('main')
<div class="large-10 medium-12 small-12 columns light-grey-bg-pattern">
        <div class="row">
            <div class="large-10 columns">
                <div class="page-name">
                    <h3 class="left">{{ trans('message.slide-manage') }}</h3>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <section id="general">
            <div class="row">
                <div class="large-6 medium-6 columns">
                    <div class="custom-panel">
                        <div class="custom-panel-heading">
                            <h4>{{ trans('messages.add-slide') }}</h4>
                        </div>
                        <div class="custom-panel-body">
                            <h5>{{ trans('messages.enter-link') }}</h5>
                            <input type="text" name="link">
                            <h5>{{ trans('messages.dist')}}</h5>
                            {{ Form::select('city', [
                               1 => 'Hà Nội',
                               2 => 'Đà Nẵng',
                               3 => 'TP HCM']
                            ) }}
                            <h5>{{ trans('messages.choose-img') }}</h5>
                            <input type="file" id="slide-image"/>
                            <img id="preview" src="#"/><br/>
                            <a href="#" class="button radius tiny coral-bg button-slide">{{ trans('messages.add') }}</a>
                            <a href="#" class="button radius tiny blue-bg button-slide">{{ trans('messages.back') }}</a>
                        </div>
                    </div>
                </div>
                <div class="large-6 medium-6 columns">
                    <div class="custom-panel">
                        <div class="custom-panel-heading">
                            <h4>{{ trans('messages.slider') }}</h4>
                        </div>
                        <div class="custom-panel-body display-inline">
                            <ul class="slide-list">
                                <li class="slide-item display-inline">
                                    {{ HTML::image(config('asset.image_path.slide') . 'chrismas_1.gif', trans('messages.slide')) }}
                                    <div class="slide-action">
                                        <div>
                                            <a href="#" class="button radius tiny coral-bg button-slide">{{ trans('messages.change') }}</a>
                                        </div>
                                        <div>
                                            <a href="#" class="button radius tiny blue-bg button-slide">{{ trans('messages.del-img') }}</a>
                                        </div>
                                    </div>
                                </li>
                                <li class="slide-item display-inline">
                                    {{ HTML::image(config('asset.image_path.slide') . 'chrismas_2.gif', trans('messages.slide')) }}
                                    <div class="slide-action">
                                        <div>
                                            <a href="#" class="button radius tiny coral-bg button-slide">{{ trans('messages.change') }}</a>
                                        </div>
                                        <div>
                                            <a href="#" class="button radius tiny blue-bg button-slide">{{ trans('messages.del-img') }}</a>
                                        </div>
                                    </div>
                                </li>
                                <li class="slide-item display-inline">
                                    {{ HTML::image(config('asset.image_path.slide') . 'chrismas_3.gif', trans('messages.slide')) }}
                                    <div class="slide-action">
                                        <div>
                                            <a href="#" class="button radius tiny coral-bg button-slide">{{ trans('messages.change') }}</a>
                                        </div>
                                        <div>
                                            <a href="#" class="button radius tiny blue-bg button-slide">{{ trans('messages.del-img') }}</a>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <br />
        </section>
    </div>
@stop
@section('script')
<script>
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#preview').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
$("#slide-image").change(function(){
    readURL(this);
});
</script>
@stop
