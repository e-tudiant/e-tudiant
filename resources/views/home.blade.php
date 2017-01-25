@extends('layouts.app')

@section('content')

@section('nav')
    @include('layouts.navbar')
@endsection
{!! $errors->first('session', '<small class="help-block">:message</small>') !!}
@if(session()->has('error'))
    <div class="alert alert-danger alert-dismissible">{!! session('error') !!}</div>
@endif
@endsection
