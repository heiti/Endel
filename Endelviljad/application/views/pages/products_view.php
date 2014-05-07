<!--content-->
<div class="container">
    <div class="row">
        <div class="col-lg-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Täpsusta tulemused:</h3>
                </div>
                <div class="panel-body">
                    <?php echo form_open("products/search"); ?>
                    <div class="dropdown"> <!-- sort by button -->
                        <a class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                            Kategooria  <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <?php
                            $option = array(
                                'puuvili' => 'Puuviljad',
                                'köögivili' => 'Köögiviljad',
                                'mari' => 'Marjad',
                                'maitsetaim' => 'Maitsetaimed',
                                'seen' => 'Seened',
                                'muu' => 'Muud'
                            );
                            foreach ($option as $opt) {
                                echo '<li><a href="">' . $opt . '</a></li>';
                            }
                            ?>
                        </ul>
                    </div>
                    <div class="dropdown"> <!-- sort by button -->
                        <a class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                            Sorteeri  <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="">Hinna järgi kasvavalt</a></li>
                            <li><a href="">Hinna järgi kahanevalt</a></li>
                            <li><a href="">Lisamise aja järgi kasvavalt</a></li>
                            <li><a href="">Lisamise aja järgi kahanevalt</a></li>
                            <li class="divider"></li>
                            <li><a href="">Populaarsemad</a></li>
                        </ul>
                    </div>



                </div>
            </div>

        </div><!-- end sort by button -->

        <!-- $options = array(
                     'odav' => 'Odavamad enne',
                     'kallis' => 'Kallimad enne',
                     'varem' => 'Varem lisatud enne',
                     'hiljem' => 'Hilisemad enne'
                 );
                 echo form_dropdown('sorting', $options);
                 echo form_close();
         
        -->



        <div class="col-lg-10 ">
            <div class="col-lg-10 "><!--search-->

                <div class="input-group input-group-lg">

                    <?php
                    /* $data = array('name' => 'search','id' => 'search' );
                      echo form_input($data);
                     */
                    ?>
                    <input type="text" name="search" id="search" class="form-control" placeholder="Sisesta märksõna"> 

                    <span class="input-group-btn">
                        <!-- <button class="btn btn-default" type="button"> -->
                        <button class="btn btn-default" type="submit" name="searchbutton" value="Otsi"> 
                            Otsi
                        </button>
                        <?php
                        //echo form_submit('searchbutton', 'Otsi');
                        echo form_close();
                        ?>
                    </span>
                    <!--<input type="submit" name="searchbutton" value="Otsi" /> -->
                    <!--<button class="btn btn-default" type="button">Go!</button>-->
                </div> <!-- end search -->

            </div><!-- end overall search bar -->

            <div class="col-lg-10 "> <!-- product table-->
                <br/>
                <div class="text-center">

                    <div class="row">
                        <?php
                        echo $pagination;
                        ?>
                    </div>

                    <div class="row">
                        <?php
                        echo '<div class="col-lg-10">'; //product table insides
                        echo '<table >';

                        echo '<tr>';
                        $items_in_row = 0;
                        foreach ($product as $prod) {

                            echo '<td >';
                            echo '<a href="' . base_url('/product') . '?id=' . $prod->sale_id . '"class="thumbnail" '
                            . 'style="height:440px;width:250px;padding:15px;margin-right:5px">';

                            echo '<img src="' . base_url('/application/images/thumb/' . $prod->Pilt . '" >') . '</img>';
                            echo '<div class="caption" ><h3>' . $prod->Vili;
                            echo '<p><small>' . $prod->Sort . '</small></p></h3>';
                            if ($prod->type == 'sale') {
                                echo '<p style="color:#00CC66">MÜÜK</p>';
                                echo '<p>' . $prod->Hind . ' €/kg</p>';
                                echo '<p>' . $prod->Kogus . ' kg</p>';
                            } else if ($prod->type == 'auction') {
                                echo '<p style="color:#FF3300">OKSJON</p>';
                                echo '<p>' . $prod->Kogus . ' kg</p>';
                                echo '<p>Alghind: ' . $prod->alghind . ' €</p>';
                                echo '<p>Osta kohe: ' . $prod->ostakohe . ' €</p>';
                                echo '<h3 class="small">Oksjon lõppeb: ' . $prod->enddate . '</h3>';
                            }
                            
                            
                            echo '</div></a>';
                            echo '</div>'; //end caption
                            echo '</td>';
                            $items_in_row = $items_in_row + 1;

                            if ($items_in_row == 3) { //place 3 items in every row
                                echo '</tr><tr>';
                                $items_in_row = 0;
                            }
                        }
                        echo '</tr>';

                        echo '</table>';
                        echo '</div>'; //end product table inside
                        ?>
                    </div>

                    <div class="row">
                        <?php
                        echo $pagination;
                        ?>
                    </div>

                </div><!-- /.text-center -->
            </div>   <!-- end product table-->
        </div><!-- /.col-lg-6 -->


    </div><!--/Content-->
</div><!--/Content-->
