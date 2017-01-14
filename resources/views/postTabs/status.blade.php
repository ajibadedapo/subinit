<form class="Poster row js-widget" method="post" action="{{url('createstatus')}}">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <textarea class="form-control {{--mceeditor--}}" id="status" name="status" placeholder="Keep your subscribers in the know..."></textarea>
        <div class="clearfix"></div>
        <div class="error" data-field="message"></div>
    </div>
    <div class="col-md-12 col-sm-12 col-xs-12">
        <input class="btn blue pull-right" id="addstatus" type="button" value="Post">
        <div class="notify pull-left">
            <div class="status_finish" style="color: #1CD139; display: none;" >Congratulations! Your Status was successfully updated!</div>
            <div class="clearfix"></div>
        </div><div class="clearfix"></div>
    </div>
</form>