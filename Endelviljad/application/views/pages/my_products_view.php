<!--Content-->
<div class="container">

    <div class="panel panel-default">
        <div class="panel-heading"><h2>Minu tooted</h2></div>
        <div class="panel-body">
            <?php
            ini_set('error_reporting', E_ALL);
            ini_set('display_errors', 'On');  //On or Off
            echo $message;
            echo form_open('addproduct');
            echo form_submit('lisatoode', 'Lisa uus toode');
            ?>
            <div class="table-responsive">
                <table class="table table-hover" style="width: 600px">
                    <thead>
                        <tr>
                            <?php
                            $heading = array('ID', 'Vili', 'Sort', 'Kategooria', 'Kogus', 'Hind', 'Asukoht');
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
            <?php
            echo form_submit('lisatoode', 'Lisa uus toode');
            echo form_close();
            ?>
        </div>





    </div>
</div>
<!--/Content-->