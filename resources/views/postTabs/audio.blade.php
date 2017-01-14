<div id="create_post" class="box"><div id="uploading">
        <div class="row-fluid">
            <form class="UploadForm js-widget" {{--action="{{url('createvideo')}}"--}} id="createaudio" enctype="multipart/form-data">
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="uploaded">
                        <div class="pending_audio">
                            <div class="show_iphone hidden-sm hidden-md hidden-lg"></div>
                            <div class="added_audio">
                                <ul class="audio_bg Sorter js-widget" ></ul>
                                <span class="supported_files">What file extensions are supported?<div class="file_types">.mp3 </div>
                                </span>
                                <div class="clearfix"></div>

                                <div class="btn green multi fa fa-plus">&nbsp;Add Audio </div>
                                <input class="hide_btn" id="audiofile" type="file" accept=".mp3" name="audio">

                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6 upload_details Poster js-widget" >
                    <input class="bg-color form-control js-widget" name="title" id="audio_title" placeholder="Title" value="" style="margin-top: 0;" validate="require">
                    <div class="error"></div>
                    <textarea class="bg-color form-control js-widget" name="message" id="audio_desc" placeholder="Description" validate="require"></textarea>
                    <div class="error"></div>

                    <div class="submit_cancel_container">
                        <input class="btn blue pull-right" type="button" id="submit_audio" value="Submit Post">
                        <div class="clearfix"></div>
                    </div>
                </div>
            </form>
            <div class="box audio_upload_finish" style="color: #1CD139; display: none;" >Congratulations! Your Audio was successfully uploaded!</div>
            <div class="box audio_upload_progress" style="color: #2196f3; display: none;" >Uploading Audio  .......</div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>