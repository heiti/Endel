<!--content-->
<div id="content">

    <div id="column-main">

        <div id="content-about">

            <?php
            ini_set('error_reporting', E_ALL);
            ini_set('display_errors', 'On');  //On or Off
            $this->table->set_heading(array('', 'Müüja', 'Toodete arv'));
            foreach ($info as $prod) {
                $this->table->add_row($prod);
            }
            echo $this->table->generate();
            ?>
            <h2>Meie oleme...</h2>
            <p>
                <img src="<?php echo base_url("assets/img/us.jpg") ?>" width="900" height="313" alt="Meie"></img>
            </p>
        </div>

    </div>
</div>
<!--/content-->
