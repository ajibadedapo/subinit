$('.downloaddoc').on('click', function() {
    var filename = event.target.dataset['filename']
    $.ajax({
            method: 'get',
            url: '/downloadpdf',
            data: {pdfname: filename, _token: token}
        })
        .done(function (msg) {
           
        })
})