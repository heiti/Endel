
<!--Content-->
<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading"><h2>Minu Ostud</h2></div>
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
                            if (count($buys) != 0) {
                                $data = array('Vili', 'Sort', 'Hind', 'Kogus', 'Summa', 'Asukoht', 'Müüja');
                                foreach ($data as $_data) {
                                    echo '<th>' . $_data . '</th>';
                                }
                            } else {
                                echo '<h2>Sa pole midagi ostnud</h2>';
                            }
                            ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($buys as $buy) {
                            echo '<tr>';
                            echo '<td><a href="' . base_url('/transaction') . '?id=' . $buy->id . '">' . $buy->Vili . '</td>';
                            echo '<td><a href="' . base_url('/transaction') . '?id=' . $buy->id . '">' . $buy->Sort . '</td>';
                            echo '<td><a href="' . base_url('/transaction') . '?id=' . $buy->id . '">' . $buy->price . ' €/kg</td>';
                            echo '<td><a href="' . base_url('/transaction') . '?id=' . $buy->id . '">' . $buy->amount . ' kg</td>';
                            echo '<td><a href="' . base_url('/transaction') . '?id=' . $buy->id . '">' . $buy->sum . ' €</td>';
                            echo '<td><a href="' . base_url('/transaction') . '?id=' . $buy->id . '">' . $buy->Asukoht . '</td>';
                            echo '<td><a href="' . base_url('/transaction') . '?id=' . $buy->id . '">' . $buy->seller . '</td>';
                            echo '</tr>';
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
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
                            if (count($sales) != 0) {
                                $data = array('Vili', 'Sort', 'Hind', 'Kogus', 'Summa', 'Asukoht', 'Ostja');
                                foreach ($data as $_data) {
                                    echo '<th>' . $_data . '</th>';
                                }
                            } else {
                                echo '<h2>Sa pole midagi ostnud</h2>';
                            }
                            ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($sales as $sale) {
                            echo '<tr>';
                            echo '<td><a href="' . base_url('/transaction') . '?id=' . $sale->id . '">' . $sale->Vili . '</td>';
                            echo '<td><a href="' . base_url('/transaction') . '?id=' . $sale->id . '">' . $sale->Sort . '</td>';
                            echo '<td><a href="' . base_url('/transaction') . '?id=' . $sale->id . '">' . $sale->price . ' €/kg</td>';
                            echo '<td><a href="' . base_url('/transaction') . '?id=' . $sale->id . '">' . $sale->amount . ' kg</td>';
                            echo '<td><a href="' . base_url('/transaction') . '?id=' . $sale->id . '">' . $sale->sum . ' €</td>';
                            echo '<td><a href="' . base_url('/transaction') . '?id=' . $sale->id . '">' . $sale->Asukoht . '</td>';
                            echo '<td><a href="' . base_url('/transaction') . '?id=' . $sale->id . '">' . $sale->buyer . '</td>';
                            echo '</tr>';
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!--/Content-->