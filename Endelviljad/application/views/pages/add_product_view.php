<!--content-->
<div id="content">
    <div id="column-right">

        <div id="content-addprod">
            <?php
            print_r($this->session->flashdata('confirmation'));
            echo $error;

            echo validation_errors();
            echo form_open_multipart("addproduct/insert");

            echo "<p>Kategooria: ";
            $options = array(
                'puuvili' => 'Puuviljad',
                'juurvili' => 'Juurviljad',
                'köögivili' => 'Köögiviljad',
                'seen' => 'Seened',
                'maitsetaim' => 'Maitsetaimed',
                'mari' => 'Marjad'
            );
            echo form_dropdown('kategooria', $options, 'juurvili') . "</p>";

            echo "<p>Vili: ";
            $data = array(
                'name' => 'vili',
                'id' => 'vili'
            );
            echo form_input($data, $this->input->post('vili')) . "</p>";
            echo "<p>Sort: ";
            $data = array(
                'name' => 'sort',
                'id' => 'sort'
            );
            echo form_input($data, $this->input->post('sort')) . "</p>";

            echo "<p>Kogus: ";
            $data = array(
                'name' => 'kogus',
                'id' => 'kogus'
            );
            echo form_input($data, $this->input->post('kogus')) . "</p>";

            echo "<p>Hind: ";
            $data = array(
                'name' => 'hind',
                'id' => 'hind'
            );
            echo form_input($data, $this->input->post('hind')) . "</p>";

            echo "<p>Asukoht: ";
            $data = array(
                'name' => 'asukoht',
                'id' => 'asukoht'
            );

            echo form_input($data, $this->input->post('asukoht')) . "</p>";

            echo '<input type="file" name="userfile" />';
            echo form_submit('addbutton', 'Lisa toode');
            echo form_close();
            ?>

        </div>
    </div>
</div>
<!--/content-->