
<div id="column-left">
    tere meist meist meist mere maailm tere maailm tere maailm 
    siia kõik otsinguasi
    nii lahe otsida asjade seast
</div>

<div id="column-right">
    <div id="content">

        <div id="content-prod">
            <h1>Toodete otsing</h1>
            <p>
                <?php
                echo validation_errors();

                echo form_open("products/search");
                $data = array(
                    'name' => 'search',
                    'id' => 'search'
                );

                echo form_input($data);
                echo form_submit('searchbutton', 'Search');
                echo form_close();
                foreach ($product as $prod) {
                    echo $prod->Vili."   " .$prod->Sort."   ".$prod->hind."   ".$prod->kogus."   ".$prod->username."<br/>";
                }
                ?>
            </p>
        </div>


    </div>
</div> 