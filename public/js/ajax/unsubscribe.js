$('.unsubscribe').on('click', function () {
    var user = event.target.dataset['unsubscribe'];
    $(event.target).html('Just a moment <i class="fa fa-spinner fa-pulse"></i>');
    $.ajax({
        method: 'POST',
        url: '/unsubscribe',
        data: {subscribee: user, _token: token},
        success: function () {
            $('.unsubscribe').hide();
            $('.hiddensub').show();
        }

    })
})
    