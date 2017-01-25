@extends('layouts.app')

@section('content')

    @include('blocks.menuFormateur')


    <div class="tab-content">
        <div id="profil" class="tab-pane fade in active" data-classroom-id="{{ $classroom_id }}">

            <div id="viewer">
                @if(Auth::user()->role_id == 3)
                    <p class="module-name"></p>
                @endif
                @if(Auth::user()->role_id == 2)
                    {!! Form::open(['id' => 'change-module']) !!}
                    {!! Form::label('module_id', 'Module') !!}
                    {!! Form::select('module_id', $module_list, null, ['placeholder' => 'Choisissez un module', 'id' => 'module-list']) !!}
                    {!! Form::close() !!}
                @endif
                <iframe allowfullscreen></iframe>
            </div>


    @if(Auth::user()->role_id == 2)
    <div id="register">
        <div id="student-list">
            <p id="user-4" class="absent">Apprenant</p>
            <p id="user-5" class="absent">Daniel Gonçalves</p>
            <p id="user-6" class="absent">Guillaume Perrier</p>
            <p id="user-7" class="absent">Nicolas Aslantas</p>
            <p id="user-8" class="absent">Creneguy Johann</p>
        </div>
    </div>
    @endif

    @if(Auth::user()->role_id == 3)
    <div id="quizz-student">
        
    </div>
    @endif

    @if(Auth::user()->role_id == 2)
    <div id="quizz-teacher">
        {{ Form::open(['id' => 'quizz-teacher']) }}
            <ul>
            @foreach($quizz_list as $quizz_id => $quizz_name)
                <li>
                {{ Form::label('quizz.'.$quizz_id, $quizz_name) }}
                <input type="checkbox" id="quizz.{{ $quizz_id }}" class="quizz-checkbox" name="quizz_id" value="{{ $quizz_id }}">
                </li>
            @endforeach
            </ul>
        {{ Form::close() }}
    </div>
    @endif

    <div id="resources">
        <p>Doing some cool stuff about resources (optional)</p>
    </div>


                <div class="chatblock">
                    <div id="chatbox">
                        <div id="messageBox"></div>
                        <div id="sender">
                            <form id="sendMessage" method="post" action="/classroom/{{ $classroom_id }}/send">
                                {!! csrf_field() !!}
                                <input id="message" type="text" name="message" placeholder="Tapez votre message">
                                <input type="submit" value="Envoyer">
                            </form>
                            {{--<a id="sendFile">Envoyer un fichier</a>--}}
                        </div>
                    </div>
                </div>
                <div class="btn-chatblock"></div>

        </div>
    </div>


    <style>
        .absent {
            color: red
        }

        .present {
            color: green
        }
    </style>
@endsection()
@section('scriptpage')
    <script src="https://js.pusher.com/4.0/pusher.min.js"></script>
    <script src="/js/enter-classroom.js"></script>
    <script>
        $(document).ready(function () {
            initPusher('{{ config('broadcasting.connections.pusher.key') }}', '{{ $classroom_id }}', '{{ csrf_token() }}');
            initModule('{{ $classroom_id }}', '{{ csrf_token() }}');
            initChatBox('{{ $classroom_id }}', '{{ csrf_token() }}');
            @if (Auth::user()->role_id == 3)
                $('#quizz-student').load('/session/create/1/{{ $classroom_id }}'/*, { errors: '{!! serialize($errors) !!}' }*/);
            @endif
        });
    </script>
    @if(Auth::user()->role_id == 2)
        <script src="/js/enter-classroom-teacher.js"></script>
    @endif
@endsection