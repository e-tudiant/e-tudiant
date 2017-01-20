@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                {!! $data->firstname !!}<br>
                {!! $data->lastname !!}<br>
                {!! $data->email !!}<br>
                {!! $data->role->description !!}<br>
            </div>
            <button formaction="" class="btn btn-primary">Infos complémentaires</button>

        </div>
@endsection
