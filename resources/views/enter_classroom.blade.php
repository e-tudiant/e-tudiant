@extends('layouts.app')

@include('layouts.navbar')

@section('content')

    <h1 class="title-class">{{$classroom->name}}</h1>

    <div class="tab-content classroom-enter">

        <div id="profil" class="tab-pane fade in active" data-classroom-id="{{ $classroom->id }}"
             data-is-student="{{ (Auth::user()->role_id == 3)? 'true' : 'false' }}">

            <div class="row">

                @if(Auth::user()->role_id == 2)
                    @if(count($classroom->group)>0)
                        <div class="tab classroom-index col-md-3">
                            <div class="tab-pane fade in active">
                                <div class="title">
                                    <h3>Présence élève</h3>
                                </div>
                                <div class="tab-content">
                                    <div id="register">
                                        <div id="call">

                                        </div>
                                    </div>
                                </div>


                                <div class="tab module-list">
                                    <div id="module-list">
                                        <div class="tab-pane fade in active">
                                            <div class="title">
                                                <h4>Liste module</h4>
                                            </div>
                                            <div class="tab-content">
                                                @if(Auth::user()->role_id == 3)
                                                    <p class="module-name"></p>
                                                @endif
                                                @if(Auth::user()->role_id == 2)

                                                    {!! Form::open(['id' => 'change-module']) !!}
                                                    {!! Form::label('module_id', '') !!}
                                                    {!! Form::select('module_id',$classroom->module->pluck('name','id')->toArray()) !!}
                                                    {!! Form::close() !!}
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="tab detail-list">
                                    <div id="student-list">
                                        <div class="tab-pane fade in active">
                                            <div class="title">
                                                <h4>Liste élève</h4>
                                            </div>
                                            <div class="tab-content">
                                                @foreach($classroom->getUsers() as $user)
                                                    <div id="user-{{$user->id}}">
                                                        <span class="register-student absent">{{$user->lastname}} {{$user->firstname}}</span>
                                                        <span class="result-quizz"></span>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="tab detail-quizz">
                                    <div id="quizz-list">
                                        <div class="tab-pane fade in active">
                                            <div class="title">
                                                <h4>Mes quizs</h4>
                                            </div>
                                            <div class="tab-content">
                                                @if(Auth::user()->role_id == 2)
                                                    <div id="quizz-teacher">
                                                        {{ Form::open(['id' => 'quizz-teacher']) }}
                                                        <ul>
                                                            @foreach($classroom->quizz as $quizz)
                                                                <li>
                                                                    {{ Form::label('quizz.'.$quizz->id, $quizz->name) }}
                                                                    <input type="checkbox" id="quizz.{{ $quizz->id }}" class="quizz-checkbox"
                                                                           name="quizz_id"
                                                           value="{{ $quizz->id }}">
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                        {{ Form::close() }}
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    @endif
                @endif

                    @if(Auth::user()->role_id == 2)
                        <div class="col-md-9" id="viewer">
                    @else
                        <div class="col-md-12" id="viewer">
                    @endif
                    <div class="viewer-iframe">
                        <iframe allowfullscreen></iframe>
                    </div>
                </div>


                @if(Auth::user()->role_id == 3)
                    <div id="quizz-student">

                    </div>
                @endif


                <div class="chatblock">
                    <div id="chatbox">
                        <div id="messageBox"></div>
                        <div id="sender">
                            <form id="sendMessage" method="post" action="/classroom/{{ $classroom->id }}/send">
                                {!! csrf_field() !!}
                                <input id="message" type="text" name="message" placeholder="Tapez votre message">
                                <div class="btn-create">
                                    <input type="submit" value="Envoyer">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="btn-chatblock"></div>

            </div>
        </div>


        <style>


        </style>
        @endsection()

        @section('scriptpage')
            <script src="https://js.pusher.com/4.0/pusher.min.js"></script>
            <script src="/js/enter-classroom.js"></script>
            <script>
                var classroomId = $('#profil').attr('data-classroom-id');
                var csrfToken = window.Laravel.csrfToken;
                $(document).ready(function () {
                    initPusher('{{ config('broadcasting.connections.pusher.key') }}', classroomId, csrfToken, '{!! base64_encode(serialize($errors)) !!}');
                    @if (Auth::user()->role_id == 3)
                    initModule(classroomId, csrfToken);
                    @endif
                    initChatBox(classroomId, csrfToken);
                });
            </script>
            @if(Auth::user()->role_id == 2)
                <script src="/js/enter-classroom-teacher.js"></script>
            @endif
@endsection