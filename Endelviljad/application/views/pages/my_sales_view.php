<div class="container">
    <h2 style="text-align: center; color: red">
        <?php
        echo $this->session->flashdata('deleted');
        ?>
    </h2>
    <div class="panel panel-default">
        <div class="panel-heading"><h2>Minu müügid</h2></div>
        <div class="panel-body">
            <?php
            ini_set('error_reporting', E_ALL);
            ini_set('display_errors', 'On');  //On or Off
            ?>
            <div class="table-responsive">
                <table class="table table-hover" style="width: max-content">
                    <thead>
                        <tr>
                            <?php
                            $data = array('Vili', 'Sort', 'Hind', 'Kogus', 'Lisamiskuupäev');
                            foreach ($data as $_data) {
                                echo '<th>' . $_data . '</th>';
                            }
                            ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($sales as $sale) {
                            if ($sale->type == 'sale') {
                                echo '<tr>';
                                echo '<td><a href="' . base_url('/product') . '?id=' . $sale->id . '">' . $sale->Vili . '</td>';
                                echo '<td><a href="' . base_url('/product') . '?id=' . $sale->id . '">' . $sale->Sort . '</td>';
                                echo '<td><a href="' . base_url('/product') . '?id=' . $sale->id . '">' . $sale->hind . ' €/kg</td>';
                                echo '<td><a href="' . base_url('/product') . '?id=' . $sale->id . '">' . $sale->kogus . ' kg</td>';
                                echo '<td><a href="' . base_url('/product') . '?id=' . $sale->id . '">' . $sale->date . '</td>';
                                echo '</tr>';
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading"><h2>Minu oksjonid</h2></div>
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-hover" style="width: max-content">
                    <thead>
                        <tr>
                            <?php
                            $data = array('Vili', 'Sort', 'Kogus', 'Alghind', 'Lisamiskuupäev', 'Oksjoni lõpp',);
                            foreach ($data as $_data) {
                                echo '<th>' . $_data . '</th>';
                            }
                            ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($sales as $sale) {
                            if ($sale->type == 'auction') {
                                echo '<tr>';
                                echo '<td><a href="' . base_url('/product') . '?id=' . $sale->id . '">' . $sale->Vili . '</td>';
                                echo '<td><a href="' . base_url('/product') . '?id=' . $sale->id . '">' . $sale->Sort . '</td>';
                                echo '<td><a href="' . base_url('/product') . '?id=' . $sale->id . '">' . $sale->kogus . ' kg</td>';
                                echo '<td><a href="' . base_url('/product') . '?id=' . $sale->id . '">' . $sale->alghind . ' € </td>';
                                echo '<td><a href="' . base_url('/product') . '?id=' . $sale->id . '">' . $sale->date . '</td>';
                                echo '<td><a href="' . base_url('/product') . '?id=' . $sale->id . '">' . $sale->enddate . '</td>';

                                echo '</tr>';
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>