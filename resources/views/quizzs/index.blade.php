@extends('layouts.app')

@section('content')

@include('blocks.menuFormateur')


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
                <div class="info-line row">
                    <div class="info-name col-sm-3 col-xs-12">Name : {!! $quizz->name !!}</div>
                    <div class="col-sm-2"></div>
                    <div class="btn-show col-sm-3 col-xs-12">{!! link_to_route('quizz.show', 'Voir', [$quizz->id]) !!}</div>
                    <div class="btn-edit col-sm-3 col-xs-12">{!! link_to_route('quizz.create', 'Modifier', [$quizz->id]) !!}</div>

                    {!! Form::open(['method' => 'DELETE', 'route' => ['quizz.destroy', $quizz->id]]) !!}
                    <div class="btn-delete col-sm-1 col-xs-12">{!! Form::submit('X') !!}</div>
                    {!! Form::close() !!}
                </div>
            @endforeach
        </div>
    </div>
</div>


    <style>

        .tab{
            background-color: white;
            border: 4px solid black;
        }
        .title{
            background-color: black;
            text-align: center;
            height: 50px;
            display: flex;
        }
        h3{
            color: white;
            font-family: 'Oswald', sans-serif;
            text-transform: uppercase;
            margin: 0;
            margin: auto;
            font-weight: bold;
        }

        .tab-content{
            padding: 15px 20px;
        }

        .btn-create{
            width: 30%;
            height: 40px;
            border: 4px solid black;
            margin: auto;
            display: flex;
            cursor: pointer;
            margin-bottom: 20px;
            margin-top: 10px;
        }

        .btn-create:hover{
            background-color: black;
            transition: 0.2s;
        }

        .btn-create a{
            font-family: 'Tinos', serif;
            font-style: italic;
            font-size: 18px;
            margin: auto;
            text-decoration: none;
            color: black;
        }
        .btn-create:hover a{
            color: white;
        }

        .info-line{
            font-family: Oswald;
            border-bottom: 3px solid #efefef;
            padding: 20px 0px;
        }

        .info-name{
            color: black;
            font-size: 18px;
            padding-left: 30px;
        }

        .btn-show{

        }

        .btn-edit{

        }

    </style>

@endsection()