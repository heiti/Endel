<!--Content-->
<div id="content">
    
    <div id="column-main">

        <div id="content-main">
            
            <?php
            print_r($this->session->flashdata('autherror'));
            echo form_open('login/login_validation');
            echo validation_errors();

            echo "<p>E-mail:";
            echo form_input('email', $this->input->post('email'));
            echo "</p>";

            echo "<p>Parool:";
            echo form_password('password');
            echo "</p>";

            echo "<p>";
            echo form_submit('login_submit', 'Logi sisse');
            echo "</p>";

            echo form_close();
            ?>
            <a href="<?php echo base_url("register"); ?>" class="register_link" style="color: #990000;"> Registreeru</a>
        </div>
    </div>
</div>
<!--/Content-->