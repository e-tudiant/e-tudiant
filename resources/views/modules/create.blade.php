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

@section('content')

@include('blocks.menuFormateur')

<div class="tab module-create">
    <div id="module" class="tab-pane fade in active">
        <div class="title">
            <h3>module</h3>
        </div>
        <div class="tab-content">
                {!! Form::model($module, array('route' => $route, 'method' => $method)) !!}

                    <div>
                        {!! Form::label('name', 'Name:') !!}
                        {!! Form::text('name') !!}
                    </div>
                    <div>
                        {!! Form::label('image_url', 'Image du module:') !!}
                        {!! Form::file('image_url') !!}
                    </div>
                    <div>
                        {!! Form::label('slider_url', 'URL du slider:') !!}
                        {!! Form::text('slider_url') !!}
                    </div>
                    <div>
                        {!! Form::label('slider_token', 'Token:') !!}
                        {!! Form::text('slider_token') !!}
                        {!! $errors->first('name', '<small class="help-block">:message</small>') !!}
                    </div>
                    <div class="btn-create">
                        {!! Form::submit('Sauvegarder') !!}
                    </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>

@endsection()