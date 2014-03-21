
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
                ini_set('error_reporting', E_ALL);
                ini_set('display_errors', 'On');  //On or Off
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
                    echo '<div class="product">';
                    echo $prod->Vili."<br/>";
                    echo $prod->Sort."<br/>";
                    echo $prod->hind."<br/>";
                    echo $prod->kogus."<br/>";
                    echo $prod->username."<br/></div>";
                }
                ?>
            </p>
        </div>


    </div>
</div> 