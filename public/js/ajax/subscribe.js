$('.subscribe').on('click', function () {
    var user=event.target.dataset['subscribe'];
    var subscribing=event.target.dataset['subscribing'];
    $.ajax({
            method: 'POST',
            url: '/subscribe',
            data: {subscribee:user, _token: token}
        })
        .done(function (msg) {
            var subscribing=msg['subscribing'];
            if (subscribing==0)
            {
                $('.subscribe').addClass('btn-default').removeClass('btn-primary').text('Subscribe');
            }else{
                $('.subscribe').removeClass('btn-default').addClass('btn-primary').text('Unsubscribe');
            }
        })

})