@extends('layouts.app')

@section('content')

            <div class="col-sm-8 col-xs-12">
                <h4>Groupes</h4>
                {!! link_to_route('group.create', 'Ajouter un groupe') !!}
                @foreach ($groups->all() as $group)
                    <div>
                        {{ dd($group->users->pluck('id','lastname')) }}
                        Name : {!! $group->name !!}
                        {!! link_to_route('group.show', 'Voir', [$group->id]) !!}
                        {!! link_to_route('group.edit', 'Modifier', [$group->id]) !!}
                        {!! Form::open(['method' => 'DELETE', 'route' => ['group.destroy', $group->id]]) !!}
                        {!! Form::submit('Supprimer') !!}
                        {!! Form::close() !!}
                    </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection()