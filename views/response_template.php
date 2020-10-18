<?php
/**
 * @var $messages array
 */

?>

<?php
foreach ($messages as $mess){
    print $mess['author'].' -> '.$mess['message'].': '.$mess['time_stamp'].'<br>';
}
?>
