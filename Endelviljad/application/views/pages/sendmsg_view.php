<!--content-->
<div id="content">

    <div id="column-main" >
        <script>
            $(document).ready(function() {
                $('#contact-form').validate({
                    rules: {
                        senderName: {
                            minlength: 2,
                            required: true
                        },
                        senderEmail: {
                            required: true,
                            email: true
                        },
                        senderMessage: {
                            minlength: 3,
                            required: true
                        }
                    },
                    highlight: function(element) {
                        $(element).closest('.control-group').removeClass('success').addClass('error');
                    },
                    success: function(element) {
                        element.text('OK!').addClass('valid').closest('.control-group').removeClass('error').addClass('success');
                    },
                    submitHandler: function(form) {

                        $.ajax({
                            type: "POST",
                            url: 'sendmsg/sendmsg_validation',
                            data: $('#contact-form').serialize(),
                            
                            success: function(data) {
                                $("#contact-form").hide('slow');
                                $('#results').html(data);
                            }
                        });
                        return false;
                    }

                });
            });
        </script>
        <h3>Saada kiri</h3>

        <form action="" id="contact-form" class="form-horizontal" method="post">
            <fieldset>
                <div class="control-group">
                    <label  for="senderName">Nimi</label>
                    <div class="controls">
                        <input type="text" class="input-xlarge" name="senderNname" id="senderName" value="<?php $this->input->post('senderName')?>">
                    </div>
                </div>
                <div class="control-group">
                    <label  for="senderEmail">Email</label>
                    <div class="controls">
                        <input type="text" class="input-xlarge" name="senderEmail" id="senderEmail" value="<?php $this->input->post('senderEmail')?>">
                    </div>
                </div>
                <div class="control-group">
                    <label  for="senderMessage">Sõnum</label>
                    <div class="controls">
                        <textarea class="input-xlarge" name="senderMessage" id="senderMessage" rows="3" value="<?php $this->input->post('senderMessage')?>"></textarea>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <button type="submit" class="btn">Saada sõnum</button>
                    </div>
                </div>
            </fieldset>
        </form>
        
        <div id="results"></div>
    </div>
</div>
<!--/content-->
