<div class="container">
    <?php
    ini_set('error_reporting', E_ALL);
    ini_set('display_errors', 'On');  //On or Off
    ?>
    <input class="rating" id="product_rating" data-max="5" data-min="1" name="rating" type="number" />
    <h3>Müüja </h3><a href="/profile?id=<?php echo $transaction->seller_id ?>"><p><?php echo $transaction->sellername ?></p></a>
    <h3>Ostja </h3><a href="/profile?id=<?php echo $transaction->buyer_id ?>"><p><?php echo $transaction->buyername ?></p></a>
    <h3>Vili </h3><p><?php echo $transaction->Vili ?></p>
    <h3>Sort </h3><p><?php echo $transaction->Sort ?></p>
    <h3>Kogus </h3><p><?php echo $transaction->amount ?> kg</p>
    <h3>Hind </h3><p><?php echo $transaction->price ?> €/kg</p>
    <h3>Summa </h3><p><?php echo $transaction->sum ?> €</p>
    <h3>Kuupäev </h3><p><?php echo $transaction->Date ?></p>

</div>


<div id="rating_accepted" class="modal fade" style="display: none">
    <br/>
    Reiting lisatud!
    </br>
    
</div>