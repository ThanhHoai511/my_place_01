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
                    {{ Form::open(['action' => 'CategoryController@store', 'method' => 'POST']) }}
                    <div class="custom-panel">
                        <div class="custom-panel-heading">
                            <h4>{{ trans('messages.add-category') }}</h4>
                        </div>
                        <div class="custom-panel-body">
                            <h5>{{ trans('messages.enter-cate-name') }}</h5>
                            {{ Form::text('name') }}
                            <h5>{{ trans('messages.cate-parent') }}</h5>
                            <div class="dropdown">
                                    {{ Form::select('parent_id', $pluckCategory) }}
                            </div>
                            <h5>{{ trans('messages.cate-concept') }}</h5>
                            <div class="dropdown">
                                    {{ Form::select('type_concept', $pluckConcept) }}
                            </div>
                            {{ Form::submit('Submit', ['class' => 'button radius tiny blue-bg button-slide']) }}
                            
                        </div>
                    </div>
                    {{ Form::close() }}
                </div>
                <div class="large-6 medium-6 columns">
                    <div class="custom-panel">
                        <div class="custom-panel-heading">
                            <h4>{{ trans('messages.cate-list') }}</h4>
                        </div>
                        <div class="custom-panel-body display-inline">
                            <ul class="slide-list">
                                @foreach($categories as $category)
                                        @if($category->parent_id == NULL)
                                        <li class="slide-item display-inline cate-item">
                                            <h4><b>{{ $category->name }}</b></h4>
                                            <div class="col-md-5">
                                                <a> <b>{{ trans('messages.concept') }}:</b> {{ $category->type_concept }} </a>
                                            </div>
                                            <div class="col-md-5">
                                                {!! Form::open(['action' => ['CategoryController@destroy', $category->id], 'method' => 'DELETE']) !!}
                                                <div class="btn-group-sm">
                                                    <a href="{{ action('CategoryController@edit', ['id' => $category->id]) }}" class="button radius tiny coral-bg button-slide">
                                                        {{ trans('messages.change') }}
                                                    </a>
                                                   {!! Form::submit(Lang::get('messages.del'), ['class' => 'button radius tiny blue-bg button-slide']) !!}
                                                </div>
                                                {!! Form::close() !!}
                                            </div>
                                            <hr>
                                        </li>
                                        @endif
                                        @foreach($category->getChildren as $subCate)
                                        <li>
                                            <div class="col-md-7">
                                                <h5><b>{{ $subCate->name }}</b></h5>
                                                <a><b>{{ trans('messages.concept') }}:</b> {{ $subCate->type_concept }}</a> 
                                            </div>
                                            <div class="col-md-5">
                                                {!! Form::open(['action' => ['CategoryController@destroy', $subCate->id], 'method' => 'DELETE']) !!}
                                                <div class="btn-group-sm">
                                                    <a href="{{ action('CategoryController@edit', ['id' => $subCate->id]) }}" class="button radius tiny coral-bg button-slide">
                                                        {{ trans('messages.change') }}
                                                    </a>
                                                   {!! Form::submit(Lang::get('messages.del'), ['class' => 'button radius tiny blue-bg button-slide']) !!}
                                                </div>
                                                {!! Form::close() !!}
                                            </div>
                                        </li>
                                        @endforeach
                                        <hr>
                                @endforeach
                            </ul>
                        {{ $categories->links() }}
                        </div>
                    </div>
                </div>
            </div>
            <br />
        </section>
    </div>
@stop
