@extends('layouts.app')

@include('layouts.navbar')

@section('content')


    <div class="tab">
    <div id="quizz" class="tab-pane fade in active">
        <div class="title">
            <h3>Quizz</h3>
        </div>
        <div class="tab-content">
            <div class="btn-create">
            {!! link_to_route('quizz.create', 'Ajouter un quizz') !!}
            </div>

            @foreach ($quizzs as $quizz)

                    @if($quizz == $quizzs->last())
                        <div class="info-line last row">
                    @else
                        <div class="info-line row">
                    @endif

                    <div class="info-name col-sm-5 col-xs-12">{!! $quizz->name !!}</div>
                    <div class="btn-show col-sm-3 col-xs-12">{!! link_to_route('quizz.show', 'Voir', [$quizz->id]) !!}</div>
                    <div class="btn-edit col-sm-3 col-xs-12">{!! link_to_route('quizz.edit', 'Modifier', [$quizz->id]) !!}</div>

                    {!! Form::open(['method' => 'DELETE', 'route' => ['quizz.destroy', $quizz->id]]) !!}
                    <div class="btn-delete col-sm-1 col-xs-12">{!! Form::submit('', ['onclick' => "return confirm('Supprimer ?')"]) !!}</div>
                    {!! Form::close() !!}
                </div>
            @endforeach
        </div>
    </div>
</div>


@endsection()