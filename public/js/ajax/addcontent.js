$('#addstatus').on('click', function() {
    var status = $('#status').val();
    if(status.trim()) {
        $.ajax({
                method: 'POST',
                url: '/createstatus',
                data: {status: status, _token: token}
            })
            .done(function (msg) {
                $('.status_finish').show();
                $('#status').val('');
            })
    }
    })

$('#submit_video').on('click', function() {
    var video_title = $('#video_title');
    var video_desc = $('#video_desc');
    var video = $('#videofile');

    var formdata= new FormData();
    formdata.append('title',video_title.val() );
    formdata.append('description',video_desc.val() );
    formdata.append('video', video.prop('files')[0] );
    $('.vid_upload_progress').show();
    $.ajax({
            method: 'POST',
            url: '/createvideo',
            dataType: 'json',
            contentType: false,
            processData: false,

            headers: {
                'X-CSRF-TOKEN': token
            },
            data: formdata
        })
        .done(function (msg) {
            $('.vid_upload_progress').hide();
            $('.vid_upload_finish').show();
            video_title.val('');
            video_desc.val('')
        })
})

$('#submit_photo').on('click', function() {
    var photo_title = $('#photo_title');
    var photo_desc = $('#photo_desc');
    var photo = $('#photofile');
    
    var formdata= new FormData();
    formdata.append('title',photo_title.val() );
    formdata.append('description',photo_desc.val() );
    formdata.append('photo', photo.prop('files')[0] );
    $('.photo_upload_progress').show();
    $.ajax({
            method: 'POST',
            url: '/createphoto',
            dataType: 'json',
            contentType: false,
            processData: false,

            headers: {
                'X-CSRF-TOKEN': token
            },
            data: formdata
        })
        .done(function (msg) {
            $('.photo_upload_progress').hide();
            $('.photo_upload_finish').show();
            photo_title.val('');
            photo_desc.val('');
        })
})

$('#submit_audio').on('click', function() {
    var audio_title = $('#audio_title');
    var audio_desc = $('#audio_desc');
    var audio = $('#audiofile');

    var formdata= new FormData();
    formdata.append('title',audio_title.val() );
    formdata.append('description',audio_desc.val() );
    formdata.append('audio', audio.prop('files')[0] );
    $('.audio_upload_progress').show();
    $.ajax({
            method: 'POST',
            url: '/createaudio',
            dataType: 'json',
            contentType: false,
            processData: false,

            headers: {
                'X-CSRF-TOKEN': token
            },
            data: formdata
        })
        .done(function (msg) {
            $('.audio_upload_progress').hide();
            $('.audio_upload_finish').show();
            audio_title.val('');
            audio_desc.val('');
        })
})

    $('#submit_document').on('click', function() {
        var document_title = $('#document_title');
        var document_desc = $('#document_desc');
        var document = $('#documentfile');

        var formdata= new FormData();
        formdata.append('title',document_title.val() );
        formdata.append('description',document_desc.val() );
        formdata.append('document', document.prop('files')[0] );
        $('.document_upload_progress').show();

        $.ajax({
                method: 'POST',
                url: '/createdocument',
                dataType: 'json',
                contentType: false,
                processData: false,

                headers: {
                    'X-CSRF-TOKEN': token
                },
                data: formdata
            })
            .done(function (msg) {
                $('.document_upload_progress').hide();
                $('.document_upload_finish').show();
                document_title.val('');
                document_desc.val('');
            })
    })



