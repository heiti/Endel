<div id="column-main">
    <div id="content">

        <div id="content-main">
            <?php
            echo validation_errors();

            echo form_open('login/loginValidation');

            echo "<p>E-mail: ";
            echo form_input('email', $this->input->post('email'));
            echo "</p>";

            echo "<p>Parool: ";
            echo form_password('password');
            echo "</p>";

            echo "<p>";
            echo form_submit('login_submit', 'Logi sisse');
            echo "</p>";

            //echo "<p>Pole kasutajat? registreeri <a href='" . base_url() . "register" . "'>siin</a>!</p>";
            //echo "<p>Unustasid <a href='" . base_url() . "login/forgotPassword" . "'>parooli</a>?</p>";

            echo form_close();
            ?>
        </div>
    </div>
</div>