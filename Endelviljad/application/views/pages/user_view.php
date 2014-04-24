<!--Content-->
<div class="container">
    <div id="column-right">
        <h1>Kasutaja andmete muutmine</h1>

        <?php
        ini_set('error_reporting', E_ALL);
        ini_set('display_errors', 'On');  //On or Off

        echo form_open('user/updatedata');
        
        echo '<p>Nimi: ';     
        $data = array(
            'name' => 'name',
            'id' => 'name'
        );
        echo form_input($data, $this->input->post('name')) .'   '.$andmed->name. "</p>";
        
        echo '<p>Email: ';     
        $data = array(
            'name' => 'email',
            'id' => 'email'
        );
        echo form_input($data, $this->input->post('email')) .'   '.$andmed->email. "</p>";
        
        echo '<p>Linn: ';     
        $data = array(
            'name' => 'city',
            'id' => 'city'
        );
        echo form_input($data, $this->input->post('city')).'   '.$andmed->city. "</p>";
        
        echo '<p>Aadress: ';     
        $data = array(
            'name' => 'address',
            'id' => 'address'
        );
        echo form_input($data, $this->input->post('address')).'   '.$andmed->address. "</p>";
        
        echo form_submit('Muuda', 'Muuda');
        echo form_close();
        ?>

    </div>    
</div>
<!--/Content-->