
<div class="container">
    <body class="datapush">
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
                if ($product->seller_id == $this->session->userdata['id']) {
                    ?>
                    <button class="btn btn-danger" name="deletesale" data-toggle="modal" data-target="#deletesale">Kustuta</button>
                    <?php
                }
                echo '<h1>' . $product->Vili . '</h1>';
                echo '<h4><small>Sort</small></h4>';
                echo '<p>' . $product->Sort . '</p>';
                echo '<h4><small>Kogus</small></h4>';
                echo '<p>' . $sale->kogus . ' kg</p>';
                if ($sale->type == 'sale') {
                    echo '<h4><small>Hind</small></h4>';
                    echo '<h4>' . $sale->hind . ' €</h4>';
                    ?>
                    <div class="input-group input-group-sm">
                        <input type="text" name="buyamount" id="buyamount" class="form-control" placeholder="Kogus"/>
                        <span class="input-group-addon">kg</span>
                        <span class="input-group-btn">
                            <a id="purchase" href="product/buy?id=<?php echo $_GET['id'] ?>&amount="<?php echo $this->input->post('buyamount') ?>><button class="btn btn-warning" name="buy">Osta</button></a>
                        </span>
                    </div>
                    <?php
                } else if ($sale->type == 'auction') {
                    echo '<h4><small>Alghind</small></h4>';
                    echo '<h4>' . $sale->alghind . ' €</h4>';
                    echo '<h4><small>Parim pakkumine: </small></h4>';
                    echo '<h4><span id="TheBestBid">Pakkumised puuduvad</span></h4>';
                    echo '</div>';
                    ?>
                    <form id="addbid" action="">
                        <div class="input-group input-group-sm">
                            <input type="text" name="amount" id="amount" class="form-control" placeholder="Kogus"/>
                            <span class="input-group-addon">€</span>
                            <span class="input-group-btn">
                                <button class="btn btn-warning" name="addbid" data-toggle="modal" data-target="#addbidmodal">Lisa pakkumine</button>
                            </span>
                        </div>
                    </form>
                    <h4>Aega oksjoni lõpuni</h4>
                    <?php
                    $date = DateTime::createFromFormat('Y-m-d H:i:s', $sale->enddate);
                    $enddate = $date->format('Y m d H i s');
                    echo '<div class="lisadiv">';
                    echo '<span class="taimer" data-enddate="' . $enddate . '"></span>';
                    echo '</div>';
                    echo '<h4><small>Ostakohe hind</small></h4>';
                    echo '<h4>' . $sale->ostakohe . ' $</h4>';
                    $data = array(
                        'name' => 'ostakohe',
                        'class' => 'btn btn-primary'
                    );
                    echo form_button($data, 'Osta kohe');
                }

                echo '<h4><small>Asukoht</small></h4>';
                echo '<p>' . $product->Asukoht . '</p>';
                echo '<h4><small>Müüja</small></h4>';
                echo '<a href="/profile?id=' . $sale->myyja_id . '"><p>' . $product->Seller . '</p></a>';
                if ($product->seller_id == $this->session->userdata['id']) {
                    ?>
                    <button class="btn btn-danger" name="deletesale" data-toggle="modal" data-target="#deletesale">Kustuta</button>

                    <?php
                }
                ?>
            </div><!--end row-->
        </div><!--end col-lg-4-->


    </body>
</div>
<!-- Confirmation modal for bidding-->
<div class="modal fade bs-example-modal-sm" id="addbidmodal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
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

<!-- Confirmation modal for deleting-->
<div class="modal fade bs-example-modal-sm" id="deletesale" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <h4 class="modal-body">Kustuta see müük?</h4>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Tühista</button>
                <a href="product/delete?id=<?php echo $_GET['id'] ?>">
                    <button type="button" id="confirmdelete" class="btn btn-default">Jah</button>
                </a>
            </div>
        </div>
    </div>

</div>
