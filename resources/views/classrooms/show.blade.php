@extends('layouts.app')

@include('layouts.navbar')

@section('content')

    <div class="tab show-class">
        <div id="quizz" class="tab-pane fade in active">
            <div class="title">
                <h3>Ma classe</h3>
            </div>
            <div class="tab-content">
                <div class="info-name">Name : {!! $classroom->name !!}</div>
                @if (!is_null($classroom->module) &&  count($classroom->module) > 0)
                    @foreach($classroom->module as $module)
                        <div class="info-name">Module : {!! $classroom->module->name !!}</div>
                    @endforeach
                @endif
                @if (!is_null($classroom->quizz) &&  count($classroom->quizz) > 0)
                    @foreach($classroom->quizz as $quizz)
                        <div class="info-name">Quizz : {!! $quizz->name !!}</div>
                    @endforeach
                @endif
                <div class="info-name">Statut :
                    <span {!! $classroom->status ? 'style="color:green"' : 'style="color:red"' !!} >{!! $classroom->status ? 'Terminé' : 'En cours'!!}</span>
                </div>
            </div>
        </div>
    </div>
@endsection()

