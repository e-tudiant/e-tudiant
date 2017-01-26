@extends('layouts.app')

@section('content')

@section('nav')
    @include('layouts.navbar')
@endsection
{!! $errors->first('session', '<small class="help-block">:message</small>') !!}

@if(Auth::user()->role_id == 3)
    @include('blocks.homeApprenant')
@elseif(Auth::user()->role_id == 2)
    @include('blocks.homeFormateur')
@elseif(Auth::user()->role_id == 1)
    @include('blocks.homeAdmin')
@endif


@endsection

