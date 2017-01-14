<div id="create_post" class="box"><div id="uploading">
        <div class="row-fluid">
            <form class="UploadForm js-widget" {{--action="{{url('createvideo')}}"--}} id="createvideo" enctype="multipart/form-data">
            <div class="col-md-6 col-sm-6 col-xs-6">
                <div class="uploaded">
                        <div class="pending_audio">
                            <div class="show_iphone hidden-sm hidden-md hidden-lg"></div>
                            <div class="added_audio">
                                <ul class="audio_bg Sorter js-widget" ></ul>
                                <span class="supported_files">What file extensions are supported?<div class="file_types">.mp4, .3gp </div>
                                </span>
                                <div class="clearfix"></div>

                                   <div class="btn green multi fa fa-plus">&nbsp;Add Video Files</div>
                                        <input class="hide_btn" id="videofile" type="file" accept=".mp4" name="video">

                            </div>
                        </div>
                        <div class="clearfix"></div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-6 upload_details Poster js-widget" >
                <input class="bg-color form-control js-widget" name="title" id="video_title" placeholder="Title" value="" style="margin-top: 0;" validate="require">
                <div class="error"></div>
                <textarea class="bg-color form-control js-widget" name="message" id="video_desc" placeholder="Description" validate="require"></textarea>
                <div class="error"></div>

                <div class="submit_cancel_container">
                    <input class="btn blue pull-right" type="button" id="submit_video" value="Submit Post">
                    <div class="clearfix"></div>
                </div>
            </div>
            </form>
                <div class="box vid_upload_finish" style="color: #1CD139; display: none;" >Congratulations! Your video was successfully uploaded!</div>
                <div class="box vid_upload_progress" style="color: #2196f3; display: none;" >Uploading Video .......</div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>