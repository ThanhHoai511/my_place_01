@extends('frontend.master')
@section('main')
<div class="block">
    {{-- open form --}}
        <div id="error_explanation">
            <h2>
               {{ trans('messages.create-review') }}
            </h2>
        </div>
        <div class="field">
            <label>{{ trans('messages.place') }}</label>
            <input type="text" id="searchPlace">
            <div id="suggesstion-box"></div>
        </div>
        <div class="field">
            <label>{{ trans('messages.short-description') }}</label>
            <input type="text" name="title" id="submary">
        </div>
        <div class="field">
            <label>{{ trans('messages.your-review') }}</label>
            <textarea name="content" id="idea_description"></textarea>
        </div>
        <div class="field">
            <label>{{ trans('messages.date-visit') }}</label>
            <input type="date" name="time">
        </div>
        <div class="field">
            <label>{{ trans('messages.your-rate') }}</label>
            <section class='rating-widget'>
                <table>
                    <tr>
                        <td>{{ trans('messages.service') }}</td>
                        <td>
                            <div class='rating-stars'>
                            <ul class='stars'>
                                <li class='star' title='Poor' data-value='1'>
                                    <i class='fa fa-star fa-fw'></i>
                                </li>
                                <li class='star' title='Fair' data-value='2'>
                                    <i class='fa fa-star fa-fw'></i>
                                </li>
                                <li class='star' title='Good' data-value='3'>
                                    <i class='fa fa-star fa-fw'></i>
                                </li>
                                <li class='star' title='Excellent' data-value='4'>
                                    <i class='fa fa-star fa-fw'></i>
                                </li>
                                <li class='star' title='WOW!!!' data-value='5'>
                                    <i class='fa fa-star fa-fw'></i>
                                </li>
                            </ul>
                        </div>
                        </td>
                    </tr>
                    <tr>
                        <td>{{ trans('messages.quality') }}</td>
                        <td>
                            <div class='rating-stars'>
                            <ul class='stars'>
                                <li class='star' title='Poor' data-value='1'>
                                    <i class='fa fa-star fa-fw'></i>
                                </li>
                                <li class='star' title='Fair' data-value='2'>
                                    <i class='fa fa-star fa-fw'></i>
                                </li>
                                <li class='star' title='Good' data-value='3'>
                                    <i class='fa fa-star fa-fw'></i>
                                </li>
                                <li class='star' title='Excellent' data-value='4'>
                                    <i class='fa fa-star fa-fw'></i>
                                </li>
                                <li class='star' title='WOW!!!' data-value='5'>
                                    <i class='fa fa-star fa-fw'></i>
                                </li>
                            </ul>
                        </div>
                        </td>
                    </tr>
                </table>
            </section>
        </div>
        <div class="field">
            <label>{{ trans('messages.choose-img') }}</label>
            <div id="filediv">
                <input name="file[]" type="file" id="file"/>
            </div>
        </div>
        <div class="row actions">
            <input type="button" id="addScnt" class="upload btn btn-primary btn2 col-md-3" value="{{ trans('messages.add-img') }}"/>
            <input type="submit" value="{{ trans('messages.up-review') }}" name="submit" id="upload" class="upload btn btn-primary btn2 col-md-3"/>
        </div>
    {{-- endform --}}
</div>
@stop
