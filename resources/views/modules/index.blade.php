@extends('layouts.app')

@include('layouts.navbar')

@section('content')

<div class="tab module-index">
    <div id="module" class="tab-pane fade in active">
        <div class="title">
            <h3>Modules</h3>
        </div>
        <div class="tab-content">
            <div class="btn-create">
            {!! link_to_route('module.create', 'Ajouter un module') !!}
            </div>

            @foreach ($modules as $module)
                @if($module == $modules->last())
                <div class="info-line last row">
                @else
                <div class="info-line row">
                @endif

                    <div><img src="{!!'/uploads/images/modules/'.($module->image_url)!!}"></div>
                    <div class="info-name col-sm-5 col-xs-12">{!! $module->name !!}</div>
                    {{--<div class="btn-show col-sm-3 col-xs-12">{!! link_to_route('module.show', 'Voir', [$module->id]) !!}</div>--}}
                    <div class="btn-edit col-sm-3 col-xs-12">{!! link_to_route('module.edit', 'Modifier', [$module->id]) !!}</div>

                    {!! Form::open(['method' => 'DELETE', 'route' => ['module.destroy', $module->id]]) !!}
                    <div class="btn-delete col-sm-1 col-xs-12">{!! Form::submit('') !!}</div>
                    {!! Form::close() !!}
                </div>
            @endforeach
        </div>
    </div>
</div>


@endsection()