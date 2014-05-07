<!--content-->
<div class="container">
    <div class="row">
        <div class="col-lg-9">
            <h2>Meie oleme...</h2>
            <img src="<?php echo base_url("assets/img/us.jpg") ?>" class="img-responsive" alt="Meie"></img>
        </div>
        <div class="col-lg-3">
            <br />
            <br />
            <br />
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Meie suurimad kliendid</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-xs-5">
                            <h5>Müüja</h5>
                        </div>
                        <div class="col-xs-6">
                            <h5>Toodete arv</h5>
                        </div>
                    </div>
                    <?php
                    ini_set('error_reporting', E_ALL);
                    ini_set('display_errors', 'On');  //On or Off
                    foreach ($info as $prod) {
                        echo '<div class="row">';
                        echo '<div class="col-xs-6">';
                        echo $prod['name'];
                        echo '</div>';
                        echo '<div class="col-xs-5">';
                        echo '<span class="badge">' . $prod['Summa'] . '</span>';
                        echo '</div>';
                        echo '</div>';
                    }
                    ?>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Võta meiega ühendust</h3>
                </div>
                <div class="panel-body">
                    <a href="<?php echo base_url("home/index/sendmsg"); ?>">Saada sõnum</a>
                </div>
            </div>

        </div>
    </div>
</div>
