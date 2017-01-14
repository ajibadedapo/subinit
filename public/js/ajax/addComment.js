var u=0;
$('.commentinput').keypress(function (e) {
    var commentin=event.target.dataset['commentinput'];
    var contentid=event.target.dataset['contentid'];
    var comment=$('.commentinput').val();
    var key = e.which;
    if((key == 13)&&(comment.trim()))  // the enter key code
    {
        var commenthtml= $('.newcommenthtml').html();
        $('.cappend_comment').prepend(commenthtml);
        $('.newcomment').eq(0).text(comment).removeClass('newcomment');
         $.ajax({
         method: 'POST',
         url: '/storecomment',
         data:{comment: comment, content_id: contentid, _token: token}
         })
         .done(function (msg) {
             $('.commentinput').val('');
         })

    }
});

//for submittion of comment through the feed page
var u=0;
$('.singlecommentinput').keypress(function (e) {
    var commentin=event.target.dataset['commentinput'];
    var contentid=event.target.dataset['contentid'];
    var comment=$(event.target).val();
    var key = e.which;
    if((key == 13)&&(comment.trim()))  // the enter key code
    {
        var commenthtml= $('.newcommenthtml').html();

        
         $.ajax({
         method: 'POST',
         url: '/storecomment',
         data:{comment: comment, content_id: contentid, _token: token},
         success: function (msg) {
             $(event.target).val('');
             $('.singlecommentinput').val('');
             $('.newonecommentcontain'+contentid).show();
             $('.newonecomment'+contentid).text(comment);
             $('.oldonecommentcontain'+contentid).hide();
         }
         })
    }
});