
$('.deletepostbtn').on('click', function() {
   var contentid= event.target.dataset['contentid'];
    $('.contentdiv'+contentid).fadeOut();
    $.ajax({
        method: 'POST',
        url: '/deletecontent',
        data: {contentid: contentid, _token: token},
        error: function () {
            $('.contentdiv'+contentid).show();
        }
    })
});