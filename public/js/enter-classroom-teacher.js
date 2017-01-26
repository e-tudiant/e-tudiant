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
});

function studentIsPresent(member) {
    $('#user-' + member.id).removeClass('absent');
    $('#user-' + member.id).addClass('present');
    var abs = $('.absent').length;
    var prs = $('.present').length;
    $('<p>').html("Elève absent : <br><span class='absent'>" + abs + "</span>").appendTo('body .classroom-index #call');
    $('<p>').html("Elève présent : <br><span class='present'>" + prs + "</span>").appendTo('body .classroom-index #call');
}

function studentIsAbsent(member) {
    $('#user-' + member.id).removeClass('present');
    $('#user-' + member.id).addClass('absent');


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
