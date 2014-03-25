<div id="content">
    <div id="column-left">
        <h3>Siia tulevad funktsioonid</h3>
    </div>

    <div id="column-right">


        <div id="content-prod">
            <h1>Minu tooted</h1>
            <p>
               <?php
               ini_set('error_reporting', E_ALL);
               ini_set('display_errors', 'On');  //On or Off
               echo $message;
               $this->table->set_heading(array('', 'Vili', 'Sort', 'Kategooria', 'Kogus', 'Hind', 'Asukoht'));
               foreach($products as $prod){
                   $this->table->add_row($prod);
               }
               echo $this->table->generate();
               echo form_open('addproduct');
               echo form_submit('lisatoode', 'Lisa uus toode');
               echo form_close();
               ?>
               
            </p>
        </div>

        


        
        
    </div>
