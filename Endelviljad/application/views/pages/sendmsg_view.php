<!--content-->
<div class="container">
    <div class="row">
        <div class="col-lg-6 col-lg-offset-3">
            <div class="panel panel-default text-center">
                <div class="panel-heading">
                    <h2>Saada kiri</h2>
                </div>
                <div class="panel-body" style="padding:30px">
                    <form action="" id="sendmsg-form">
                        <fieldset>
                            <div class="control-group form-group">
                                <label  for="senderName">Nimi</label>
                                <div class="controls">
                                    <input type="text" class="form-control" name="senderNname" id="senderName" 
                                           value="<?php $this->input->post('senderName') ?>"/>
                                </div>
                            </div>
                            <div class="control-group form-group">
                                <label  for="senderEmail">Email</label>
                                <div class="controls">
                                    <input type="text" class="form-control" name="senderEmail" id="senderEmail" 
                                           value="<?php $this->input->post('senderEmail') ?>"/>
                                </div>
                            </div>
                            <div class="control-group form-group">
                                <label  for="senderMessage">Sõnum</label>
                                <div class="controls">
                                    <textarea class="form-control" name="senderMessage" id="senderMessage" cols="50" rows="5" 
                                              value="<?php $this->input->post('senderMessage') ?>"></textarea>
                                </div>
                            </div>

                            <div class="control-group">
                                <div class="controls">
                                    <button type="submit" class="btn btn-primary" >Saada sõnum</button>
                                </div>
                            </div>
                        </fieldset>
                    </form>

                    <div id="result"></div>

                    <!-- pop-up "message sent" confirmation -->
                    <div class="modal fade" id="msgSent" tabindex="-1" role="dialog" 
                         aria-labelledby="msgSentLabel" aria-hidden="true">
                        <div class="modal-dialog modal-sm">
                            <div class="modal-content">
                                <div class="modal-header">

                                    <h4 class="modal-title">Sõnum saadetud!</h4>
                                </div>
                                <div class="modal-body">
                                    Vastame Teile esimesel võimalusel
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Sulge</button>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/content-->
