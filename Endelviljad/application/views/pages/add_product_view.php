<div id="column-right">
    <div id="content">
        <div id="content-addprod">
            <?php
            ini_set('error_reporting', E_ALL);
            ini_set('display_errors', 'On');  //On or Off
            echo $message;
            
            echo validation_errors();
            echo form_open("addproduct/insert");

            echo "<p>".form_label("Kategooria", 'Kategooria');
            $options = array(
                'puuvili' => 'Puuviljad',
                'juurvili' => 'Juurviljad',
                'köögivili' => 'Köögiviljad',
                'seen' => 'Seened',
                'maitsetaim' => 'Maitsetaimed',
                'mari' => 'Marjad'
            );
            echo form_dropdown('Kategooria', $options)."</p>";
            
            echo "<p>".form_label("Vili", 'vili'); $data = array(
                'name' => 'vili',
                'id' => 'vili'
            );echo form_input($data)."</p>";
            
            echo "<p>".form_label("Sort", 'sort');
            $data = array(
                'name' => 'sort',
                'id' => 'sort'
            ); echo form_input($data)."</p>";
            
            echo "<p>".form_label("Kogus", 'kogus');
            $data = array(
                'name' => 'kogus',
                'id' => 'kogus'
            );
            echo form_input($data)."</p>";
            
            echo "<p>".form_label("Hind", 'hind');
            $data = array(
                'name' => 'hind',
                'id' => 'hind'
            );
            echo form_input($data)."</p>";
            
            echo "<p>".form_label("Asukoht", 'asukoht');
            $data = array(
                'name' => 'asukoht',
                'id' => 'asukoht'
            );

            echo form_input($data)."</p>";
            echo form_submit('addbutton', 'Lisa toode');
            echo form_close();
            ?>

        </div>
    </div>
</div>