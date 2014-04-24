
<div class="container">
    <br/>
    <br/>
    <div class="col-lg-5 col-lg-offset-1">

        <div class="panel panel-default">    
            <?php
            ini_set('error_reporting', E_ALL);
            ini_set('display_errors', 'On');  //On or Off
            echo '<img class="media" alt="toote pilt" src="' . base_url('/application/images/original/' . $product->Pilt . '" style="width:100%;align:middle"/>');
            ?>
        </div>
    </div> <!--end col-lg-4-->

    <div class="col-lg-4 col-lg-offset-1">
        <div class="row">
            <?php
            echo '<h1>' . $product->Vili . '</h1>';
            echo '<h4><small>Sort</small></h4>';
            echo '<p>' . $product->Sort . '</p>';

            if ($sale->type == 'sale') {
                echo '<h4><small>Hind</small></h4>';
                echo '<h4>' . $sale->hind . ' €</h4>';
                echo '<h4><small>Kogus</small></h4>';
                echo '<p>' . $sale->kogus . ' kg</p>';
            } else if ($sale->type == 'auction') {
                echo '<h4><small>Alghind</small></h4>';
                echo '<h4>' . $sale->alghind . ' €</h4>';
                if ($bestbid->bid != "") {
                    echo '<h4><small>Parim pakkumine</small></h4>';
                    echo '<h4><span id="TheBestBid">' . $bestbid->bid . ' €</span></h4>';
                } else {
                    echo '<h4>Pakkumised puuduvad</h4>';
                }
                ?>
                <form id="addbid" action="">
                    <div class="input-group input-group-sm">
                        <input type="text" name="amount" id="amount" class="form-control" placeholder="Kogus"/>
                        <span class="input-group-addon">€</span>
                        <span class="input-group-btn">
                            <button class="btn btn-warning" name="addbid" data-toggle="modal" data-target=".bs-example-modal-sm">Lisa pakkumine</button>
                        </span>
                    </div>
                </form>
                <h4>Aega oksjoni lõpuni</h4>
                <?php
                echo '<div class="lisadiv" data-enddate="' . $sale->enddate . '">';
                echo '<span class="taimer"></span>';
                echo '</div>';
                echo '<h4><small>Ostakohe hind</small></h4>';
                echo '<h4>' . $sale->ostakohe . ' $</h4>';
                echo '<h4><small>Kogus</small></h4>';
                echo '<p>' . $sale->kogus . ' kg</p>';
                echo $sale->enddate;
            }
            echo '<h4><small>Asukoht</small></h4>';
            echo '<p>' . $product->Asukoht . '</p>';
            echo '<h4><small>Müüja</small></h4>';
            echo '<p>' . $product->Seller . '</p>';
            ?>
        </div><!--end row-->
    </div><!--end col-lg-4-->



</div>
<!-- Confirmation modal for bidding-->
<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <h4 class="modal-body">Lisa pakkumine?</h4>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Tühista</button>
                <button type="button" id="confirmbid" data-auctionid="<?php echo $_GET['id'] ?>" class="btn btn-default" data-dismiss="modal">Jah</button>
            </div>
        </div>
    </div>
</div>


