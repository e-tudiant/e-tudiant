@extends('layouts.app')
@section('content')

    @include('blocks.menuFormateur')

    <div class="col-sm-12">
        <div id="profil" class="tab-pane fade in active">
            <h3>Classroom</h3>
            <div>Name : {!! $classroom->name !!}</div>
            @if (!is_null($classroom->module) &&  count($classroom->module) > 0)
                @foreach($classroom->module as $module)
                    <div>Module : {!! $module->name !!}</div>
                @endforeach
            @endif
            @if (!is_null($classroom->quizz) &&  count($classroom->quizz) > 0)
                @foreach($classroom->quizz as $quizz)
                    <div>Quizz : {!! $quizz->name !!}</div>
                @endforeach
            @endif
            <div>Statut : {!! $classroom->status ? 'Terminé' : 'En cours'!!}</div>
        </div>
    </div>
@endsection()

