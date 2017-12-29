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
                    {{ Form::open(['action' => ['CategoryController@update', $categories->id], 'method' => 'PUT', 'enctype' => 'multipart/form-data']) }}
                    <div class="custom-panel">
                        <div class="custom-panel-heading">
                            <h4>{{ trans('messages.edit-category') }}</h4>
                        </div>
                        <div class="custom-panel-body">
                            <h5>{{ trans('messages.edit-name-category') }}</h5>
                            {{ Form::text('name', $categories->name) }}
                            <h5>{{ trans('messages.cate-parent') }}</h5>
                            <div class="dropdown">
                                    {{ Form::select('parent_id', $pluckCategory, $categories->parent_id) }}
                            </div>
                            <h5>{{ trans('messages.cate-concept') }}</h5>
                            <div class="dropdown">
                                    {{ Form::select('type_concept', $pluckConcept, $categories->type_concept) }}
                            </div>
                            {{ Form::submit('Submit', ['class' => 'button radius tiny blue-bg button-slide']) }}
                            
                        </div>
                    </div>
                    {{ Form::close() }}
                </div>
            </div>
            <br />
        </section>
    </div>
@stop
