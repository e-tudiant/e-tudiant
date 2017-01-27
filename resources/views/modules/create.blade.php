<?php
if ($module->id) {
    $route = ['module.update', $module->id];
    $method = 'PUT';
} else {
    $route = 'module.store';
    $method = 'POST';
}
?>
@extends('layouts.app')

@include('layouts.navbar')

@section('content')

    <div class="tab module-create">
        <div id="module" class="tab-pane fade in active">
            <div class="title">
                <h3>module</h3>
            </div>
            <div class="tab-content">
                {!! Form::model($module, array('files'=>true,'route' => $route, 'method' => $method)) !!}

                <div>
                    {!! Form::label('name', 'Name:') !!}
                    {!! Form::text('name') !!}
                    {!! $errors->first('name', '<small class="help-block">:message</small>') !!}
                </div>
                <div>
                    {!! Form::label('image_url', 'Image du module:') !!}
                    {!! Form::file('image_url') !!}
                    {!! $errors->first('image_url', '<small class="help-block">:message</small>') !!}
                </div>
                <div>
                    {!! Form::label('slider_url', 'URL du module:') !!}
                    {!! Form::text('slider_url') !!}
                    {!! $errors->first('slider_url', '<small class="help-block">:message</small>') !!}
                </div>
                <div>
                    {!! Form::label('slider_token', 'Token:') !!}
                    {!! Form::text('slider_token') !!}

                </div>
                <div class="btn-create">
                    {!! Form::submit('Sauvegarder') !!}
                </div>
                <div class="btn-create">
                    {!! link_to_route('module.index', 'Annuler') !!}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>

@endsection()