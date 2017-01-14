
var contentId=0;
$('.like').on('click', function(event){
    contentId=event.target.parentNode.dataset['contentid'];
    var isLike = event.target.previousElementSibling == null;
   event.target.innerText=='Like'? $('.like'+contentId).text('Liked'): $('.like'+contentId).text('Like');

    $.ajax({
        method: 'POST',
        url: '/like',
        data: {isLike: isLike, contentId: contentId, _token: token}
    })
        .done(function () {
            if (!isLike) {
                event.target.previousElementSibling.innerText = 'Liked';
            } 
        })
});

 