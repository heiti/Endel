
<div id="content">
    
    <div id="column-main">

        <div id="content-about">
            <?php
            echo "<pre>";
            print_r($this->session->all_userdata());
            echo "</pre>";
            ?>
            
            <h2>Meie oleme...</h2>
            <p>
                <img src="<?php echo base_url("assets/img/us.jpg") ?>" width="900" height="313" alt="Meie" />
            </p>
        </div>

    </div>

