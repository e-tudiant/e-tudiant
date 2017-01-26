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

function initPusher(apikey, classroomId, csrfToken, quizzErrors) {
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
    });
    classroomChannel.bind('start.quizz', function(data) {
        if($('#profil').attr('data-is-student') == 'true')
            $('#viewer').hide();
        initQuizz(classroomId, data.quizzId, csrfToken, quizzErrors);
    });
    classroomChannel.bind('stop.quizz', function(data) {
        $('#quizz-student').empty();
        $('#viewer').show()
    });

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

function initQuizz(classroomId, quizzId, csrfToken, errors) {
    $('#quizz-student').empty();
    $('#quizz-student').load('/session/create/'+ quizzId + '/' + classroomId, { _token: csrfToken, errors: errors }, function() {
        $('#quizz form').on('submit', function(e) {
            e.preventDefault();

            var data = {};
            data._token = csrfToken;
            $(e.currentTarget).find('input:checked').each(function(i,item) {
                data[$(item).attr('name')] = $(item).val();
            });

            $.post('/session/'+ quizzId +'/' + classroomId, data, function(response) {
                if (response.success) {
                    $('#quizz-student').html('<div class="alert alert-success alert-dismissible">Le quizz a été soumis au formateur.</div>');
                } else {
                    $('#quizz .help-block').remove();
                    $.each(response.errors, function(i,item) {
                        $('#quizz-student input[name="' + i + '"]').eq(0).closest('div').prepend('<small class="help-block">' + item + '</small>');
                    });
                }
            }, 'json');
        });
    });
}
