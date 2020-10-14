<?php
/**
 * @var $messages array
 */

?>

chat_mess2
    <div id="out_message"></div>
    <?php
    foreach ($messages as $mess){
        print $mess['author'].' -> '.$mess['message'].': '.$mess['time_stamp'].'<br>';
    }
    ?>
