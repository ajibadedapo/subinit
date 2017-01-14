<!-- line modal -->

<div class="modal fade" id="searchModal" data-keyboard="false" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                <div  class="Popup popup compact header_edit modal-content js-widget" data-setposition="false" style="display: block; max-width: 60vw; max-height: 70vh; margin: auto;"><i class=" fa fa-times-circle close_popup js-widget" type="button"  data-dismiss="modal" aria-hidden="true"></i>
                    <div class="modal-header" style="text-align: center">
                        <strong class="modal-title">Search For Users</strong>
                        <div class="Form js-widget" >
                            <div class="cost_container">
                                <form method="get" action="{{action('PagesController@search')}}" class="input_container">
                                    <div class="cost_input form-group input-group">
                                        <input class="form-control js-widget form-group"  style="border-radius: 25px"  type="text" name="searchquery" value="">
                                        <span class="input-group-addon searchbtnaddon" style="border-radius: 25px; cursor: pointer;"><i class="fa fa-search fa-fw"></i></span>
                                    </div>
                                    <div class="cost_submit form-group">
                                        <input id="submitsearchbtn" class="btn pink"   type="submit" style="display: none">
                                    </div><div class="clearfix"></div>
                                </form>
                                <div class="error" data-field="cost"></div></div><div class="clearfix"></div></div></div>
                </div>
</div>
<script>
    $('.searchbtnaddon').on('click', function () {
        $('#submitsearchbtn').click();
    })
</script>