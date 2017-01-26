@extends('layouts.app')

@include('layouts.navbar')

@section('content')


    <div class="tab group-index">
        <div id="group" class="tab-pane fade in active">
            <div class="title">
                <h3>Groupes</h3>
            </div>
            <div class="tab-content">
                <div class="btn-create">
                    {!! link_to_route('group.create', 'Ajouter un groupe') !!}
                </div>
                @foreach ($groups->all() as $group)
                <div class="info-line row">
                    <div class="info-name col-sm-5 col-xs-12">{!! $group->name !!}</div>
                    <div class="btn-show col-sm-3 col-xs-12">{!! link_to_route('group.show', 'Gestion membres', [$group->id]) !!}</div>
                    <div class="btn-edit col-sm-3 col-xs-12">{!! link_to_route('group.edit', 'Modifier nom', [$group->id]) !!}</div>

                    {!! Form::open(['method' => 'DELETE', 'route' => ['group.destroy', $group->id]]) !!}
                    <div class="btn-delete col-sm-1 col-xs-12">{!! Form::submit('Supprimer', ['onclick' => "return confirm('Supprimer ?')"]) !!}</div>
                    {!! Form::close() !!}
                </div>
                @endforeach
            </div>
        </div>
    </div>


@endsection()
