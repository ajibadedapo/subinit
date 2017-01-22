<div id="create_post" class="box"><div id="uploading">
        <div class="row-fluid">
            <form class="UploadForm js-widget" {{--action="{{url('createvideo')}}"--}} id="createphoto" enctype="multipart/form-data">
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="uploaded">
                        <div class="pending_audio">
                            <div class="show_iphone hidden-sm hidden-md hidden-lg"></div>
                            <div class="added_audio">
                                <ul class="audio_bg Sorter js-widget" ></ul>
                                <span class="supported_files">What file extensions are supported?<div class="file_types">.jpg, .jpeg, .png </div>
                                </span>
                                <div class="clearfix"></div>

                                <div class="btn green multi fa fa-plus">&nbsp;Add Photos </div>
                                <input class="hide_btn" id="photofile" type="file" accept=".jpg, .jpeg, .png" name="photo">

                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6 upload_details Poster js-widget" >
                    <input class="bg-color form-control js-widget" name="title" id="photo_title" placeholder="Title" value="" style="margin-top: 0;" validate="require">
                    <div class="error"></div>
                    <textarea class="bg-color form-control js-widget" name="message" id="photo_desc" placeholder="Description" validate="require"></textarea>
                    <div class="error"></div>

                    <div class="submit_cancel_container">
                        <input class="btn blue pull-right" type="button" id="submit_photo" value="Submit Post">
                        <div class="clearfix"></div>
                    </div>
                </div>
            </form>
            <div class="box photo_upload_finish" style="color: #1CD139; display: none;" >Congratulations! Your Picture was successfully uploaded!</div>
            <div class="box photo_upload_progress" style="color: #2196f3; display: none;" >Uploading Picture <i class="fa fa-spinner fa-pulse"></i></div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>