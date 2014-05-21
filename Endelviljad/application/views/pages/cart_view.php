<!--content-->
<div class="container">

    <div class="panel panel-default">
        <div class="panel-heading"><h2>Ostukorv</h2></div>
        <div class="panel-body">

            <?php
            if (count($cart) == 0) {
                echo '<p>Teie ostukorv on tühi</p>';
                echo '</div>';
                echo '</div>';
            } else {
                ?>

                <div class="table-responsive">
                    <table class="table table-hover" style="width: 600px;heigth:150px">
                        <thead>
                            <tr>
                                <?php
                                $heading = array('Vili', 'Sort', 'Kategooria', 'Kogus', 'Hind', 'Summa', 'Asukoht', 'Müüja');
                                foreach ($heading as $head) {
                                    echo '<th>' . $head . '</th>';
                                }
                                ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            echo form_open('cart/editCart');
                            echo form_submit('uuenda', 'Uuenda');
                            foreach ($cart as $car) {
                                $data = array(
                                    'name' => 'kogus' . $car->id,
                                    'id' => 'kogus' . $car->id,
                                    'value' => $car->kogus,
                                    'maxlength' => '6',
                                    'size' => '50',
                                    'style' => 'width:50%',
                                );
                                echo '<td>' . $car->Vili . '</td>';
                                echo '<td>' . $car->Sort . '</td>';
                                echo '<td>' . $car->Kategooria . '</td>';
                                echo '<td>' . form_input($data) . ' (' . $car->kogusmax . ') kg</td>';
                                echo '<td>' . $car->Hind . ' €</td>';
                                echo '<td>' . $car->kogus * $car->Hind . ' €</td>';
                                echo '<td>' . $car->Asukoht . '</td>';
                                echo '<td>' . $car->Username . '</td>';
                                echo '</tr>';
                            }
                        }
                        ?>
                    </tbody>
                </table>
                <?php echo form_submit('uuenda', 'Uuenda'); ?>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>
<!--content-->

