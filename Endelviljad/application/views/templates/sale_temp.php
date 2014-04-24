<div class="container">
    <p><?php echo $product->Vili ?></p>
    <p><?php echo $product->Kategooria ?></p>
    <p><?php echo $product->Asukoht ?></p>

    <?php
    ini_set('error_reporting', E_ALL);
    ini_set('display_errors', 'On');  //On or Off
    echo form_error();
    echo form_open('newsale/addsale?id=' . $product->id);
    $data = array(
        'name' => 'tyyp',
        'id' => 'tyyp1',
        'value' => 'myyk',
        'class' => 'nupud'
    );
    echo '<p>Müük: ' . form_radio($data) . '</p>';
    $data = array(
        'name' => 'tyyp',
        'id' => 'tyyp2',
        'value' => 'oksjon',
        'class' => 'nupud'
    );
    echo '<p>Oksjon: ' . form_radio($data) . '</p>';
    echo "<p>Kogus: ";
    $data = array(
        'name' => 'kogus',
        'id' => 'kogus'
    );
    echo form_input($data, $this->input->post('kogus'));
    echo '<div class="myyk" style="display: none">';
    echo "<p>Hind: ";
    $data = array(
        'name' => 'hind',
        'id' => 'kilohind',
        'class' => 'hind'
    );
    echo form_input($data, $this->input->post('hind')) . " €</p>";
    echo '</div>';
    echo '<div class="oksjon" style="display: none">';
    echo '<p>Oksjoni alghind: ';
    $data = array(
        'name' => 'alghind',
        'id' => 'kilohind',
        'class' => 'alghind'
    );
    echo form_input($data, $this->input->post('alghind')) . ' €';
    echo '<span id="summa" style="display: none"><span></p>';
    echo '<p>Osta kohe hind: ';
    $data = array(
        'name' => 'ostakohe',
        'id' => 'kilohind',
        'class' => 'ostakohe'
    );
    echo form_input($data, $this->input->post('ostakohe')) . ' €    Kui ei soovi kohe ostmise võimalust, jätke lünk tühjaks</p>';
    echo '<p>Oksjoni kestus: ';
    $data = array(
        'name' => 'kestus',
        'id' => 'auction'
    );
    echo form_input($data, $this->input->post('kestus')) . ' päeva</p>';
    echo '</div>';
    echo form_submit('lisamyyk', 'Lisa');
    ?>
</div>