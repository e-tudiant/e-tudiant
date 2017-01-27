$(document).ready(function() {
    $('#module_id').change(loadModule);
    loadModule();

    $('.quizz-checkbox').on('click', function(e) {
        checked = this.checked;
        $('.quizz-checkbox').each(function(i) {
            this.checked = false;
        });
        this.checked = checked;
        var action = undefined;
        if (checked) {
            action = 'start';
        } else {
            action = 'stop';
        }
        $.ajax({
            type: 'POST',
            url: '/classroom/' + classroomId + '/quizz-' + action,
            data: 'quizz_id=' + this.value + '&_token=' + csrfToken
        });
    });

    registerChannel.bind('pusher:subscription_succeeded', function(members) {
        members.each(studentIsPresent);
    });

    registerChannel.bind('pusher:member_added', function(member) {
        studentIsPresent(member);
    });

    registerChannel.bind('pusher:member_removed', function(member) {
        studentIsAbsent(member);
    });

    classroomChannel.bind('want.module', function(data) {
        $.ajax({
            type: 'POST',
            url: '/classroom/' + classroomId + '/init-module',
            data: 'module_id=' + $('#module_id').val() + '&_token=' + csrfToken,
            success: function(data) {},
            error: function(err) {}
        });
    });

    classroomChannel.bind('result.quizz', function(data) {
        $('#user-' + data.userId + ' .result-quizz').append('<br>' + data.quizzName + ' : ' + data.successPercent + '%');
    });
});

$( "#student-list h4" ).click(function() {
    if($("#student-list .tab-content").css("display") == 'none'){
        $("#student-list .tab-content").css({"display":"block", "transition":"0.5s"});
    }else{
        $("#student-list .tab-content").css({"display":"none", "transition":"0.5s"});
    }

});

$( "#quizz-list h4" ).click(function() {
    if($("#quizz-list .tab-content").css("display") == 'none'){
        $("#quizz-list .tab-content").css({"display":"block", "transition":"0.5s"});
    }else{
        $("#quizz-list .tab-content").css({"display":"none", "transition":"0.5s"});
    }

});

$( "#module-list h4" ).click(function() {
    if($("#module-list .tab-content").css("display") == 'none'){
        $("#module-list .tab-content").css({"display":"block", "transition":"0.5s"});
    }else{
        $("#module-list .tab-content").css({"display":"none", "transition":"0.5s"});
    }

});

function studentIsPresent(member) {
    $('#user-' + member.id + ' .register-student').removeClass('absent');
    $('#user-' + member.id + ' .register-student').addClass('present');
    updateRegister();
}

function studentIsAbsent(member) {
    $('#user-' + member.id + ' .register-student').removeClass('present');
    $('#user-' + member.id + ' .register-student').addClass('absent');
    updateRegister();
}

function updateRegister() {
    var abs = $('#student-list .absent').length;
    var prs = $('#student-list .present').length;
    $('#register #call').empty();
    $('<p>').html("Elève absent : <br><span class='absent'>" + abs + "</span>").appendTo('body .classroom-index #call');
    $('<p>').html("Elève présent : <br><span class='present'>" + prs + "</span>").appendTo('body .classroom-index #call');
}

function loadModule() {
    $.ajax({
        type: 'POST',
        url: '/classroom/' + classroomId + '/change-module',
        data: 'module_id=' + $('#module_id').val() + '&_token=' + csrfToken,
        error: function(err) {
            console.log(err);
        }
    });
}
