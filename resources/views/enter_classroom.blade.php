@extends('layouts.app')

@include('layouts.navbar')

@section('content')
    <div class="tab-content classroom-enter">
        <div id="profil" class="tab-pane fade in active" data-classroom-id="{{ $classroom->id }}"
             data-is-student="{{ (Auth::user()->role_id == 3)? 'true' : 'false' }}">

            <div class="row">

                @if(Auth::user()->role_id == 2)
                    @if(count($classroom->group)>0)
                        <div class="tab classroom-index col-md-2">
                            <div class="tab-pane fade in active">
                                <div class="title">
                                    <h3>Présence élève</h3>
                                </div>
                                <div class="tab-content">
                                    <div id="register">
                                        <div id="call">

                                        </div>
                                        <div id="student-list">
                                            @foreach($classroom->getUsers() as $user)
                                                <p id="user-{{$user->id}}"
                                                   class="absent">{{$user->lastname}} {{$user->firstname}}</p>
                                            @endforeach
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    @endif
                @endif

                <div class="col-md-10" id="viewer">
                    @if(Auth::user()->role_id == 3)
                        <p class="module-name"></p>
                    @endif
                    @if(Auth::user()->role_id == 2)

                        {!! Form::open(['id' => 'change-module']) !!}
                        {!! Form::label('module_id', 'Module') !!}
                        {!! Form::select('module_id',$classroom->module->pluck('name','id')->toArray()) !!}
                        {!! Form::close() !!}
                    @endif
                    <div class="viewer-iframe">
                        <iframe allowfullscreen></iframe>
                    </div>
                </div>


                @if(Auth::user()->role_id == 3)
                    <div id="quizz-student">

                    </div>
                @endif

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

                <div id="resources">
                    <p>Doing some cool stuff about resources (optional)</p>
                </div>


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

            #viewer .viewer-iframe {
                width: 100%;
            }

            iframe {
                width: 100%;
                height: 500px;
            }

            .absent {
                color: red
            }

            .present {
                color: green
            }

            .classroom-enter .classroom-index .tab-content{
                height: 450px;
                overflow-y: scroll;
            }

            .classroom-enter .classroom-index .tab-content #call{
                border-bottom: 3px solid #efefef;
                margin-bottom: 10px;
                font-family: Oswald;
            }
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