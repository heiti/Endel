<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<!--
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
-->
    <head>
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"></meta>
        <meta name="description" content="Endel Viljad - kõik puu- ja juurviljad ühest kohast"></meta>
        <link rel="stylesheet" href="<?php echo base_url("assets/css/style.css"); ?>" type="text/css"></link>
        <script src="<?php echo base_url("assets/js/mainScript.js"); ?>" type="text/javascript"></script>
        <script src="<?php echo base_url("assets/js/changeUserData.js"); ?>" type="text/javascript"></script>
        <title>Endel Viljad</title>
    </head>
    <body>

        <div id="container">

            <!-- begin header -->
            <div id="header">

                <!-- logo -->
                <a href="<?php echo base_url(); ?>" class="logo">endelviljad</a>

                <!-- sign up and login links -->
                <div id="auth">

                    <?php
                    if ($this->session->userdata('is_logged_in')) {
                        /* <?php echo $this->session->userdata('email');?> */
                        echo '<a href="' . base_url("myproducts") . '" class="userpanel_link">Minu tehingud</a>';
                        echo '<a href="' . base_url("myproducts") . '" class="userpanel_link">Minu tooted</a>';
                        echo '<a href="' . base_url("user") . '"class="register_link">' . $this->session->userdata['name'] . '</a>';
                        echo '<a href="' . base_url("logout") . '" class="login_link">Välju</a>';
                    } else {
                        echo '<a href="' . base_url("register") . '" class="register_link">Registreeru</a>';
                        echo '<a href="' . base_url("login") . '" class="login_link">Logi sisse</a>';
                    }
                    ?>
                    <!-- google login button-->
                    <a href="<?php echo base_url(); ?>logingoogle" class="">Click here to login with Google</a>

                </div>
                <!-- /sign up and login buttons-->

                <!-- navigation -->
                <ul id="list-nav">
                    <li><a href="<?php echo base_url(); ?>">Avaleht</a></li>
                    <li><a href="<?php echo base_url("about"); ?>">Meist</a></li>
                    <li><a href="<?php echo base_url("products"); ?>">Kaubad</a></li>
                </ul>
                <!-- /navigation -->

            </div>

            <!-- end header -->	

