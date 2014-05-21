<!--Content-->
<div class="container">
    <div class="row">
        <div class="col-lg-4 col-lg-offset-4">
            <div class="panel panel-success text-center">
                <div class="panel-heading">
                    <h2 class="panel-title">Logi sisse</h2>
                </div>
                <?php
                print_r($this->session->flashdata('autherror'));
                echo form_open('login/login_validation');
                echo validation_errors();
                ?>

                <div class="panel-body" style="padding:30px">

                    <div class="form-group">
                        <input type = "text" class = "form-control" name = "email" id = "email" value = "<?php $this->input->post('email') ?>"/>
                    </div>

                    <div class="form-group">
                        <input type="password" class="form-control" name="password" id="password" value="Sisesta parool"/>
                    </div>

                    <button type="submit" name="login_submit" value="Logi sisse" class="btn btn-success btn-lg" >Sisene</button>
                    </div><!--end panel body-->
                    <?php
                    echo form_close();
                    ?>

                    <br/>
                    <a href="<?php echo base_url("home/index/register"); ?>" class="text-center text-danger"> Registreeru</a>
                
            </div><!--end panel-->

        </div>
    </div>

</div>
<!--/Content-->