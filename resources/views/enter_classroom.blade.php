<!DOCTYPE html>
<head>
  <title>Chatbox</title>
</head>
<body>
  <div id="chatbox">
    <div id="messageBox"></div>
    <div id="sender">
      <form id="sendMessage" method="post" action="/classroom/{{ $classroom_id }}/send">
        {!! csrf_field() !!}
        <input id="message" type="text" name="message" placeholder="Tapez votre message">
        <input type="submit" value="Envoyer le message">
      </form>
      <a id="sendFile">Envoyer un fichier</a>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
  <script src="https://js.pusher.com/3.2/pusher.min.js"></script>
  <script src="/js/chatbox.js"></script>
  <script>
    initChatBox('{{ config('broadcasting.connections.pusher.key') }}', '{{ $classroom_id }}');
  </script>
</body>
