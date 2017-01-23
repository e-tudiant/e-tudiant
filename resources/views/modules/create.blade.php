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
{{--{{dd($module)}}--}}
@section('content')
    @include('blocks.menuFormateur')
    <div class="tab-content">
        <div id="profil" class="tab-pane fade in active">
            <div class="col-sm-8 col-xs-12">

                <h4>Module</h4>
                {!! Form::model($module, array('route' => $route, 'method' => $method)) !!}
                <ul>
                    <li>
                        {!! Form::label('name', 'Name:') !!}
                        {!! Form::text('name') !!}
                    </li>
                    <li>
                        {!! Form::label('image_url', 'Image du module:') !!}
                        {!! Form::file('image_url') !!}
                    </li>
                    <li>
                        {!! Form::label('slider_url', 'URL du slider:') !!}
                        {!! Form::text('slider_url') !!}
                    </li>
                    <li>
                        {!! Form::label('slider_token', 'Token:') !!}
                        {!! Form::text('slider_token') !!}
                        {!! $errors->first('name', '<small class="help-block">:message</small>') !!}
                    </li>
                    <li>
                        {!! Form::submit() !!}
                    </li>
                </ul>
                {!! Form::close() !!}

            </div>
        </div>
    </div>

@endsection()
