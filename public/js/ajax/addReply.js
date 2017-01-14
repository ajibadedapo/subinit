var u=0;
function makeid()//function that makes random class names
{
    var text = "";
    var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
    for( var i=0; i < 5; i++ )
        text += possible.charAt(Math.floor(Math.random() * possible.length));
    return text;
}

$('.reply').keypress(function (e) {
    var key = e.which;var reply= $(event.target).val();
    if((key == 13)&&(reply.trim()))  // the enter key code
    {

    var commentid=event.target.dataset['commentid'];

        var replyclass = makeid();
        var replyhtml = $('.newreplyhtml').html();
        $(event.target).next().prepend(replyhtml);
        $('.newreply').eq(0).addClass(replyclass).removeClass('newreply');
        $('.' + replyclass).text(reply);
        $(event.target).val('');
        $.ajax({
                method: 'POST',
                url: '/storereply',
                data: {reply: reply, comment_id: commentid, _token: token}
            })
            .done(function (msg) {

            })
    }
});