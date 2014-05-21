<!--content-->
<div class="container">
    <div class="row">
        <div class="col-lg-6 col-lg-offset-3">
            <div class="panel panel-default text-center">
                <div class="panel-heading">
                    <h2 class="panel-title">Lisa uus toode</h2>
                </div>

                <div class="panel-body ">
                    <div class="col-lg-6 col-lg-offset-3">
                        <?php
                        echo '<h3>';
                        print_r($this->session->flashdata('confirmation'));
                        echo '</h3>';
                        echo $error;
                        echo validation_errors();
                        echo form_open_multipart("addproduct/insert");
                        ?>

                        <?php
                        echo "<p><label> Kategooria</label></p>";
                        ;
                        $options = array(
                            'puuvili' => 'Puuviljad',
                            'juurvili' => 'Juurviljad',
                            'köögivili' => 'Köögiviljad',
                            'seen' => 'Seened',
                            'maitsetaim' => 'Maitsetaimed',
                            'mari' => 'Marjad'
                        );
                        echo form_dropdown('kategooria', $options, 'juurvili') . "</p>";
                        ?>

                        <div class="form-group">
                            <label for="vili">Vili</label>
                            <input type = "text" class = "form-control" name = "vili" id = "vili" value = "<?php $this->input->post('vili') ?>"/>
                        </div>

                        <div class="form-group">
                            <label for="sort">Sort</label>
                            <input type = "text" class = "form-control" name = "sort" id = "sort" value = "<?php $this->input->post('sort') ?>"/>
                        </div>

                        <div class="form-group">
                            <label for="asukoht">Asukoht</label>
                            <input type = "text" class = "form-control" name = "asukoht" id = "asukoht" value = "<?php $this->input->post('asukoht') ?>"/>
                        </div>


                        <label>Lisa pilt: </label>
                        <input type="file" name="userfile" />
                        <br/>
                        <div class="control-group form-group">
                            <label  for="info">Lisainfo</label>
                            <div class="controls">
                                <textarea class="form-control" name="info" id="senderMessage" cols="50" rows="5" 
                                          value="<?php $this->input->post('info') ?>"></textarea>
                            </div>
                        </div>
                        <button type="submit" name="addbutton" value="Lisa toode" class="btn btn-success " >Lisa toode</button>
                        <?php
                        echo form_close();
                        ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/content-->