$(document).ready(function() {
    var classroomId = $('#profil').attr('data-classroom-id');
    var csrfToken = $('#change-module input[name="_token"]').val();
    $('#module-list').change(function() {
        $.ajax({
            type: 'POST',
            url: '/classroom/' + classroomId + '/change-module',
            data: 'module_id=' + $('#module-list').val() + '&_token=' + csrfToken,
            success: function(data) {
                console.log(data);
            },
            error: function(err) {
                console.log(err);
            }
        });
    })

    $('.quizz-checkbox').on('click', function(e) {
        checked = this.checked;
        $('.quizz-checkbox').each(function(i) {
            this.checked = false;
        });
        this.checked = checked;
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
            data: 'module_id=' + $('#module-list').val() + '&_token=' + csrfToken,
            success: function(data) {},
            error: function(err) {}
        });
    });
});

function studentIsPresent(member) {
    $('#user-' + member.id).removeClass('absent');
    $('#user-' + member.id).addClass('present');
}

function studentIsAbsent(member) {
    $('#user-' + member.id).removeClass('present');
    $('#user-' + member.id).addClass('absent');
}
