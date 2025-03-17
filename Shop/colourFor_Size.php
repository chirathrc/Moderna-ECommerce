<?php
include ('connection.php');

if (isset($_GET['sz_id'])) {


    $sz = $_GET['sz_id'];

    $color_data_rs = Database::search("SELECT * FROM `small_has_colours` WHERE `Small_id` = '" . $sz . "'");


    for ($x = 0; $x < $colours_rs->num_rows; $x++) {

        $colour_data = $colours_rs->fetch_assoc();

        ?>

        <div onclick="cl('<?php echo ($colour_data['colour']); ?>','<?php echo ($colour_data['colour_id']); ?>');"
            data-value="<?php echo ($colour_data['colour']); ?>"
            class="swatch-element color <?php echo ($colour_data['colour']); ?> available">
            <input class="swatchInput" id="swatch-0-<?php echo ($colour_data['colour']); ?>" type="radio" name="option-0"
                value="<?php echo ($colour_data['colour']); ?>"><label class="swatchLbl color small"
                for="swatch-0-<?php echo ($colour_data['colour']); ?>"
                style="background-color:<?php echo ($colour_data['colour']); ?>;"
                title="<?php echo ($colour_data['colour']); ?>"></label>
        </div>

        <?php

    }



} else {

    echo ("Unknown Error Occured");
}



?>