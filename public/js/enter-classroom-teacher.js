function studentIsPresent(member) {
    $('#user-' + member.id).removeClass('absent');
    $('#user-' + member.id).addClass('present');
}

function studentIsAbsent(member) {
    $('#user-' + member.id).removeClass('present');
    $('#user-' + member.id).addClass('absent');
}

registerChannel.bind('pusher:subscription_succeeded', function(members) {
    members.each(studentIsPresent);
});

registerChannel.bind('pusher:member_added', function(member) {
    studentIsPresent(member);
});

registerChannel.bind('pusher:member_removed', function(member) {
    studentIsAbsent(member);
});
