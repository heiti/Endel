<!--Content-->
<div class="container">
    <div class="row">
        <div class="col-lg-6 col-lg-offset-3">
            <div class="panel panel-default text-center">
                <div class="panel-heading">
                    <h2><?php echo $product->Vili ?>
                        <small>  <p><?php echo $product->Kategooria ?></p>
                            <p><?php echo $product->Asukoht ?></p></small></h2>
                </div>
                <div class="panel-body" style="padding:30px">
                    <?php
                    ini_set('error_reporting', E_ALL);
                    ini_set('display_errors', 'On');  //On or Off
                    echo form_error();
                    echo form_open('newsale/addsale?id=' . $product->id);
                    ?>


                    <p><span class="alert alert-info" >Müük 
                            <input type="radio" name="tyyp" id="myyk" value="myyk" class="nupud" checked="checked" />
                        </span>

                        <span class="alert alert-info" >Oksjon 
                            <input type="radio" name="tyyp" id="oksjon" value="oksjon" class="nupud" checked="checked" />
                        </span>
                    </p>
                    <br/>
                    <div class="form-group">
                        <label for="kogus">Kogus</label>
                        <div class="input-group">
                        <input type = "text" class = "form-control" name = "kogus" id = "kogus" value = "<?php $this->input->post('kogus') ?>"/>
                    <span class="input-group-addon">kg</span>
                        </div>
                    </div>

                    <div class="myyk" style="display: none">
                        <div class="form-group">
                            <label for="hind">Hind</label>
                            <div class="input-group">
                            <input type = "text" class = "form-control" name = "hind" id = "hind" value = "<?php $this->input->post('hind') ?>"/>
                            <span class="input-group-addon">€</span>
                            </div>
                        </div>
                    </div>
                    
                    
                    <div class="oksjon" style="display: none">
                        <div class="form-group">
                            <label for="alghind">Oksjoni alghind</label>
                            <div class="input-group">
                            <input type = "text" class = "form-control" name = "alghind" id = "alghind" value = "<?php $this->input->post('alghind') ?>"/>
                            <span class="input-group-addon">€</span>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="auction">Oksjoni kestus </label>
                            <div class="input-group">
                            <input type = "text" class = "form-control" name = "kestus" id = "auction" value = "<?php $this->input->post('kestus') ?>"/>
                            <span class="input-group-addon">päeva</span>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="ostakohe">Osta kohe hind</label>
                            <div class="input-group">
                            <input type = "text" class = "form-control" name = "ostakohe" id = "ostakohe" value = "<?php $this->input->post('ostakohe') ?>"/>
                            <span class="input-group-addon">€</span>
                            </div>
                            <p class="text-warning">Kui ei soovi kohe ostmise võimalust, jätke lünk tühjaks</p>
                       
                        </div>
                        
                    </div>
                    <button type="submit" name="lisamyyk" value="Lisa" class="btn btn-success btn-lg" >Lisa</button>
                    
                    <?php
                    echo form_close();
                    ?>
                </div><!--end panel body-->
            </div>
        </div>
    </div>
