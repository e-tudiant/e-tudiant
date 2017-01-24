@extends('layouts.app')

@section('content')

@include('blocks.menuFormateur')

<div class="tab-content">
    <div id="profil" class="tab-pane fade in active">

            <h4>Modules</h4>
            {!! link_to_route('module.create', 'Ajouter un module') !!}
            @foreach ($modules as $module)
                <div>
                    Name : {!! $module->name !!}
                    {{--{!! link_to_route('module.show', 'Voir', [$module->id]) !!}--}}
                    {!! link_to_route('module.edit', 'Modifier', [$module->id]) !!}
                    {!! Form::open(['method' => 'DELETE', 'route' => ['module.destroy', $module->id]]) !!}
                    {!! Form::submit('Supprimer') !!}
                    {!! Form::close() !!}
                </div>
            @endforeach

    </div>
</div>

@endsection()