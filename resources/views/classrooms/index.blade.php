@extends('layouts.app')

@include('layouts.navbar')

@section('content')

    <div class="tab classroom-index">

        <div class="tab-pane fade in active">
            <div class="title">
                <h3>Mes classes</h3>
            </div>
            <div class="tab-content">
                <div class="btn-create">
                {!! link_to_route('classroom.create', 'Ajouter une salle de classe') !!}
                </div>

                @foreach ($classrooms as $classroom)
                    <div class="info-line row">
                        <div class="info-name col-sm-4 col-xs-12">Name : {!! $classroom->name !!}</div>
                        @if(count($classroom->module) > 0)
                            <div class="info-module col-sm-3 col-xs-12">Module :
                                <ul>
                                    @foreach($classroom->module as $module)
                                        <li>{!! $module->name !!}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="info-status col-sm-3 col-xs-12">Statut :<br><p {!! $classroom->status ? 'style="color:green"' : 'style="color:red"' !!} > {!! $classroom->status ? 'Terminé' : 'En cours' !!}</p></div>
                        <div class="col-sm-1"></div>
                        <div class="btn-show col-sm-3 col-xs-12">{!! link_to_route('classroom.show', 'Voir', [$classroom->id]) !!}</div>
                        <div class="btn-edit col-sm-3 col-xs-12">{!! link_to_route('classroom.edit', 'Modifier', [$classroom->id]) !!}</div>

                        {!! Form::open(['method' => 'DELETE', 'route' => ['classroom.destroy', $classroom->id]]) !!}
                        <div class="btn-delete col-sm-1 col-xs-12">{!! Form::submit('X') !!}</div>
                        {!! Form::close() !!}

                    </div>
                @endforeach
            </div>
        </div>
    </div>


@endsection()