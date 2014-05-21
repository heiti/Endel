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
            ?>
            <button type="submit" name="lisatoode" value="Lisa uus toode" class="btn btn-primary btn-sm" >Lisa uus toode</button>
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
            <button type="submit" name="lisatoode" value="Lisa uus toode" class="btn btn-primary btn-sm" >Lisa uus toode</button>
            <?php
            echo form_close();
            ?>
        </div>


    </div>
</div>
<!--/Content-->