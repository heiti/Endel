<!--content-->
<div class="container">
    <div class="row">
        <h1><?php echo $user->name ?></h1>

    </div>

    <div class="row">
        <div class="col-lg-3">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Müüdud viljad</h3>
                </div>
                <div class="panel-body">
                    <p>Seen Puravik <span class="badge"> 133</span></p>
                    <p>Sibul Punane <span class="badge"> 2</span></p>
                    <p>Till Eriti tilline <span class="badge"> 16</span></p>
                </div>
            </div>

            <ul class="list-group">
                <li class="list-group-item text-muted">Profiil</li>
                <li class="list-group-item text-right"><span class="pull-left"><strong>Liitus</strong></span> <?php echo $user->joindate ?></li>
                <li class="list-group-item text-right"><span class="pull-left"><strong>Tehinguid</strong></span> <?php echo $transactioncount ?></li>
                <li class="list-group-item text-right"><span class="pull-left"><strong>Tooteid</strong></span> <?php echo count($products) ?></li>

            </ul>


        </div>    


        <div class="col-lg-9">

            <ul class="nav nav-tabs">
                <li class="active"><a  href="#uprofile" >Kasutaja</a></li>
                <li><a href="#uproducts" >Tooted</a></li>
                <li><a  href="#ufeedback" >Tagasiside</a></li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane active" id="uprofile">
                    <p><?php echo $user->email; ?></p>
                    <p><?php echo $user->city; ?></p>
                    <p><?php echo $user->address; ?></p>
                </div>
                <div class="tab-pane" id="uproducts">
                    <div class="table-responsive">
                        <table class="table table-hover" style="width: max-content">
                            <thead>
                                <tr>
                                    <?php
                                    $heading = array('ID', 'Vili', 'Sort', 'Kategooria', 'Asukoht');
                                    foreach ($heading as $head) {
                                        echo '<th>' . $head . '</th>';
                                    }
                                    ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($products as $prod) {
                                    echo '<tr>';
                                    foreach ($prod as $pro) {
                                        echo '<td><a href="' . base_url('/newsale') . '?id=' . $prod['id'] . '">';
                                        echo $pro;
                                        echo '<a></td>';
                                    }

                                    echo '</tr>';
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane" id="ufeedback">

                </div>
            </div>

        </div>
    </div>
</div>