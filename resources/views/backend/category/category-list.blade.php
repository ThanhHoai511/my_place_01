@extends('backend.master')
@section('main')
<div class="large-10 medium-12 small-12 columns light-grey-bg-pattern">
        <div class="row">
            <div class="large-10 columns">
                <div class="page-name">
                    <h3 class="left">{{ trans('messages.category-manage') }}</h3>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <section id="general">
            <div class="row">
                <div class="large-6 medium-6 columns">
                    <div class="custom-panel">
                        <div class="custom-panel-heading">
                            <h4>{{ trans('messages.add-category') }}</h4>
                        </div>
                        <div class="custom-panel-body">
                            <h5>{{ trans('messages.enter-cate-name') }}</h5>
                            <input type="text" name="link">
                            <h5>{{ trans('messages.cate-parent') }}</h5>
                            <div class="dropdown">
                                <select name="cate-parent">
                                    <option>{{ trans('messages.none') }}</option>
                                    <option>{{ trans('messages.food-n-drink') }}</option>
                                    <option>{{ trans('messages.movie') }}</option>
                                    <option>{{ trans('messages.entertainment') }}</option>
                                </select>
                            </div>
                            <h5>{{ trans('messages.cate-concept') }}</h5>
                            <div class="dropdown">
                                <select name="cate-concept">
                                    <option>{{ trans('messages.modern') }}</option>
                                    <option>{{ trans('messages.modern') }}</option>
                                    <option>{{ trans('messages.classic') }}</option>
                                    <option>{{ trans('messages.vintage') }}</option>
                                    <option>{{ trans('messages.outdoor') }}</option>
                                </select>
                            </div>
                            <a href="#" class="button radius tiny coral-bg button-slide">{{ trans('messages.add') }}</a>
                            <a href="#" class="button radius tiny blue-bg button-slide">{{ trans('messages.back') }}</a>
                        </div>
                    </div>
                </div>
                <div class="large-6 medium-6 columns">
                    <div class="custom-panel">
                        <div class="custom-panel-heading">
                            <h4>{{ trans('messages.cate-list') }}</h4>
                        </div>
                        <div class="custom-panel-body display-inline">
                            <ul class="slide-list">
                                <li class="slide-item display-inline cate-item">
                                    <h4><b>{{ trans('messages.food-n-drink') }}</b></h4>
                                    <hr>
                                    <ul>
                                        <li>
                                            <div class="col-md-7">
                                                <h5><b>Vintage restaurant</b></h5>
                                                <a><b>{{ trans('messages.concept') }}:</b> Vintage</a>
                                            </div>
                                            <div class="col-md-5">
                                                <div>
                                                    <a href="#" class="button radius tiny coral-bg button-slide">{{ trans('messages.change') }}</a>
                                                </div>
                                                <div>
                                                    <a href="#" class="button radius tiny blue-bg button-slide">{{ trans('messages.del') }}</a>
                                                </div>
                                            </div>
                                        </li>
                                        <hr>
                                        <li>
                                            <div class="col-md-7">
                                                <h5><b>Modern restaurant</b></h5>
                                                <a><b>{{ trans('messages.concept') }}:</b> Modern</a>
                                            </div>
                                            <div class="col-md-5">
                                                <div>
                                                    <a href="#" class="button radius tiny coral-bg button-slide">{{ trans('messages.change') }}</a>
                                                </div>
                                                <div>
                                                    <a href="#" class="button radius tiny blue-bg button-slide">{{ trans('messages.del') }}</a>
                                                </div>
                                            </div>
                                        </li>
                                        <hr>
                                        <li>
                                            <div class="col-md-7">
                                                <h5><b>Outdoor coffee shop</b></h5>
                                                <a><b>{{ trans('messages.concept') }}:</b> Out door</a>
                                            </div>
                                            <div class="col-md-5">
                                                <div>
                                                    <a href="#" class="button radius tiny coral-bg button-slide">{{ trans('messages.change') }}</a>
                                                </div>
                                                <div>
                                                    <a href="#" class="button radius tiny blue-bg button-slide">{{ trans('messages.del') }}</a>
                                                </div>
                                            </div>
                                        </li>
                                        <hr>
                                    </ul>
                                </li>
                                <li class="slide-item display-inline cate-item">
                                    <h4><b>Movie</b></h4>
                                    <ul>
                                        <li>
                                            <div class="col-md-7">
                                                <h5><b>Movie coffee</b></h5>
                                                <a><b>{{ trans('messages.concept') }}:</b> Modern</a>
                                            </div>
                                            <div class="col-md-5">
                                                <div>
                                                    <a href="#" class="button radius tiny coral-bg button-slide">{{ trans('messages.change') }}</a>
                                                </div>
                                                <div>
                                                    <a href="#" class="button radius tiny blue-bg button-slide">{{ trans('messages.del') }}</a>
                                                </div>
                                            </div>
                                        </li>
                                        <hr>
                                    </ul>
                                </li>
                                <li class="slide-item display-inline cate-item">
                                    <h4><b>Entertain</b></h4>
                                    <ul>
                                        <li>
                                            <div class="col-md-7">
                                                <h5><b>Game center</b></h5>
                                                <a><b>{{ trans('messages.concept') }}:</b> None</a>
                                            </div>
                                            <div class="col-md-5">
                                                <div>
                                                    <a href="#" class="button radius tiny coral-bg button-slide">{{ trans('messages.change') }}</a>
                                                </div>
                                                <div>
                                                    <a href="#" class="button radius tiny blue-bg button-slide">{{ trans('messages.del') }}</a>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="col-md-7">
                                                <h5><b>Board game coffee shop</b></h5>
                                                <a><b>Concept:</b> Modern</a>
                                            </div>
                                            <div class="col-md-5">
                                                <div>
                                                    <a href="#" class="button radius tiny coral-bg button-slide">{{ trans('messages.change') }}</a>
                                                </div>
                                                <div>
                                                    <a href="#" class="button radius tiny blue-bg button-slide">{{ trans('messages.del') }}</a>
                                                </div>
                                            </div>
                                        </li>
                                        <hr>
                                    </ul>
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
