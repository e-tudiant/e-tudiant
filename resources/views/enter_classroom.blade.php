
@extends('layouts.app')

@section('content')

@include('blocks.menuFormateur')


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
    initChatBox('{{ config('broadcasting.connections.pusher.key') }}', '{{ $classroom_id }}', '{{ csrf_token() }}');
  </script>
@endsection