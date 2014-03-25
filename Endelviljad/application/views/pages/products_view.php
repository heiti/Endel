
<div id="content"> 
    <div id="column-left">
        
        <?php
        echo validation_errors();

        echo form_open("products/search");
        echo '<p>Puuviljad'.form_checkbox('vili[]', 'puuvili', set_checkbox('vili[]', 'puuvili')).'</p>';
        echo '<p>Juurviljad'.form_checkbox('vili[]', 'juurvili', set_checkbox('vili[]', 'juurvili')).'</p>';
        echo '<p>Köögiviljad'.form_checkbox('vili[]', 'köögivili', set_checkbox('vili[]', 'köögivili')).'</p>';
        echo '<p>Seened'.form_checkbox('vili[]', 'seen', set_checkbox('vili[]', 'seen')).'</p>';
        echo '<p>Marjad'.form_checkbox('vili[]', 'mari', set_checkbox('vili[]', 'mari')).'</p>';
        echo '<p>Maitsetaimed'.form_checkbox('vili[]', 'maitsetaim', set_checkbox('vili[]', 'maitsetaim')).'</p>';
        
        
        ?>
        
        
        
        
        
    </div>
    <div id="column-right">

        

        <div id="content-prod">
            <h1>Toodete otsing</h1>
            <p>
                <?php
                
                ini_set('error_reporting', E_ALL);
                ini_set('display_errors', 'On');  //On or Off
                

                
                $data = array(
                    'name' => 'search',
                    'id' => 'search' 
                );

                echo form_input($data);
                echo form_submit('searchbutton', 'Search');
                echo form_close();


                foreach ($product as $prod) {


                    echo '<div class="product">';
                    echo '<img src="'.base_url('/uploads/original/'.$prod->Pilt.'" height="150"/>');
                    echo '<p>Vili: '.$prod->Vili.'</p>';
                    echo '<p>Sort: '.$prod->Sort.'</p>';
                    echo '<p>Kategooria: '.$prod->Kategooria.'</p>';
                    echo '<p>Hind: '.$prod->Hind.'</p>';
                    echo '<p>Kogus: '.$prod->Kogus.'</p>';
                    echo '<p>Müüja: '.$prod->username."</p></div>";
                }
                ?>
            </p>
        </div>


    </div>
