@extends('layouts.app')
@section('content')
    {{--{!! dd($data) !!}--}}
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                {!! $data->firstname !!}<br>
                {!! $data->lastname !!}<br>
                {!! $data->email !!}<br>
                {!! $data->role->description !!}<br>
            </div>
            {!!link_to_route('userinfo.create','AJOUTER INFOS SUPPLEMENTAIRES') !!}<br>
            {!!link_to_route('userinfo.edit','EDITER INFOS SUPPLEMENTAIRES',$data->id) !!}
        </div>
@endsection
