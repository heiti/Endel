<div id="content">
    <div id ="content-product-left">
        <?php
        echo '<img src="' . base_url('/application/images/original/' . $product->Pilt . '" width="500" align="middle">');
        ?>

    </div> 
    <div id="content-product-right">

        <?php
        echo '<p>' . $product->Vili . '</p>';
        echo '<p>' . $product->Sort . '</p>';
        echo '<p>' . $product->Hind . ' €/kg</p>';
        echo '<p>' . $product->Kogus . ' kg</p>';
        echo '<p>' . $product->Asukoht . '</p>';
        echo '<p>' . $product->Seller . '</p>';
        echo form_open();
        $kogus = $product->Kogus;
        $data = array(
            '25' => floor($kogus*0.25),
            '75' => floor($kogus*0.5),
            '50' => floor($kogus*0.75),
            '100' => floor($kogus)
        );
        echo '<p>' . form_dropdown('Kogus', $data) . '</p>';
        echo '<p>' . form_submit('Lisa', 'Lisa ostukorvi') . '</p>';
        echo form_close();
        ?>



    </div>
</div>