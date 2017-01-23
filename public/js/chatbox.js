

$( ".btn-chatblock" ).click(function() {
    $( ".chatblock" ).animate({
        opacity: 1,
        height: "toggle"
    }, 500, function() {
        // Animation complete.
    });
});

function pushMessage(data) {
  var message = document.createElement("div");
  message.className += 'message-box';
  message.innerHTML = '<p class="username">' + data.username + '</p><p class="message">' + data.message;
  $('#messageBox').append(message);
}

function initChatBox(apikey, classroomId, csrfToken) {
  // Enable pusher logging - don't include this in production
  Pusher.logToConsole = true;

  var pusher = new Pusher(apikey, {
    cluster: 'eu',
    encrypted: true,
    authEndpoint: '/broadcasting/auth',
    auth: {
      headers: {
        'X-CSRF-Token': csrfToken
      }
    }
  });

  var channel = pusher.subscribe('private-Classroom.' + classroomId);
  channel.bind('new.message', function(data) {
    pushMessage(data);
  });

  $('form#sendMessage').submit(function(e) {
    e.preventDefault();
    var dataString = 'message=' + $('#message').val() + '&_token=' + csrfToken;
    $.ajax({
      type: 'POST',
      url: '/classroom/' + classroomId + '/send',
      data: dataString,
      success: function(data) {
        $('#message').val('');
      },
      error: function(err) {
        console.log(err);
      }
    });
  });
}
