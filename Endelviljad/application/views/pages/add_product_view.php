<!--content-->
<div class="container">
    <div class="row">
        <div class="col-lg-6 col-lg-offset-3">
            <div class="panel panel-default text-center">
                <div class="panel-heading">
                    <h2 class="panel-title">Lisa uus toode</h2>
                </div>
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
</div>
<!--/content-->