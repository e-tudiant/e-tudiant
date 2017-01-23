
@extends('layouts.app')

@section('content')

@include('blocks.menuFormateur')


<style>
  .btn-chatblock{
    width: 30px;
    height: 30px;
    border: 4px solid black;
    background-color: white;
    position: fixed;
    bottom: 25px;
    right: 25px;
    text-align: center;
    cursor: pointer;
  }

  .btn-chatblock:before{
    content:'\f086';
    font-family: FontAwesome;
    color: black;
  }

  .chatblock{
    display: none;
    background-color: red;
    width: 300px;
    position: fixed;
    right: 55px;
    bottom: 25px;
    border: 2px solid green;
    height: 400px;
    max-height: 400px;
  }

  form{
    margin-left: -10px;
    bottom: 5px;
    position: absolute;
  }

  form #message{
    width: 214px;
  }

  #chatbox{
    background-color: silver;
    margin: 5px;
    padding: 10px;
    height: 345px;
    overflow-y: auto;
  }

  .message{
    border: 1px solid #a2a8ad;
    border-radius: 5px;
    background-color: lightblue;
    padding: 10px;
  }

</style>

<div class="tab-content">
  <div id="profil" class="tab-pane fade in active">

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

@endsection()

@section('scriptpage')
  <script src="https://js.pusher.com/3.2/pusher.min.js"></script>
  <script src="/js/chatbox.js"></script>
  <script>
      initChatBox('{{ config('broadcasting.connections.pusher.key') }}', '{{ $classroom_id }}');
  </script>
@endsection