<div><div class="dropdown"> <!-- sort by button -->
        <a class="btn btn-default dropdown-toggle" data-toggle="dropdown">
            Kategooria  <span class="caret"></span>
        </a>
        <ul class="dropdown-menu" id="select_1" role="menu">
            <?php
            $option = array(
                'puuvili' => 'Puuviljad',
                'köögivili' => 'Köögiviljad',
                'mari' => 'Marjad',
                'muu' => 'Muud'
            );
            foreach ($option as $opt) {
                echo '<li><a href="">' . $opt . '</a></li>';
            }
            ?>
        </ul>
    </div>
    <div class="dropdown"> <!-- sort by button -->
        <a class="btn btn-default dropdown-toggle" data-toggle="dropdown">
            Vili <span class="caret"></span>
        </a>
        <ul class="dropdown-menu" name="proov" role="menu">
            <?php
            foreach ($query as $que) {
                echo '<li><a href="" class="' . $que->kategooria . '">' . $que->nimi . '</a></li>';
            }
            ?>
        </ul>

    </div>
</div>



<div>
    <select name="select1" id="select1">
        <option selected disabled>Kategooria</option>
        <option href="" value="Puuviljad">Puuviljad</option>
        <option href="" value="Köögiviljad">Köögiviljad</option>
        <option href="" value="Marjad">Marjad</option>
        <option href="" value="Muud">Muud</option>
    </select>
    <select name="select2" id="select2">
        <?php
        foreach ($query as $que) {
                echo '<option href="" class="' . $que->kategooria . '">' . $que->nimi . '</li>';
            }
            ?>
    </select>
    
    
</div>