

$( ".btn-chatblock" ).click(function() {
    $( ".chatblock" ).animate({
        opacity: 1,
        height: "toggle"
    }, 500, function() {
        // Animation complete.
    });
});

var classroomChannel = undefined;
var registerChannel = undefined;

function initPusher(apikey, classroomId, csrfToken) {
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

    classroomChannel = pusher.subscribe('private-Classroom.' + classroomId);
    classroomChannel.bind('new.message', function(data) {
        pushMessage(data);
    });
    classroomChannel.bind('change.module', function(data) {
        changeModule(data);
    })

    registerChannel = pusher.subscribe('presence-Register.classroom.' + classroomId);
}

function initModule(classroomId, csrfToken) {
    classroomChannel.bind('init.module', function(data) {
        changeModule(data);
        classroomChannel.unbind('init.module', function(data) {
            console.log("unbinding classroomChannel's init.module event");
        });
    });

    $.ajax({
        type: 'POST',
        url: '/classroom/' + classroomId + '/want-module',
        data: '_token=' + csrfToken,
        success: function(data) {},
        error: function(err) {}
    });
}

function pushMessage(data) {
    var message = document.createElement("div");
    message.className += 'message-box';
    message.innerHTML = '<p class="username">' + data.username + '</p><p class="message">' + data.message + '</p>';
    $('#messageBox').append(message);
}

function changeModule(data) {
    $('#viewer p.module-name').text(data.moduleName);
    $('#viewer iframe').attr('src', data.moduleUrl);
}

function initChatBox(classroomId, csrfToken) {
    $('form#sendMessage').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: '/classroom/' + classroomId + '/send',
            data: 'message=' + $('#message').val() + '&_token=' + csrfToken,
            success: function(data) {
                $('#message').val('');
            },
            error: function(err) {
                console.log(err);
            }
        });
    });
}
