<!-- line modal -->

<div class="modal fade" id="priceupdateModal" data-keyboard="false" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                <div  class="Popup popup compact header_edit modal-content js-widget" data-setposition="false" style="display: block; max-width: 70vw; max-height: 70vh; margin: auto;"><i class=" fa fa-times-circle close_popup js-widget" type="button"  data-dismiss="modal" aria-hidden="true"></i>
                    <div class="modal-header">
                        <div class="modal-title">Edit Subscription Cost</div>
                        <form class="Form js-widget"  method="post">
                            <div class="cost_container">
                                <div class="input_container">
                                    <div class="cost_input form-group input-group">
                                        <span class="input-group-addon"><i class="fa fa-usd fa-fw"></i></span>
                                        <input class="form-control js-widget" id="costvalue" type="text" name="cost" value="{{Auth::user()->price}}" data-target="subscription-cost"></div><div class="cost_submit form-group">
                                        <input id="updatepricebtn" class="btn pink" data-dismiss="modal"  type="submit" value="Update Price">
                                    </div><div class="clearfix"></div>
                                </div>
                                <div class="error" data-field="cost"></div></div><div class="clearfix"></div><hr></form></div>
                </div>
</div>
