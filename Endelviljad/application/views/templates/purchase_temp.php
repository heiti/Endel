<div class="container">
    <?php
    echo '<p>Vili: ' . $product->Vili . '</p>';
    echo '<p>Sort: ' . $product->Sort . '</p>';
    echo '<p>Asukoht: ' . $product->Asukoht . '</p>';
    echo '<p>Müüja: ' . $product->Seller . '</p>';
    echo '<p>Kogus: ' . $_GET['amount'] . '</p>';
    echo '<p>Hind: ' . $sale->hind . ' €/kg</p>';
    echo '<p>Kokku: ' . $_GET['amount'] * $sale->hind . ' €</p>';
    $data = array(
        'name' => 'paybutton',
        'value' => 'Maksa',
        'class' => 'btn btn-primary'
    );
    echo '<a href="pay?id=' . $_GET['id'] . '&amount=' . $_GET['amount'].'">';
    echo form_submit($data);
    echo '</a>';
    ?>
</div>